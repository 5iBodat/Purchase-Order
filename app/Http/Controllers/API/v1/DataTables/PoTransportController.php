<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\PoTransport;
use App\Models\User;
use App\Services\Helpers;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class PoTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $PoRec = PoTransport::join('users', 'users.id', '=', 'mst_po_transport.requested_by')
            ->select(
                "mst_po_transport.*",
                "users.name as username"
            )
            ->orderBy("po_date", "DESC");

        return datatables()->of($PoRec)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'po_transporter.datatables.action')
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'type' => 'required|string|min:3|max:10',
            'to' => 'required|string|min:3|max:50',
            'po_number' => 'required|string|min:3|max:30',
            'po_date' => 'required|string|min:3|max:30',
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'phone_fax' => 'required|string|min:3',
            'fob_point' => 'required|string|min:3',
            'term' => 'required|numeric',
            'transport' => 'required|string|min:3',
            'loading_point' => 'required|string|min:3',
            'shipped_via' => 'required|string|min:3',
            'delivered_to' => 'required|string|min:3',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
            'comments' => 'required|string',
            'unit_price' => 'required|string',
            'amount' => 'required|numeric',
            'portal_money' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'total' => 'required|numeric',
            'po_status' => 'required|numeric',
            'requested_by' => 'required|numeric',
            'created_by' => 'required|numeric',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Format :attribute harus angka.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $sph = PoTransport::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $sph,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(poTransport $poTransport)
    {
        //
        $poData = PoTransport::join('users', 'users.id', '=', 'mst_po_transport.requested_by')
            ->select(
                "mst_po_transport.*",
                "users.name as username"
            )
            ->where("mst_po_transport.id", $poTransport->id)->first();

        // // dd($poTransport->id);
        // dd($poData);

        if (!$poData) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Po not found',
            ], Response::HTTP_NOT_FOUND);
        }


        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $poData,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PoTransport $PoTransport): JsonResponse
    {
        $rules = [
            'type' => 'required|string|min:3|max:10',
            'to' => 'required|string|min:3|max:50',
            'po_number' => 'required|string|min:3|max:30',
            'po_date' => 'required|string|min:3|max:30',
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'phone_fax' => 'required|string|min:3',
            'fob_point' => 'required|string|min:3',
            'term' => 'required|numeric',
            'transport' => 'required|string|min:3',
            'loading_point' => 'required|string|min:3',
            'shipped_via' => 'required|string|min:3',
            'delivered_to' => 'required|string|min:3',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
            'notes' => 'required|string',
            'comments' => 'required|string',
            'unit_price' => 'required|string',
            'amount' => 'required|numeric',
            'portal_money' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'total' => 'required|numeric',
            'po_status' => 'required|numeric',
            'requested_by' => 'required|numeric',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Format :attribute harus angka.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $PoTransport->update($validator->validated());
        $user = User::find($PoTransport->requested_by);

        if ($PoTransport->po_status == 2) {
            //get date
            $dateNow = new DateTime();
            $formatDate = Helpers::formatDate($dateNow);

            // Generate PDF
            $pdf = Pdf::loadView('pdftemplate.potransport', ['poTransport' => $PoTransport, 'user' => $user, 'date' => $formatDate]);

            // Save the PDF
            $pdfPath = storage_path('app/public/po_folder/PO-' . $PoTransport->type . '-' . $formatDate['day'] . '-' . $formatDate['month'] . '-' . $formatDate['year'] . '.pdf');
            $pdf->save($pdfPath);

            // Optionally update the SPH record with the PDF path
            $PoTransport->file_po = ('public/po_folder/PO-' . $PoTransport->type . '-' . $formatDate['day'] . '-' . $formatDate['month'] . '-' . $formatDate['year'] . '.pdf');
            $PoTransport->save();
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $PoTransport,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function download(Request $request)
    {
        $filepo = PoTransport::find($request->id);
        $path = $filepo->file_po;

        $filePath = storage_path('app/' . $path);

        // return view('test', compact('path', 'filePath'));

        if (!file_exists($filePath)) {
            abort(404);
        } else {
            return response()->download($filePath);
        }
    }


    public function total(): JsonResponse
    {
        $totalPo = PoTransport::count();
        $totalApprove = PoTransport::where("po_status", 2)->count();
        $totalSubmit = PoTransport::where("po_status", 1)->count();
        $totalRevisi = PoTransport::where("po_status", 3)->count();
        $total = [
            "total" => $totalPo,
            "approve" => $totalApprove,
            "revisi" => $totalRevisi,
            "submit" => $totalSubmit
        ];

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $total,
        ], Response::HTTP_OK);
    }
}
