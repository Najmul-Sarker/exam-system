<x-backend.layouts.master>
    <x-slot:title>
        Exam Setup
    </x-slot>
    <div class="card">
        <div class="card-header">
            Create Exam
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
                        <label  for="">{{__("Exam Name")}}</label>                                 
                        <input type="text" name="title" class="form-control" placeholder="Exam Name" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Duration")}}</label>                                 
                        <input type="number" name="duration" class="form-control" placeholder="Duration" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Total Question")}}</label>                                 
                        <input type="number" name="total_question" class="form-control" placeholder="Total Question" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Easy Question")}}</label>                                 
                        <input type="number" name="easy_question" class="form-control" placeholder="Easy Question" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Hard Question")}}</label>                                 
                        <input type="number" name="hard_question" class="form-control" placeholder="Hard Question" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Description Question")}}</label>                                   
                        <input type="text" name="question_description" class="form-control" placeholder="Question Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Start Time")}}</label>                                   
                        <input type="datetime-local" name="start_at" class="form-control"/>
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("End Time")}}</label>                                   
                        <input type="datetime-local" name="end_at" class="form-control"/>
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
            <a href="{{ route('examsetups.index') }}" class="btn  btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
    </div>
</x-backend.layouts.master>