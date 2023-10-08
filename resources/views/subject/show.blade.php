<x-backend.layouts.master>
    <div class="card">
        <div class="card-header">Subject Details</div>
           <div class="card-body">
            
            
            <p><b>{{ __('Subject Title') }} : </b> {{ $subject->title }}</p>
            <p><b>{{ __('Description') }} : </b> {{ $subject->description }}</p>
              
               
           </div>
           <div class="card-footer text-center">
            <a href="{{route('subjects.index')}}" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
       </div>

</x-backend.layouts.master>