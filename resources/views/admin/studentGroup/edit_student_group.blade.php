@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('update.student.group') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Student Group</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="row">

                                    <div class="col-xl-12 col-sm-12">
                                        <input type="hidden" name="group_id" value="{{$group->id}}">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput4" class="form-label text-primary">Edit Group Name<span class="required">*</span></label>
                                            <input type="text" name="group_name" class="form-control" id="exampleFormControlInput4" value="{{ $group->name }}">
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <button class="btn btn-primary" type="submit">Update Group</button>
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