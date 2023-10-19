<x-backend.layouts.master>
    <x-slot:title>
                Exam Setup
    </x-slot>
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
            <h2>{{__("Exam attender List Page")}}</h2>
            <ul class="header-dropdown">
               
                <li class="remove">
                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                </li>
            </ul>
        </div>
        {{-- @dd($examineelists); --}}
        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead class="bg-grey">
                        <tr>
                            <th>Sl</th>
                            <th>Examinee Name</th>
                            <th>Roll No</th>
                            <th>Total Marks</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($examineelists as $examineelist)
                            @php
                                // Find the corresponding result for this examinee
                                $result = $results->where('examinee_roll_no', $examineelist->roll_no)->first();
                            @endphp
                    
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$examineelist->name}}</td>
                                <td>{{$examineelist->roll_no}}</td>
                    
                                @if ($result)

                                    <td>{{$result->total_marks}}</td>
                                    @if ($result->status=='passed')
                                    <td><span class="badge bg-teal">{{$result->status}} </span></td>
                                    @elseif($result->status=='failed')
                                    <td><span class="badge bg-red">{{$result->status}} </span></td>
                                    @endif
                                @else
                                    <td>N/A</td>
                                    <td>N/A</td>
                                @endif
                                
                                <td>
                                    <div style="display: flex; flex-direction: row;">
                                    <a href="{{ route('examsetup.individualresult', $examineelist->roll_no) }}"class="btn btn-icon btn-success btn-icon-mini d-flex align-items-center" title="Individual Result Show" style="margin-right: 10px;"><i class="zmdi zmdi-eye mx-auto"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No Records Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="card-footer text-center d-flex justify-content-center">
            <a href="{{ route('examsetups.index') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
    </div>
    

</x-backend.layouts.master>