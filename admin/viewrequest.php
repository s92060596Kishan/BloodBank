<!DOCTYPE html>
<html>
<head>
	<title>View Request</title>
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<header class="header">
      <h1>View Request</h1>
    </header>
    <nav>
        <li><a href="adminpage.php">Dashboard</a></li>
        <li><a href="userReg.php">Add User</a></li>
        <li><a href="eventadd.php">Add Event</a></li>
        <li><a href="search.php">Search User Details</a></li>
        <li><a href="adddonate.php">Add Blood</a></li>
		<li><a href="donatehistory.php">Donate History</a></li>
        <li><a href="store.php">Available Blood</a></li>
        <li><a href="viewrequest.php">View Request</a></li>
		<li><a href="logout.php">Logout</a></li>		
    </nav>
<?php
include "connection.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Update status of user request
  $sql = "UPDATE user_request SET status = 1 WHERE id = $id";
  if (mysqli_query($conn, $sql)) {
    echo "User request status updated successfully.";
  } else {
    echo "Error updating user request status: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM user_request ORDER BY request_date DESC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Blood Group</th><th>Units Requested</th><th>Request Date</th><th>Action</th></tr>";
  while($row = $result->fetch_assoc()) {
    $disabled = "";
    if ($row["status"] == 1) {
      $disabled = "disabled";
    }
    echo "<tr><td>" . $row["blood_group"] . "</td><td>" . $row["units_requested"] . "</td><td>" . $row["request_date"] . "</td><td><a href='accept_request.php?id=" . $row["id"] . "' class='accept-btn' $disabled>Accept</a></td></tr>";
  }
  echo "</table>";
} else {
  echo "No user requests found.";
}

mysqli_close($conn);
?>
    <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>