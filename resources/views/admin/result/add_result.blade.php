@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="" method="GET"> 
        @csrf
        <div class="row">
            <div class="add_item">
                <div class="col-xl-12">
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Declare Result</h5>
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
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold"> Year</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option selected="">-- Select Year --</option>
                                                   
                                                </select>
                                            </div>
                                        </div>


                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold">Select Class</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select name="class_id" id="class_id" class="form-control dynamic" data-dependent="student">
                                                    <option selected="">-- Select Class --</option>
                                                    @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label" style="text-align: right;font-weight:bold">Select Student</label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">
                                                <select name="student_id" id="student" class="form-control">
                                                    <option selected="">-- --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-xl-10 col-sm-12">
                                            <div class="mb-3">

                                                {{-- <div class="alert alert-success alert-dismissible fade show">
                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                                                    <strong>Success!</strong> Message has been sent.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                                    
                                                    </button>
                                                </div> --}}
        
                                            </div>
                                        </div>


                                        <label class="col-sm-2 col-form-label box" style="text-align: right;font-weight:bold">Subjects</label>
                                        <div class="col-xl-10 col-sm-12 box" id="showSubjects">
                                                
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

<script>

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
            $.ajax({
                url: "{{route('check.declared.result')}}",
                method: "GET",
                dataType: "json",
                data: {student_id:student_id, _token:'{{csrf_token()}}'},
                success: function (result) {
                    console.log(result);
                }
            });
        });
    });

</script>




@endsection