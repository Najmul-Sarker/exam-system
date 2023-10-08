<x-backend.layouts.master>
    <div class="card">
        <div class="card-header">Chapter Details</div>
           <div class="card-body">
            
            
            <p><b>{{ __('Subject Name') }} : </b> {{ $chapter->subject->title }}</p>
            <p><b>{{ __('Title') }} : </b> {{ $chapter->title }}</p>
            <p><b>{{ __('Description') }} : </b> {{ $chapter->description }}</p>
              
               
           </div>
           <div class="card-footer text-center">
            <a href="{{route('chapters.index')}}" class="btn btn-sm bg-green">
                <i class="material-icons">list</i> <span class="icon-name"></span>
                </a>
        </div>
       </div>

</x-backend.layouts.master>