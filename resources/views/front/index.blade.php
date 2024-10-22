<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front-page</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">  
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
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
                        <a href="{{ route('front.index') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                     
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
           
            @if(Auth::user()->id == 1)            
            <li class="">
            <form  id="admin-form" method="GET" action="{{ route('admin.admin') }}" style="float: left;">
            @csrf
                </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('admin-form').submit();">
                        <i class='bx bx-user icon' ></i>
                        <span class="text nav-text">Admin</span>
                    </a>
                    </form>
                </li>
            @endif
           
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
                <!-- <section class="home">
                   <img  class="bit1" src="{{ asset('images/bit3.png') }}" alt="image">     -->
                   <!-- <div class="text">Dashboard Sidebar</div> -->
                <!-- </section> -->
                
            </div>
            
        </div>

    </nav>

   

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
})


sidebar.addEventListener('mouseenter', () => {
            sidebar.classList.remove("close");
        });

        // Close sidebar when mouse leaves
        sidebar.addEventListener('mouseleave', () => {
            sidebar.classList.add("close");
        });
    </script>

</body>
</html>
