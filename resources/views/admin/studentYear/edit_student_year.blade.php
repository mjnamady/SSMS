@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('update.student.year') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Student Year</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">

                                    <div class="col-xl-12 col-sm-12">
                                        <input type="hidden" name="year_id" value="{{$year->id}}">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Edit Year Name<span class="required">*</span></label>
                                            <input type="text" name="year_name" class="form-control" id="exampleFormControlInput4" value="{{ $year->name }}">
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <button class="btn btn-primary" type="submit">Update Year</button>
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