<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PupperHouse</title>
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <?php
    session_start();
    $db = mysqli_connect('localhost','root','','pupper') or die("Unable to connect");
    $_SESSION["logged"]=0;
    $_SESSION["ID"]="";
    $_SESSION["PET"]="";
    $_SESSION["cart"]=array();
    ?>
    <h1><a href="pets.php">Pupper House</a></h1>
    <form id='navigation' method ="get" action= "">
      <?php
        if(isset($_GET["navigate"])){
          if($_GET["navigate"] == 'Adopt'){
              header("location: pets.php");
          }
          elseif($_GET["navigate"] == 'Check'){
            header("location: status.php");
          }
          elseif($_GET["navigate"] == 'Supplies'){
              header("location: supplies.php");
          }
          elseif($_GET["navigate"] == 'Appointment'){
              header("location: appointment.php");
          }
        }
      ?>
      <nav id="top_menu">
        <ul>
          <li><button name="navigate" value="Adopt" type='submit'>Adopt</button></li>
          <li><button name="navigate" value="Check" type='submit'>Check Status</button></li>
          <li><button name="navigate" value="Supplies" type='submit'>Supplies</button></li>
          <li><button name="navigate" value="Appointment" type='submit'>Get Appointment</button></li>
        </ul>
      </nav>
    </form>
    <div id="loginForm">
      <form id="login" method="post" action="">
        <p id = 'title' class='title'>Log in</p>
        <?php
          if (isset($_POST['action'])&&$_POST['action'] == 'reg')
          {
            header("location: register.php");
          }

          if($_SERVER["REQUEST_METHOD"]=="POST")
          {
            $id=$_POST['ID'];
            $pass=$_POST['passwd'];
            $query="select UserId, Passwd from Users where UserId='$id' and Passwd='$pass';";
            $result=mysqli_query($db,$query);
            $count=mysqli_num_rows($result);
            if($count!=1)
            {
              $error="wrong registration number \n or password";
            }
            else
            {
              $_SESSION["logged"]=1;
              $_SESSION["ID"]=$id;
              $query = "select * from Users where UserId='".$_SESSION['ID']."';";
              $result = mysqli_query($db,$query);
              $cart = mysqli_fetch_array($result);
              $cart_in= $cart['cart'];
              $cart = explode('+',$cart_in);
              foreach($cart as $item){
                if(isset($_SESSION["cart"][$item]))
                  $_SESSION["cart"][$item] += 1;
                else
                {
                  $_SESSION["cart"][$item] = 1;
                }
              }
            unset($_SESSION["cart"]['']);
              header("location: pets.php");
          }
      }
         ?>
        <input type="text" placeholder="ID" id='ID' name='ID' autofocus/></br>
        <input type="password" placeholder="Password" id='passwd' name='passwd'/></br>
        <?php
        if(isset($error) && !empty($error))
        {
          echo "<p id='error' style='color:red'> $error </p>";
        }
        mysqli_close($db);
       ?>
        <button type="submit" class="login">
          Log In
        </button>
        <button type="submit" name = "action" value = "reg" class="register">
        Register
        </button></br>

      </form>
    </div>


    <!-- for showing the slides of images -->

    <div class='slideshow' onclick="nextSlide()">

      <div class='slide fade'>
        <div class='numbertext'>1 / 3</div>
        <img src="images/slide1.jpg">
      </div>

      <div class='slide fade'>
        <div class='numbertext'>2 / 3</div>
        <img src="images/slide2.jpeg">
      </div>

      <div class='slide fade'>
        <div class='numbertext'>3 / 3</div>
        <img src="images/slide3.jpg">
      </div>

    </div>

    <div class="dots">
      <span class="dot" onclick='currentSlide(1)'></span>
      <span class="dot" onclick='currentSlide(2)'></span>
      <span class="dot" onclick='currentSlide(3)'></span>
    </div>
    <script type="text/javascript">
      var slideIndex = 1;
      showSlides(slideIndex);

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
      function nextSlide(){
        if(slideIndex==3)
        {
          slideIndex = 1
          showSlides(slideIndex)
        }
        else
        {
          showSlides(slideIndex++);
        }
      }
    </script>


    <!-- footer of the website -->


    <footer>
      <div><a href="apply.php">Apply</a><a href="pets.php">Adopt Pets</a>
        <a href="register.php">Register</a><a href="supplies.php">Supplies for your pet</a>
        <a href="home.php">Log In</a></div>
      <div>Copyright ThePupperHouse 2018</div>
    </footer>


  </body>
</html>
