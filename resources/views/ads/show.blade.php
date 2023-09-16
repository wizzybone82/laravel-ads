@extends('layouts.app')
   
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
          
            <div class="card">
                <div class="card-header">
                    <b>{{$details->title}}</b>
                </div>
                <img style="max-height:400px;" class="card-img-top" src="{{asset('ads/'.$details->ad_image)}}" alt="Card image cap">
                <div class="card-body">
                    <p>{{$details->description}}</p>
                </div>
            </div>
           
        </div>
    </div>
    <hr>

    <div class="row mt-3">
        <h4>Comments</h4>
        <div class="col">
          
            <div class="card">
                @forelse($comments as $c)
                <div class="card-header">
                    {{$c->user->name}} {{($c->user->is_admin)?'*':''}}
                </div>
                <div class="card-body">
                    {{$c->comment_msg}}
                </div>
                
                @empty
                <div class="text-center">
                    <b>No Comments On This Ad</b>
                </div>
                <hr>
                @endforelse
            </div>
           
        </div>
    </div>

    <hr>
    <div class="row mt-3">
    <h4>Add Comment</h4>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Comment on this ad
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('comment.store')}}">
                        @csrf
                        <input type="hidden" name="ad_id" value="{{$details->ad_id}}"/>
                        <textarea class="form-control" name="message"></textarea>
                        <input type="submit" class="btn btn-info mt-2" value="Comment"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection