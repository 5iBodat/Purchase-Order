<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $Items = Item::select('id', 'item_name',
        'item_description','item_price','updated_at');

        return datatables()->of($Items)
            ->addIndexColumn()
            ->orderColumn('DT_RowIndex', false)
            ->blacklist(['DT_RowIndex'])
            ->addColumn('action', 'item.datatables.action')
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
            'item_name' => 'required|string|min:3|max:25',
            'item_description' => 'required|string|min:3',
            'item_price' => 'required|numeric',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $items = Item::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $items,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Item $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Item $item): JsonResponse
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $item,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Item $item): JsonResponse
    {
        $rules = [
            'item_name' => 'required|string|min:3|max:25|unique:mst_item,item_name,'. $item->id,
            'item_description' => 'required|string|min:3|unique:mst_item,item_description,'. $item->id,
            'item_price' => 'required|numeric|unique:mst_item,item_price,'. $item->id,
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

        $item->update($validator->validated());

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $item,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SchoolClass $schoolClass
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Item $item): JsonResponse
    {
        /* Pengecheckan apabila ada PO atau invoice yang relasi dengan supplier ini . Nanti di tambahkan
        if ($supplier->students()->exists()) {
            return response()->json([
                'code' => Response::HTTP_CONFLICT,
                'message' => 'Data kelas tersebut terkait dengan pelajar, tidak dapat dihapus!',
            ], Response::HTTP_CONFLICT);
        } */

        $item->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
        ], Response::HTTP_OK);
    }
}
