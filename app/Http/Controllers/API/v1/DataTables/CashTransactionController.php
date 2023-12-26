<?php

namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Models\CashTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CashTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashTransactions = CashTransaction::select('id', 'student_id', 'amount', 'date_paid', 'created_by')
            ->with('student:id,name', 'createdBy:id,name')
            ->whereYear('date_paid', now()->year)
            ->whereMonth('date_paid', now()->month)
            ->get();

        return datatables()->of($cashTransactions)
            ->addIndexColumn()
            ->addColumn('action', 'cash_transactions.datatables.action')
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'student_id' => 'required|numeric|exists:students,id',
            'amount' => 'required|numeric',
            'date_paid' => 'required|date',
            'transaction_note' => 'nullable|string|min:3|max:255',
            'created_by' => 'required|numeric|exists:users,id',
        ];

        $messages = [
            'student_id.required' => 'Kolom pelajar harus diisi!',
            'student_id.numeric' => 'Kolom pelajar harus berupa angka!',
            'student_id.exists' => 'Pelajar yang dipilih tidak ditemukan!',

            'amount.required' => 'Kolom tagihan harus diisi!',
            'amount.numeric' => 'Kolom tagihan harus berupa angka!',

            'date_paid.required' => 'Kolom tanggal pembayaran harus diisi!',
            'date_paid.date' => 'Format tanggal pembayaran tidak valid!',

            'transaction_note.string' => 'Kolom catatan transaksi harus berupa teks!',
            'transaction_note.min' => 'Panjang catatan transaksi minimal :min karakter!',
            'transaction_note.max' => 'Panjang catatan transaksi maksimal :max karakter!',

            'created_by.required' => 'Pencatat transaksi harus diisi!',
            'created_by.numeric' => 'Pencatat transaksi harus berupa angka!',
            'created_by.unique' => 'Pencatat transaksi tidak ditemukan!.',
        ];

        // TODO: the created_by should dynamic ID from authenticated user!
        $validator = Validator::make($request->merge(['created_by' => 1])->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $cashTransaction = CashTransaction::create($validator->validated());

        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success',
            'data' => $cashTransaction,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(CashTransaction $cashTransaction)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $cashTransaction->load('student:id,name', 'createdBy:id,name'),
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CashTransaction $cashTransaction)
    {
        $rules = [
            'student_id' => 'required|numeric|exists:students,id',
            'amount' => 'required|numeric',
            'date_paid' => 'required|date',
            'transaction_note' => 'nullable|string|min:3|max:255',
            'created_by' => 'required|numeric|exists:users,id',
        ];

        $messages = [
            'student_id.required' => 'Kolom pelajar harus diisi!',
            'student_id.numeric' => 'Kolom pelajar harus berupa angka!',
            'student_id.exists' => 'Pelajar yang dipilih tidak ditemukan!',

            'amount.required' => 'Kolom tagihan harus diisi!',
            'amount.numeric' => 'Kolom tagihan harus berupa angka!',

            'date_paid.required' => 'Kolom tanggal pembayaran harus diisi!',
            'date_paid.date' => 'Format tanggal pembayaran tidak valid!',

            'transaction_note.string' => 'Kolom catatan transaksi harus berupa teks!',
            'transaction_note.min' => 'Panjang catatan transaksi minimal :min karakter!',
            'transaction_note.max' => 'Panjang catatan transaksi maksimal :max karakter!',

            'created_by.required' => 'Pencatat transaksi harus diisi!',
            'created_by.numeric' => 'Pencatat transaksi harus berupa angka!',
            'created_by.unique' => 'Pencatat transaksi tidak ditemukan!.',
        ];

        // TODO: the created_by should dynamic ID from authenticated user!
        $validator = Validator::make($request->merge(['created_by' => 1])->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $cashTransaction->update($validator->validated());

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $cashTransaction,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashTransaction $cashTransaction)
    {
        $cashTransaction->delete();

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
        ], Response::HTTP_OK);
    }
}
