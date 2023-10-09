<?php
namespace App\Services;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PaymentService {

    public $client;
    public $url = 'https://cybqa.pesapal.com/pesapalv3';

    public function __construct(Client $client) 
    {
        $this->client = $client;
    }

    public function requestToken() 
    {
        try {

            $response = $this->client->request('POST', $this->url.'/api/Auth/RequestToken', [
                "verify" => false,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json'
                ],
                "json" => [
                    "consumer_key" => env('PESAPAL_API_KEY',''),
                    "consumer_secret" => env('PESAPAL_API_SECRET','')
                ]
            ]);
            
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()); 
                return response()->json($responseData);               
            }
        } catch (ClientErrorResponseException $exception) {
            $responseBody = $exception->getResponse()->getBody(true);
            return response()->json($responseBody);
        }
    }

    public function registerIPNUrl() 
    {
        try {

            $token = $this->requestToken()->getData()->token;
            $response = $this->client->request('POST', $this->url.'/api/URLSetup/RegisterIPN', [
                "verify" => false,
                'headers' => [
                    'Authorization' => 'Bearer '. $token,
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json'
                ],
                "json" => [
                    "url" => env('APP_URL')."/ipn",
                    "ipn_notification_type" => "GET"
                ]
            ]);
            
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()); 
                return response()->json($responseData);               
            }
        } catch (ClientErrorResponseException $exception) {
            $responseBody = $exception->getResponse()->getBody(true);
            return response()->json($responseBody);
        }
    }

    public function submitPayment($order, $reference) 
    {
        try {

            $token = $this->requestToken()->getData()->token;
            $ipn_id = $this->registerIPNUrl()->getData()->ipn_id;
            $form_params = [
                "id" => $reference,
                "currency" => "TZS",
                "amount" => $order->price,
                "description" => $order->name,
                "callback_url" => route('transaction.callback'),
                "notification_id" => $ipn_id,
                "billing_address" => (object) [
                    "email_address" => $order->user->email,
                    "phone_number" => $order->user->phonenumber,
                    "first_name" => $order->user->name,
                    "middle_name" => "",
                    "last_name" => ""
                ]
            ];
            
            $response = $this->client->request('POST', $this->url.'/api/Transactions/SubmitOrderRequest', [
                "verify" => false,
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ],
                "json" => $form_params
            ]);
            
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()->getContents()); 
                return response()->json($responseData);               
            }
        } catch (ClientErrorResponseException $exception) {
            $responseBody = $exception->getResponse()->getBody(true);
            return response()->json($responseBody);
        }
    }

    public function getTransactionStatus($orderId) 
    {
        try {

            $token = $this->requestToken()->getData()->token;
            $response = $this->client->request('GET', $this->url.'/api/Transactions/GetTransactionStatus?orderTrackingId='.$orderId, [
                "verify" => false,
                'headers' => [
                    'Authorization' => 'Bearer '. $token,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ]
            ]);
            
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()); 
                return response()->json($responseData);               
            }
        } catch (ClientErrorResponseException $exception) {
            $responseBody = $exception->getResponse()->getBody(true);
            return response()->json($responseBody);
        }
    }
}