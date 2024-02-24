@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="clearfix">
                <div class="card card-bx profile-card author-profile m-b30">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="author-profile">
                                <div class="author-media">
                                    <img src="{{ (!empty($adminInfo->photo)) ? url('uploads/admin_images/'.$adminInfo->photo) : url('uploads/no_image.jpg') }}" alt="">
                                    {{-- <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                        <input type="file" class="update-flie">
                                        <i class="fa fa-camera"></i>
                                    </div> --}}
                                </div>
                                <div class="author-info">
                                    <h6 class="title">{{ $adminInfo->first_name.' '.$adminInfo->last_name }}</h6>
                                    <span>{{ $adminInfo->email }}</span>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-footer">
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="card profile-card card-bx">
                <div class="card-header">
                    <h6 class="title">Admin Profile Update</h6>
                </div>
                <form class="profile-form" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$adminInfo->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $adminInfo->first_name }}">
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $adminInfo->last_name }}">
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $adminInfo->email }}" >
                            </div>

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phone" class="form-control" value="{{ $adminInfo->phone }}">
                            </div>
                           
                            <div class="col-sm-12 m-b30">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $adminInfo->address }}">
                            </div>

                            <div class="col-sm-12 m-b30">
                                <label class="form-label">Photo</label>
                                <input id="image" class="form-control" name="photo" type="file" id="formFile">
                            </div>

                            <div class="author-media">
                                <img id="showImage" src="{{ (!empty($adminInfo->photo)) ? url('uploads/admin_images/'.$adminInfo->photo) : url('uploads/no_image.jpg') }}" style="width:90px" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">UPDATE INFO</button>
                        {{-- <a href="page-register.html" class="btn-link float-end">Forgot your password?</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>	
</div>

<script src="{{asset('js/main.js')}}"></script>

@endsection
