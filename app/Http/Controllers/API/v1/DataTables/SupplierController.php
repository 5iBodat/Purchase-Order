<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $Suppliers = Supplier::select(
            'id',
            'customer_name',
            'compocode',
            'nomer_pajak',
            'alamat',
            'nama_pic',
            'telepon_pic',
            'email_pic',
            'whatsapp',
            'updated_at',
            'is_customer'
        )
            ->where('is_customer', 0);

        return datatables()->of($Suppliers)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'supplier.datatables.action')
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
        //dd($request->all());
        $rules = [
            'customer_name' => 'required|string|min:3|max:30',
            'nomer_pajak' => 'required|string|min:3|max:30',
            'alamat' => 'required|string|min:3|max:255',
            'nama_pic' => 'required|string|min:3|max:20',
            'telepon_pic' => 'required|string|min:3|max:20',
            'email_pic' => 'required|string|email|min:3|max:30',
            'whatsapp' => 'nullable|string|min:3|max:20',
            'is_customer' => 'nullable|boolean',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'email' => 'Format email tidak valid.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $suppliers = Supplier::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $suppliers,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supplier $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Supplier $supplier): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $supplier,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Supplier $supplier): JsonResponse
    {
        $rules = [
            'customer_name' => 'required|string|min:3|max:30|unique:mst_supplier,customer_name,' . $supplier->id,
            'nomer_pajak' => 'required|string|min:3|max:30|unique:mst_supplier,nomer_pajak,' . $supplier->id,
            'alamat' => 'required|string|min:3|max:255',
            'nama_pic' => 'required|string|min:3|max:20',
            'telepon_pic' => 'required|string|min:3|max:20',
            'email_pic' => 'required|string|email|min:3|max:30|unique:mst_supplier,email_pic,' . $supplier->id,
            'whatsapp' => 'nullable|string|min:3|max:20',
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

        $supplier->update($validator->validated());

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $supplier,
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
}
