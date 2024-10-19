<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Timer</title>
  <link rel="stylesheet" href="{{ asset('css/timer.css') }}">
      <link rel="stylesheet" href="{{ asset('css/index.css') }}"> 
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
 
</head>
<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </span>

                <div class="text logo-text">
                <!-- <img src="{{ asset('images/logo2.png') }}" alt="logo">     -->
                    <!-- <h2><img src="{{ asset('images/logo2.png') }}" alt="logo" style="width: 50px; height: auto;">BIT</h2> -->
                    <span class="name">BIT</span>
                    <!-- <span class="profession">Web developer</span> -->
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('tasks.calc') }}">
                            @method('GET')
                            <i class='bx bx-calculator icon' ></i>
                            <span class="text nav-text">Calculator</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('tasks.timer') }}">
                        @method('GET')
                            <i class='bx bx-timer icon' ></i>
                            <span class="text nav-text">Timer</span>
                        </a>
                    </li>

                    <li class="nav-link">
                       
                    <a href="{{ route('tasks.todo') }}">
                        @method('GET')
                            <i class='bx bx-clipboard icon'></i>
                            <span class="text nav-text">Todo-app</span>
                        </a>
                        
                    </li>


                    <!-- <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li> -->



                </ul>
            </div>

            <div class="bottom-content">
           
                <li class="">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                     @csrf
                </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
  <div class="container">

    <h1>Enhanced Timer</h1>
    
    <!-- Display the timer -->
    <div id="display">
      00:00:00
    </div>

    <!-- Circular progress bar -->
    <div class="progress-circle" id="progressCircle"></div>

    <!-- Set timer manually -->
    <div class="manual-timer">
      <h3>Custom Timer</h3>
      <input type="number" id="hours" value="0" min="0" placeholder="Hours">
      <input type="number" id="minutes" value="0" min="0" placeholder="Minutes">
      <input type="number" id="seconds" value="0" min="0" placeholder="Seconds">
      <button onclick="setTimer()">Set Timer</button>
    </div>

    <!-- Predefined timer options -->
    <div class="predefined-timer">
      <h3>Quick Set</h3>
      <select id="timer-options">
        <option value="300">5 minutes</option>
        <option value="600">10 minutes</option>
        <option value="900">15 minutes</option>
      </select>
      <button onclick="startPredefinedTimer()">Start</button>
    </div>

    <!-- Control buttons -->
    <div class="controls">
      <button id="startBtn" onclick="startTimer()">Start</button>
      <button id="pauseBtn" onclick="pauseTimer()">Pause</button>
      <button id="resetBtn" onclick="resetTimer()">Reset</button>
    </div>
  </div>

  <!-- Sound alert -->
  <audio id="alertSound" src="alert.mp3"></audio>

  <script src="{{ asset('js/timer.js') }}"></script>
  <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>

</body>
</html>