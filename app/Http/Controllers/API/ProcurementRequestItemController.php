<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ProcurementRequestItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProcurementRequestItemController extends Controller
{
    function all(request $request)
    {
        $procurement = ProcurementRequestItem::query();

        if ($request->id) {
            $procurement = $procurement->find($request->id);

            if (!$procurement) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($procurement, "Get procurement Item by ID Successfully");
        }
        $procurement = $procurement->get();

        return ResponseFormatter::success($procurement, "Get All procurement Item Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'procurement_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
            ]);

            $procurement = ProcurementRequestItem::create([
                'procurement_id' => $request->procurement_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'description' => $request->description,
            ]);
            return ResponseFormatter::success($procurement, 'Create Data procurement Item success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data procurement item Failed',
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

        $procurement = ProcurementRequestItem::find($request->id);
            if (!$procurement) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $procurement->update([
                'procurement_id' => $request->procurement_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'description' => $request->description,
            ]);

        return ResponseFormatter::success($procurement, 'Update Data procurement Item success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data procurement item Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $procurement = ProcurementRequestItem::find($request->id);

        if (!$procurement) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $procurement->delete();

        return ResponseFormatter::success(null, 'Delete Data procurement item success');
    }
}
