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
                <h2>{{__("Result List Page")}}</h2>
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
                                <th>{{ __('Exam Name') }}</th>
                                <th>{{ __('Examinee Name') }}</th>
                                <th>{{ __('Roll No') }}</th>
                                <th>{{ __('Get Marks') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $result)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @foreach ($examsetups as $examsetup)
                                    @if($examsetup->id ==$result->exam_id)
                                        {{$examsetup->title}}
                                        @endif
                                    @endforeach
                                </td>
                               
                                <td>{{$result->examinee_name}}</td>
                                <td>{{$result->examinee_roll_no}}</td>
                                <td>{{$result->total_marks}}</td>
                                <td>{{$result->status}}</td>
                                <td>
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