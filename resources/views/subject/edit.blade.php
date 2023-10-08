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

        <div class="card-body">
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
                <button type="submit" class="btn btn-lg"><i class="material-icons">check</i> <span class="icon-name"></span>Submit</button>
            </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('subjects.index')}}" class="btn btn-outline btn-sm">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
    </div>
</x-backend.layouts.master>