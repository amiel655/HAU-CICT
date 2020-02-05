@extends('layouts.app')
@section('title', '| CONTACT') 
 @section('main-stylesheets')
 <link rel="stylesheet" href="css/main.css" type="text/css">
 @stop
@section('content')
@include('inc.navbar')
<section id="contact" class="s-contact">
<br><br>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <h3 class="text-center welC">STAY <span class="spanCon">CONNECTED</span> | DROP US A <span class="spanCon">MESSAGE</span></h3>
                <h1 class="text-center subTit"><i class="fa fa-firefox"></i>FOR THE FOXES</h1>
            </div>
        </div><br><br><br><br>

        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4">
                <i class="fa fa-laptop footerFa"></i><br><br>
                <h3 class="footerTitle">VALID REQUEST</h3>
                <p class="footerMean">REQUEST DEMONSTRATION OF SUBJECTS, PROJECTS, &amp; CONSULTATION HOURS.</p>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                <i class="fa fa-comments footerFa"></i><br><br>
                <h3 class="footerTitle">INQUIRY</h3>
                <p class="footerMean">HAVE A CONVERSATION WITH OUR PROFESSORS IN RELATED TO YOUR SUBJECTS.</p>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                <i class="fa fa-users footerFa"></i><br><br>
                <h3 class="footerTitle">COLLEGE SUPPORT</h3>
                <p class="footerMean">GET IN TOUCH WITH THE COLLEGE IN ALL EVENTS AND UPDATES OF OUR ORGANIZATIONS.</p>
                </div>
            </div>
        </div>

        <div class="contact-content">

            <form name="contactForm" id="contactForm">
                <fieldset>

                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-4">
                                <div class="form-field">
                                    <input class="input-contact" name="" type="text" placeholder="YOUR NAME" value="" minlength="2" required="" aria-required="true" class="full-width">
                                </div>
                                <div class="form-field">
                                    <input class="input-contact" name="" type="email" placeholder="YOUR EMAIL" value="" required="" aria-required="true" class="full-width">
                                </div>
                                <div class="form-field">
                                    <input class="input-contact" name="" type="text" placeholder="CONTACT NUMBER" value="" class="full-width">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8 col-sm-8">
                                <div class="form-field">
                                    <!-- aaron new class txtArea --><textarea class="txtArea input-contact" name="" placeholder="YOUR MESSAGE" rows="50" cols="70"></textarea> <!-- end -->
                                </div>
                                <div class="text-right">
                                     <button class="butSub text-right">SUBMIT QUOTE</button><br>
                                </div>
                            </div>
                        </div>
                    </div>


                </fieldset>
            </form>

        </div>

        <br><br><br>

    </section>
    @include('inc._footer')
@endsection