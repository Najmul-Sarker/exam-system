<x-backend.layouts.master>
    <x-slot:title>
        Subject
    </x-slot>
    <div class="card">
        <div class="card-header">Subject Details</div>
           <div class="card-body">
            
            
            <p><b>{{ __('Subject Title') }} : </b> {{ $subject->title }}</p>
            <p><b>{{ __('Description') }} : </b> {{ $subject->description }}</p>
              
               
           </div>
           <div class="card-footer text-center d-flex justify-content-center">
            <a href="{{ route('subjects.index') }}" class="btn btn-icon btn-success btn-icon-mini d-flex justify-content-center align-items-center" title="List">
                <i class="material-icons">list</i>
            </a>
            
        </div>
       </div>

</x-backend.layouts.master>