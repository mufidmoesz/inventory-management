<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    function all(request $request)
    {
        $customer = Customer::query();

        if ($request->id) {
            $customer = $customer->find($request->id);

            if (!$customer) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

            return ResponseFormatter::success($customer, "Get customer by ID Successfully");
        }
        $customer = $customer->get();

        return ResponseFormatter::success($customer, "Get All customer Successfully");
    }

   function add(request $request)
    {
        try {
            $request->validate([
                'address' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                
            ]);

            $customer = Customer::create([
                'address' => $request->address,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
            return ResponseFormatter::success($customer, 'Create Data customer success');
        } catch (ValidationException $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something when wrong',
                    'error' => array_values($error->errors())[0][0],
                ],
                'Add Data customer Failed',
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

        $customer = Customer::find($request->id);
            if (!$customer) {
                return ResponseFormatter::error(
                    null,
                    'Data not found',
                    404
                );
            }

        $customer->update([
            'name' => $request->name,
            'address' => $request->address, 
            'phone' => $request->phone, 
            'email' => $request->email]);

        return ResponseFormatter::success($customer, 'Update Data customer success');
    } catch (ValidationException $error) {
        return ResponseFormatter::error(
            [
                'message' => 'Something when wrong',
                'error' => array_values($error->errors())[0][0],
            ],
            'Update Data customer Failed',
            500
        );
    }
    }

    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);

        if (!$customer) {
            return ResponseFormatter::error(
                null,
                'Data not found',
                404
            );
        }

        $customer->delete();

        return ResponseFormatter::success(null, 'Delete Data customer success');
    }
}
