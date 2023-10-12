<x-backend.layouts.master>
    <div class="card">
       
        <div class="card-header">
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                   <div class="body">
                    <span id="timer" class="align-right h1">00:00:00</span></div>
                   </div>
                </div>
             </div>
            
            
           <div class="body">  
            {{-- @dd($total_ques)     --}}
          <form action="{{route('answerscripts.store')}}" method="POST">
            @csrf
            <input type="hidden" name="exam_id" value="{{$examinees->exam_setup_id}}">
            <input type="hidden" name="examinee_name" value="{{$examinees->name}}">
            <input type="hidden" name="roll_no" value="{{$examinees->roll_no}}">
            <input type="hidden" name="total_ques" value="{{$total_ques}}">
            @forelse ($questions as $question)
            <div class="row">
                <div class="col-lg-12">
                    <strong><p>{{$loop->iteration}}. {{$question->question_text}} </p></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="1">
                    <label for="{{$question->id}}"> {{$question->option1}} </label>
                </div> 
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="2">
                    <label for="{{$question->id}}">{{$question->option2}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="3">
                    <label for="{{$question->id}}">{{$question->option3}}</label>
                </div> 
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="4">
                    <label for="{{$question->id}}">{{$question->option4}}</label>
                </div>
            </div>
            @empty
                
            @endforelse
            {{-- <input type="hidden" name="subject_id" value="{{$question->subject_id}}">
            <input type="hidden" name="chapter_id" value="{{$question->chapter_id}}"> --}}
            
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-lg"><i class="material-icons">check</i> <span class="icon-name"></span>Submit</button>
            </div>
          
          </form>
           
       </div>
       <div class="card-footer text-center">
        <a href="#" class="btn btn-sm bg-green">
            <i class="material-icons">list</i> <span class="icon-name"></span>
            </a>
    </div>
    <script>
        // Set the time limit in seconds (adjust this as needed)
        const timeLimit = 30 * 60; // 30 minutes
    
        function startTimer(duration, display) {
            let timer = duration, hours, minutes, seconds;
    
            const countdown = setInterval(function () {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);
    
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
    
                display.textContent = hours + ":" + minutes + ":" + seconds;
    
                if (--timer < 0) {
                    clearInterval(countdown);
                    // You can add a function to execute when the timer reaches zero here.
                    alert("Time's up!");
                }
            }, 1000); // Update the timer every 1 second
        }
    
        window.onload = function () {
            const display = document.querySelector('#timer');
            startTimer(timeLimit, display);
        };
    </script>
    
    
    

</x-backend.layouts.master>