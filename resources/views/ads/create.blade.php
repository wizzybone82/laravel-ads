@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Advertisement
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('ads.store')}}" class="form-control" enctype="multipart/form-data">
                        @csrf
                  
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input required name="title" type="text" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea required name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input required name="price" type="number" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input required name="image" type="file" class="form-control"/>
                                </div>
                            </div>
                        </div>
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