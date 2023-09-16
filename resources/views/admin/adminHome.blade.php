@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                  Welcome to the admin panel
                  <br><br>
                  <a href="{{route('admin.users')}}" target="_blank" class="btn btn-warning">Users List</a>
                  <a href="{{route('ads.list')}}"  target="_blank" class="btn btn-info">Your Ads List</a>
                  <a href="{{route('ads.create')}}"  target="_blank" class="btn btn-primary">Insert Ads</a>
                  <a href="{{route('ads.all')}}"  target="_blank" class="btn btn-danger">See All Ads</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection