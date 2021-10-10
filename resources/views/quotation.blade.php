@extends('layouts.app_customer')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-8">
            <div class="col-md-8 mb-3">
                @if(url()->previous() != url()->current())
                    {{session()->put('prevoius_url',url()->previous())}}
                @endif
                <a href="{{ session()->get('prevoius_url') }}" class="btn d-inline float-left text-muted" data-toggle="tooltip" data-placement="right" data-original-title="Back"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <div class="card rounded-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <div class="d-grid gap-2 col-12 col-md-12">
                            <a class="btn btn-lg btn-block btn-secondary" href="{{url('checkout')}}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="d-grid gap-2 col-12 col-md-8">
            
        </div>
    </div>
</div>
@endsection