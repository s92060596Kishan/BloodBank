


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Blood Bank Events</title>
<link rel="stylesheet" href="style/event.css">
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
	<h1 class="event">Blood Bank Events</h1>
	<h2>Add New Event</h2>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="event_name">Event Name:</label>
		<input type="text" id="event_name" name="event_name"><br><br>
        <label for="location">Location:</label>
		<input type="text" id="location" name="location"><br><br>
		<label for="event_date">Event Date:</label>
		<input type="date" id="event_date" name="event_date"><br><br>
		<label for="event_time">Event Time:</label>
		<input type="time" id="event_time" name="event_time"><br><br>
        <label for="contact_no">Contact NO:</label>
		<input type="tel" id="contact_no" name="contact_no"><br><br>
		<input type="submit" value="Add Event">
	</form>
    <?php
// include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// include the database connection file
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get form data
  $event_name = $_POST['event_name'];
  $location = $_POST['location'];
  $event_date = $_POST['event_date'];
  $event_time = $_POST['event_time'];
  $contact_no = $_POST['contact_no'];

//   construct email body
  $body = '
    <div style="padding:16px; background-color:#ddd;">
      <h4>Event Name: '.$event_name.'</h4>
      <h4>Location: '.$location.'</h4>
      <h4>Event Date: '.$event_date.'</h4>
      <h4>Event Time: '.$event_time.'</h4>
      <h4>Contact No: '.$contact_no.'</h4>
    </div>
  ';

  // query the database to get email addresses
 
    // create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
      // configure the mailer
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ashraffmemorialhospital3@gmail.com';
      $mail->Password = 'wlgiwquajzcjnmev';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      // set the sender and recipients
      $mail->setFrom('ashraffmemorialhospital3@gmail.com', 'Ashraff Memorial Hospital');
      $sql = "SELECT `email` FROM `personal_info`";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
       
        $Gmail = $row['email'];
  
        $mail->addAddress($Gmail);
      
    //   $mail->addAddress('suhaitsuhait58@gmail.com');

      // set the email content
      $mail->isHTML(true);
      $mail->Subject = 'New Event Notification';
      $mail->Body = $body;

      // send the email
      $mail->send();
    
}

    }
   } catch (Exception $e) {
      
    }

    

  
  $sql = "INSERT INTO events (event_name, location, event_date, event_time, contact_no)
          VALUES ('$event_name', '$location', '$event_date', '$event_time', '$contact_no')";
  if (mysqli_query($conn, $sql)) {
    echo "
      <script> alert('Event Added Successfully')</script>
    ";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}


?>

                <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function () {
        alert("hi");
      });
    </script>
</body>
</html>
