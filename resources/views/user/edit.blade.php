<x-backend.layouts.master>
            <x-slot:title>
               My Profile
            </x-slot>
            {{-- <a href="{{ route('user.index') }}">list</a> --}}
            <div class="container mt-5">
                <div class="row justifay-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header"><h3>Edit your info</h3></div>
                            <div class="card-body">
                                <form  action="{{ route('user.update',Auth::user()->id) }}"  method="POST" enctype="multipart/form-data" >

                                    @csrf
                                    {{-- <div class="mb-3">
                                        <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        </div> --}}

                                    {{-- <div class="mb-3">Select Role:</div>
                                    <select name="role_id" id="role_id" class="form-select">
                                            <option selected disabled>Select Role</option>
                                            @foreach ($roles as $role )
                                            <option value="{{ $role->id }}"
                                                
                                            {{ $user->role_id == $role->id ? 'selected': '' }}   >{{ $role->name }}</option>
                                                
                                            @endforeach
                                    </select> --}}

                                    <div class="mb-3">
                                        <label for="description">About:</label>
                                        <textarea name="about" id="about" class="form-control" rows="5">{{ $user->about }}</textarea>
                                        @error('about')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Address:</label>
                                        <textarea name="address" id="address" class="form-control" rows="5">{{ $user->address }}</textarea>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>

                                    

                                    <div class="mb-3">
                                        <label for="phone">Phone:</label>
                                    <input type="number" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    </div>

                                    <div class="mb-3">
                                        <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="{{asset('storage/users').'/'.$user->image}}" width="100" height="110" alt="user image">
                                    @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="submit" class="form-control btn btn-primary" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
</x-backend.layouts.master>