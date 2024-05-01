<!DOCTYPE html>
<html>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {font-family: "Figtree", sans-serif;}
    .w3-bar-block .w3-bar-item {
    padding: 16px;
    font-weight: bold;
  }
</style>
<body>

<nav 
  class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" 
  style="z-index:3;width:250px;" id="mySidebar"
>
  <a 
    class="w3-bar-item w3-button w3-border-bottom w3-large" 
    href="#"><img src="https://www.w3schools.com/images/w3schools.png" 
    style="width:80%;">
  </a>
  <a 
    class="w3-bar-item w3-button w3-hide-large w3-large" 
    href="javascript:void(0)" 
    onclick="w3_close()">
      Close 
      <i class="fa fa-remove"></i>
  </a>
  <a class="w3-bar-item w3-button" href="#">Dashboard</a>
  <div>
    <a class="w3-bar-item w3-button" 
       onclick="myAccordion('classes')" 
       href="javascript:void(0)">
        Classes 
        <i class="fa fa-caret-down"></i>
    </a>
    <div id="classes" class="w3-hide">
      <a 
        class="w3-bar-item w3-button" 
        href="{{ route('classroom.list') }}"
        wire:navigate
      >
        Lista de classes</a>
      <a 
        class="w3-bar-item w3-button" 
        href="{{ route('classroom.create') }}"
        wire:navigate
      >
        Adicionar nova
      </a>
    </div>
  </div>
  <div>
    <a class="w3-bar-item w3-button" 
       onclick="myAccordion('alunos')" 
       href="javascript:void(0)">
        Alunos 
        <i class="fa fa-caret-down"></i>
    </a>
    <div id="alunos" class="w3-hide">
      <a 
        class="w3-bar-item w3-button" 
        href="{{ route('student.list') }}"
        wire:navigate
      >
          Lista de alunos
      </a>
      <a 
        class="w3-bar-item w3-button" 
        href="{{ route('student.create') }}"
        wire:navigate
      >
          Adicionar novo
      </a>
    </div>
  </div>
</nav>

<div 
  class="w3-overlay w3-hide-large w3-animate-opacity" 
  onclick="w3_close()" 
  style="cursor:pointer" 
  id="myOverlay">
</div>

<div class="w3-main" style="margin-left:250px;">
  <div id="myTop" class="w3-container w3-top w3-theme w3-large">
    <p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
    <span id="myIntro" class="w3-hide">W3.CSS: Introduction</span></p>
  </div>

  <header class="w3-container w3-theme" style="padding:16px 8px">
    <h1 class="w3-xxxlarge">W3.CSSS</h1>
  </header>

  <div class="w3-container" style="padding:32px">
    {{ $slot }}
  </div>
</div>

<script>
// Open and close the sidebar on medium and small screens
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
    document.getElementById("myIntro").classList.add("w3-show-inline-block");
  } else {
    document.getElementById("myIntro").classList.remove("w3-show-inline-block");
    document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
  }
}

// Accordions
function myAccordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme", "");
  }
}
</script>
     
</body>
</html> 
