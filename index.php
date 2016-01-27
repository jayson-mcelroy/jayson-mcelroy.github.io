<?php
$servername = "localhost";
$username = "root";
$password = "osiris";
$dbname = "budget";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$userdata = mysqli_fetch_array($result);

$userName     = $userdata['userName'];
$password     = $userdata['password'];
$rent         = $userdata['rent'];
$electric     = $userdata['electric'];
$phone        = $userdata['phone'];
$water        = $userdata['water'];
$cable        = $userdata['cable'];
$car          = $userdata['car'];
$insurance    = $userdata['insurance'];
$creditCards  = $userdata['creditCards'];
$loans        = $userdata['loans'];
$other        = $userdata['other'];
$pay          = $userdata['pay'];
$bills        = $userdata['bills'];
$remaining    = $userdata['remaining'];
$balance      = $userdata['balance'];
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="style.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style>
    div.header{
      background-color: #0066FF;
      text-shadow: none;
    }
    div.main{
      background-color: #0066FF;
      text-shadow: none;
    }
    div.footer{
      background-color: #0066FF;
      text-shadow: none;
    }
    button{
      width: 20px;
    }

</style>
<style type="text/css">
    textarea {
      width: 100px;
      cols: 50;
    }
</style>
<script>
    function login(){
        window.location.href = "#pagetwo";
    }

    function save(){

    }

    function register(){
      window.location.href = "#registration";
    }

    function relogin(){
      window.location.href = "#login";
    }
</script>
<?php
if(isset($_POST['saveRegister'])){
     saveRegister();
    }
function saveRegister(){
  $sql = $this->connection->query("INSERT INTO `user`(`userName`, `password`) VALUES ('jayson','osiris');");
  echo "poop";
  //$stmt->bind_param("ssi", $userName, $password)
  //window.location.href = "#login";
}

function save(){
  $bills = ($rent+$electric+$phone+$water+$cable+$car+$insurance+$creditCards+$loans+$other);
  
  $remaining = ($pay-$bills);
}
?>
</head>
<body>
<div data-role="page" id="login">
    <div class="header">
        <h1 align="center">Budget This</h1>
    </div>

    <div class="main" class="ui-content">
        <h2 align="center">Username</h2>
        <textarea name="userName" rows="1" cols="50"></textarea>
        <h3 align="center">Password</h3>
        <textarea name="password" rows="1" cols="50"></textarea>
        <button type="button" id="loginButton" onclick="login()">Log in</button>
        <button type="button" id="register" onclick="register()">Register</button>
    </div>

    <div class="footer">
        <p>This app was brought to you by jmac software</p>
    </div>
</div>

<div data-role="page" id="pagetwo">
  <div class="main" class="ui-content">
    <form method="post" action="demoform.asp">
        <label for="rent">Rent/Mortgage:</label>
        <input type="text" name="rent" id="rent" value="$<?= $rent ?>">
        <label for="electric">Electric:</label>
        <input type="text" name="electric" id="electric" value="$<?= $electric ?>">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="$<?= $phone ?>">
        <label for="water">Water:</label>
        <input type="text" name="water" id="water" value="$<?= $water ?>">
        <label for="cable">Cable/Internet:</label>
        <input type="text" name="cable" id="cable" value="$<?= $cable ?>">
        <label for="car">Car:</label>
        <input type="text" name="car" id="car" value="$<?= $car ?>">
        <label for="insurance">Insurance:</label>
        <input type="text" name="insurance" id="insurance" value="$<?= $insurance ?>">
        <label for="credit">Credit Cards:</label>
        <input type="text" name="credit" id="credit" value="$<?= $creditCards ?>">
        <label for="loans">Loans:</label>
        <input type="text" name="loans" id="loans" value="$<?= $loans ?>">
        <label for="other">Other:</label>
        <input type="text" name="other" id="other" value="$<?= $other ?>">
    </form>
    <form method="post" action="demoform.asp">
      <label for="pay">Monthly pay:</label>
      <input type="text" name="pay" id="pay" value="$<?= $pay ?>">
      <label for="bills">Bills:</label>
      <input type="text" name="bills" id="bills" value="$<?= $bills ?>">
      <label for="remaining">Remaining:</label>
      <input type="text" name="remaining" id="remaining" value="$<?= $remaining ?>">
    </form>
    <button type="button" id="saveButton" onclick="save()">Save</button>
  </div>
</div>

<div data-role="page" id="registration">
  <form method="post">
    <label for="user">Username:</label>
    <input type="text" name="user" id="user" value ="<?= $userName ?>">
    <label for="password">Password:</label>
    <input type="text" name="password" id="password" value="<?= $password ?>">
  </form>
  <button type="button" name="saveRegister" id="register" onclick="relogin()">Register</button>
</div>
</body>
</html>
