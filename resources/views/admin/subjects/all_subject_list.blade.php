@extends('admin.admin_dashboard')   
@section('admin')

<div class="container-fluid">

        <div class="col-xl-12">
            <div class="card" id="accordion-three">
                <div class="card-header flex-wrap d-flex justify-content-between px-3">
                    <div>
                    <h4 class="card-title">All Subjects List</h4>
                    </div>
                    <a href="{{ route('add.subject') }}" type="button" class="btn btn-primary">+ Add Subject</a>
                </div>
            
                    <!-- /tab-content -->	
                    <div class="tab-content" id="myTabContent-2">
                        <div class="tab-pane fade show active" id="withoutSpace" role="tabpanel" aria-labelledby="home-tab-2">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="example3" class="display table" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>S\N</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
            @foreach ($all_subjects as $key => $subject)

            <tr>
                <td> {{ $key+1 }} </td>
                <td>{{ $subject->name }}</td>
               
                <td>
                    <div class="d-flex">
                        <a href="{{ route('edit.subject', $subject->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('delete.subject', $subject->id) }}" id="delete" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                        
                    </div>												
                </td>												
            </tr>
            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="withoutSpace-html" role="tabpanel" aria-labelledby="home-tab-2">
                            <div class="card-body pt-0 p-0 code-area">	
    <pre class="mb-0">
        <code class="language-html">&lt;div class="table-responsive"&gt;
            &lt;table id="example3" class="display table" style="min-width: 845px"&gt;
            &lt;thead&gt;
            &lt;tr&gt;
            &lt;th&gt;&lt;/th&gt;
            &lt;th&gt;Name&lt;/th&gt;
            &lt;th&gt;Department&lt;/th&gt;
            &lt;th&gt;Gender&lt;/th&gt;
            &lt;th&gt;Education&lt;/th&gt;
            &lt;th&gt;Mobile&lt;/th&gt;
            &lt;th&gt;Email&lt;/th&gt;
            &lt;th&gt;Joining Date&lt;/th&gt;
            &lt;th&gt;Action&lt;/th&gt;
            &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Tiger Nixon&lt;/td&gt;
            &lt;td&gt;Architect&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;M.COM., P.H.D.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/04/25&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;												
            &lt;/td&gt;												
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Garrett Winters&lt;/td&gt;
            &lt;td&gt;Accountant&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;M.COM., P.H.D.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/07/25&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Ashton Cox&lt;/td&gt;
            &lt;td&gt;Junior Technical&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2009/01/12&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Cedric Kelly&lt;/td&gt;
            &lt;td&gt;Developer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/03/29&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Airi Satou&lt;/td&gt;
            &lt;td&gt;Accountant&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2008/11/28&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Brielle Williamson&lt;/td&gt;
            &lt;td&gt;Specialist&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/12/02&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Herrod Chandler&lt;/td&gt;
            &lt;td&gt;Sales Assistant&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/08/06&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Rhona Davidson&lt;/td&gt;
            &lt;td&gt;Integration&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/10/14&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Colleen Hurst&lt;/td&gt;
            &lt;td&gt;Javascript Developer&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2009/09/15&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Sonya Frost&lt;/td&gt;
            &lt;td&gt;Software Engineer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2008/12/13&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Jena Gaines&lt;/td&gt;
            &lt;td&gt;Office Manager&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2008/12/19&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Quinn Flynn&lt;/td&gt;
            &lt;td&gt;Support Lead&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2013/03/03&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Charde Marshall&lt;/td&gt;
            &lt;td&gt;Regional Director&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2008/10/16&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Haley Kennedy&lt;/td&gt;
            &lt;td&gt;Senior Marketing&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/12/18&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Tatyana Fitzpatrick&lt;/td&gt;
            &lt;td&gt;Regional Director&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/03/17&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Michael Silva&lt;/td&gt;
            &lt;td&gt;Marketing Designer&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/11/27&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Paul Byrd&lt;/td&gt;
            &lt;td&gt;Financial Officer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/06/09&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Gloria Little&lt;/td&gt;
            &lt;td&gt;Systems Administrator&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2009/04/10&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Bradley Greer&lt;/td&gt;
            &lt;td&gt;Software Engineer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/10/13&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Dai Rios&lt;/td&gt;
            &lt;td&gt;Personnel Lead&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2012/09/26&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Jenette Caldwell&lt;/td&gt;
            &lt;td&gt;Development Lead&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/09/03&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Yuri Berry&lt;/td&gt;
            &lt;td&gt;Marketing Officer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2009/06/25&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic3.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Caesar Vance&lt;/td&gt;
            &lt;td&gt;Pre-Sales Support&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/12/12&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic4.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Doris Wilder&lt;/td&gt;
            &lt;td&gt;Sales Assistant&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/09/20&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic5.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Angelica Ramos&lt;/td&gt;
            &lt;td&gt;Executive Officer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2009/10/09&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic6.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Gavin Joyce&lt;/td&gt;
            &lt;td&gt;Developer&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/12/22&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic7.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Jennifer Chang&lt;/td&gt;
            &lt;td&gt;Regional Director&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/11/14&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic8.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Brenden Wagner&lt;/td&gt;
            &lt;td&gt;Software Engineer&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.TACH, M.TACH&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/06/07&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic9.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Fiona Green&lt;/td&gt;
            &lt;td&gt;Operating Officer&lt;/td&gt;
            &lt;td&gt;Male&lt;/td&gt;
            &lt;td&gt;B.A, B.C.A&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2010/03/11&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
            &lt;td&gt;&lt;img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""&gt;&lt;/td&gt;
            &lt;td&gt;Shou Itou&lt;/td&gt;
            &lt;td&gt;Regional Marketing&lt;/td&gt;
            &lt;td&gt;Female&lt;/td&gt;
            &lt;td&gt;B.COM., M.COM.&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;123 456 7890&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;&lt;a href="javascript:void(0);"&gt;&lt;strong&gt;info@example.com&lt;/strong&gt;&lt;/a&gt;&lt;/td&gt;
            &lt;td&gt;2011/08/14&lt;/td&gt;
            &lt;td&gt;
            &lt;div class="d-flex"&gt;
            &lt;a href="#" class="btn btn-primary shadow btn-xs sharp me-1"&gt;&lt;i class="fas fa-pencil-alt"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;a href="#" class="btn btn-danger shadow btn-xs sharp"&gt;&lt;i class="fa fa-trash"&gt;&lt;/i&gt;&lt;/a&gt;
            &lt;/div&gt;
            &lt;/td&gt;
            &lt;/tr&gt;
            &lt;/tbody&gt;
            &lt;/table&gt;
            &lt;/div&gt;
        </code>
    </pre></div>
                        </div>
                    </div>
                    <!-- /tab-content -->		
            
            </div>
        </div>
</div>
@endsection