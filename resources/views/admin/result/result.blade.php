<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continuous Assessment Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-size: 12px;
        }
        .container {
            width: 200mm;
            height: 280mm;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            flex-direction: column;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo {
            display: block;
            margin: 0 auto;
            margin-bottom: 5px;
            width: 80px;
            height: auto;
        }
        .school-info {
            text-align: center;
        }
        .school-name {
            font-weight: bold;
            font-size: 36px;
            margin-bottom: 3px;
        }
        .address {
            font-style: italic;
            margin-bottom: 5px;
            font-size: 18px;
        }
        .title {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 12px;
        }
        .input-fields {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }
        .input-fields th {
            text-align: left;
            font-weight: normal;
            padding: 5px;
            font-size: 11px;
        }
        .input-fields input {
            border: none;
            border-bottom: 1px solid #000;
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 11px;
        }
        .table-title {
            margin-top: 15px;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 11px;
        }
        th {
            background-color: #f2f2f2;
        }
        .remarks {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .remarks label {
            display: block;
            margin-bottom: 3px;
            font-size: 11px;
            font-weight: 600;
        }
        .remarks input {
            border: none;
            border-bottom: 1px solid #000;
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            font-size: 11px;
            margin-bottom: 5px;
        }
        .card-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .card {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
        }
        .interpretation, .principal-signature {
            text-align: center;
        }
        .interpretation-title, .principal-title {
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 5px;
        }
        .interpretation p, .principal p {
            margin: 0;
        }

        
/* CSS */
.button-4 {
  appearance: none;
  background-color: #FAFBFC;
  border: 1px solid rgba(27, 31, 35, 0.15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
  box-sizing: border-box;
  color: #24292E;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
  font-size: 14px;
  font-weight: 500;
  line-height: 20px;
  list-style: none;
  padding: 6px 16px;
  position: relative;
  transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  word-wrap: break-word;
}

.button-4:hover {
  background-color: #F3F4F6;
  text-decoration: none;
  transition-duration: 0.1s;
}

.button-4:disabled {
  background-color: #FAFBFC;
  border-color: rgba(27, 31, 35, 0.15);
  color: #959DA5;
  cursor: default;
}

.button-4:active {
  background-color: #EDEFF2;
  box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
  transition: none 0s;
}

.button-4:focus {
  outline: 1px transparent;
}

.button-4:before {
  display: none;
}

.button-4:-webkit-details-marker {
  display: none;
}

.buttons-container {
    width: 200px;
    position: absolute;
    right: 0;
    top: 10px;
}

th {
    text-transform: uppercase;
    font-weight: 600;
}
    </style>
</head>
<body>
    <div class="buttons-container">
        <a href="javascript:window.print();" class="button-4">Print</a>
        <a href="javascript:window.close();" class="button-4">Close</a>
    </div>
    
    <div class="container">
        <div class="header">
            <img src="{{ url('uploads/dagloremodel.jpg') }}" style="width: 100px;" alt="School Logo" class="logo">
            <div class="school-info">
                <div class="school-name">DAGLO COLLEGE</div>
                <div class="address">ESSIEN TOWN<br> CALABAR MUNICIPALITY</div>
                <div class="title">CONTINUOUS ASSESSMENT RECORD FOR JUNIOR SECONDARY SCHOOLS</div>
                <div class="title">TERMINAL REPORT</div>
            </div>
        </div>
        
        <table class="input-fields">
            <tr>
                <th>Name of Student:</th>
                <td><input type="text"></td>
                <th>Class:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>Number in Class:</th>
                <td><input type="text"></td>
                <th>Sex:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>Position:</th>
                <td><input type="text"></td>
                <th>Term:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>Next Term Begins:</th>
                <td><input type="text"></td>
                <th>Student's Average:</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>Date:</th>
                <td><input type="text"></td>
                <th>Overall Position:</th>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <div class="table-title">ACADEMIC PROGRESS REPORT SUMMARIES AND TESTS (COGNITIVE)</div>
        <table>
            <thead>
                <tr>
                    <th>Subjects</th>
                    <th>Class Work (30%)</th>
                    <th>Term Exam (70%)</th>
                    <th>Total Score (100%)</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mathematics</td>
                    <td>85</td>
                    <td>75</td>
                    <td>160</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>78</td>
                    <td>82</td>
                    <td>160</td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td>Physics</td>
                    <td>80</td>
                    <td>70</td>
                    <td>150</td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td>Chemistry</td>
                    <td>75</td>
                    <td>78</td>
                    <td>153</td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td>Biology</td>
                    <td>70</td>
                    <td>75</td>
                    <td>145</td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td>Computer</td>
                    <td>82</td>
                    <td>80</td>
                    <td>162</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td>History</td>
                    <td>75</td>
                    <td>72</td>
                    <td>147</td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td>French</td>
                    <td>80</td>
                    <td>78</td>
                    <td>158</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td>Basic Science</td>
                    <td>78</td>
                    <td>75</td>
                    <td>153</td>
                    <td>Very Good</td>
                </tr>
                <!-- Add more rows for other subjects -->
            </tbody>
        </table>
        
        <div class="remarks">
            <label for="class-teacher-remarks">CLASS TEACHER'S REMARKS:</label>
            <input type="text" id="class-teacher-remarks">
            <label for="principal-comments">PRINCIPAL'S COMMENTS:</label>
            <input type="text" id="principal-comments">
        </div>
        
        <div class="card-container">
            <div class="card interpretation">
                <div class="interpretation-title">INTERPRETATION OF GRADES (COGNITIVE DOMAIN)</div>
                <p><b>Excellent</b>: Outstanding performance</p>
                <p><b>Very Good</b>: Above average performance</p>
                <p><b>Good</b>: Satisfactory performance</p>
                <p><b>Fair</b>: Below average performance</p>
                <p><b>Poor</b>: Unsatisfactory performance</p>
            </div>
            
            <div class="card principal-signature">
                <div class="principal-title">PRINCIPAL SIGNATURE AND DATE</div>
                <!-- Add signature here -->
                <img src="{{ url('uploads/my_signature.png') }}" alt="">
            </div>
        </div>
    </div>
</body>
</html>