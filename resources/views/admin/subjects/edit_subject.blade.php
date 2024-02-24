@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('update.subject') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Subject</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">

                                    <div class="col-xl-12 col-sm-12">
                                        <input type="hidden" name="id" value="{{$subject->id}}">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Edit Subject Name<span class="required">*</span></label>
                                            <input type="text" name="subject_name" class="form-control" id="exampleFormControlInput4" value="{{ $subject->name }}">
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <button class="btn btn-primary" type="submit">Update Subject</button>
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