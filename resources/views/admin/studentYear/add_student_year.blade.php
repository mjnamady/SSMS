@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('store.student.year') }}" method="POST"> 
        @csrf
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Student Year</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">

                                    <div class="col-xl-12 col-sm-12">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Enter Year Name<span class="required">*</span></label>
                                            <input type="number" name="year_name" class="form-control @error('year_name') is-invalid @enderror " id="exampleFormControlInput4">
                                            @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <button class="btn btn-primary" type="submit">Add Year</button>
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