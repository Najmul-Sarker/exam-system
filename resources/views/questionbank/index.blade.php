<x-backend.layouts.master>
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

        <a href="{{route('questionbank.excel')}}" class="btn btn-success" title="Excel Import">Excel</a>
        <div class="card">
            <div class="header">
                <h2>{{__("Question List Page")}}</h2>
                <ul class="header-dropdown">
                   
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            {{-- @dd($questionbanks) --}}
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead class="bg-grey">
                            <tr>
                                <th>Sl</th>
                                <th>Subject Name</th>
                                <th>Chapter Name</th>
                                <th>Question</th>
                                <th>Option1</th>
                                <th>Option2</th>
                                <th>Option3</th>
                                <th>Option4</th>
                                <th>Correct Answer</th>
                                <th>Question Level</th>
                                <th>Marks</th>
                                <th>Question Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($questionbanks as $questionbank)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @foreach ($subjects as $subject)
                                    @if($subject->id ==$questionbank->subject_id)
                                        {{$subject->title}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td>{{$questionbank->chapter->subject->title}}</td> --}}
                                <td>{{$questionbank->chapter->title}}</td>
                                <td> {{$questionbank->question_text}} </td>
                                <td> {{$questionbank->option1}} </td>
                                <td> {{$questionbank->option2}} </td>
                                <td> {{$questionbank->option3}} </td>
                                <td> {{$questionbank->option4}} </td>
                                <td> {{$questionbank->correcct_answer}} </td>
                                <td> {{$questionbank->question_level}} </td>
                                <td> {{$questionbank->marks}} </td>
                                <td> {{$questionbank->type}} </td>
                                <td>
                                    <div style="display: flex; flex-direction: row;">
                                    <a href="{{route('questionbanks.show',$questionbank->id)}}" class="btn btn-icon btn-success btn-icon-mini d-flex align-items-center" title="Show" style="margin-right: 10px;"><i class="zmdi zmdi-eye mx-auto"></i></a>

                                    <a href="{{route('questionbanks.edit',$questionbank->id)}}"class="btn btn-icon btn-info btn-icon-mini d-flex align-items-center" title="Edit" style="margin-right: 10px;">
                                        <i class="zmdi zmdi-edit mx-auto"></i>
                                    </a>

                                    <form style="display:inline" action="{{route('questionbanks.destroy',$questionbank->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }"class="btn btn-icon btn-danger btn-icon-mini d-flex align-items-center" title="Delete">
                                            <i class="zmdi zmdi-delete mx-auto"></i>
                                        </button>
                                        
                                    </form>
                                </div>
        
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center d-flex justify-content-center">
                <a href="{{ route('questionbanks.create') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="Add">
                    <i class="material-icons">add</i>
                </a>
                
            </div>
        </div>

        

</x-backend.layouts.master>