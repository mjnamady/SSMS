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
                    <h6 class="title">Admin Password Change</h6>
                </div>
                <form class="profile-form" method="POST" action="{{ route('admin.update.password') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$adminInfo->id}}">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12 m-b30">
                                {{-- <label class="form-label">Old Password</label> --}}
                                <input type="text" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 m-b30">
                                {{-- <label class="form-label">New Password</label> --}}
                                <input type="text" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password"">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="col-sm-12 m-b30">
                                {{-- <label class="form-label">Confirm Password</label> --}}
                                <input type="text" name="new_password_confirmation" class="form-control" placeholder="Confirm Password" >
                            </div>
                
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">CHANGE PASSWORD</button>
                        {{-- <a href="page-register.html" class="btn-link float-end">Forgot your password?</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>	
</div>

@endsection
