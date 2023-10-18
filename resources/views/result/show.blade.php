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
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Examinee Name') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$resultsheet->examinee_name}}</strong></td>
                                </tr>
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Roll No') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$resultsheet->examinee_roll_no}}</strong></td>
                                </tr>
                               
                                
                                @foreach ($examsetups as $examsetup)
                                @if($examsetup->id==$resultsheet->exam_id)
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Exam Name') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$examsetup->title}}</strong></td>
                                </tr>
                                @endif
                                    
                                @endforeach
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Total Mark') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$total_marks}}</strong></td>
                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Total Question') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$total_question}}</strong></td>
                                </tr>
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Answered Question') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$answered_question}}</strong></td>
                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Right Answer') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$right_answer}}</strong></td>
                                </tr>
                                
                                
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Wrong Answer') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$wrong_answer}}</strong></td>

                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Negative Marks') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$negative_marks}}</strong></strong></td>
                                </tr>
                                <tr class="xl-blue">
                                    <td></td>
                                    <th scope="row">{{ __('Get Marks') }}</th>
                                    <td>:</td>
                                    <td><strong>{{$resultsheet->total_marks}}</strong></td>
                                </tr>
                                <tr class="xl-turquoise">
                                    <td></td>
                                    <th scope="row">{{ __('Status') }}</th>
                                    <td>:</td>
                                    @if ($resultsheet->status == 'passed')
                                        <td><span class=""><strong style="font-size: 15px; color:green;">PASSED</strong></span></td>
                                    @elseif ($resultsheet->status == 'failed')
                                        <td><span class=""><strong style="font-size: 15px;color:RED;">FAILED</strong></span></td>
                                    @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</x-backend.layouts.master>