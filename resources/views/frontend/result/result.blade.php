
@extends('layouts.frontend.master')
@section('content')


<!-- ==============================================
    ** Inner Banner **
    =================================================== -->
    <div class="inner-banner contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <h1>Student Result</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-3"> <a href="apply-online.html" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                    </a></div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Contact Us **
    =================================================== -->
    <section class="form-wrapper padding-lg">
        <div class="container">
            <form name="contact-form" id="ContactForm">
                <div class="row input-row">
                    <div class="col-sm-6">
                        <input name="result_type" type="text" placeholder="First Name">
                    </div>
                    <div class="col-sm-6">
                        <input name="last_name" type="text" placeholder="Last Name">
                    </div>
                </div>
                <div class="row input-row">
                    <div class="col-sm-6">
                        <input name="company" type="text" placeholder="Company">
                    </div>
                    <div class="col-sm-6">
                        <input name="phone_number" type="text" placeholder="Phone Number">
                    </div>
                </div>
                <div class="row input-row">
                    <div class="col-sm-6">
                        <input name="business_email" type="text" placeholder="Business Email">
                    </div>
                    <div class="col-sm-6">
                        <input name="job_title" type="text" placeholder="Job Tittle">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn">Apply Now <span class="icon-more-icon"></span></button>
                        <div class="msg"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection