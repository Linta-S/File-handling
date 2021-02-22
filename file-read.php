<!DOCTYPE HTML>  
<html>
<head>
<style>
 .error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$fnameErr=$lnameErr = $emailErr = $genderErr =$unameErr =$remailErr = "";
$fname=$lname = $email = $gender = $uname =$remail= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }


   
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  // 2nd field

  if (empty($_POST["uname"])) {
    $unameErr = "Name is required";
  } else {
    $fname = test_input($_POST["uname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
      $unameErr = "Only letters and white space allowed";
    }
  }




}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php
       
       $myfile = fopen("open.txt", "a");
       fwrite($myfile, $fname);
       fwrite($myfile, $lname);
       fwrite($myfile, $email);
       fwrite($myfile, $gender);
       fwrite($myfile, $uname);
       fwrite($myfile, $password );
       fwrite($myfile, $remail);
       fclose($myfile);

     ?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

   <fieldset>
 
    <legend>Basic information</legend>
  FirstName: <input type="text" name="fname">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
  LastName: <input type="text"  name="lname">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
 
</form>
</fieldset>


<fieldset>
 
   <legend>User Account Information</legend>

 
  

<div <span class="container">  
  <form action="/action_page.php">
    <label for="usrname">Username/userid:</label>
    <input type="text" id="usrname" name="usrname" required>

    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     
     
  </form>
</div>

<div id="message">
  <span class="error"></span>
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
        
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>



Recovery Email Address: <input type="text" name="remail">
  <span class="error">* <?php echo $remailErr;?></span>
<br>
   
     

</fieldset>

<input type="submit" name="submit" value="Submit"> 

<?php
echo "<h2>Basic information:</h2>";
echo "Name:". $fname .$lname;
echo "<br>";
echo "Email". $email;
 
echo "<br>";
echo "Recovered-Email". $remail;
echo "<br>";
echo "Gender:" .$gender;

echo "<h2>Basic information:</h2>";
echo "Recovered-Email". $remail;
echo "<br>";
?>

</body>
</html>