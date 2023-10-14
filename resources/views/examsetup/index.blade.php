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

        <div class="card">
            <div class="header">
                <h2>{{__("ExamSetup List Page")}}</h2>
                <ul class="header-dropdown">
                   
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead class="bg-grey">
                            <tr>
                                <th>Sl</th>
                                <th>Subject</th>
                                <th>Chapter</th>
                                <th>Title</th>
                                <th>Duration</th>
                                <th>Total Question</th>
                                <th>Easy Question</th>
                                <th>Hard Question</th>
                                <th>Question Description</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($examsetups as $examsetup)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @foreach ($subjects as $subject)
                                    @if($subject->id ==$examsetup->subject_id)
                                        {{$subject->title}}
                                        @endif
                                    @endforeach
                                </td>
                                {{-- <td>{{$questionbank->chapter->subject->title}}</td> --}}
                                <td>
                                    @foreach ($chapters as $chapter)
                                    @if($chapter->id ==$examsetup->chapter_id)
                                        {{$chapter->title}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$examsetup->title}}</td>
                                <td> {{$examsetup->duration}} </td>
                                <td> {{$examsetup->total_question}} </td>
                                <td> {{$examsetup->easy_question}} </td>
                                <td> {{$examsetup->hard_question}} </td>
                                <td> {{$examsetup->question_description}} </td>
                                <td> {{$examsetup->start_at}} </td>
                                <td> {{$examsetup->end_at}} </td>
                                @if ($examsetup->status=='1')
                                <td><span class="badge bg-green">ON</span></td>
                                @elseif($examsetup->status=='0')
                                <td><span class="badge bg-red">OFF</span></td>
                                @endif
                                <td>

                                    <a href="{{route('examsetup.examineelist',$examsetup->id)}}">Students</a>
                                    <a href="{{route('examsetups.show',$examsetup->id)}}">Show</a>
                                    <a href="{{route('examsetups.edit',$examsetup->id)}}">Edit</a>
                                    <form style="display:inline" action="{{route('examsetups.destroy',$examsetup->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }">Delete</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer text-center">
                <a href="{{route('examsetups.create')}}" class="btn btn-sm bg-green">
                    <i class="material-icons">add</i>
                    </a>
            </div>
        </div>
        

</x-backend.layouts.master>