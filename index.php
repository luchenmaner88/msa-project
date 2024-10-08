<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<h3>This is from the web app service</h3>
	<?php
		// Define database connection variables
		$servername = "db-employee-mysql.mysql.database.azure.com";
		$username = "mysqladmin";
		$password = "9888210310@Cl";
		$dbname = "employee";

		// Create database connection
	 
	        $conn = mysqli_init();
               // mysqli_ssl_set($conn,NULL,NULL, "{path to CA cert}", NULL, NULL);
                mysqli_real_connect($conn, "db-employee-mysql.mysql.database.azure.com", "mysqladmin", $password, $dbname, 3306);

		// Check connection
		if ($conn->connect_error) {
		 
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		$sql = "SELECT * FROM employees LIMIT 10";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>EmpId</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["email_id"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
