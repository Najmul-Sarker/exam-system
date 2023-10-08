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
                <h2>{{__("Chapter List Page")}}</h2>
                <ul class="header-dropdown">
                   
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead class="bg-grey">
                            <tr>
                                <th>Sl</th>
                                <th>Subject Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($chapters as $chapter)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$chapter->subject->title}}</td>
                                <td>{{$chapter->title}}</td>
                                <td> {{$chapter->description}} </td>
                                <td>
                                    <a href="{{route('chapters.show',$chapter->id)}}">Show</a>
                                    <a href="{{route('chapters.edit',$chapter->id)}}">Edit</a>
                                    <form style="display:inline" action="{{route('chapters.destroy',$chapter->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }">Delete</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer text-center">
                <a href="{{route('chapters.create')}}" class="btn btn-sm bg-green">
                    <i class="material-icons">add</i>
                    </a>
            </div>
        </div>

</x-backend.layouts.master>
