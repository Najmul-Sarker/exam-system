<x-backend.layouts.master>

    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                       <h2>Result Details</h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            
                            <tbody>
                                <tr class="xl-pink">
                                    <td></td>
                                    <th scope="row">{{ __('Examinee Name') }}</th>
                                    <td>:</td>
                                    <td>{{$resultsheet->examinee_name}}</td>
                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Roll No') }}</th>
                                    <td>:</td>
                                    <td>{{$resultsheet->examinee_roll_no}}</td>
                                </tr>
                               
                                
                                @foreach ($examsetups as $examsetup)
                                @if($examsetup->id==$resultsheet->exam_id)
                                <tr class="xl-parpl">
                                    <td></td>
                                    <th scope="row">{{ __('Exam Name') }}</th>
                                    <td>:</td>
                                    <td>{{$examsetup->title}}</td>
                                </tr>
                                @endif
                                    
                                @endforeach
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Total Mark') }}</th>
                                    <td>:</td>
                                    <td>{{$total_marks}}</td>
                                </tr>
                                <tr class="xl-khaki">
                                    <td></td>
                                    <th scope="row">{{ __('Total Question') }}</th>
                                    <td>:</td>
                                    <td>{{$total_question}}</td>
                                </tr>
                                <tr class="xl-pink">
                                    <td></td>
                                    <th scope="row">{{ __('Answered Question') }}</th>
                                    <td>:</td>
                                    <td>{{$answered_question}}</td>
                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Right Answer') }}</th>
                                    <td>:</td>
                                    <td>{{$right_answer}}</td>
                                </tr>
                                
                                
                                <tr class="xl-parpl">
                                    <td></td>
                                    <th scope="row">{{ __('Wrong Answer') }}</th>
                                    <td>:</td>
                                    <td>{{$wrong_answer}}</td>

                                </tr>
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Negative Marks') }}</th>
                                    <td>:</td>
                                    <td>{{$negative_marks}}</td>
                                </tr>
                                <tr class="xl-khaki">
                                    <td></td>
                                    <th scope="row">{{ __('Get Marks') }}</th>
                                    <td>:</td>
                                    <td>{{$resultsheet->total_marks}}</td>
                                </tr>
                                <tr class="xl-pink">
                                    <td></td>
                                    <th scope="row">{{ __('Status') }}</th>
                                    <td>:</td>
                                    @if ($resultsheet->status=='passed')
                                    <td><span class="badge bg-teal">{{$resultsheet->status}} </span></td>
                                    @elseif($resultsheet->status=='failed')
                                    <td><span class="badge bg-red">{{$resultsheet->status}} </span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</x-backend.layouts.master>