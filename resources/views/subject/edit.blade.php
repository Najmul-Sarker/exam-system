<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Edit Subject
        </div>
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="body">
            <form action="{{route('subjects.update',$subject->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="row"></div>
                    <div class="form-group">  
                        <label  for="">{{__("Title")}}</label>                                 
                        <input type="text" name="title" class="form-control" value="{{$subject->title}}" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Description")}}</label>                                   
                        <input type="text" name="description" class="form-control" value="{{$subject->description}}" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-md btn-info d-flex align-items-center">
                    <i class="material-icons">check</i>
                    <b>Submit</b>
                </button>
            </div>
            </form>
        </div>
        <div class="card-footer text-center d-flex justify-content-center">
            <a href="{{ route('subjects.index') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
    </div>
</x-backend.layouts.master>