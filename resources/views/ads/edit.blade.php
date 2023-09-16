@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Advertisement
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('ads.update',$ads->ad_id)}}" class="form-control" enctype="multipart/form-data">
                        @csrf
                  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input value="{{$ads->title}}" required name="title" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea value="{{$ads->description}}" required name="description" class="form-control">{{$ads->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input value="{{$ads->price}}" required name="price" type="number" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input name="image" type="file" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <img style="max-width:400px;" class="card-img-top mt-3" src="{{asset('ads/'.$ads->ad_image)}}" alt="Card image cap">
                        <div class="row mt-3">
                            <div class="col">
                                <div>
                                    <input type="submit" class="btn btn-primary" value="Submit"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection