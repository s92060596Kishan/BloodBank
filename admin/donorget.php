<?php
include "connection.php";

// Get the form data
$nic_no = $_POST['nic_no'];
$donation_date = $_POST['donation_date'];
$donation_time = $_POST['donation_time'];

// Retrieve the donor's name and blood group from the donor table
$sql = "SELECT nic_no, full_name, blood_group FROM personal_info WHERE nic_no='$nic_no'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$nic_no = $row['nic_no'];
	$full_name = $row['full_name'];
	$blood_group = $row['blood_group'];

	$response = [
		'status' => 'success',
		'data' => [
			'full_name' => $full_name,
			'blood_group' => $blood_group
		]
	];

	// Insert the donation information into the database
	$sql = "INSERT INTO donation (nic_no, full_name, blood_group, donation_date, donation_time) 
			VALUES ('$nic_no', '$full_name', '$blood_group', '$donation_date', '$donation_time')";

	$insert_sql = "INSERT INTO blood_stock (blood_group, donation_date, donation_time) 
			VALUES ('$blood_group', '$donation_date', '$donation_time')";
	mysqli_query($conn, $insert_sql);

	if (mysqli_query($conn, $sql)) {
	  echo json_encode($response);
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
} else {
	$response = [
		'status' => 'error',
		'message' => 'Donor not found!'
	];

	echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
