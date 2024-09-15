<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Helpers\Utils;
use App\Models\Sph;
use App\Models\User;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Services\Helpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\PDF;
use DateTime;

class SphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $Sph = Sph::join('users', 'users.id', '=', 'trx_sph.lastupdate_by')
            ->join('mst_supplier', 'mst_supplier.id', '=', 'trx_sph.company_name')
            ->select(
                'trx_sph.id',
                'sph_code',
                'sph_type',
                'trx_sph.status',
                'mst_supplier.customer_name as company_name',
                'company_pic',
                'trx_sph.telepon_pic',
                'product_name',
                'harga',
                'ppn',
                'pbbkb',
                'total',
                'oatlokasi',
                'hargaoat',
                'notes',
                'customer_po',
                'users.name as username',
                'trx_sph.updated_at'
            )
            ->orderBy('trx_sph.created_at', 'DESC');

        if ($request->has('status') && $request->status != '') {
            $Sph->where('status', $request->status);
        }


        return datatables()->of($Sph)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'sph.datatables.action')
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'sph_type' => 'required|string|min:3|max:10',
            'sph_code' => 'required|string|min:3|max:50',
            'company_name' => 'required|string',
            'company_pic' => 'required|string|min:3|max:30',
            'telepon_pic' => 'required|string|min:3|max:20',
            'product_name' => 'required|string|min:3',
            'harga' => 'required|numeric|min:3',
            'ppn' => 'required|numeric|min:3',
            'pbbkb' => 'required|numeric|min:3',
            'total' => 'required|numeric|min:3',
            'oatlokasi' => 'required|string|min:3|max:15',
            'hargaoat' => 'required|numeric|min:3',
            'status' => 'required|numeric',
            'lastupdate_by' => 'required|numeric',
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

        $sph = Sph::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $sph,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supplier $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(sph $sph): JsonResponse
    {
        $sphData = Sph::join('users', 'users.id', '=', 'trx_sph.lastupdate_by')
            ->join('mst_supplier', 'mst_supplier.id', '=', 'trx_sph.company_name')
            ->select(
                'trx_sph.id',
                'sph_code',
                'sph_type',
                'trx_sph.status',
                'mst_supplier.customer_name as company_name',
                'mst_supplier.id as company_id',
                'company_pic',
                'trx_sph.telepon_pic',
                'product_name',
                'harga',
                'ppn',
                'pbbkb',
                'total',
                'oatlokasi',
                'hargaoat',
                'notes',
                'customer_po',
                'users.name as username',
                'trx_sph.updated_at'
            )
            ->where('trx_sph.id', $sph->id)
            ->first();

        if (!$sphData) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => 'Supplier not found',
            ], Response::HTTP_NOT_FOUND);
        }


        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $sphData,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sph $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Sph $sph): JsonResponse
    {
        $rules = [
            'sph_code' => 'required|string|min:3|max:50|unique:trx_sph,sph_code,' . $sph->id,
            'company_name' => 'required|string',
            'company_pic' => 'required|string|min:3|max:30',
            'telepon_pic' => 'required|string|min:3|max:20',
            'product_name' => 'required|string|min:3',
            'harga' => 'required|numeric|min:3',
            'ppn' => 'required|numeric|min:3',
            'pbbkb' => 'required|numeric|min:3',
            'total' => 'required|numeric|min:3',
            'oatlokasi' => 'required|string|min:3|max:15',
            'hargaoat' => 'required|numeric|min:3',
            'status' => 'required|numeric',
            'notes' => 'required|string|min:3',
            'lastupdate_by' => 'required|numeric',
        ];


        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'min' => 'Panjang :attribute minimal :min karakter!',
            'max' => 'Panjang :attribute maksimal :max karakter!',
            'unique' => 'Nama :attribute sudah digunakan!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $sph->update($validator->validated());
        $user = User::find($request->lastupdate_by);
        $custCode = Supplier::find($request->company_name);


        if ($sph->status == 3) {
            //get date
            $dateNow = new DateTime();
            $formatDate = Helpers::formatDate($dateNow);
            $formatRef = Helpers::generateRef($sph->sph_code, $custCode->compocode, $sph->sph_type);

            $pdf = Pdf::loadView('pdftemplate.penawaran', ['sph' => $sph, 'users' => $user, 'date' => $formatDate, 'noRef' => $formatRef]);

            // Save the PDF
            $pdfPath = storage_path('app/public/sph_folder/PO-' . $sph->sph_code . '-' . $formatDate['day'] . '-' . $formatDate['month'] . '-' . $formatDate['year'] . '.pdf');
            $pdf->save($pdfPath);

            // Optionally update the SPH record with the PDF path
            $sph->customer_po = ('public/sph_folder/PO-' . $sph->sph_code . '-' . $formatDate['day'] . '-' . $formatDate['month'] . '-' . $formatDate['year'] . '.pdf');
            $sph->save();

            // save to PO_Receive  

            $dataPO = [
                'sph_code' => $sph->sph_code,
                'po_status' => 1,
                'received_by' => $request->lastupdate_by
            ];
            PurchaseOrder::create($dataPO);
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $sph,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SchoolClass $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Supplier $supplier): JsonResponse
    {
        /* Pengecheckan apabila ada PO atau invoice yang relasi dengan supplier ini . Nanti di tambahkan
        if ($supplier->students()->exists()) {
            return response()->json([
                'code' => Response::HTTP_CONFLICT,
                'message' => 'Data kelas tersebut terkait dengan pelajar, tidak dapat dihapus!',
            ], Response::HTTP_CONFLICT);
        } */

        $supplier->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
        ], Response::HTTP_OK);
    }

    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048', // Adjust validation rules as needed
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $sphCode = $request->sph_code;
            $filename = 'PO' . '-' . str_replace('/', '_', $sphCode) . '-' . time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('public/po_folder', $filename);

            // Update the table with the file path or any other necessary information
            $sph = Sph::find($request->sph_id);
            $sph->customer_po = $path;
            $sph->status = 4;
            $sph->save();

            return response()->json(['message' => 'PO File uploaded successfully'], 200);
        }

        return response()->json(['message' => 'File upload failed'], 500);
    }

    public function download(Request $request)
    {
        $filepo = Sph::find($request->id);
        $path = $filepo->customer_po;

        $filePath = storage_path('app/' . $path);

        // return view('test', compact('path', 'filePath'));

        if (!file_exists($filePath)) {
            abort(404);
        } else {
            return response()->download($filePath);
        }
    }

    public function getTotal(): JsonResponse
    {
        $totalSph = Sph::count();
        $totalApprove = Sph::where("status", 3)->count();
        $totalSubmit = Sph::where("status", 1)->count();
        $totalRevisi = Sph::where("status", 2)->count();
        $total = [
            "total" => $totalSph,
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
