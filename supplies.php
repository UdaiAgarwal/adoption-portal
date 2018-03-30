<!DOCTYPE html>
<html>
<head>
	<title>SUPPLIES</title>
	<link rel="stylesheet" type="text/css" href="pet.css">
</head>
<body>
	<?php
    	session_start();
		$db = mysqli_connect('localhost','root','','pupper') or die("connection failed");
	?>
	<h1><a href="home.php">Supplies for your pet!</a></h1>
	<div id='parent_alert'></div>
	<form id='navigation' method ="get" action= "">
 	<?php
    // userID
      if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='')
      {
        echo "<div id='parent_user'><div id='user'>Hello ".$_SESSION["ID"]."</div></div>";
      }
      else{
        echo "<div id='parent_user'><div id='user'>LogIn to add Items</div></div>";

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
          <li><button name="navigate" value="Supplies" type='submit' style="border-radius: 6px;background: #f1f1f1">Supplies</button></li>
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
			<form method='post' action=''>
	    <?php
	    	$query = "select * from Supplies order by P_ID;";
	    	$result = mysqli_query($db,$query);
	    	echo "<table id='Animals'>";
		    while($row = mysqli_fetch_array($result)){
		     	echo "<tr>";
		     	echo "<td class='supply'><img src='images/supplies/".$row['Products'].".jpg'>
		     	<div class='supply text'><label>".$row['Products']."<br/><b>(Rs ".$row['Price'].")</b></label>
					<button type='submit' name='p_id' value = ".$row['P_ID'].">Add to cart</button>
					</div></td>";
		     	if($row = mysqli_fetch_array($result))
		     		echo "<td class='supply'><img src='images/supplies/".$row['Products'].".jpg'>
		     	<div class='supply text'><label>".$row['Products']."<br/><b> (Rs ".$row['Price'].")</b></label>
					<button type='submit' name='p_id' value = ".$row['P_ID'].">Add to cart</button>
					</div></td>";
		     	if($row = mysqli_fetch_array($result))
		     		echo "<td class='supply'><img src='images/supplies/".$row['Products'].".jpg' onclick='show()'>
		     	<div class='supply text'><label>".$row['Products']."<br/><b> (Rs ".$row['Price'].")</b></label>
						<button type='submit' name='p_id' value = ".$row['P_ID'].">Add to cart</button>
					</div></td>";
		     	echo "</tr>";
		     }
	      	echo "</table>";
	      	if(isset($_POST['p_id'])){
	      		if(isset($_SESSION['ID']) && $_SESSION['ID']!=''){
		      		$update = "update Users,Supplies set cart=concat(cart,concat('".$_POST['p_id']."','+')) where UserId = '".$_SESSION["ID"]."';";
		      		if(mysqli_query($db,$update)){

		      			if(isset($_SESSION["cart"][$_POST['p_id']]))
		      			{
		      				$_SESSION["cart"][$_POST['p_id']] +=1;	
		      			}
		      			else
		      			{
		      				$_SESSION["cart"][$_POST['p_id']] = 1;
		      			}
		      			print_r($_SESSION["cart"]);
		      			echo "<script>document.getElementById('parent_alert').innerHTML='<div id=\"alert\">Item Added to Cart</div>';</script>";
		      			echo "<script>document.getElementById('alert').style.animation-name='appear'</script>";
						}
		      	}
		      	else{
		      		@header('location: home.php');
		      	}
	      	}
        mysqli_close($db);

	    ?>

			<!-- </div> -->
			</form>
			<!-- add to cart menu -->
			<!-- <div id="addCart">
				<form class="AddCart" action="" method="get">
					<button type="action">
						Add to cart
					</button>
					<button type="action">
						Cancel
					</button>

				</form>

			</div> -->
			<!-- add to cart menu -->

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
