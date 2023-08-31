<!DOCTYPE html>
<html>
<head>
	<title>Blood Stock</title>
    <link rel="stylesheet" href="dash.css">
	<link rel="stylesheet" href="style/dash copy.css">
</head>	
	<style>
        .h1 {
	text-align: center;
}

.blood-group-container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}

.blood-group {
	background-color: #f1f1f1;
	border: 1px solid #ddd;
	border-radius: 5px;
	margin: 10px;
	padding: 10px;
	text-align: center;
	width: 150px;
}

.group-name {
	font-size: 24px;
	font-weight: bold;
}

.group-count {
	font-size: 48px;
	margin-top: 10px;
}

    </style>

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
	<h1 class="h1">Blood Stock</h1>
	<div class="blood-group-container">
		<?php
		include "blood_stock.php";
		foreach ($blood_stock as $group => $count) {
			echo "<div class='blood-group'>";
			echo "<div class='group-name'>" . $group . "</div>";
			echo "<div class='group-count'>" . $count . "</div>";
			echo "</div>";
		}
		?>
	</div>
    <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
</body>
</html>
