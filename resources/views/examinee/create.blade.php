<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Create Examinee
        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{session('success')}}
            </div>    
        @endif
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
            <form action="{{route('examinees.store')}}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">

                    <div class="form-group clearfix">  
                        <label  for="">{{__("Select Exam Name")}}</label> 
                        <select name="exam_setup_id" id="exam_setup_id" class="form-control show-tick">
                            <option value="" disabled>-- Please select --</option>
                            @foreach ($examsetups as $examsetup)
                                @if ($examsetup->status == '1')
                                    <option value="{{$examsetup->id}}">{{$examsetup->title}}</option>
                                @else
                                    <option value="" disabled>Exam Not Started</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">  
                        <label  for="">{{__("Name")}}</label>                                 
                        <input type="text" name="name" class="form-control" placeholder="Write Your Name" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Roll No")}}</label>                                   
                        <input type="number" name="roll_no" class="form-control" placeholder="Roll No" />
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