<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ExamFee;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // dd($metadata);
        if($response->status == 'success'){
            
            $examFee = new ExamFee();
            $examFee->transaction_id = $response->reference;
            $examFee->first_name = $metadata[0]->value;
            $examFee->last_name = $metadata[1]->value;
            $examFee->email = $metadata[2]->value;
            $examFee->student_id = $metadata[3]->value;
            $examFee->class = $metadata[4]->value;
            $examFee->term = $metadata[5]->value;
            $examFee->amount = $response->amount / 100;
            $examFee->payment_status = "Completed";
            $examFee->payment_method = "Paystack";
            $examFee->save();

            $std_id = $metadata[6]->value;

            $notification = array(
                'message' => 'Exams Fee Paid Successfully',
                'alert-type' => 'success'
            );
        
            return redirect()->route('view.student',$std_id)->with($notification);
        } else {
            $notification = array(
                'message' => 'An Error Occured! Please Try Again..',
                'alert-type' => 'error'
            );
        
            return redirect()->back()->with($notification);
        }
    } // End Method

    public function downloadReceipt($id){

        $examFee = ExamFee::findOrFail($id);
        $pdf = Pdf::loadView('examFee.exam_fee_receipt', compact('examFee'))
        ->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);
        return $pdf->download('receipt.pdf');

    } // End Method
}
