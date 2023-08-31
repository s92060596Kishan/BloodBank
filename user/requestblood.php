<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style/form.css">
<!-- <link rel="stylesheet" href="style/dash.css"> -->
<link rel="stylesheet" href="style/dash copy.css">
</head>
<body>
<header class="header">
      <h1>Blood Bank</h1>
    </header>
    <nav>
		<li><a href="index.php">Dashboard</a></li>
        <li><a href="store.php">Blood Stock</a></li>
        <li><a href="userReg.php">New User</a></li>
        <li><a href="eventview.php">Blood Camp</a></li>  
        <li><a href="requestblood.php">Blood Request</a></li>  
		<li><a href="logout.php">Exit</a></li>
    </nav>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <label for="blood_group">Blood group:</label>
  <select id="blood_group" name="blood_group">
	<option value="">..Select..</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select><br><br>
  <label for="units_requested">Units requested:</label>
  <input type="number" id="units_requested" name="units_requested" min="1"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
include "connection.php";

if(isset($_POST['blood_group']) && isset($_POST['units_requested'])){
    $blood_group = $_POST["blood_group"];
    $units_requested = $_POST["units_requested"];

    // Validate form data
    if (!in_array($blood_group, array("A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"))) {
      echo "Invalid blood group selected.";
      exit();
    }

    if (!is_numeric($units_requested) || $units_requested < 1) {
      echo "Invalid number of units requested.";
      exit();
    }

    // Insert user request into database
    $sql = "INSERT INTO user_request (blood_group, units_requested) VALUES ('$blood_group', $units_requested)";
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
      echo "Error inserting user request: " . mysqli_error($conn);
      exit();
    }

    echo "User request submitted successfully.";
}

mysqli_close($conn);
?>
<footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>

