<x-backend.layouts.master>
    <x-slot:title>
                Chapter
    </x-slot>
    <div class="card">
        <div class="card-header">Chapter Details</div>
           <div class="body">
            
            
            <p><b>{{ __('Subject Name') }} : </b> {{ $chapter->subject->title }}</p>
            <p><b>{{ __('Chapter Name') }} : </b> {{ $chapter->title }}</p>
            <p><b>{{ __('Description') }} : </b> {{ $chapter->description }}</p>
              
               
           </div>
           <div class="card-footer text-center d-flex justify-content-center">
            <a href="{{ route('chapters.index') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
       </div>

</x-backend.layouts.master>