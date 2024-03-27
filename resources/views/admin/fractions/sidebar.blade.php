<div class="dlabnav">
    <div class="dlabnav-scroll">	
        <ul class="metismenu" id="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>


            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">school</i>
                    <span class="nav-text">Setup Mangmnt</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('student.class') }}">Classes</a></li>
                    <li><a href="{{ route('all.subjects') }}">Subjects</a></li>
                    <li><a href="{{ route('student.year') }}">Student Year</a></li>
                    <li><a href="{{ route('student.group') }}">Student Group</a></li>
                    <li><a href="{{ route('student.shift') }}">Student Shift</a></li>
                    <li><a href="{{ route('assign.subject') }}">Classes & Subjects</a></li>
                    <li><a href="{{ route('exam.type') }}">Exam Type</a></li>
                </ul>
            </li>


            {{-- <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">school</i>
                    <span class="nav-text">Manage Subjects</span>
                </a>
                <ul aria-expanded="false">
                    
                    <li><a href="{{ route('add.subject') }}">Add New Subject</a></li>
                    <li><a href="{{ route('teacher.subject') }}">Teacher's Subjects</a></li>
                    <li><a href="{{ route('add.subject') }}">Class's Subjects</a></li>
                    
                </ul>
            </li> --}}


            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">school</i>
                    <span class="nav-text">Manage Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.students') }}">All Students</a></li>
                    <li><a href="{{ route('add.student') }}">Add Student</a></li>
                    
                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">person</i>
                    <span class="nav-text">Manage Teachers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.teachers') }}">All Teachers</a></li>
                    <li><a href="{{route('add.teacher')}}">Add Teacher</a></li>
                    
                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">person</i>
                    <span class="nav-text">Manage Parents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.parents') }}">All Parents</a></li>
                    <li><a href="{{route('add.parent')}}">Add Parent</a></li>
                    
                </ul>
            </li>
            
        </ul>

        <div class="copyright">
            <p><strong>Secondary School <br>Management Dashboard</strong></p>
            <p class="fs-12">Made with <span class="heart"></span> by Mjnamdi Tech</p>
        </div>
        
    </div>
</div>