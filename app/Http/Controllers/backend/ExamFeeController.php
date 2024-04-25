<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ExamFee;
use App\Models\User;
use Illuminate\Http\Request;

class ExamFeeController extends Controller
{
    public function ExamFeeInvoice($id){
        $student = User::findOrFail($id);
        return view('examFee.exam_fee_invoice',compact('student'));
    } // End Method

    public function CAllBack(Request $request){
        // dd($request->all());

        $secret_key = env('PAYSTACK_SECRET_KEY');

        $reference = $request->reference;
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secret_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        // $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);
        $response = $response->data;
        $metadata = $response->metadata->custom_fields;
        dd($response->amount);
        if($response->data->status == 'success'){
            
            $examFee = new ExamFee();
            $examFee->transaction_id = $response->reference;
            $examFee->first_name = $metadata[0]->value;
            $examFee->last_name = $metadata[1]->value;
            $examFee->email = $metadata[2]->value;
            $examFee->student_id = $metadata[3]->value;
            $examFee->class = $metadata[4]->value;
            $examFee->amount = $response->amount / 100;

        } else {

        }
    } // End Method
}
