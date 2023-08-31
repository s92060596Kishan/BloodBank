<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>BBMS</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style/form.css">
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
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="full_name">Full Name:</label>
    <input type="text" id="full-name" name="full_name" required><br><br>
    
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date-of-birth" name="date_of_birth" required><br><br>
    
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>
    
    <label for="blood_group">Blood Group:</label>
    <select id="blood-group" name="blood_group" required>
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
    
    <label for="nic_no">NIC No:</label>
    <input type="text" id="nic-no" name="nic_no" required><br><br>
    
    <label for="residential_address">Residential Address:</label>
    <textarea id="residential-address" name="residential_address" required></textarea><br><br>
    
    <label for="mobile_no">Mobile No:</label>
    <input type="tel" id="mobile-no" name="mobile_no" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <input type="submit" value="Submit">
    </form>
    <?php
        include "connection.php";

        // Define variables to store messages and their color
   

        // Check if form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $full_name = $_POST["full_name"];
            $date_of_birth = $_POST["date_of_birth"];
            $gender = $_POST["gender"];
            $blood_group = $_POST["blood_group"];
            $nic_no = $_POST["nic_no"];
            $residential_address = $_POST["residential_address"];
            $mobile_no = $_POST["mobile_no"];
            $email = $_POST["email"];

            // Check if NIC number already exists in database
            if(filter_var($email,FILTER_VALIDATE_EMAIL))
            {
            $sql = "SELECT nic_no FROM personal_info WHERE nic_no='$nic_no'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '
                <script> alert("Nic Number already Exit"); </script>
                ';
            }
        
             else {
                // Insert form data into database
                $sql = "INSERT INTO personal_info (full_name, date_of_birth, gender, blood_group, nic_no, residential_address, mobile_no,email)
                        VALUES ('$full_name', '$date_of_birth', '$gender', '$blood_group', '$nic_no', '$residential_address', '$mobile_no','$email')";
                if ($conn->query($sql) === TRUE) {
                    $msg = "Data saved successfully.";
                    $msg_color = "green";
                } else {
                    $msg = "Please Enter all details";
                    $msg_color = "red";
                }
            }
            $conn->close();
        }
    }
        ?>

    <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>
