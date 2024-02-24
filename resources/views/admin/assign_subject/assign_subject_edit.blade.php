@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('update.assign.subject') }}" method="POST"> 
        @csrf
        <div class="row">
            <div class="add_item">
            <div class="col-xl-12">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Student Class</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">
                                
                                    <div class="col-xl-12 col-sm-12">
                                    
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Enter Class Name<span class="required">*</span></label>
                                            <select name="class_id" class="default-select form-control wide" aria-label="Default select example" tabindex="null">
                                                <option selected="">Select Class </option>
                                                @foreach ($classes as $class)
                                                    <option {{$defaultClass->id == $class->id ? 'selected':''}} value="{{$class->id}}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>

                                    @php
                                        $sub_ids = $detailsData->subjects;
                                    @endphp

                                    @foreach ($sub_ids as $item)
                                        
                                   
                    <div class="add_item">
       
                        <div class="row">
                                            
                            <div class="col-lg-8 mb-2">
                                <label class="text-label form-label">Select Subjects<span class="required">*</span></label>
                                <div class="dropdown bootstrap-select default-select form-control wide">
                                    <select name="subjects_ids[]" class="default-select form-control wide" aria-label="Default select example">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ $item->id == $subject->id ? 'selected' : ''}} >{{ $subject->name }}</option>
                                        @endforeach	 
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1" style="padding-top: 25px;">
                                    <a href="{{ route('delete.class.subject',[$detailsData->id, $item->id]) }}" id="delete" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </div><!-- End col-md-5 -->

                            
                        </div>
                            
                    </div>
@endforeach
                                    <div class="mt-4">
                                        <button class="btn btn-primary" type="submit">Update Class Subjects</button>
                                    </div>
     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection