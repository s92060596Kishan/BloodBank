<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Events</title>
	<link rel="stylesheet" href="style/event.css">
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
    <h1 class="event">Blood Bank Events</h1>
	<h2>Events</h2>
	<main>
		<table>
			<thead>
				<tr>
					<th>Name</th>
                    <th>Location</th>
					<th>Date</th>
					<th>Time</th>
                    <th>Contact NO</th>
				</tr>
			</thead>
			<tbody>
				<?php
                    include "connection.php";
					// Query events table for all events
					$sql = "SELECT * FROM events";
			        $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
					// Loop through all events and display them in the table
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['event_name'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
						echo "<td>" . date('m/d/Y', strtotime($row['event_date'])) . "</td>";
						echo "<td>" . date('h:i A', strtotime($row['event_time'])) . "</td>";
                        echo "<td>" . $row['contact_no'] . "</td>";
						echo "</tr>";
					}
                } else {
                    echo "0 results";
                }
				?>
			</tbody>
		</table>
	</main>
    <footer class="footer">
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>
