<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Create Question
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
            <form action="{{route('questionbanks.store')}}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-sm-12">
                    
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
                        <label  for="">{{__("Question Text")}}</label>                                 
                        <input type="text" name="question_text" class="form-control" placeholder="Question Text" />
                        @error('question_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 

                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 1")}}</label>                                 
                        <input type="text" name="option1" class="form-control" placeholder="Option 1" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 2")}}</label>                                 
                        <input type="text" name="option2" class="form-control" placeholder="Option 2" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 3")}}</label>                                 
                        <input type="text" name="option3" class="form-control" placeholder="Option 3" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 4")}}</label>                                 
                        <input type="text" name="option4" class="form-control" placeholder="Option 4" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Correct Answer")}}</label>
                        <select name="correcct_answer" id="correcct_answer" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Question Level")}}</label> 
                        <select name="question_level" id="question_level" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        <option value="easy">Easy</option>
                        <option value="hard">Hard</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Marks")}}</label>                                   
                        <input type="text" name="marks" class="form-control" placeholder="Marks" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Question Type")}}</label>  
                        <select name="type" id="type" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        <option value="mcq">MCQ</option>
                        <option value="description">DESCRIPTION</option>
                        </select>
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
            <a href="{{ route('questionbanks.index') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
    </div>
</x-backend.layouts.master>