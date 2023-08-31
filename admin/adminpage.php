<!DOCTYPE html>
<html>
  <head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dash.css">
    <style>
        .h1 {
            text-align: center;
            margin-left:5cm;

        }

        .blood-group-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-left: 2cm;
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

        .dashboard {
            display: flex;
            
        }

        .dashboard > * {
            flex: 5.5;
            margin: 10px;
            padding: 10px;
            margin-top:0cm;
        }

        .dashboard > .blood-group-container {
            flex: 20;
            margin-left:-2cm;
        }

        .dashboard > .div1 {
          flex: -2;
          margin-right:-4cm;
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
    <h1 class="h1">Total Blood unit Donated</h1>
    <div class="dashboard">

      <div class="div1">
        <section>
          <h2><a href="search.php">Search User Details</a></h2>
          <h2><a href="adddonate.php">Add Blood</a></h2>
          <h2><a href="donatehistory.php">Donate History</a></h2>
          <h2><a href="store.php">Available Blood</a></h2>
          <h2><a href="viewrequest.php">View Request</a></h2>
        </section>
      </div>

      <div class="blood-group-container">

        <?php
        include "total.php";
        foreach ($blood_stock as $group => $count) {
          echo "<div class='blood-group'>";
          echo "<div class='group-name'>" . $group . "</div>";
          echo "<div class='group-count'>" . $count . "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
    <footer>
      <p>&copy; 2020-HNDIT Group 3 BBMS </p>
    </footer>
  </body>
</html>
