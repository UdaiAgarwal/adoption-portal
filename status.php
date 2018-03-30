<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Status</title>
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="pet.css">
  </head>
  <body>
    <h1><a href="pets.php">Pupper House</a></h1>
    
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
    $db = mysqli_connect('localhost','root','','pupper') or die("Unable to connect");
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
          elseif($_GET["navigate"] == 'cart')
          {
            header("location: cart.php");
          }
        }
      ?>
      <nav id="top_menu">
        <ul>
          <li><button name="navigate" value="Adopt" type='submit'>Adopt</button></li>
          <li><button name="navigate" value="Check" type='submit' style="border-radius: 6px;background: #f1f1f1">Check Status</button></li>
          <li><button name="navigate" value="Supplies" type='submit'>Supplies</button></li>
          <li><button name="navigate" value="Appointment" type='submit'>Get Appointment</button></li>
          <li><button name="navigate" value="Cart" type='submit'>Cart</button></li>
        </ul>
      </nav>
    </form>

    <table>

      <?php
        if(isset($_SESSION["PET"]) and $_SESSION["PET"]!='')
        {
          $query = "select * from pets where pet_ID=".$_SESSION['PET']." ;";
          $pet = mysqli_query($db,$query);
          $pet = mysqli_fetch_array($pet);
          echo "<td class='dog'><img src='images/pets/".$pet['Name'].".jpg'>
		     	<label>".$pet['Name']." (Age: ".$pet['Age']."Yr)</label>
					</td>";
          echo "<td class = 'desc'>".$pet['Name']."</td>";
          echo "<td class = 'desc'>".$pet['Age']."</td>";
          if($pet['Adopted']){
            echo "<td class = 'desc'>Already adopted</td>";
          }
          else{
            echo "<td class = 'desc'>Available for adoption</td>";
          }

        }
        else
        {
          echo "<label class='desc'>No pet selected</label>";
        }


       ?>
    </table>
    <!-- footer of the website -->


    <footer>
      <div><a href="apply.php">Apply</a><a href="pets.php">Adopt Pets</a>
        <a href="register.php">Register</a><a href="supplies.php">Supplies for your pet</a>
        <a href="home.php">Log In</a></div>
      <div>Copyright ThePupperHouse 2018</div>
    </footer>

  </body>
</html>
