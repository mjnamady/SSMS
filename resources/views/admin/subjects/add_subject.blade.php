@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('store.subject') }}" method="POST"> 
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Subject</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">

                                    <div class="col-xl-12 col-sm-12">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Enter Subject Name<span class="required">*</span></label>
                                            <input type="text" name="subject_name" class="form-control @error('subject_name') is-invalid @enderror " id="exampleFormControlInput4">
                                            @error('subject_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <button class="btn btn-primary" type="submit">Add Subject</button>
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