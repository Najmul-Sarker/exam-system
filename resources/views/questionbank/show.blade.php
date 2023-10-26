<x-backend.layouts.master>
    <x-slot:title>
                Question Bank
    </x-slot>
    <div class="card">
        <div class="card-header bg-teal">Question Details</div>
           <div class="card-body">
            
            <p><b>{{ __('Subject Name') }} : </b>
                @foreach ($subjects as $subject )
                    @if ($subject->id == $questionbank->subject_id)
                    {{ $subject->title }}</p>
                        
                    @endif
                @endforeach
            <p><b>{{ __('Chapter Name') }} : </b> {{ $questionbank->chapter->title }}</p>
            <p><b>{{ __('Question Text') }} : </b> {{ $questionbank->question_text }}</p>
            <p><b>{{ __('Option 1') }} : </b> {{ $questionbank->option1 }}</p>
            <p><b>{{ __('Option 2') }} : </b> {{ $questionbank->option2 }}</p>
            <p><b>{{ __('Option 3') }} : </b> {{ $questionbank->option3 }}</p>
            <p><b>{{ __('Option 4') }} : </b> {{ $questionbank->option4 }}</p>
            <p><b>{{ __('Correct Answer') }} : </b> {{ $questionbank->correcct_answer }}</p>
            <p><b>{{ __('Question Level') }} : </b> {{ $questionbank->question_level }}</p>
            <p><b>{{ __('Marks') }} : </b> {{ $questionbank->marks }}</p>
            <p><b>{{ __('Question Type') }} : </b> {{ $questionbank->type }}</p>
              
               
           </div>
           <div class="card-footer text-center d-flex justify-content-center">
            <a href="{{ route('questionbanks.index') }}" class="btn btn-sm btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
       </div>

</x-backend.layouts.master>