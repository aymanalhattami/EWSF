@php $pageSubTitle = "about" @endphp
@extends('layouts.app')
@section("content")
    <div class="content background-white">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{ url('images/about/about-us.jpg') }}" class="img-responsive center-block" width="500" />
            </div>
        </div>
    </div>

    <div class="content-about background-white">
        <div class="row">
            <div class="col-md-12 text-left main-color">
                <div class="about-team">EWSF Team</div>
            </div>
        </div>

        <div class="row">
            <div class="about-img">
                <div class="col-md-4">
                    <img src="{{ url('/images/about/muath.PNG') }}" class="img-responsive img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">Muath Assawadi</h3>
                </div>
                <div class="col-md-4">
                    <img src="{{ url('/images/about/2.PNG') }}" class="img-responsive img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">Aymen Mohammed</h3>
                </div>
                <div class="col-md-4">
                    <img src="{{ url('/images/about/3.jpg') }}" class="img-responsive img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">Ahmed Alhaddad</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="about-img">
                <div class="col-md-4">
                    <img src="{{ url('/images/about/4.PNG') }}" class="img-responsive img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">Ammar Alnoirah</h3>
                </div>
                <div class="col-md-4">
                    <img src="{{ url('/images/about/5.PNG') }}" class="img-responsive img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">As3ad Altbaly</h3>
                </div>
                <div class="col-md-4">
                    <img src="{{ url('/images/about/6.jpg') }}" class="img-circle img-thumbnail center-block"/>
                    <h3 class="text-center">Najeeb Askar</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-about background-white">
        <div class="row">
            <div class="col-md-12">
                <h3><img src="{{ url('/images/mail.png') }}" class="" width="30"/> <span>Contact Us at: </span> <a href="#">ewsf.system@gmail.com</a></h3>
            </div>
        </div>
    </div>
@endsection