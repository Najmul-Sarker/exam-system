<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Create Subject
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
            <form action="{{route('subjects.store')}}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="row"></div>
                    <div class="form-group">  
                        <label  for="">{{__("Title")}}</label>                                 
                        <input type="text" name="title" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Description")}}</label>                                   
                        <input type="text" name="description" class="form-control" placeholder="Description" />
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