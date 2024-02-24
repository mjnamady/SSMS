@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <div class="col-xl-8">
            <div class="card h-auto">
                <div class="card-header p-0">
                    <div class="user-bg w-100">
                        <div class="user-svg">
                            <svg width="264" height="109" viewBox="0 0 264 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8.01074" y="8.6521" width="247.592" height="259.13" rx="123.796" stroke="#FCC43E" stroke-width="16"></rect>
                                </svg>
                        </div>
                        <div class="user-svg-1">
                            <svg width="264" height="59" viewBox="0 0 264 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="8.56406" width="247.592" height="259.13" rx="123.796" stroke="#FB7D5B" stroke-width="16"></rect>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="user">
                            <div class="user-media">
                                <img src="{{ (!empty($user->photo)) ? url('uploads/teacher/'.$user->photo) : url('uploads/no_image.jpg') }}" alt="" class="avatar avatar-xxl">
                            </div>
                            <div>
                                <h2 class="mb-0">{{$user->first_name . ' '. $user->last_name}}</h2>
                                <p class="text-primary font-w600">{{$user->role}}</p>
                            </div>
                        </div>
                    </div>	
                    <h3>Assign Subject(s)</h3>
                    <div class="row mt-2">
                        
                        <form method="POST" action="{{route('store.teacher.subject', $user->id)}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Subjects:</label>
                                <select name="subjects[]" multiple class="default-select  form-control wide" required>
                                    @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-secondary">Assign</button>
                        </form>
                       
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="heading">Assigned Subject(s)</h3>
                            {{-- <p class="mb-0">Thursday, 10th April , 2022</p> --}}
                            @php
                                $user_subjects = $user->teacher->subjects;
                            @endphp
                            @if (count($user_subjects) > 0)
                                <div class="tab-pane fade show active" id="BasicList" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <div class="basic-list-group">
                                            <ul class="list-group">
                                                @foreach ($user_subjects as $subject)
                                                    <li class="list-group-item"><b>{{$subject->name}}</b>
                                                        <a href="{{route('un.assign.subject',[$subject->id, $user->id])}}" id="delete" style="float: right">
                                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="alert alert-secondary alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                        <strong>Info!</strong> No Subject Assign Yet!.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                    </div>
                            @endif
                            

                        </div>
                    </div>							
                </div>

            
            </div>
        </div>
    </div>
</div>


@endsection