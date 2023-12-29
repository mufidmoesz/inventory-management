<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TransactionItemController extends Controller
{
    function all(request $request)
    {
        $transaction = TransactionItem::query();

        if ($request->id) {
            $transaction = $transaction->find($request->id);

            if (!$transaction) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($transaction, "Get transaction item by ID Successfully");
        }
        $transaction = $transaction->get();

        return ResponseFormatter::success($transaction, "Get All transaction item Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'transaction_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
            ]);

            $transaction = TransactionItem::create([
                'transaction_id' => $request->transaction_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
            return ResponseFormatter::success($transaction, 'Create Data transaction item success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data transaction item Failed',
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

        $transaction = TransactionItem::find($request->id);
            if (!$transaction) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $transaction->update([
            'product_id' => $request->product_id,
            'transaction_id' => $request->transaction_id, 
            'quantity' => $request->quantity,
        ]);

        return ResponseFormatter::success($transaction, 'Update Data transaction item success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data transaction item Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $transaction = TransactionItem::find($request->id);

        if (!$transaction) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $transaction->delete();

        return ResponseFormatter::success(null, 'Delete Data transaction Item success');
    }
}
