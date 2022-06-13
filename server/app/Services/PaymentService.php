<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;
use App\Contracts\PaymentContract;

class PaymentService implements PaymentContract
{

    private string $apiUrl;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiUrl = config('constants.PAYMENTDATA_URL');
    }
    
    /**
     * getPaymentDataId call the payment api
     * and generate paymentDataId using [userid, iban, accountName].
     * 
     * @param array $data
     * @return string
     */
    public function getPaymentDataId(array $data): string
    {
        try {
            if (!isset($data['user_id'], $data['iban'], $data['account'])) {
                return "";
            }

            //test only
            return "Test payment data id. You need to update.";
    
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