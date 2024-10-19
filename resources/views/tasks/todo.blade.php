<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link rel="stylesheet" href="{{ asset('css/todo.css') }}">
    <link rel="icon" href="{{ asset('favicon2.ico') }}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"> 
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
    <!-- @if(Auth::user()->name==='Surya')
    <form method="GET" action="{{ route('admin.admin') }}" style="float: left;">
                @csrf                
                <button type="submit" class="panel">Admin</button>
            </form>
            @endif
    <form method="POST" action="{{ route('admin.logout') }}" style="float: right;">
                @csrf
                
                <button type="submit" class="btn-danger">Logout</button>
            </form> -->

        <div class="todo-app">

            <h1> <img src="{{ asset('images/logo2.png') }}" alt="logo"> BIT</h1>
            
        
            <h2><img src="{{ asset('images/icon.png') }}" alt="icon"> To-do List </h2>
            <!-- <h2>To-do List </h2> -->
            


            
            <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="row">
              
                <input type="text" id="input-box" name="task" placeholder="ADD Your text" required>
                <button type="submit">Add </button>
             </div>

             </form>  
            
         @if ($tasks->isEmpty())
                 <p>No tasks available.</p>
             @else
 
             <!-- <ul id="list-container">
                @foreach($tasks as $task)
                    <li class="{{ $task->is_completed ? 'checked' : '' }}">
                        {{ $task->task }}
                    </li>
                @endforeach
            </ul>  -->

            <ul id="list-container">
              @foreach($tasks as $task)
                  <li class="{{ $task->is_completed ? 'checked' : '' }}">
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                     @csrf
                     @method('PATCH')
                     <input type="checkbox" name="is_completed" 
                       onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }} 
                       style="display: none;">
                     <!-- <input type="checkbox" name="is_completed" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}> -->
                     <span style="cursor: pointer;" onclick="this.previousElementSibling.click()">
                     {{ $task->task }}
                     </span>
                    </form>
         @if ($task->is_completed)
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline; float: right;">
                @csrf
                @method('DELETE')
                <span onclick="this.parentElement.submit();" style="cursor: pointer; color: grey;">&#x2716;</span> <!-- Cross symbol -->
            </form>
        @endif  
                  </li>
              @endforeach
            </ul>

         @endif
         
        </div>
    </div>
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