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
                        <span>Total Questions</span>
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
                        <span>Number of Exam</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to= {{$totalExam}} data-speed="2000" data-fresh-interval="700"> {{$totalExam}} </h3>
                        
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="card text-center">
                  <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-shopping-basket zmdi-hc-3x"></i></p>
                        @php
                        $totalExaminee = \App\Models\Examinee::count();
                        @endphp
                        <span>Total Examinee</span>
                        <h3 class="m-b-10 number count-to" data-from="0" data-to={{$totalExaminee}} data-speed="2000" data-fresh-interval="700">{{$totalExaminee}}</h3>
                        
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
    {{-- table-color-start --}}
      <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Solid Color</strong> background <small>Add Class <code>.bg-pink</code></small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
									<li><a href="javascript:void(0);" class="boxs-close">Delete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Class name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-blue">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>.bg-blue</td>
                                </tr>
                                <tr class="bg-cyan">
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>.bg-cyan</td>
                                </tr>
                                <tr class="bg-amber">
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>.bg-amber</td>
                                </tr>
                                <tr class="bg-blush">
                                    <th scope="row">4</th>
                                    <td>Larry</td>
                                    <td>Jellybean</td>
                                    <td>.bg-blush</td>
                                </tr>
                                <tr class="bg-purple">
                                    <th scope="row">5</th>
                                    <td>Larry</td>
                                    <td>Kikat</td>
                                    <td>.bg-purple</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Gradient Color</strong> background <small>Add Class <code>.l-pink</code></small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
									<li><a href="javascript:void(0);" class="boxs-close">Delete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Class name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="l-pink">
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>.l-pink</td>
                                </tr>
                                <tr class="l-turquoise">
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>.l-turquoise</td>
                                </tr>
                                <tr class="l-parpl">
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>.l-parpl</td>
                                </tr>
                                <tr class="l-blue">
                                    <th scope="row">4</th>
                                    <td>Larry</td>
                                    <td>Jellybean</td>
                                    <td>.l-blue</td>
                                </tr>
                                <tr class="l-blush">
                                    <th scope="row">5</th>
                                    <td>Larry</td>
                                    <td>Kikat</td>
                                    <td>.l-blush</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{-- table-color-end --}}

      </div>
   </div>
   
</x-backend.layouts.master>