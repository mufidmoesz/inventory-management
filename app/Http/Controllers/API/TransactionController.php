<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    function all(request $request)
    {
        $transaction = Transaction::query();

        if ($request->id) {
            $transaction = $transaction->find($request->id);

            if (!$transaction) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($transaction, "Get transaction by ID Successfully");
        }
        $transaction = $transaction->get();

        return ResponseFormatter::success($transaction, "Get All transaction Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'customer_id' => 'required',
                'transaction_date' => 'required',
            ]);

            $transaction = Transaction::create([
                'customer_id' => $request->customer_id,
                'transaction_date' => $request->transaction_date,
            ]);
            return ResponseFormatter::success($transaction, 'Create Data transaction success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data transaction Failed',
                500,
            );
        }
    }
    public function update(Request $request)
    {
        try {
        $request->validate([
            'id' => 'required',
        ]);

        $transaction = Transaction::find($request->id);
            if (!$transaction) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $transaction->update([
            'transaction_date' => $request->transaction_date,
            'customer_id' => $request->customer_id, 
        ]);

        return ResponseFormatter::success($transaction, 'Update Data transaction success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data transaction Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if (!$transaction) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $transaction->delete();

        return ResponseFormatter::success(null, 'Delete Data transaction success');
    }
}
