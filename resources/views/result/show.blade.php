<x-backend.layouts.master>
    <div class="card">
        <div class="card-header">Result Details</div>
           <div class="card-body">

            {{-- @dd($resultsheet) --}}
            
            <p><b>{{ __('Examinee Name') }} : {{$resultsheet->examinee_name}} </b></p>
                        
            <p><b>{{ __('Roll No') }} :{{$resultsheet->examinee_roll_no}} </b> </p>
            <p><b>{{ __('Exam Name') }} : {{$resultsheet->exam_id}}</b> </p>
            <p><b>{{ __('Total Question') }} : </b> </p>
            <p><b>{{ __('Answered Question') }} : </b> </p>
            <p><b>{{ __('Right Answer') }} : </b> </p>
            <p><b>{{ __('Wrong Answer') }} : </b> </p>
            <p><b>{{ __('Negative Marks') }} : </b> </p>
            <p><b>{{ __('Total Marks') }} :{{$resultsheet->total_marks}} </b> </p>
            <p><b>{{ __('Status') }} :{{$resultsheet->status}} </b> </p>
              
               
           </div>
           <div class="card-footer text-center">
            <a href="#" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
       </div>

</x-backend.layouts.master>