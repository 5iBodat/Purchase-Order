<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\OatLokasi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OatLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $Oatlokasi = OatLokasi::select('id', 'name','price','updated_at');

        return datatables()->of($Oatlokasi)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'oat_lokasi.datatables.action')
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
            'name' => 'required|string|min:3|max:15',
            'price' => 'required|numeric',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => 'Mohon gunakan format angka!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $oatlokasi = OatLokasi::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $oatlokasi,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Item $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(OatLokasi $oatlokasi): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $oatlokasi,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OatLokasi
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, OatLokasi $oatlokasi): JsonResponse
    {
        $rules = [
            'name' => 'required|string|min:3|max:15|unique:mst_oat,name,'. $oatlokasi->id,
            'price' => 'required|numeric|unique:mst_oat,price,'. $oatlokasi->id,
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi',
            'min' => 'Panjang :attribute minimal :min karakter!',
            'max' => 'Panjang :attribute maksimal :max karakter!',
            'numeric' => 'Mohon gunakan format angka!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $oatlokasi->update($validator->validated());

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $oatlokasi,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SchoolClass $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(OatLokasi $oatlokasi): JsonResponse
    {
        /* Pengecheckan apabila ada PO atau invoice yang relasi dengan supplier ini . Nanti di tambahkan
        if ($supplier->students()->exists()) {
            return response()->json([
                'code' => Response::HTTP_CONFLICT,
                'message' => 'Data kelas tersebut terkait dengan pelajar, tidak dapat dihapus!',
            ], Response::HTTP_CONFLICT);
        } */

        $oatlokasi->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
        ], Response::HTTP_OK);
    }
}
