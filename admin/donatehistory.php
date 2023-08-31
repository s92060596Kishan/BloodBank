<!DOCTYPE html>
<html>
<head>
	<title>View Donations</title>
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="style/search.css">
	<link rel="stylesheet" href="dash.css">
</head>
<body>
<header class="header">
      <h1>Blood Bank</h1>
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
	<h1>View Donations</h1>
	<form method="GET">
		<label for="blood_group">Search by Blood Group:</label>
		<select name="blood_group" id="blood_group">
        <option value="">--Select Blood Group--</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        </select>
		<input type="submit" value="Search">
        <button class ="button" type="button" onclick="window.location.href= 'donatehistory.php';">Reset</button>
	</form>
	<table>
		<tr>
			<th>NIC</th>
			<th>Full Name</th>
            <th>Blood Group </th>
			<th>Donation Date</th>
			<th>Donation Time</th>
		</tr>
		<?php
		include "connection.php";

		// Query database for donations
		if (isset($_GET['blood_group'])) {
			$blood_group = $_GET['blood_group'];
			$sql = "SELECT * FROM donation JOIN personal_info ON donation.nic_no = personal_info.nic_no WHERE personal_info.blood_group = '$blood_group'";
		} else {
			$sql = "SELECT * FROM donation";
		}
		$result = mysqli_query($conn, $sql);

		// Display results in table
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['nic_no'] . "</td>";
				echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['blood_group'] . "</td>";
				echo "<td>" . $row['donation_date'] . "</td>";
				echo "<td>" . $row['donation_time'] . "</td>";
				echo "</tr>";
			}
		} else {
			echo "No results found.";
		}

		// Close MySQL connection
		mysqli_close($conn);
		?>
	</table>
    <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>
