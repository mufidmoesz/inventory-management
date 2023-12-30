<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    function all()
    {
        $product = Product::query();
        $warehouse = Warehouse::query();

        // if ($request->id) {
        //     $product = $product->find($request->id);

        //     if (!$product) {
        //         return ResponseFormatter::error(
        //             null,
        //             'Data not found',
        //             404
        //         );
        //     }

        //     return ResponseFormatter::success($product, "Get product by ID Successfully");
        // }
        $products = $product->get();
        $warehouses = $warehouse->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $warehouses = Warehouse::all();
        return view('product.create', compact('warehouses'));
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
            return redirect('/product');
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

    public function edit($id)
    {
        $product = Product::find($id);
        $warehouses = Warehouse::all();
        return view('product.edit', compact('product', 'warehouses'));
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

        return redirect('/product');
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

        return redirect('/product');
    }
}
