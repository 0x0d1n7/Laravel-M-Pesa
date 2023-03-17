<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // Get the amount and phone number from the request
        $amount = $request->input('amount');
        $phone = $request->input('phone');

        // Get the M-Pesa Daraja API credentials from the .env file
        $consumerKey = env('DARAJA_CONSUMER_KEY');
        $consumerSecret = env('DARAJA_CONSUMER_SECRET');

        // Generate a timestamp and nonce
        $timestamp = date('YmdHis');
        $nonce = md5($timestamp);

        // Generate the password using the M-Pesa Daraja API specifications
        $password = base64_encode($consumerKey . $consumerSecret . $timestamp);

        // Generate a unique transaction ID
        $transactionID = uniqid();

        // Send the request to the M-Pesa Daraja API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $consumerKey,
            'Content-Type' => 'application/json'
        ])->post('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', [
            'BusinessShortCode' => 'your_business_short_code',
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => 'your_business_short_code',
            'PhoneNumber' => $phone,
            'CallBackURL' => 'your_callback_url',
            'AccountReference' => 'your_account_reference',
            'TransactionDesc' => 'your_transaction_description',
            'Remark' => 'your_remark',
            'QueueTimeOutURL' => 'your_queue_timeout_url',
            'ResultURL' => 'your_result_url',
            'Occasion' => 'your_occasion',
            'TransactionID' => $transactionID
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Get the response data
            $responseData = $response->json();

            // Redirect the user to the M-Pesa Daraja payment page
            return redirect($responseData['CheckoutRequestID']);
        } else {
            // The request failed, handle the error
            return back()->withErrors(['message' => 'Payment request failed.']);
        }
    }
}
