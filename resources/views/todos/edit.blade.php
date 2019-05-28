@extends('layouts.app')


@section('todos')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Edit Todo</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('todos.update', $todos->id )}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Todo Title</label>
                                <input type="text" name="title" id="title" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" value="{{ $todos->title }}" placeholder="Enter Title">
                                @if($errors->has('title'))
                                <span class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="body">Todo Description</label>
                                <textarea name="body" id="body" rows="4" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" placeholder="Enter Todo Description">{{ $todos->body }}</textarea>
                                @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                                <span class="invalid-feedback">
                                    {{$errors->first('body')}} {{-- <- Display the First validation error --}}
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection