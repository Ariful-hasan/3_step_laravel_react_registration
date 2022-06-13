<?php

namespace App\Contracts;

use App\Models\User;
use App\Models\Paymentinfo;

interface RegisterRepositoryContract 
{    
    /**
     * This checks user exits or not using telephone.
     *
     * @param  string $telephone
     * @return bool
     */
    public function isUserExist(string $telephone): bool;
    
    /**
     * This is responsible for creating user by request data
     *
     * @param  array $data
     * @return User
     */
    public function createUser(array $data): User;
    
    /**
     * This is responsible for creating paymentinfo
     *
     * @param  object $user
     * @param  array $data
     * @return Paymentinfo
     */
    public function createPaymentInfo(User $user, array $data): Paymentinfo;
}