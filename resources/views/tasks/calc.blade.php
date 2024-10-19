<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iOS-Style Scientific Calculator</title>
    <link rel="stylesheet" href="{{ asset('css/calc.css') }}">
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
<div class="calculator">
    <div class="calculator-screen">
        <input type="text" id="display" disabled>
    </div>

    <div class="calculator-keys">
        <!-- Function buttons -->
        <button class="function" onclick="scientificFunction('2nd')">2nd</button>
        <button class="function" onclick="scientificFunction('square')">x²</button>
        <button class="function" onclick="scientificFunction('cube')">x³</button>
        <button class="function" onclick="scientificFunction('exp')">eˣ</button>
        <button class="function" onclick="scientificFunction('tenExp')">10ˣ</button>
        
        <button class="function" onclick="scientificFunction('inv')">1/x</button>
        <button class="function" onclick="scientificFunction('sqrt')">√x</button>
        <button class="function" onclick="scientificFunction('cbrt')">∛x</button>
        <button class="function" onclick="scientificFunction('ln')">ln</button>
        <button class="function" onclick="scientificFunction('log')">log₁₀</button>
        
        <!-- Operators & Numbers -->
        <button class="function" onclick="scientificFunction('sin')">sin</button>
        <button class="function" onclick="scientificFunction('cos')">cos</button>
        <button class="function" onclick="scientificFunction('tan')">tan</button>
        <button class="function" onclick="scientificFunction('pi')">π</button>
        <button class="operator" onclick="inputOperator('÷')">÷</button>

        <button onclick="inputNumber('7')">7</button>
        <button onclick="inputNumber('8')">8</button>
        <button onclick="inputNumber('9')">9</button>
        <button class="operator" onclick="inputOperator('×')">×</button>

        <button onclick="inputNumber('4')">4</button>
        <button onclick="inputNumber('5')">5</button>
        <button onclick="inputNumber('6')">6</button>
        <button class="operator" onclick="inputOperator('−')">−</button>

        <button onclick="inputNumber('1')">1</button>
        <button onclick="inputNumber('2')">2</button>
        <button onclick="inputNumber('3')">3</button>
        <button class="operator" onclick="inputOperator('+')">+</button>

        <button onclick="inputNumber('0')" class="zero">0</button>
        <button onclick="inputNumber('.')">.</button>
        
        <!-- New Clear, Delete, CE, Equals -->
        <button onclick="clearAll()" class="clear">C</button>
        <button onclick="clearEntry()" class="clear">CE</button>
        <button onclick="deleteLast()" class="clear">Del</button>
        <button class="equals" onclick="calculate()">=</button>
    </div>

</div>

<script src="{{ asset('js/calc.js') }}"></script>
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