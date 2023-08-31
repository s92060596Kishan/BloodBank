<?php
include "connection.php";

$sql = "SELECT blood_group,count(blood_group) AS total FROM donation GROUP BY blood_group";
$result = mysqli_query($conn, $sql);

$blood_stock = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$blood_stock[$row["blood_group"]] = $row["total"];
	}
} else {
	echo "No results found.";
}

mysqli_close($conn);
?>
