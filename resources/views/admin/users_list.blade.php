@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Users List
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>User</td>
                                <td>{{($u->active_status)?'Active':'Not Active'}}</td>
                                @if(!$u->active_status)
                                <td><a class="btn btn-success" href="{{route('admin.activate',$u->id)}}">Activate</a></td>
                                @else
                                <td><a class="btn btn-danger" href="{{route('admin.activate',$u->id)}}">In Activate</a</td>
                                @endif
                               
                            </tr>
                            @empty
                            <b>No users</b>
                            @endforelse
                        </tbody>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection