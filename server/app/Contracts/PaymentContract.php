<?php

namespace App\Contracts;

interface PaymentContract 
{    
    /**
     * This is responsible for generating paymentdataid.
     *
     * @param  mixed $data
     * @return string
     */
    public function getPaymentDataId(array $data): string;
}