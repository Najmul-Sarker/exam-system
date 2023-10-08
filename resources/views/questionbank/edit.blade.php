<x-backend.layouts.master>
  
    <div class="card">
        <div class="card-header">
            Edit Question
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
            <form action="{{route('questionbanks.update',$questionbank->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row clearfix">
                <div class="col-sm-12">
                    
                    <div class="form-group clearfix">  
                        <label  for="">{{__("Select Subject Name")}}</label> 
                        <select name="subject_id" id="subject_id" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $questionbank->subject_id == $subject->id ? 'selected': '' }}>{{ $subject->title }}
                        </option>
                            
                        @endforeach 
                        </select>
                    </div>
                    <div class="form-group clearfix">  
                        <label  for="">{{__("Select Chapter Name")}}</label> 
                        <select name="chapter_id" id="chapter_id" class="form-control show-tick">
                            <option value="">-- Please select --</option>
                        @foreach ($chapters as $chapter)
                        <option value="{{$chapter->id}}"
                            {{ $questionbank->chapter_id == $chapter->id ? 'selected': '' }}>{{$chapter->title}}
                        </option>
                            
                        @endforeach 
                        </select>
                    </div>

                    <div class="form-group">  
                        <label  for="">{{__("Question Text")}}</label>                                 
                        <input type="text" name="question_text" class="form-control" value="{{$questionbank->question_text}}" placeholder="Title" />
                        @error('question_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 

                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 1")}}</label>                                 
                        <input type="text" name="option1" class="form-control" value="{{$questionbank->option1}}" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 2")}}</label>                                 
                        <input type="text" name="option2" class="form-control" value="{{$questionbank->option2}}" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 3")}}</label>                                 
                        <input type="text" name="option3" class="form-control" value="{{$questionbank->option3}}" placeholder="Title" />
                    </div>
                    <div class="form-group">  
                        <label  for="">{{__("Option 4")}}</label>                                 
                        <input type="text" name="option4" class="form-control" value="{{$questionbank->option4}}" placeholder="Title" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Correct Answer")}}</label>                                   
                        <input type="text" name="correcct_answer" class="form-control" value="{{$questionbank->correcct_answer}}" placeholder="Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Question Level")}}</label>                                   
                        <input type="text" name="question_level" class="form-control" value="{{$questionbank->question_level}}" placeholder="Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Marks")}}</label>                                   
                        <input type="text" name="marks" class="form-control" value="{{$questionbank->marks}}" placeholder="Description" />
                    </div>
                    <div class="form-group"> 
                        <label  for="">{{__("Question Type")}}</label>                                   
                        <input type="text" name="type" class="form-control" value="{{$questionbank->type}}" placeholder="Description" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-lg"><i class="material-icons">check</i> <span class="icon-name"></span>Submit</button>
            </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('questionbanks.index')}}" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
    </div>
</x-backend.layouts.master>