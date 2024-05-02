@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

    <form action="{{ route('store.assign.subject') }}" method="POST"> 
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

                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                            </div>
                                          </div>
                                    
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput4" class="form-label">Select a Class <span class="required">*</span></label>
                                                <select name="class_id" id="class_id" class="default-select form-control wide dynamic" data-dependent="student">
                                                    <option selected="">Select Class </option>
                                                    @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-10 mb-2">
                                            <label class="text-label form-label">Select Student<span class="required">*</span></label>
                                            <div class="dropdown bootstrap-select default-select form-control wide">
                                                <select name="student_id" id="student" class="default-select form-control wide" aria-label="Default select example">
                                                        <option selected="">-- --</option>
                                                </select>
                                            </div>
                                        </div>

                                       
                                        <div class="mt-4">
                                            <button class="btn btn-primary" type="submit">Declare Result</button>
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
                    // $('#'+dependent).html('<option selected="">--Select Student--</option>')
                }
            });
            
        });
    });

</script>




@endsection