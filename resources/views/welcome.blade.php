<x-backend.layouts.master>
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
               
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-balance zmdi-hc-3x col-amber"></i></p>
                        @php
                        $questionCount = \App\Models\QuestionBank::count();
                    @endphp
                        <span>Total Questions</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to={{$questionCount}} data-speed="2000" data-fresh-interval="700"> {{$questionCount}} </span></h3>
                        
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-assignment zmdi-hc-3x col-blue"></i></p>
                        <span>Total Orders</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to="865" data-speed="2000" data-fresh-interval="700">865</h3>
                        <small class="text-muted">88% lower growth</small>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-shopping-basket zmdi-hc-3x"></i></p>
                        <span>Total Sales</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to="3502" data-speed="2000" data-fresh-interval="700">3502</h3>
                        <small class="text-muted">38% lower growth</small>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-account-box zmdi-hc-3x col-green"></i></p>
                        <span>New Employees</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to="78" data-speed="2000" data-fresh-interval="700">78</h3>
                        <small class="text-muted">78% lower growth</small>
                  </div>
               </div>
            </div>
      </div>
      </div>
   </div>
</x-backend.layouts.master>