<!DOCTYPE html>
<html>
<?php 
	$db = mysqli_connect('localhost','root','','pupper') or die("Unable to connect");
 ?>
<head>
	<title>Registration</title>
	<link rel = "stylesheet" href = "reg.css">
</head>
<body>
	<center>
		<form id="Register" method="post" action="">
			<?php 
				if($_SERVER["REQUEST_METHOD"]=="POST"){
					$id = $_POST['ID'];
					$mail = $_POST['mail'];
					$passwd = $_POST['passwd'];
					$query = "select UserId, Email from Users where UserId = '$id' || Email = '$mail';";
					$res = mysqli_query($db,$query);
					$count = mysqli_num_rows($res);
					if($count != 0){
						$error = "The userId or Email is already registered";
					}
					else
					{
						$update = "insert into Users values('$id','$passwd','$mail')";
						mysqli_query($db,$update);
						header("location: home.php");
					}
				}
			 ?>
	        <p class="title">Register</p>
	        <input type="text" placeholder="ID" id='ID' name='ID' autofocus requried/></br>
	        <input type="email" placeholder="E-Mail" id='mail' name='mail' required/>
	    	</br>
	        <input type="password" placeholder="Password" id='passwd' name='passwd' required/></br>
	        <button type="submit" class="Register">
	          Register
	        </button></br>
      	</form>
      	<?php
        if(isset($error) && !empty($error))
        {
          echo "<p id='error' style='color:red'> $error </p>";
        }
        mysqli_close($db);
       ?>
      	<form action = "home.php">
	        <button id = "back" type="submit">Go Back</button>
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