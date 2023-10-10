<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Create ExamSetup
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
            <form action="{{route('examsetups.store')}}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="row"></div>
                    <div class="form-group clearfix">  
                        <label  for="">{{__("Select Subject Name")}}</label> 
                        <select name="subject_id" id="subject_id" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                            
                        @endforeach 
                        </select>
                    </div>
                    <div class="form-group clearfix">  
                        <label  for="">{{__("Select Chapter Name")}}</label> 
                        <select name="chapter_id" id="chapter_id" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        @foreach ($chapters as $chapter)
                        <option value="{{$chapter->id}}">{{$chapter->title}}</option>
                            
                        @endforeach 
                        </select>
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Title")}}</label>                                 
                        <input type="text" name="title" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Duration")}}</label>                                 
                        <input type="number" name="duration" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Total Question")}}</label>                                 
                        <input type="number" name="total_question" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Easy Question")}}</label>                                 
                        <input type="number" name="easy_question" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Hard Question")}}</label>                                 
                        <input type="number" name="hard_question" class="form-control" placeholder="Title" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Question Description")}}</label>                                   
                        <input type="text" name="question_description" class="form-control" placeholder="Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Start Time")}}</label>                                   
                        <input type="datetime-local" name="start_at" class="form-control" placeholder="Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("End Time")}}</label>                                   
                        <input type="datetime-local" name="end_at" class="form-control" placeholder="Description" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-lg"><i class="material-icons">check</i> <span class="icon-name"></span>Submit</button>
            </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('examsetups.index')}}" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
    </div>
</x-backend.layouts.master>