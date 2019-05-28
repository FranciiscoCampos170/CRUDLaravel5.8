<form action="{{route('todos.update', $todos->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="float-left">Create Todo</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>