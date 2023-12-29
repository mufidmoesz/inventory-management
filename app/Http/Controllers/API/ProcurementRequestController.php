<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ProcurementRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProcurementRequestController extends Controller
{
    function all(request $request)
    {
        $procurement = ProcurementRequest::query();

        if ($request->id) {
            $procurement = $procurement->find($request->id);

            if (!$procurement) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($procurement, "Get procurement by ID Successfully");
        }
        $procurement = $procurement->get();

        return ResponseFormatter::success($procurement, "Get All procurement Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'supplier_id' => 'required',
                'request_date' => 'required',
              
                
            ]);

            $procurement = ProcurementRequest::create([
                'supplier_id' => $request->supplier_id,
                'request_date' => $request->request_date,
              
            ]);
            return ResponseFormatter::success($procurement, 'Create Data procurement success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data procurement Failed',
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

        $procurement = ProcurementRequest::find($request->id);
            if (!$procurement) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $procurement->update([
            'supplier_id' => $request->supplier_id,
            'request_date' => $request->request_date,
            ]);

        return ResponseFormatter::success($procurement, 'Update Data procurement success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data procurement Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $procurement = ProcurementRequest::find($request->id);

        if (!$procurement) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $procurement->delete();

        return ResponseFormatter::success(null, 'Delete Data procurement success');
    }
}
