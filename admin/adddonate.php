<!DOCTYPE html>
<html>
<head>
	<title>Add Blood Donation</title>
	<link rel="stylesheet" href="style/form.css">
	<link rel="stylesheet" href="dash.css">
	<style>
		.h1{
			text-align:center;
		}
	</style>
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
	<h2 class="h1">Add Blood Donation</h2>
	<form action="donorget.php" method="post">
		<label>NIC:</label>
		<input type="text" name="nic_no" required><br><br>
		<label>Full Name:</label>
		<input type="text" name="full_name" readonly><br><br>
		<label>Blood Group:</label>
		<input type="text" name="blood_group" readonly><br><br>
		<label>Donation Date:</label>
		<input type="date" name="donation_date" required><br><br>
		<label>Donation Time:</label>
		<input type="time" name="donation_time" required><br><br>
		<input type="submit" value="Add Donation">
	</form>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('input[name=nic_no]').blur(function() {
				var nic_no = $(this).val();
				$.ajax({
					url: 'donorget.php',
					method: 'POST',
					data: { nic_no: nic_no },
					dataType: 'json',
					success: function(response) {
						if (response.status == 'success') {
							$('input[name=full_name]').val(response.data.full_name);
							$('input[name=blood_group]').val(response.data.blood_group);
						} else {
							alert(response.message);
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			});
		});
	</script>
	<footer>
		<p>&copy; 2020-HNDIT Group 3 BBMS </p>
	</footer>
</body>
</html>
