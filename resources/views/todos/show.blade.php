@extends('layouts.app')
@section('todos')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{$todos->title}}</h3>
                    </div>
                    <div class="card-body">
                          <p>{{$todos->body}}</p>
                          <small>Writte: {{ $todos->created_at->diffForHumans() }}</small>
                          <br>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('todos.edit',$todos->id)}}" class="btn btn-primary float-left" data-toggle="modal" data-target="#edit">Update</a>
                        <form method="POST" action="{{route('todos.destroy', $todos->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('todos.index') }}" class="float-right btn btn-dark">Back</a>
                </div>
            </div>
        </div>
            @include('todos.editModal')
@endsection