function togglePasswordVisibility() {
  const passwordInput = document.getElementById("login_password");
  const eyeIcon = document.getElementById("eye");
  const type = passwordInput.getAttribute("type");

  if (type === "password") {
      passwordInput.setAttribute("type", "text");
      eyeIcon.className = "icon ion-ios-eye-off";
      document.getElementById("password_type").innerHTML = "Hide Password"; // password is visible
  } else {
      passwordInput.setAttribute("type", "password");
      eyeIcon.className = "icon ion-ios-eye";
      document.getElementById("password_type").innerHTML = "Show Password"; // password is hidden
  }
}


function LoadPlay(source){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById('main').innerHTML = this.responseText;          
    }
  };
  xmlhttp.open("GET", source, true);
  xmlhttp.send();
}

function changeActive(index) {
  const pills = document.getElementById('menu').querySelectorAll('.nav-link');
  pills.forEach((pill, i) => {
      if (i === index) {
          pill.classList.add('active');
      } else {
          pill.classList.remove('active');
      }
  });
}

function startTimer(duration, display) {
  let timer = duration;
  let minutes, seconds;

  const interval = setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      if (--timer < 0) {
          timer = duration;
          clearInterval(interval);
          startTimer(duration, display);
      }
  }, 1000);
}

function signout(){
  window.location.href = "signout.php";
}