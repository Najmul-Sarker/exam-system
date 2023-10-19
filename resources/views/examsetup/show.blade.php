<x-backend.layouts.master>
    <x-slot:title>
                Exam Setup
    </x-slot>
    <div class="card">
        <div class="card-header">Exam Details</div>
           <div class="card-body">
            
            
            <p><b>{{ __('Title') }} : </b> {{ $examsetup->title }}</p>
            <p><b>{{ __('Duration') }} : </b> {{ $examsetup->duration }}</p>
            <p><b>{{ __('Total Question') }} : </b> {{ $examsetup->total_question }}</p>
            <p><b>{{ __('Easy Question') }} : </b> {{ $examsetup->easy_question }}</p>
            <p><b>{{ __('Hard Question') }} : </b> {{ $examsetup->hard_question }}</p>
            <p><b>{{ __('Question Description') }} : </b> {{ $examsetup->question_description }}</p>
            <p><b>{{ __('Start Time') }} : </b> {{ $examsetup->start_at }}</p>
            <p><b>{{ __('End Time') }} : </b> {{ $examsetup->end_at }}</p>
              
               
           </div>
           <div class="card-footer text-center">
            <a href="{{route('examsetups.index')}}" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
       </div>

</x-backend.layouts.master>