@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-6 order-md-1 col-lg-6 pt-8">
            <img src="/banner/hero-header.png" class="img-fluid" >
        </div>
        <div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <!--Grid column-->
            <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
                <h1 class="h1-responsive display-5 font-weight-bold fadeInLeft">Sign up right now! </h1>
                <hr class="hr-light wow fadeInLeft" >
                <h6 class="mb-3 wow fadeInLeft" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga
                nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea
                dolor molestiae, quisquam iste, maiores. Nulla.
                </h6>
            </div>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-lg btn-primary rounded-pill hover-top">Register as Patient</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-lg btn-outline-primary rounded-pill">Login</button></a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

  <!--date picker component-->
  <find-doctor></find-doctor>
</div>
@endsection
