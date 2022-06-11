<?php

namespace App\Utilities;

use GuzzleHttp\Client as GuzzleClient;

class PaymentService 
{

    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('constants.PAYMENTDATA_URL');
    }

    public function getPaymentDataId(array $data): string
    {
        try {
            if (!isset($data['user_id'], $data['iban'], $data['account'])) {
                return "";
            }
    
            $body = [
                "customerId" => $data['user_id'],
                "iban" => $data['iban'],
                "owner" => $data['account'],
            ];
    
            $guzzle = new GuzzleClient();
            $response = $guzzle->request('POST', $this->apiUrl, $body);
            
            if ($response->getStatusCode() == 200) {
                return $response->data['paymentDataId'];
            }
    
            return "";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}