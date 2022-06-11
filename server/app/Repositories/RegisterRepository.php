<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Contracts\RegisterRepositoryContract;
use App\Models\User;
use App\Models\Address;
use App\Models\Paymentinfo;

class RegisterRepository implements RegisterRepositoryContract 
{
    public function isUserExist(string $telephone): bool
    {
        return User::where('telephone', $telephone)->first() ? true : false;
    }

    public function createUser(array $data): User
    {
        try {
            DB::beginTransaction();
            $user = User::create($data);
            $address = new Address($data);
            $user->address()->save($address);
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function createPaymentInfo(User $user, array $data): Paymentinfo
    {
        $paymentinfo = new Paymentinfo($data);
        return $user->paymentinfo()->save($paymentinfo);
    }
}