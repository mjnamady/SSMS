@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('update.student') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Student</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3">
                                <label class="form-label text-primary">Photo<span class="required">*</span></label>
                                <div class="avatar-upload">
                                <div class="avatar-preview">
                                    <div > 
                                        <img id="showImage" src="{{ (!empty($user->photo)) ? url('uploads/students/'.$user->photo) : url('uploads/no_image.jpg') }}" style="width:90px" alt="">		
                                    </div>
                                </div>
                                    <div class="change-btn mt-2 mb-lg-0 mb-3">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type='file' name="photo" class="form-control d-none"  id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose File</label>
                                        
                                    </div>
                                </div>	
                            </div>
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label text-primary">First Name<span class="required">*</span></label>
                                            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="{{$user->first_name}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Religion<span class="required">*</span></label>
                                            <select name="religion" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Religion </option>
                                                <option {{ $user->religion == 'Islam'?'selected':'' }} value="Islam">Islam</option>
                                                <option {{ $user->religion == 'Christianity'?'selected':'' }} value="Christianity">Christianity</option>
                                                <option {{ $user->religion == 'Traditional'?'selected':'' }} value="Traditional">Traditional</option>
                                              </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Gender<span class="required">*</span></label>
                                            <select name="gender" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Gender </option>
                                                <option {{ $user->gender == 'Male'?'selected':'' }} value="Male">Male</option>
                                                <option {{ $user->gender == 'Female'?'selected':'' }} value="Female">Female</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Last Name<span class="required">*</span></label>
                                            <input type="text" name="last_name" class="form-control" id="exampleFormControlInput4" value="{{$user->last_name}}">
                                        </div>

                                        <div class="mb-3">                          
                                            <label  class="form-label text-primary">Date of Birth<span class="required">*</span></label>
                                                <div class="d-flex">
                                                    <input type="text" name="dob" class="form-control" placeholder="2017-06-04" id="mdate" value="{{$user->student->dob}}">
                                                </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Year<span class="required">*</span></label>
                                            <select name="year_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Year </option>
                                                @foreach ($years as $year)
                                                    <option {{ $user->student->year_id == $year->id ?'selected':'' }} value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                               
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-sm-4">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Email<span class="required">*</span></label>
                                            <input type="email" name="email" class="form-control" id="exampleFormControlInput4" value="{{$user->email}}">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Class<span class="required">*</span></label>
                                            <select name="class_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Class </option>
                                                @foreach ($classes as $class)
                                                <option {{ $user->student->class_id == $class->id?'selected':'' }} value="{{$class->id}}">{{ $class->name }}</option>
                                                @endforeach
                                                
                                                {{-- <option {{ $user->assign_student->class_id == '2'?'selected':'' }} value="2">Class Two</option>
                                                <option {{ $user->assign_student->class_id == '3'?'selected':'' }} value="3">Class Three</option>
                                                <option {{ $user->assign_student->class_id == '4'?'selected':'' }} value="4">Class Four</option>
                                                <option {{ $user->assign_student->class_id == '5'?'selected':'' }} value="5">Class Five</option> --}}
                                              </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Group<span class="required">*</span></label>
                                            <select name="group_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Group </option>
                                                @foreach ($groups as $groups)
                                                    <option {{ $user->student->group_id == $groups->id?'selected':'' }} value="{{ $groups->id }}"> {{ $groups->name }} </option>
                                                @endforeach
                                                
                                                {{-- <option {{ $user->assign_student->group_id == '2'?'selected':'' }} value="2">Arts</option>
                                                <option {{ $user->assign_student->group_id == '3'?'selected':'' }} value="3">Health</option> --}}
                                              </select>
                                        </div>
                                    </div>
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Parents Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-sm-4">
                            <div class="mb-3">
                            <label for="exampleFormControlInput8" class="form-label text-primary">Father Name<span class="required">*</span></label>
                            <input type="text" name="f_name" class="form-control" id="exampleFormControlInput8" value="{{$user->student->father_name}}">
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlInput9" class="form-label text-primary">Mother Occupation<span class="required">*</span></label>
                            <input type="text" name="m_occupation" class="form-control" id="exampleFormControlInput9" value="{{$user->student->mother_occupation}}">
                            </div>
                            
                        </div>
                        
                        <div class="col-xl-4 col-sm-4">
                            <div class="mb-3">
                            <label for="exampleFormControlInput10" class="form-label text-primary">Mother Name<span class="required">*</span></label>
                            <input type="text" name="m_name" class="form-control" id="exampleFormControlInput10" value="{{$user->student->mother_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput11" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                                <input type="number" name="p_phone" class="form-control" id="exampleFormControlInput11" value="{{$user->student->phone}}">
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-4">
                            <div class="mb-3">
                            <label for="exampleFormControlInput10" class="form-label text-primary">Father Occupation<span class="required">*</span></label>
                            <input type="text" name="f_occupation" class="form-control" id="exampleFormControlInput10" value="{{$user->student->father_occupation}}">
                            </div>

                        </div>

                        <div class="col-xl-12 col-sm-12">
                       

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea2" class="form-label text-primary">Address<span class="required">*</span></label>
                                <textarea class="form-control" name="p_address" id="exampleFormControlTextarea2" rows="6">
                                    {{$user->address}}
                                </textarea>
                                </div>

                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit">Update Information</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>

$(document).ready(function(){
    
    // AUTOMATIC LOAD IMAGE
    $('#imageUpload').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });

});



</script>

@endsection