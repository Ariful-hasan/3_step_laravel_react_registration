<?php

namespace App\Utilities;

use Illuminate\Support\Facades\DB;
use App\Contracts\RegisterContract;
use App\Models\User;
use App\Models\Address;
use App\Models\Paymentinfo;
use App\Utilities\PaymentService;

class RegisterService implements RegisterContract
{

    public function __construct(protected PaymentService $paymentservice)
    {
        
    }

    public function registerUser(array $data)
    {
        try {
            $user = User::where('telephone', $data['telephone'])->first();

            if ($user) {
                return response()->json([
                    config('constants.MESSAGE') => config('status.status_code.409'),
                ], 409);
            }

            $user = $this->createUserWithAddress($data);
            if ($user) {
                $data['user_id'] = $user->id;
                $paymentDataID = $this->paymentservice->getPaymentDataId($data);
                if ($paymentDataID) {
                    $data['payment_data_id'] = $paymentDataID;
                    $paymentinfo = new Paymentinfo($data);
                    if ($user->paymentinfo()->save($paymentinfo)) {
                        return response()->json([
                            config('constants.MESSAGE') => config('status.status_code.200'),
                            "paymentDataId" => $paymentDataID
                        ], 200);
                    }
                }
            }

            return response()->json([
                config('constants.MESSAGE') => config('status.status_code.503'),
            ], 503);
        } catch (\Exception $e) {
            return response()->json([
                config('constants.MESSAGE') => config('status.status_code.500'),
                config('constants.ERROR') => $e->getMessage(),
            ], 500);
        }
    }

    private function createUserWithAddress(array $data): User
    {
        try {
            DB::beginTransaction();
            $user = User::create($data);
            $data['user_id'] = $user->id;

            $address = new Address($data);
            $user->address()->save($address);
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}