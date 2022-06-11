<?php

namespace App\Services;

use App\Contracts\RegisterContract;
use App\Services\PaymentService;
use App\Contracts\RegisterRepositoryContract;

class RegisterService implements RegisterContract
{

    public function __construct(
        protected PaymentService $paymentservice,
        protected RegisterRepositoryContract $registerrepository
        )
    {
        
    }

    public function registerUser(array $data)
    {
        try {
            if ($this->registerrepository->isUserExist((string) $data['telephone'])) {
                return response()->json([
                    config('constants.MESSAGE') => config('status.status_code.409'),
                ], 409);
            }

            $user = $this->registerrepository->createUser($data);
            $data['user_id'] = $user->id;
            if ($paymentDataID = $this->paymentservice->getPaymentDataId($data)) {
                $data['payment_data_id'] = $paymentDataID;
                $paymentinfo = $this->registerrepository->createPaymentInfo($user, $data);

                return response()->json([
                    config('constants.MESSAGE') => config('status.status_code.200'),
                    "paymentDataId" => $paymentinfo->payment_data_id
                ], 200);
            }

        } catch (\Exception $e) {
            return response()->json([
                config('constants.MESSAGE') => config('status.status_code.500'),
                config('constants.ERROR') => $e->getMessage(),
            ], 500);
        }
    }
}