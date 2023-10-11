<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
           Question Import
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
            <form action="{{route('questionbank.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">
   

                    <div class="form-group">  
                        <label  for="">{{__("Question Excel Import")}}</label>                                 
                        <input type="file" name="excel" class="form-control"  />
                       

                    </div>
                    
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-lg"><i class="material-icons">check</i> <span class="icon-name"></span>Submit</button>
            </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="#" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
    </div>
</x-backend.layouts.master>