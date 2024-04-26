@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <div class="row">


        <div class="col-xl-8">
            <div class="card h-auto">
                <div class="card-header p-0">
                    <div class="user-bg w-100">
                        <div class="user-svg">
                            <svg width="264" height="109" viewBox="0 0 264 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.0107422" y="0.6521" width="263.592" height="275.13" rx="20" fill="#FCC43E"></rect>
                            </svg>
                        </div>
                        <div class="user-svg-1">
                            <svg width="264" height="59" viewBox="0 0 264 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.564056" width="263.592" height="275.13" rx="20" fill="#FB7D5B"></rect>
                            </svg>
    
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="user">
                            <div class="user-media">
                                <img src="{{ (!empty($user->photo)) ? url('uploads/students/'.$user->photo) : url('uploads/no_image.jpg') }}" alt="" class="avatar avatar-xxl">
                            </div>
                            <div>
                                <h2 class="mb-0">{{ $user->first_name . ' ' . $user->last_name }}</h2>
                                <p class="text-primary font-w600">{{ $user->role }}</p>
                            </div>
                        </div>
                        <div class="dropdown custom-dropdown">
                            <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z" fill="#A098AE"></path>
                                </svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('edit.student', $user->id) }}">Edit</a>
                                <a class="dropdown-item" id="delete" href="{{ route('delete.student', $user->id) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li>
                                    <span>First Name:</span>
                                    <h5 class="mb-0">{{ $user->first_name }}</h5>
                                </li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Last Name:</span>
                                <h5 class="mb-0">{{ $user->last_name }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Gender:</span><h5 class="mb-0">{{ $user->gender }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>ID Number:</span><h5 class="mb-0">{{ $user->student->id_no }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Roll Number</span><h5 class="mb-0">{{ $user->student->roll_number }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Class:</span><h5 class="mb-0">{{ $user->student->class->name }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Group:</span><h5 class="mb-0">{{ $user->student->group->name }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Admission Date:</span><h5 class="mb-0">{{ $user->created_at->format('d/m/y') }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Date Of Birth:</span><h5 class="mb-0">{{ $user->student->dob }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Religion:</span><h5 class="mb-0">{{ $user->religion }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Father Name:</span><h5 class="mb-0">{{ $user->student->father_name }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Father Occupation:</span><h5 class="mb-0">{{ $user->student->father_occupation }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Parent Phone:</span><h5 class="mb-0">{{ $user->student->phone }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Mother Name:</span><h5 class="mb-0">{{ $user->student->mother_name }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Mother Occupation:</span><h5 class="mb-0">{{ $user->student->mother_occupation }}</h5></li>
                            </ul>
                        </div>
    
                        <div class="col-xl-3 col-xxl-3 col-sm-3">
                            <ul class="student-details">
                                <li><span>Address:</span><h5 class="mb-0">{{ $user->address }}</h5></li>
                            </ul>
                        </div>
    
                    </div>
                </div>
            </div>
            
        </div>
    
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="heading">Assigned Subjects</h3>
                            
                            @php
                                $student_subjects = $user->student->class->subjects;
                            @endphp
                            @if (count($student_subjects) > 0)
                                <div class="tab-pane fade show active" id="BasicList" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <div class="basic-list-group">
                                            <ul class="list-group">
                                                @foreach ($student_subjects as $subject)
                                                    <li class="list-group-item"><b>{{$subject->name}}</b></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="alert alert-secondary alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        <strong>Info!</strong> No Class Assign Yet!.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                    </div>
                            @endif
                            

                        </div>
                    </div>							
                </div>

                <div class="col-xl-12 col-sm-6">
                    <div class="card h-auto schedule-card">
                        <div class="card-body">
                            <h4 class="mb-0">Exam's Fees Payment(s)</h4>
                            <p>Follow the Link(s) Below to pay for your examinations fee.</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <ul>
                                        <li class="mb-2">
                                        <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 5.25H16.5V4.5C16.5 4.30109 16.421 4.11032 16.2803 3.96967C16.1397 3.82902 15.9489 3.75 15.75 3.75C15.5511 3.75 15.3603 3.82902 15.2197 3.96967C15.079 4.11032 15 4.30109 15 4.5V5.25H12.75V4.5C12.75 4.30109 12.671 4.11032 12.5303 3.96967C12.3897 3.82902 12.1989 3.75 12 3.75C11.8011 3.75 11.6103 3.82902 11.4697 3.96967C11.329 4.11032 11.25 4.30109 11.25 4.5V5.25H9V4.5C9 4.30109 8.92098 4.11032 8.78033 3.96967C8.63968 3.82902 8.44891 3.75 8.25 3.75C8.05109 3.75 7.86032 3.82902 7.71967 3.96967C7.57902 4.11032 7.5 4.30109 7.5 4.5V5.25H6C5.40326 5.25 4.83097 5.48705 4.40901 5.90901C3.98705 6.33097 3.75 6.90326 3.75 7.5V18C3.75 18.5967 3.98705 19.169 4.40901 19.591C4.83097 20.0129 5.40326 20.25 6 20.25H18C18.5967 20.25 19.169 20.0129 19.591 19.591C20.0129 19.169 20.25 18.5967 20.25 18V7.5C20.25 6.90326 20.0129 6.33097 19.591 5.90901C19.169 5.48705 18.5967 5.25 18 5.25ZM5.25 7.5C5.25 7.30109 5.32902 7.11032 5.46967 6.96967C5.61032 6.82902 5.80109 6.75 6 6.75H7.5V7.5C7.5 7.69891 7.57902 7.88968 7.71967 8.03033C7.86032 8.17098 8.05109 8.25 8.25 8.25C8.44891 8.25 8.63968 8.17098 8.78033 8.03033C8.92098 7.88968 9 7.69891 9 7.5V6.75H11.25V7.5C11.25 7.69891 11.329 7.88968 11.4697 8.03033C11.6103 8.17098 11.8011 8.25 12 8.25C12.1989 8.25 12.3897 8.17098 12.5303 8.03033C12.671 7.88968 12.75 7.69891 12.75 7.5V6.75H15V7.5C15 7.69891 15.079 7.88968 15.2197 8.03033C15.3603 8.17098 15.5511 8.25 15.75 8.25C15.9489 8.25 16.1397 8.17098 16.2803 8.03033C16.421 7.88968 16.5 7.69891 16.5 7.5V6.75H18C18.1989 6.75 18.3897 6.82902 18.5303 6.96967C18.671 7.11032 18.75 7.30109 18.75 7.5V9.75H5.25V7.5ZM18.75 18C18.75 18.1989 18.671 18.3897 18.5303 18.5303C18.3897 18.671 18.1989 18.75 18 18.75H6C5.80109 18.75 5.61032 18.671 5.46967 18.5303C5.32902 18.3897 5.25 18.1989 5.25 18V11.25H18.75V18Z" fill="#FB7D5B"></path>
                                        </svg>
                                        2022/2023</li>
                                      
                                            <li><a href="{{route('exam.fee.invoice', $user->id)}}" style="text-decoration: underline">Click here to pay for First Term:</a> <span class="text-danger">Not Paid</span></li>
                                    </ul>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="col-xl-12">

            <div class="card h-auto">
                <div class="card-header border-0 p-3">
                    <h4 class="heading mb-0">Exams Fee Payment History</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive basic-tbl">
                        <div id="example-payment_wrapper" class="dataTables_wrapper no-footer"><table id="example-payment" class="display dataTable no-footer" style="min-width: 845px" aria-describedby="example-payment_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Payment Number: activate to sort column descending">
                                        Transaction ID
                                    </th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Payment Number: activate to sort column descending">
                                        Term
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-label="Date &amp;amp; Time: activate to sort column ascending">
                                        Date &amp; Time
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending">
                                        Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
                                        Payment Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example-payment" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
                                      
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                  
                            @foreach ($examFee as $payment)
                                
                            <tr class="selected odd">
                                    <td class="sorting_1">
                                        <div class="d-flex align-items-center">	
                                            <div class="icon-box icon-box-sm bg-danger">
                                                <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25.0004 1.33333C25.013 1.24043 25.013 1.14624 25.0004 1.05333C24.9888 0.975052 24.9664 0.898765 24.9337 0.826666C24.8985 0.761503 24.8584 0.699103 24.8137 0.64C24.763 0.555671 24.7001 0.479292 24.6271 0.413333L24.4671 0.32C24.3901 0.262609 24.3046 0.21762 24.2137 0.186666H23.9471C23.8658 0.107993 23.7709 0.0447434 23.6671 0H17.0004C16.6468 0 16.3076 0.140476 16.0576 0.390525C15.8075 0.640573 15.6671 0.979711 15.6671 1.33333C15.6671 1.68696 15.8075 2.02609 16.0576 2.27614C16.3076 2.52619 16.6468 2.66667 17.0004 2.66667H20.7737L15.4404 8.94667L9.68039 5.52C9.40757 5.35773 9.0858 5.29813 8.77296 5.3519C8.46011 5.40567 8.17671 5.56929 7.97373 5.81333L1.30706 13.8133C1.19479 13.9481 1.1102 14.1036 1.05815 14.2711C1.00609 14.4386 0.987577 14.6147 1.00368 14.7893C1.01978 14.9639 1.07017 15.1337 1.15198 15.2888C1.23378 15.4439 1.34538 15.5814 1.48039 15.6933C1.72028 15.8921 2.02219 16.0006 2.33373 16C2.52961 16.0003 2.72315 15.9575 2.9006 15.8745C3.07804 15.7915 3.23503 15.6705 3.36039 15.52L9.29373 8.4L14.9871 11.8133C15.2571 11.9735 15.575 12.0332 15.8848 11.982C16.1945 11.9308 16.4763 11.7719 16.6804 11.5333L22.3337 4.93333V8C22.3337 8.35362 22.4742 8.69276 22.7242 8.94281C22.9743 9.19286 23.3134 9.33333 23.6671 9.33333C24.0207 9.33333 24.3598 9.19286 24.6099 8.94281C24.8599 8.69276 25.0004 8.35362 25.0004 8V1.33333Z" fill="#FCFCFC"></path>
                                                </svg>
                                            </div>	
                                            <div class="ms-3">
                                                <h6 class="mb-0 font-w600">{{ $payment->transaction_id }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $payment->term }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $payment->created_at }}</span>
                                    </td>
                                    <td>
                                        <span class="doller font-w600">{{ $payment->amount }} NGN</span>
                                    </td>
                                    <td class="pe-3">
                                        @if ($payment->payment_status == 'Completed')
                                            <span class="text-success font-w600">Complete</span>
                                        @else
                                            <span class="text-danger font-w600">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="doller font-w600">
                                            <a href="{{ route('download.receipt',$payment->id) }}" type="button" class="btn btn-warning"><span class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                            </span>Download Receipt</a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                             
                              
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example-payment_info" role="status" aria-live="polite">Showing 1 to 5 of 9 entries</div>
                        {{-- <div class="dataTables_paginate paging_simple_numbers" id="example-payment_paginate">
                            <a class="paginate_button previous disabled" aria-controls="example-payment" data-dt-idx="0" tabindex="-1" id="example-payment_previous">
                             <i class="fa-solid fa-angle-left">
                            </i>
                            </a>
                                <span>
                                <a class="paginate_button current" aria-controls="example-payment" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example-payment" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="example-payment" data-dt-idx="3" tabindex="0" id="example-payment_next"><i class="fa-solid fa-angle-right"></i></a>
                        </div> --}}
                     </div>
                    </div>
                </div>
            </div>
            
        </div>
  
    </div>


</div>

@endsection