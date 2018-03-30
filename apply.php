<!DOCTYPE html>
<html>
<head>
	<title>Apply for Adoption</title>
	<link rel="stylesheet" href="apply.css">
</head>
<body>
	<h1><a href="pets.php">Apply for adoption here!</a></h1>
	<form id='navigation' method ="get" action= "">
      <?php
        session_start();
    // userID
      if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='')
      {
        echo "<div id='parent_user'><div id='user'>pet ID: ".$_SESSION["PET"]."</div><div id='user'>Hello ".$_SESSION["ID"]."</div></div>";
      }
      else{
        header('location: home.php');
      }
				if($_SESSION["PET"]=='')
					header('location: pets.php');

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
          <li><button name="navigate" value="Appointment" type='submit'>Get Appointment</button></li>
          <li><button name="navigate" value="Cart" type='submit'>Cart</button></li>
					<li><button name="navigate" value="Log" type='submit' id='log'>LOGOUT</button></li>
				</ul>
      </nav>
    </form>
    <center>
	<form id = 'adopt' method = "post">
    
		<p><span id="necessary">*</span>Name</p><input type='text' id = 'name' name = 'name' required><br>

		<p><span id="necessary">*</span>Age</p><input type='number' id = 'age' name = 'age' min=18 max = 80 value = 18 required><br>

		<p><span id="necessary">*</span>Phone Number</p><input type='text' id = 'phoneNo' name = 'phoneNo' maxlength="10" minlength="10" required><br>

		<p>Address</p>
		<textarea rows=4 cols = 75></textarea><br>

		<p>Email</p><input type='email' id = 'mail' name = 'mail'><br>

		<p>Why do you want to adopt?</p>
		<textarea rows=4 cols=75></textarea><br>

		<p>Do you consider your house and surroundings suitable for the pet?</p>
		<ul>
      <li><input type="radio" value="yes" name='surroundings'><label>Yes</label></li>
  		<li><input type="radio" value="no" name='surroundings'><label>No</label></li>
  		<li><input type="radio" value="maybe" name='surroundings'><label>Maybe</label></li>
    </ul>
		<p>What is your occupation?</p>
		<input type="text" name="occupation" id = 'occupation'><br>

		<p>Do you have enough free time in the day for the pet?(It's a huge responsibility)</p>
		<ul><li><input type="radio" value="yes" name='time'><label>Yes</label></li>
		<li><input type="radio" value="no" name='time'><label>No</label></li>
		<li><input type="radio" value="maybe" name='time'><label>Maybe</label></li></ul>
    <input type="submit" name='submit' id="application" value = 'Submit'>
    <?php 
      if(isset($_POST['submit']) && $_POST['submit']=='Submit')
      {
        echo "<script>alert('Your form has been submitted')</script>";
      }
     ?>

	</form>
	</center>
	<p id="terms">*Our representatives will cross-check the information provided by you and would do a home visit to make sure our little pet is in the right hands and safe environment. If you are sure you are suitable and up for this responsibility then "SUBMIT" the form to apply to register yourseld as an adopter and we'll notify you if and when you're selected.<br/>
	GOOD LUCK!<br/>May the odds be in your favour :)</p>



    <!-- footer of the website -->


    <footer>
      <div><a href="apply.php">Apply</a><a href="pets.php">Adopt Pets</a>
        <a href="register.php">Register</a><a href="supplies.php">Supplies for your pet</a>
        <a href="home.php">Log In</a></div>
      <div>Copyright ThePupperHouse 2018</div>
    </footer>


</body>
</html>
