@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('store.teacher') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Teacher</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3">
                                <label class="form-label text-primary">Photo<span class="required">*</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div > 
                                            <img id="showImage" src="{{ (!empty($adminInfo->photo)) ? url('uploads/students/'.$adminInfo->photo) : url('uploads/no_image.jpg') }}" style="width:90px" alt="">		
                                        </div>
                                    </div>
                                    <div class="change-btn mt-2 mb-lg-0 mb-3">
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
                                            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Religion<span class="required">*</span></label>
                                            <select name="religion" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Religion </option>
                                                <option value="Islam">Islam</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Traditional">Traditional</option>
                                              </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Gender<span class="required">*</span></label>
                                            <select name="gender" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Gender </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Last Name<span class="required">*</span></label>
                                            <input type="text" name="last_name" class="form-control" id="exampleFormControlInput4">
                                        </div>

                                        <div class="mb-3">                          
                                            <label  class="form-label text-primary">Date of Birth<span class="required">*</span></label>
                                                <div class="d-flex">
                                                    <input type="text" name="dob" class="form-control" placeholder="2017-06-04" id="mdate">
                                                </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Phone<span class="required">*</span></label>
                                            <input type="number" name="phone" class="form-control" id="exampleFormControlInput4">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-sm-4">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Email<span class="required">*</span></label>
                                            <input type="email" name="email" class="form-control" id="exampleFormControlInput4">
                                        </div>
                                        
                                        {{-- <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Class<span class="required">*</span></label>
                                            <select name="class_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Class </option>
                                                @foreach ($classes as $class)
                                                <option value="{{$class->id}}">{{ $class->name }}</option>
                                                @endforeach
                                              </select>
                                        </div> --}}

                                        {{-- <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label text-primary">Subjects<span class="required">*</span></label>
                                            <select name="subject_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Subject </option>
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{ $subject->name }}</option>
                                                @endforeach
                                              </select>
                                        </div> --}}
                                    </div>

                                    <div class="col-xl-12 col-sm-12">
                       

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea2" class="form-label text-primary">Address<span class="required">*</span></label>
                                            <textarea class="form-control" name="address" id="exampleFormControlTextarea2" rows="6">
                                                
                                            </textarea>
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
                    <h5 class="mb-0">Education</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6">
                            <div class="mb-3">
                              <label for="exampleFormControlInput9" class="form-label text-primary">University <span class="required">*</span></label>
                              <input type="text" class="form-control" id="exampleFormControlInput9" placeholder="University of Oxford">
                            </div>
                            <div class="mb-3">
                              <div class="mb-3">
                                  
                                  <label class="form-label text-primary">Start & End Date<span class="required">*</span></label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control w-50" id="datepicker1">
                                        <input type="text" class="form-control w-50 ms-3" id="datepicker2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <div class="mb-3">
                              <label for="exampleFormControlInput14" class="form-label text-primary">Degree<span class="required">*</span></label>
                              <input type="text" class="form-control" id="exampleFormControlInput14" placeholder="B.Tech">
                            </div>
                            
                            <div class="mb-3">
                              <label for="exampleFormControlInput13" class="form-label text-primary">City<span class="required">*</span></label>
                              <input type="number" class="form-control" id="exampleFormControlInput13" placeholder="USA">
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button class="btn btn-primary" type="submit">Save Information</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</div>



<script>

    $(function () {
          $("#datepicker, #datepicker1, #datepicker2").datepicker({ 
                autoclose: true, 
                todayHighlight: true
          }).datepicker('update', new Date());
    
    });

</script>

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