@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ads List
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                               
                                <th>Ad owner name</th>
                                <th>Ad owner type</th>
                                <th>Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            @forelse($ads_list as $l)
                            <tr>
                                <td>{{$l->title}}</td>
                                <td>{{$l->description}}</td>
                                <td>{{$l->price}}</td>
                                <td>{{$l->users->name}}</td>
                                <td>{{($l->users->is_admin)?'Admin':'User'}}</td>
                                <td>
                                    
                                    @if($l->ad_status)
                                    <a href="{{route('ads.control',$l->ad_id)}}" class="btn btn-warning">Un Publish</a>
                                    @else
                                    <a href="{{route('ads.control',$l->ad_id)}}" class="btn btn-info">Publish</a>
                                    @endif
                                    <a target="_blank" href="{{route('ads.edit',$l->ad_id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('ads.delete',$l->ad_id)}}" class="btn btn-danger">Delete</a>
                                </td>
                               
                               
                            </tr>
                            @empty
                            <b>No Ads</b>
                            @endforelse
                        </tbody>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection