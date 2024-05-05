@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{route('update.result')}}" method="POST"> 
        @csrf
        <div class="row">
            <div class="add_item">
                <div class="col-xl-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Edit [ <span class="text-success">{{$result[0]->student->user->first_name}} {{$result[0]->student->user->last_name}}'s</span> ] Result</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">

                                    <div class="row">


                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold"> Term</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select name="term_id" id="term_id" class="form-control">
                                                    <option selected="">-- Select Term --</option>
                                                    @foreach ($terms as $term)
                                                        <option {{ ($result[0]->term_id == $term->id)? 'selected': '' }} value="{{$term->id}}">{{$term->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold"> Year</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option selected="">-- Select Year --</option>
                                                    @foreach ($years as $year)
                                                    <option {{ ($result[0]->year_id == $year->id)? 'selected': '' }} value="{{$year->id}}">{{$year->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold">Select Class</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select disabled name="class_id" id="class_id" class="form-control dynamic" data-dependent="student">
                                                    <option selected="">-- Select Class --</option>
                                                    @foreach ($classes as $class)
                                                    <option {{ ($result[0]->class_id == $class->id)? 'selected': '' }} value="{{$class->id}}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold">Select Student</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select disabled name="student_id" id="student" class="form-control">
                                                    <option value="{{ $result[0]->student_id }}" selected="">{{$result[0]->student->user->first_name}} {{$result[0]->student->user->last_name}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3" id="message">
                                            </div>
                                        </div>
                                        

                                        <label class="col-sm-2 col-form-label box" style="text-align: right;font-weight:bold">Subjects</label>
                                        <div class="col-xl-10 col-sm-12 box" id="showSubjects">
                                        @php
                                            $count = count($result);
                                        @endphp
                                            @for ($i = 0; $i < $count; $i++)
                                                <label class="form-label"> {{ $result[$i]->subject->name }} </label>
                                                <input type="hidden" name="ids[]" value="{{$result[$i]->id}}">
                                                <input type="hidden" name="subject_ids[]" value="{{$result[$i]->subject_id}}">
                                                <input type="number" name="marks[]" class="form-control" placeholder="Enter marks out of 100" value="{{$result[$i]->marks}}">
                                            @endfor
                                           
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary" type="submit" id="btn">Declare Result</button>
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

{{-- <script>

    $(document).ready(function (){
        $('.box').hide();
        $('.dynamic').on('change', function(){
            let class_id = $(this).val();
            let dependent = $(this).data('dependent');
            let _token = "{{csrf_token()}}";
            $.ajax({
                url: "{{route('fetch.student')}}",
                method: "GET",
                data: {class_id:class_id, _token:_token},
                dataType: "json",
                success: function (response){
                    $('#'+dependent).html(response.std_data);
                    $('.box').show();
                    $('#showSubjects').html(response.subject_data);
                    // console.log(response.std_data);
                }
            });
        });
        $('#student').on('change', function (e){
            e.preventDefault();
            let student_id = $(this).val();
            let term_id = $('#term_id').val();
            let year_id = $('#year_id').val();
            $.ajax({
                url: "{{route('check.declared.result')}}",
                method: "GET",
                dataType: "json",
                data: {_token:'{{csrf_token()}}', student_id:student_id, term_id:term_id, year_id:year_id},
                success: function (result) {
                    $('#message').html(result);
                }
            });
            
        });
    });

</script> --}}




@endsection