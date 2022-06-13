<?php

namespace App\Contracts;

interface RegisterContract 
{    
    /**
     * This is responsible for creating a user by request data
     * with payment data id.
     *
     * @param  mixed $data
     * @return void
     */
    public function registerUser(array $data);
}