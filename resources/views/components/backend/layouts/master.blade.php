<x-backend.layouts.partials.header/>
<x-backend.layouts.partials.sidebar/>
<section class="content home">
    <div class="container-fluid">
        <x-backend.layouts.partials.nav/>
        {{$slot}}
    </div>
</section>
<x-backend.layouts.partials.js/>

