@extends('layouts.app') 
@section('title', '| ABOUT') 
@section('main-stylesheets')
<link rel="stylesheet" href="css/main.css" type="text/css"> 
@stop 
@section('content')
@include('inc.navbar')
<div class="strbg">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="headw text-center">History</h1>
                    <br><br>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <img src="assets/imgs/cictlogo.jpg" alt="CICt's Logo" class="img-fluid about-logo">
                    </div>
                    <div class="col-md-9">
                    <h5 class="white text-left">
                            In 1993, Holy Angel University offered its first 2-year Associate program in Computer Technology, headed by the Dean of College of Arts and Sciences, Ms. Liwayway Perez and was managed by Mr. Carlo Sunga, Chairperson of the Computer Science Department. It has obtained its government recognition in 1995.
                            
                            By School Year 1996-1997, the Commission of Higher Education (CHED) granted permit to the University to offer Bachelor of Science in Computer Science under the supervision of Mrs. Angelita Ayson, CAS Dean and Engr. Eufracio Delos Reyes Chairperson (1997-1998) and Mr. Francisco D. Napalit (1998-1999).
                            
                            In 2000, Bachelor of Science in Information Technology and Information Management were offered to cater the varying needs of the industry, under the management of Mr. Wilson D. Concepcion.
                            
                            In 2003, the Department was led under the leadership of Mr. Joseph A. Esquivel as chairperson. The Department became a college in School Year 2005-2006, under the supervision of Mr. Joseph A. Esquivel, which was then named College of Information and Communications Technology. In March 2007, the College was awarded Center of Development in Information Technology Education in Region III, which signifies the commitment of the University in offering quality education.
                            
                            Today, the College offers Computer Science with specialization in Systems Development and two tracks in Information Technology which includes Network Administration and Multimedia Technology.
                    </h5>
                </div>
                </div> <!--end of row-->
            </div><!--end of container-->
        </div>
    </div>

    <div class="misvis">
        <br><br>
            <div class="container">
                <div class="row">

                <div class="col-md-12">
                 <h1 class="visH text-center">Vision</h1>
                </div>
                <div class="col-md-3">
                    <img src="assets/imgs/vission.png" class="img-fluid map" >
                </div>
                <div class="col-md-9">
                    <br>
                    <p class="visP">
                            A Center of Excellence in ICT education through relevant curricular programs implemented by highly competent individuals who engage in research and countryside development and supported by the industry and state-of-the-art facilities.
                    </p>
                    <br><br><br>
                </div>

                <br><br><br>

                <div class="col-md-12">
                        <h1 class="visH text-center">Mission</h1>
                       </div>
                       <div class="col-md-9">
                           <br>
                           <p class="visP">
                                   A Center of Excellence in ICT education through relevant curricular programs implemented by highly competent individuals who engage in research and countryside development and supported by the industry and state-of-the-art facilities.
                           </p>
                       </div>
                       <div class="col-md-3">
                            <img src="assets/imgs/allpc.png" class="img-fluid">
                        </div>

                </div><!--end of row-->
             </div><!--end of cont-->
        <br><br>
    </div>
    @include('inc._footer')
@endsection
