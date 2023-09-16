@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Ads</div>
                <div class="card-body">
                    See here all the ads listing
                    <hr>
                    <div class="row">


                        @forelse($all_ads as $a)
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <img style="max-width:400px;" class="card-img-top" src="{{asset('ads/'.$a->ad_image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$a->title}}</h5>
                                    <p class="card-text">{{$a->description}}</p>
                                    <small><b>Price:</b> {{$a->price}}</small>
                                    <hr>
                                    
                                    <a target="_blank" href="{{route('ads.show',$a->ad_id)}}" class="btn btn-warning">Details</a>
                                   
                                    @if(auth()->user()->is_admin)
                                    <hr>
                                    <a  href="{{route('admin.ad.delete',$a->ad_id)}}" class="btn btn-danger">Delete Ad</a>
                                    @endif
                                </div>
                            </div>
                        </div>


                        @empty
                        <div class="row">
                            <div class="col text-center">
                                <b>No ads </b>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection