<x-backend.layouts.master>

    <x-slot:title>
                Subject
    </x-slot>

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
                <h2>{{__("Subject List")}}</h2>
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
                                <th class="text-center">Ser</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">User Type</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">About</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->user_type}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ Str::limit($user->about, 20, '...') }}</td>
                                <td>{{ Str::limit($user->address, 20, '...') }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="text-center"><img src="{{asset('storage/users').'/'.$user->image}}" width="100" height="110" alt="profile image"></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                    <a href=""class="btn btn-sm btn-icon btn-success btn-icon-mini d-flex align-items-center" title="Show" style="margin-right: 10px;">
                                        <i class="zmdi zmdi-eye mx-auto"></i>
                                    </a>
                                    <a href="{{route('user.edit',$user->id)}}"class="btn btn-sm btn-icon btn-info btn-icon-mini d-flex align-items-center" title="Edit" style="margin-right: 10px;">
                                        <i class="zmdi zmdi-edit mx-auto"></i>
                                    </a>
                                    {{-- <form style="display:inline" action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){ this.closest('form').submit(); }" class="btn btn-sm btn-icon btn-danger btn-icon-mini d-flex align-items-center" title="Delete">
                                            <i class="zmdi zmdi-delete mx-auto"></i>
                                        </button>
                                        
                                    </form> --}}
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center d-flex justify-content-center">
                <a href="{{ route('subjects.create') }}" class="btn btn-sm btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="Add">
                    <i class="material-icons">add</i>
                </a>
                
            </div>
            
        </div>
        

</x-backend.layouts.master>