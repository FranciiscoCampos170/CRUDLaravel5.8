
@extends('layouts.app')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <h2 class="text-center page-header">All Todos</h2>
    </div>
    <div class="col-md-12">
        <ul class="list-group py-3 mb-3">
            @forelse ($todos as $todo)
                <li class="list-group-item">
                    <h5>{{ $todo->title }}</h5> 
                  
                    <p> {{ str_limit($todo->body, 20) }}</p>
                    <small class="floar-right">{{ $todo->created_at->diffForHumans() }}</small>
                    <br>
                    <a href="{{ route('todos.show', $todo->id) }}">Read More</a>
                    
                    @empty
                    <h4 class="text-center">No Todos Found!</h4>
                </li>
            @endforelse
        </ul>
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $todos->links() }}
    </div>
</div>
    @endsection
    
    @if(session('status')) {{-- <- If session key exists --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}} {{-- <- Display the session value --}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<script>
    //close the alert after 3 seconds.
    $(document).ready(function(){
       setTimeout(function() {
          $(".alert").alert('close');
       }, 3000);
    });
</script>