<!DOCTYPE html>
<html>
<head>
	<title>PETS</title>
	<link rel="stylesheet" type="text/css" href="pet.css">
</head>
<body>
  <h1>Pets you can have!</h1>
  <?php
    session_start();
		$db = mysqli_connect('localhost','root','','pupper') or die("connection failed");
      // userID
      if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='')
      {
        echo "<div id='parent_user'><div id='user'>Hello ".$_SESSION["ID"]."</div></div>";
      }
	?>
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
          <li><button name="navigate" value="Adopt" type='submit' style="border-radius: 6px;background: #f1f1f1">Adopt</button></li>
          <li><button name="navigate" value="Check" type='submit'>Check Status</button></li>
          <li><button name="navigate" value="Supplies" type='submit'>Supplies</button></li>
          <li><button name="navigate" value="Appointment" type='submit'>Get Appointment</button></li>
          <li><button name="navigate" value="Cart" type='submit'>Cart</button></li>
          <?php
          if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='')
          {
            echo "<li><button name='navigate' value='Log' type='submit' id='log'>LOGOUT</button></li>";
          }
          else{
            echo "<li><button name='navigate' value='Log' type='submit' id='log'>LOGIN</button></li>";
          }

          ?>


        </ul>
      </nav>
    </form>
    <center>
			<form method="post" action="">
	    <?php
	    	$query = "select * from pets order by pet_ID;";
	    	$result = mysqli_query($db,$query);
	    	echo "<table id='Animals'>";
		    while($row = mysqli_fetch_array($result)){
		     	echo "<tr>";
		     	echo "<td class='dog'><img src='images/pets/".$row['Name'].".jpg'>
		     	<div class='dog text'><label>".$row['Name']." (Age: ".$row['Age']."Yr)</label>
					<button type='submit' name='pet_id' value = ".$row['pet_ID'].">Adopt</button>
					</div></td>";
		     	if($row = mysqli_fetch_array($result))
		     		echo "<td class='dog'><img src='images/pets/".$row['Name'].".jpg'>
		     	<div class='dog text'></label>".$row['Name']." (Age: ".$row['Age']."Yr)</label>
					<button type='submit' name='pet_id' value = ".$row['pet_ID'].">Adopt</button>
					</div></td>";
		     	if($row = mysqli_fetch_array($result))
		     		echo "<td class='dog'><img src='images/pets/".$row['Name'].".jpg'>
		     	<div class='dog text'><label>".$row['Name']." (Age: ".$row['Age']."Yr)</label>
					<button type='submit' name='pet_id' value = ".$row['pet_ID'].">Adopt</button>
					</div></td>";
		     	echo "</tr>";
		     }
	      	echo "</table>";
					if(isset($_POST['pet_id']))
					{
	      		$_SESSION["PET"] = $_POST['pet_id'];
						header("location:apply.php");
					}
        mysqli_close($db);

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
