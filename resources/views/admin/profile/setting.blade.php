@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Setting {{ $setting->id }}</h3>
    </div>
    <div class="card-body">
        
    <form action="{{ route('update_setting') }}" method="post">{{ csrf_field() }}
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-5">
                    <p class="text-muted">This website name</p>
                    <h2>{{ $setting->site_name }}</h2>
                </div>
                <div class="col-sm-7">
                    <p class="text-muted">Do you want to change the website name?</p>
                    <label class="form-label" for="name">Please enter a new website name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $setting->site_name }}">
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-5">
                    <p class="text-muted">This is a contact number this website</p>
                    <h4>{{ $setting->contact_number }}</h4>
                </div>
                <div class="col-sm-7">
                    <p class="text-muted">Do you want to change the website contact number?</p>
                    <label class="form-label" for="number">Please enter a new contact number</label>
                    <input class="form-control" type="text" name="number" id="number" value="{{ $setting->contact_number }}">
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-5">
                    <p class="text-muted">This is a the contact email the  website</p>
                    <h4>{{ $setting->contact_email }}</h4>
                </div>
                <div class="col-sm-7">
                    <p class="text-muted">Do you want to change the website contact email ?</p>
                    <label class="form-label" for="email">Please enter a new contact email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ $setting->contact_email }}">
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-5">
                    <p class="text-muted">Website Address</p>
                    <p class="lead">{{ $setting->address }}</p>
                </div>
                <div class="col-sm-7">
                    <p class="text-muted">Do you want to change the address of the website?</p>
                    <label class="form-label" for="address">Please enter a new address</label>
                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" >{{ $setting->address }}</textarea>
                </div>
            </div>
            <hr>
        </div>
        <input type="submit" class="btn btn-success" value="Save Change">
    </form>
    </div>
</div>
@endsection