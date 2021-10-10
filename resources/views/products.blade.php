@extends('layouts.app_customer')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-6 col-md-2">
            <div class="card rounded-3">
                <img src="{{asset('images/car_icon1.png')}}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card rounded-3">
                <img src="{{asset('images/motor_icon2.png')}}" class="card-img-top" alt="...">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="d-grid gap-2 col-12 col-md-4">
            <a class="btn btn-lg btn-block btn-secondary" href="{{url('quotation')}}">Get Quotation</a>
        </div>
    </div>
</div>
@endsection