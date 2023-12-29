<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WarehouseController extends Controller
{
    function all(request $request)
    {
        $warehouse = Warehouse::query();

        if ($request->id) {
            $warehouse = $warehouse->find($request->id);

            if (!$warehouse) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($warehouse, "Get warehouse by ID Successfully");
        }
        $warehouse = $warehouse->get();

        return ResponseFormatter::success($warehouse, "Get All warehouse Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'region' => 'required',
                'name' => 'required',
                
            ]);

            $warehouse = Warehouse::create([
                'region' => $request->region,
                'name' => $request->name,
            ]);
            return ResponseFormatter::success($warehouse, 'Create Data warehouse success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data warehouse Failed',
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

        $warehouse = Warehouse::find($request->id);
            if (!$warehouse) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $warehouse->update([
           'region' => $request->region,
                'name' => $request->name,]);

        return ResponseFormatter::success($warehouse, 'Update Data warehouse success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data warehouse Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $warehouse = Warehouse::find($request->id);

        if (!$warehouse) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $warehouse->delete();

        return ResponseFormatter::success(null, 'Delete Data warehouse success');
    }
}
