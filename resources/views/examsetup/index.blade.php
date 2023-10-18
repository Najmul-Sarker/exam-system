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
                                <td>

                                    <form action="{{ route('examsetup.update.status', $examsetup->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $examsetup->status }}">
                                        <button type="submit" class="btn btn-sm {{ $examsetup->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                            {{ $examsetup->status == 1 ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
            
                                 </td>
                                 {{-- <td>
                                    <button class="btn btn-icon btn-neutral btn-icon-mini margin-0"><i class="zmdi zmdi-edit"></i></button>
                                    <button class="btn btn-icon btn-neutral btn-icon-mini margin-0"><i class="zmdi zmdi-delete"></i></button>
                                </td> --}}
                                <td>

                                    <div style="display: flex; flex-direction: row;">
                                        <a href="{{ route('examsetup.examineelist', $examsetup->id) }}" class="btn btn-icon btn-sm btn-success btn-icon-mini d-flex align-items-center" title="Student List" style="margin-right: 10px;">
                                            <i class="zmdi zmdi-eye mx-auto"></i>
                                        </a>
                                    
                                        <a href="{{ route('examsetups.edit', $examsetup->id) }}" class="btn btn-icon btn-sm btn-info btn-icon-mini d-flex align-items-center" title="Edit Exam" style="margin-right: 10px;">
                                            <i class="zmdi zmdi-edit mx-auto"></i>
                                        </a>
                                    
                                        <form style="display:inline" action="{{ route('examsetups.destroy', $examsetup->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }" class="btn btn-icon btn-sm btn-danger btn-icon-mini d-flex align-items-center" title="Delete Exam">
                                                <i class="zmdi zmdi-delete mx-auto"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
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
            <div class="card-footer text-center d-flex justify-content-center">
                <a href="{{ route('examsetups.create') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="Add">
                    <i class="material-icons">add</i>
                </a>
                
            </div>
        </div>
 
        

</x-backend.layouts.master>