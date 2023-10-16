<x-backend.layouts.master>
    <div class="card ">
       
        <div class="card-header">
            <div class="row">
                <div class="col-lg-3">
                    <p><b>{{ __('Examinee Name') }} : {{$examinees->name}} </b></p>
                        
                    <p><b>{{ __('Roll No') }} :{{$examinees->roll_no}} </b></p>
        
                    <p><b>{{ __('Exam Name') }} : {{$exam_name}}</b> </p>
                    
                </div>
                <div class="col-lg-3 col-md-6 ml-auto d-flex align-items-center justify-content-center">
                    <div class="bg-green p-2 rounded">
                        <span id="timer" class="h1">00:00:00</span>
                    </div>
                </div>
            </div>
        </div>
        
            
            
           <div class="body ml-20%">
          <form action="{{route('answerscripts.store')}}"  method="POST">
            @csrf
            <input type="hidden" name="exam_id" value="{{$examinees->exam_setup_id}}">
            <input type="hidden" name="examinee_name" value="{{$examinees->name}}">
            <input type="hidden" name="roll_no" value="{{$examinees->roll_no}}">
            <input type="hidden" name="total_ques" value="{{$total_ques}}">
            @forelse ($questions as $question)
            <div class="row ml-5">
                <div class="col-lg-12">
                    <strong><p>{{$loop->iteration}}. {{$question->question_text}} </p></strong>
                </div>
            </div>
            <div class="row ml-5">
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="1">
                    <label for="{{$question->id}}"> {{$question->option1}} </label>
                </div> 
                <div class="col-lg-6">
                    <input type="radio" name="{{$question->id}}" value="2">
                    <label for="{{$question->id}}">{{$question->option2}}</label>
                </div>
            </div>
            <div class="row ml-5">
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
            
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-md btn-info d-flex align-items-center">
                    <i class="material-icons">check</i>
                    <b>Finished Exam</b>
                </button>
            </div>
          
          </form>
           
       </div>
       <div class="card-footer text-center">
        
            
            </a>
    </div>
    <script>
        // Set the time limit in seconds (adjust this as needed)
        const timeLimit = 30 * 60; // 1 minute
    
        function startTimer(duration, display) {
            let timer = duration;
            let hours, minutes, seconds;
    
            const form = document.querySelector('#your-form-id'); // Replace 'your-form-id' with the actual ID of your form
    
            function submitFormOnTimeout() {
                clearInterval(countdown);
                form.submit();
            }
    
            const countdown = setInterval(function () {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);
    
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
    
                display.textContent = hours + ":" + minutes + ":" + seconds;
    
                if (timer <= 30) { // Change timer color to red when there are 30 seconds or less remaining
                    display.style.color = "red";
                }
    
                if (--timer < 0) {
                    submitFormOnTimeout();
                }
            }, 1000); // Update the timer every 1 second
        }
    
        window.onload = function () {
            const display = document.querySelector('#timer');
            startTimer(timeLimit, display);
        };
    </script>
    
    

    
    
    
    

</x-backend.layouts.master>