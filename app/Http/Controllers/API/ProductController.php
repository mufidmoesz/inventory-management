<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    function all(request $request)
    {
        $product = Product::query();

        if ($request->id) {
            $product = $product->find($request->id);

            if (!$product) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($product, "Get product by ID Successfully");
        }
        $product = $product->get();

        return ResponseFormatter::success($product, "Get All product Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'warehouse_id' => 'required',
                'name' => 'required',
                'stock' => 'required',
                'price' => 'required',
                
            ]);

            $product = Product::create([
                'warehouse_id' => $request->warehouse_id,
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            return ResponseFormatter::success($product, 'Create Data product success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data product Failed',
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

        $product = Product::find($request->id);
            if (!$product) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $product->update([
           'warehouse_id' => $request->warehouse_id,
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description,
            ]);

        return ResponseFormatter::success($product, 'Update Data product success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data product Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $product->delete();

        return ResponseFormatter::success(null, 'Delete Data product success');
    }
}
