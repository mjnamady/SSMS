<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Registration Payment Details - 2021/2022 Transaction Slip</title>
  <!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('backen/images/favicon.png')}}" >
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: 30px auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

     img {
        display: block;
      width: 100px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .footer {
      text-align: center;
    }

    @media screen and (max-width: 480px) {
        .container {
            max-width: 90%;
        }
    }
  </style>
</head>
<body>
  <div class="container">
    {{-- <div class="header"> --}}
        <img class="logo" src="{{url('uploads/logo.png')}}" alt="University Logo">
      {{-- </div> --}}
    <h1>Christian High school</h1>
    <h2 style="text-align: center;">Student's Exams Fee Payment Details - 2023/2024</h2>
    <table>
      <tr>
        <th>Student Name:</th>
        <td>{{$student->first_name ." ". $student->last_name}}</td>
      </tr>
      <tr>
        <th>Student ID:</th>
        <td> {{$student->student->id_no}} </td>
      </tr>
      <tr>
        <th>Student Class:</th>
        <td>{{$student->student->class->name}}</td>
      </tr>
      <tr>
        <th>Term:</th>
        <td>2023/2024 First Term</td>
      </tr>
      <tr>
        <th>Total Amount:</th>
        <td>&#x20A6;500</td>
      </tr>
      {{-- <tr>
        <th>Payment Date:</th>
        <td>April 24, 2022</td>
      </tr> --}}
      <tr>
        <th>Payment Status:</th>
        <td>Not Paid</td>
      </tr>
    </table>
    <div class="footer">
      <p>This Transaction is Not Paid</p>

      <form id="paymentForm">
        <div class="form-submit">
          <button type="submit" onclick="payWithPaystack()" class="btn btn-primary"> Pay Now </button>
        </div>
      </form>
      
      <script src="https://js.paystack.co/v1/inline.js"></script>


      <p style="margin-top:10px">Contact us at <a href="mailto:info@example.com">info@example.com</a> for any inquiries.</p>
    </div>
  </div>

  <script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
        key: "{{env('PAYSTACK_PUBLIC_KEY')}}", // Replace with your public key
        email: "{{$student->email}}",
        amount: 500 * 100,
        metadata: {
            custom_fields: [
                {
                    display_name: 'First Name',
                    variable_name: 'first_name',
                    value: '{{$student->first_name}}'
                },{
                    display_name: 'Last Name',
                    variable_name: 'last_name',
                    value: '{{$student->last_name}}'
                },{
                    display_name: 'Email',
                    variable_name: 'email',
                    value: '{{$student->email}}'
                },{
                    display_name: 'Student Id',
                    variable_name: 'student_id',
                    value: '{{$student->student->id_no}}'
                },{
                    display_name: 'Student Class',
                    variable_name: 'student_class',
                    value: '{{$student->student->class->name}}'
                },{
                    display_name: 'Term',
                    variable_name: 'term',
                    value: '2023/2024 First Term'
                }

            ]
        },
        onClose: function(){
        alert('Window closed.');
        },
        callback: function(response){
        // let message = 'Payment complete! Reference: ' + response.reference;
        // alert(message);
        // alert(JSON.stringify(response));
        window.location.href = "{{route('callback')}}" + response.redirecturl;
        }
    });

    handler.openIframe();
    }

  </script>
</body>
</html>
