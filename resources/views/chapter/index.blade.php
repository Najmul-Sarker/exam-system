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
                                <th>Chapter Name</th>
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
                                    <div style="display:flex ; flex-derection: row;">
                                    <a href="{{route('chapters.show',$chapter->id)}}"class="btn btn-icon btn-success btn-icon-mini d-flex align-items-center" title="Show" style="margin-right: 10px;">
                                        <i class="zmdi zmdi-eye mx-auto"></i>
                                    </a>
                                    <a href="{{route('chapters.edit',$chapter->id)}}"class="btn btn-icon btn-info btn-icon-mini d-flex align-items-center" title="Edit" style="margin-right: 10px;">
                                        <i class="zmdi zmdi-edit mx-auto"></i>
                                    </a>
                                    <form style="display:inline" action="{{route('chapters.destroy',$chapter->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }"class="btn btn-icon btn-danger btn-icon-mini d-flex align-items-center" title="Delete">
                                            <i class="zmdi zmdi-delete mx-auto"></i></button>
                                        
                                    </form>
                                </div>
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
            <div class="card-footer text-center d-flex justify-content-center">
                <a href="{{ route('chapters.create') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="Add">
                    <i class="material-icons">add</i>
                </a>
                
            </div>
        </div>

</x-backend.layouts.master>
