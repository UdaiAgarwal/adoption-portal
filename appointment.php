<!DOCTYPE html>
<html>
<head>
	<title>Apply for Adoption</title>
	<link rel="stylesheet" href="apply.css">
</head>
<body>
	<h1><a href="pets.php">VET Appointment Form</a></h1>
	<form id='navigation' method ="get" action= "">
      <?php
        session_start();
    // userID
      if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='')
      {
        echo "<div id='parent_user'><div id='user'>Hello ".$_SESSION["ID"]."</div></div>";
      }
      else{
        header('location: home.php');
      }
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
          elseif($_GET["navigate"] == 'Cart'){
            header("location: cart.php");
          }
					elseif($_GET["navigate"] == 'Log'){
            header("location: home.php");

          }
        }
      ?>
      <nav id="top_menu">
        <ul>
          <li><button name="navigate" value="Adopt" type='submit'>Adopt</button></li>
          <li><button name="navigate" value="Check" type='submit'>Check Status</button></li>
          <li><button name="navigate" value="Supplies" type='submit'>Supplies</button></li>
          <li><button name="navigate" value="Appointment" type='submit' style="border-radius: 6px; background: #f1f1f1">Get Appointment</button></li>
          <li><button name="navigate" value="Cart" type='submit'>Cart</button></li>
					<li><button name="navigate" value="Log" type='submit' id='log'>LOGOUT</button></li>
				</ul>
      </nav>
    </form>
    <center>
	<form id = 'adopt' method="post">
    
		<p><span id="necessary">*</span>Name Of Pet:</p><input type='text' id = 'name' name = 'name' required><br>
   
		<p><span id="necessary">*</span>Age</p><input type='number' id = 'age' name = 'age' min=0 max=20 value =0 required><br>

		<p><span id="necessary">*</span>Breed: </p><input type='text' id = 'phoneNo' name = 'phoneNo' required><br>

		<p>Gender:</p>
		<ul>
		<li><input type="radio" value="yes" name='gender'><label>Male</label></li>
		<li><input type="radio" value="no" name='gender'><label>Female</label></li>
		</ul>

		<p>Emergency:</p>
		<ul>
		<li><input type="radio" value="yes" name='emergency'><label>Yes</label></li>
		<li><input type="radio" value="no" name='emergency'><label>No</label></li>
		</ul>
    
		<p><span id="necessary">*</span>Appointment:</p>
		<input type="date" name="date" class = 'datetime' min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
		<input type="time" name="time" class = 'datetime' min= "08:00" value="11:00" max="20:00" required><br>


		<p>Date of last vaccination: </p>
		<input type="date" max="<?php echo date('Y-m-d'); ?>" name="vaccination">

		<p>Brief history / Symptoms:</p>
		<textarea rows=4 cols=75></textarea>

		<input type="submit" name='submit' id="application" value = 'Submit'>
    <?php 
      if(isset($_POST['submit']) && $_POST['submit']=='Submit')
      {
        echo "<script>alert('Your form has been submitted')</script>";
      }
     ?>
	</form>
	</center>

    <!-- footer of the website -->


    <footer>
      <div><a href="apply.php">Apply</a><a href="pets.php">Adopt Pets</a>
        <a href="register.php">Register</a><a href="supplies.php">Supplies for your pet</a>
        <a href="home.php">Log In</a></div>
      <div>Copyright ThePupperHouse 2018</div>
    </footer>
</body>
</html>