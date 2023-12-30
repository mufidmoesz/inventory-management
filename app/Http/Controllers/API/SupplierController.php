<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
    function all()
    {
        $supplier = Supplier::query();

        // if ($request->id) {
        //     $supplier = $suppliers->find($request->id);

        //     if (!$supplier) {
        //         return ResponseFormatter::error(
        //             null,
        //             'Data not found',
        //             404
        //         );
        //     }

        //     return ResponseFormatter::success($supplier, "Get Supplier by ID Successfully");
        // }
        $suppliers = $supplier->get();

        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'address' => 'required',
                'name' => 'required',
                'phone' => 'required',

            ]);

            $supplier = Supplier::create([
                'address' => $request->address,
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
            ]);
            return redirect('/supplier');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data Supplier Failed',
                500,
            );
        }
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request)
    {
        try {
        $request->validate([
            'id' => 'required',
        ]);

        $supplier = Supplier::find($request->id);
            if (!$supplier) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $supplier->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description]);

        return redirect('/supplier');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data Supplier Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $supplier = Supplier::find($request->id);

        if (!$supplier) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $supplier->delete();

        return redirect('/supplier');
    }
}
