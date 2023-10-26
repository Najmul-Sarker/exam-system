<x-backend.layouts.master>
    <x-slot:title>
                Exam Setup
    </x-slot>
        <div class="card">
            <div class="header">
                @foreach ($answerscripts as $answer)
                    
                @endforeach
                
                <h2 class="text-orange">{{__("Examinee Result Details")}}</h2>
                    <p class="text-success"><b>{{ __('Examinee Name') }} : {{$answer->examinee_name}} </b></p>   
                    <p class="text-success"><b>{{ __('Roll No') }} :{{$answer->roll_no}} </b></p>
                <ul class="header-dropdown">
                   
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead class="bg-teal">
                            <tr>
                                <th>Sl</th>
                                <th>Question Text</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Correct Answer</th>
                                <th>Submitted Answer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($answerscripts as $answerscript)
                            <tr>
                                <td>{{$loop->iteration}}</td>
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
                <a href="{{ route('examsetups.index') }}" class="btn btn-sm btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                    <i class="material-icons">list</i>
                </a>
                
            </div>
        </div>
        

</x-backend.layouts.master>