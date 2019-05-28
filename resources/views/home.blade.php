@extends('layouts.app')

@section('todos')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        All Todos
                        <a href="#" class="float-right btn  btn-outline-primary" data-toggle="modal" data-target="#create">➕</a>
                    </h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <ul class="list-group">
                            @forelse ($todos as $todo)
                                <li class="list-group-item" style="padding-left:30px; padding-right:30px;">
                                    <h5 style="padding-top:25px;">
                                        {{ $todo->title }} 
                                        <span class="float-right">
                                            <form method="POST" action="{{route('todos.destroy', $todo->id)}}">
                                                    {{-- <a href="#" class="btn btn-success"> ✅ </a>  --}}
                                                    <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-primary"> 👁 </a> 
                                                        &nbsp;
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">❌</button>
                                            </form>    
                                        </span>
                                    </h5>
                                    
                                    <p style="padding-top:10px;"> {{ str_limit($todo->body, 30) }}</p>
                                    <small class="float-right">{{ $todo->created_at->diffForHumans()}}</small>
                                    
                                    <a href="{{ route('todos.show', $todo->id) }}">
                                        Read More
                                    </a>
                                    <p>
                                        
                                    </p>
                                </li>
                            @empty
                                <h4 class="text-center">
                                    No Todos Found!
                                </h4>
                            @endforelse
                        </ul>
                </div>
                <div class="d-flex justify-content-center">
                   {{ $todos->links() }}
                </div>

                @include('todos.createModal')
            </div>
        </div>
    </div>
</div>
@endsection
