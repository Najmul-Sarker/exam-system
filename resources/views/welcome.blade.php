<x-backend.layouts.master>
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
               
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-assignment zmdi-hc-3x col-amber"></i></p>
                        @php
                        $questionCount = \App\Models\QuestionBank::count();
                    @endphp
                        <span>Question Bank Total Questions</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to={{$questionCount}} data-speed="2000" data-fresh-interval="700"> {{$questionCount}} </span></h3>
                        
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-assignment zmdi-hc-3x col-blue"></i></p>
                        @php
                        $totalExam = \App\Models\ExamSetup::count();
                        @endphp
                        <span>Total Exam Set</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to= {{$totalExam}} data-speed="2000" data-fresh-interval="700"> {{$totalExam}} </h3>
                        
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-shopping-basket zmdi-hc-3x"></i></p>
                        @php
                        $totalAttender = \App\Models\Examinee::where('exam_setup_id', 1)->count();
                        @endphp
                        <span>Total Attender</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to={{$totalAttender}} data-speed="2000" data-fresh-interval="700">{{$totalAttender}}</h3>
                        
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-account-box zmdi-hc-3x col-green"></i></p>
                        @php
                        $totalUser = \App\Models\User::count();
                     @endphp
                        <span>Total Users</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to= {{$totalUser}} data-speed="2000" data-fresh-interval="700">{{$totalUser}}</h3>
                        
                  </div>
               </div>
            </div>
      </div>
      </div>
   </div>
</x-backend.layouts.master>