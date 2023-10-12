<x-backend.layouts.master>

        <div class="card">
            <div class="header">
                <h2>{{__("Examinee Result Details")}}</h2>
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
                                <th>Examinee Name</th>
                                <th>Roll No</th>
                                <th>Question Text</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Correct Answer</th>
                                <th>Submitted Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($answerscripts as $answerscript)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$answerscript->examinee_name}}</td>
                                <td>{{$answerscript->roll_no}}</td>
                                <td>{{$answerscript->question_text}}</td>
                                <td>{{$answerscript->option1}}</td>
                                <td>{{$answerscript->option2}}</td>
                                <td>{{$answerscript->option3}}</td>
                                <td>{{$answerscript->option4}}</td>
                                <td>{{$answerscript->correcct_answer}}</td>
                                <td>{{$answerscript->submitted_answer}}</td>
                                @if ($answerscript->status=='right')
                                    <td><span class="badge bg-teal">{{$answerscript->status}} </span></td>
                                    @elseif($answerscript->status=='wrong')
                                    <td><span class="badge bg-red">{{$answerscript->status}} </span></td>
                                    @endif
                                <td>
                                    <a href="">Show</a>
                                    <a href="">Edit</a>
                                    <form style="display:inline" action="" method="POST">
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