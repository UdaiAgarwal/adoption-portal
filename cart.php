 <!DOCTYPE html>
<html>
<head>
	<title>CART</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
  <h1><a href="pets.php">CART</a></h1>
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
          elseif($_GET["navigate"] == 'Cart'){
            header("location: cart.php");
          }
          elseif($_GET["navigate"] == 'Log')
          {
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
          <li><button name="navigate" value="Cart" type='submit' style="border-radius: 6px;background: #f1f1f1">Cart</button></li>
          <li><button name="navigate" value="Log" type='submit' id='log'>LOGOUT</button></li>
        </ul>
      </nav>
    </form>
      <form method = "post" action ='cart.php' >
        <table id="cart">
          <?php
            $total=0;
            echo "<tr>";
            echo "<td class = 't_header' colspan = 2>Product</td>";
            echo "<td class = 't_header'>Price</td>";
            echo "<td class = 't_header' colspan = 3>Quantity</td>";
            echo "</tr>";
            foreach($_SESSION['cart'] as $item => $quantity)
            {
              if($quantity >0){
                $item = (int)$item;
                $query2 = "select * from Supplies where P_ID = ".$item.";";
                $result = mysqli_query($db,$query2);
                $product = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td><img src='images/supplies/".$product['Products'].".jpg'></td>";
                echo "<td>".$product['Products']."</td>";
                echo "<td>Rs. ".$product['Price']."</td>";
                echo "<td>".$_SESSION['cart'][$item]."</td>";
                echo "<td><button type='submit' name='add' value = '".$item."'>Add</button></td>";
                echo "<td><button type='submit' name='R_item' value = '".$item."'>Remove</button></td>";
                echo "</tr>";
                $total += $product['Price']*$_SESSION['cart'][$item];
              }
            }
            if($total != 0){
            echo "<tr>";
            echo "<td colspan=2 style='font-weight:bold'>Total</td>";
            echo "<td colspan=5>Rs. ".$total."</td>";
            }
            if(isset($_POST['add']))
            {
              $itm = $_POST["add"];
              $_SESSION['cart'][$itm] +=1;
              $cart_out = '';
              foreach($_SESSION['cart'] as $item => $val){
                for($i =0; $i<$val;$i ++)
                {
                  $cart_out .= $item.'+';
                }
              }
              $remove= "update Users set cart = '".$cart_out."' where UserId = '".$_SESSION["ID"]."';";
              mysqli_query($db,$remove);
              header("location: cart.php");
            }
            if(isset($_POST["R_item"]) )
            {
              $itm = $_POST["R_item"];
              if($itm == 1)
                unset($_SESSION['cart'][$itm]);
              $_SESSION['cart'][$itm] -=1;
              $cart_out = '';
              foreach($_SESSION['cart'] as $item => $val){
                for($i =0; $i<$val;$i ++)
                {
                  $cart_out .= $item.'+';
                }
              }
            $remove= "update Users set cart = '".$cart_out."' where UserId = '".$_SESSION["ID"]."';";
            mysqli_query($db,$remove);
            header("location: cart.php");
            }
            mysqli_close($db);
           ?>
        </table>
      </form>
      <!-- footer of the website -->


      <footer>
        <div><a href="apply.php">Apply</a><a href="pets.php">Adopt Pets</a>
          <a href="register.php">Register</a><a href="supplies.php">Supplies for your pet</a>
          <a href="home.php">Log In</a></div>
        <div>Copyright ThePupperHouse 2018</div>
      </footer>

  </body>
</html>
