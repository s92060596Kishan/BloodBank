<?php
include "connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Check if ID is valid
    if (!is_numeric($id) || $id < 1) {
      echo "Invalid request ID.";
      exit();
    }

    // Retrieve user request from database
    $sql = "SELECT * FROM user_request WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $units_requested = $row['units_requested'];
        $blood_group = $row['blood_group'];

        // Check if there is enough blood stock
        $sql1 = "SELECT count(*) AS total FROM blood_stock WHERE blood_group = '$blood_group'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $total = $row1['total'];

        if($units_requested > $total){
            echo "<script>alert('Not enough blood stock available.');
                 window.location.href = 'viewrequest.php';
            </script>";
        } else {
            // Remove units from blood stock
            for($i=0;$i<$units_requested;$i++){
                $sql2 = "DELETE FROM blood_stock WHERE blood_group = '$blood_group' LIMIT 1";
                $result2 = mysqli_query($conn, $sql2);
            }
            // Update user request status
            $sql3 = "UPDATE user_request SET status = 1 WHERE id = $id";
            $result3 = mysqli_query($conn, $sql3);
            if ($result3 === false) {
                echo "Error updating user request status: " . mysqli_error($conn);
                exit();
            } else {
                echo "<script>alert('User request accepted successfully.');
						window.location.href = 'viewrequest.php';
					</script>";
            }
        }
    } else {
        echo"<script>alert('Invalid request ID.');
		window.location.href = 'viewrequest.php';
					</script>";
    }
}

mysqli_close($conn);
?>
