<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="dash.css">
    
    <style>
    .form-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap:0px;
    }
    .form-container form {
        display: inline-block;
        margin-right:5cm;
    }
</style>
  </head>
  <body>
  <header class="header">
      <h1>Admin Dashboard</h1>
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
    <div class="form-container">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label for="nic_no">NIC number:</label>
    <input type="text" name="nic_no" id="nic_no">
    <button class="button" type="submit">Search</button>
    </form>
    <form class="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label for="blood_group">Blood group:</label>
    <select name="blood_group" id="blood_group">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
    <button class="button" type="submit">Search</button>
    </form>
</div>
    <table>
			<thead>
				<tr>
					<th>Name</th>
                    <th>Blood Group</th>
					<th>Address</th>
					<th>Contact Number</th>
				</tr>
			</thead>
			<tbody>
                <?php
                    include "connection.php";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["nic_no"])) {
                            // Get the NIC number from the form
                            $nic_no = mysqli_real_escape_string($conn, $_POST["nic_no"]);

                            // Query the database for the matching user records
                            $sql = "SELECT * FROM personal_info WHERE nic_no='$nic_no'";
                            $result = mysqli_query($conn, $sql);

                            // Display the results
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["full_name"] . "</td>";
                                    echo "<td>" . $row["blood_group"] . "</td>";
                                    echo "<td>" . $row["residential_address"] . "</td>";
                                    echo "<td>" . $row["mobile_no"] . "</td>";
                                    echo "</tr>";
                                    // Add more fields as needed
                                }
                            } else {
                                echo '<div class="text">';
                                echo '<b>No results found.!!!!!</b>';
                                echo '</div>';
                            }
                        } else if (isset($_POST["blood_group"])) {
                            // Get the blood group from the form
                            $blood_group = mysqli_real_escape_string($conn, $_POST["blood_group"]);

                            // Query the database for the matching user records
                            $sql = "SELECT * FROM personal_info WHERE blood_group='$blood_group'";
                            $result = mysqli_query($conn, $sql);
                            

                            // Display the results
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["full_name"] . "</td>";
                                    echo "<td>" . $row["blood_group"] . "</td>";
                                    echo "<td>" . $row["residential_address"] . "</td>";
                                    echo "<td>" . $row["mobile_no"] . "</td>";
                                    echo "</tr>";                   
                                    // Add more fields as needed
                                }
                            } else {
                                echo '<div class="text">';
                                echo '<b>No results found.!!!!!</b>';
                                echo '</div>';
                            }                            
                        }
                    }

                    // Close the database connection
                    mysqli_close($conn);
                ?>
            </tbody>
		</table>
        <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>