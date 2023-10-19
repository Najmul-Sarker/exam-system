<x-backend.layouts.master>
    <x-slot:title>
        Subject
    </x-slot>
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

        <div class="body">
            <form action="{{route('subjects.store')}}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group clearfix">   
                        <label  for="">{{__("Title")}}</label>                                 
                        <input type="text" name="title" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group clearfix"> 
                        <label  for="">{{__("Description")}}</label>                                   
                        <input type="text" name="description" class="form-control" placeholder="Description" />
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