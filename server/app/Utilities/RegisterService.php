<?php

namespace App\Utilities;

use App\Contracts\RegisterContract;
use App\Models\User;
use App\Models\Address;
use App\Models\Paymentinfo;
use Illuminate\Support\Facades\DB;

class RegisterService implements RegisterContract
{
    public function registerUser(array $data)
    {
        try {
            DB::beginTransaction();

            $data['payment_data_id'] = 'sdfsdfsdf';
            $user = User::create($data);
            
            $data['user_id'] = $user->id;
            $address = new Address($data);
            $user->address()->save($address);

            $paymentinfo = new Paymentinfo($data);
            $user->paymentinfo()->save($paymentinfo);

            DB::commit();
            return response()->json(["user" =>$user, "address" => $address, "paymentinfo" =>$paymentinfo], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return response()->json($th, 500);
        }
    }
}