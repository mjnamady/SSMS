@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

        <div class="col-xl-12">
            <div class="card" id="accordion-three">
                <div class="card-header flex-wrap d-flex justify-content-between px-3">
                    <div>
                    <h4 class="card-title"> Classes And Their Assigned Subjects List</h4>
                    </div>
                    <a href="{{ route('add.assign.subject') }}" type="button" class="btn btn-primary">+ Assign Subject</a>
                </div>
            
            </div>
        </div>

        <div class="row">

            @foreach ($assign_subject_all as $assign_subject)
            @php
                $detailsData = $assign_subject->subjects;
            @endphp
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-primary">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Subjects List For<b> ( {{ @$assign_subject->name }} ) </b>Class</span><strong><a href="{{ route('assign.subject.edit', $assign_subject->id) }}" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a></strong></li>
                            @foreach ($detailsData as $key => $subject)
                                <li class="list-group-item d-flex justify-content-left"><span class="mb-0">{{$key+1}} : </span><strong style="margin-left:3px"> {{$subject->name}} </strong></li>
                            @endforeach
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
</div>

@endsection