<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $PoRec = PurchaseOrder::join('users', 'users.id', '=', 'po_receive.received_by')
            ->join('trx_sph', 'trx_sph.sph_code', '=', 'po_receive.sph_code')
            ->select('po_receive.id', 'po_receive.sph_code', 'po_no', 'po_file', 'po_status', 'users.name as username', 'received_by', 'po_receive.updated_at', 'trx_sph.company_name');

        if ($request->has('status') && $request->status != '') {
            $PoRec->where('status', $request->status);
        }

        // dd($PoRec);


        return datatables()->of($PoRec)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'sph.datatables.action')
            ->toJson();
    }

    /**
     * Display a listing of the resource dari Pembuatan PO.
     *
     * @return \Illuminate\Http\JsonResponse
     */


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
            'company_name' => 'required|string|min:3|max:30',
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
            ->select(
                'trx_sph.id',
                'sph_code',
                'sph_type',
                'trx_sph.status',
                'company_name',
                'company_pic',
                'telepon_pic',
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
            'company_name' => 'required|string|min:3|max:30',
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

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $sph,
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
            $po = PurchaseOrder::find($request->po_id);
            $po->po_file = $path;
            $po->po_status = 2;
            $po->po_no = $request->po_no;
            $po->save();

            return response()->json(['message' => 'PO File uploaded successfully'], 200);
        }

        return response()->json(['message' => 'File upload failed'], 500);
    }

    public function download(Request $request)
    {
        $filepo = PurchaseOrder::find($request->id);
        $path = $filepo->po_file;

        $filePath = storage_path('app/' . $path);

        // return view('test', compact('path', 'filePath'));

        if (!file_exists($filePath)) {
            abort(404);
        } else {
            return response()->download($filePath);
        }
    }
}
