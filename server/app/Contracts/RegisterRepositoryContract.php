<?php

namespace App\Contracts;

use App\Models\User;
use App\Models\Paymentinfo;

interface RegisterRepositoryContract 
{
    public function isUserExist(string $telephone): bool;

    public function createUser(array $data): User;

    public function createPaymentInfo(User $user, array $data): Paymentinfo;
}