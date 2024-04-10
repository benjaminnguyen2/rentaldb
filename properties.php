<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>All Properties</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
			rel="stylesheet" />
	</head>
	<body>
		<div class="searchpage">
			<div class="top-navigation">
				<a href="rental.php" class="btn">Home</a>
				<a href="groups.php" class="btn">Rental Groups</a>
				<a href="rent.php" class="btn">Monthly Rent</a>
			</div>
			<div class="hero-text hero-spacing">
				<h1>All Rentals</h1>
				<?php
				include_once 'connect.php';
				$query = "
    				SELECT rp.id AS property_id, 
           					CONCAT(o.fname, ' ', o.lname) AS owner_name, 
          					CONCAT(m.fname, ' ', m.lname) AS manager_name
    				FROM RentalProperty rp
    				LEFT JOIN Owner_Property op ON rp.id = op.propertyId
    				LEFT JOIN Owner o ON op.ownerId = o.id
    				LEFT JOIN Manager m ON rp.managerId = m.id
				";
				$stmt = $pdo->query($query);
				
    				if ($stmt->rowCount() > 0) {
    					echo "<table border='1'>
            					<tr>
                					<th>Property ID</th>
                					<th>Owner</th>
                					<th>Manager</th>
            					</tr>";
    					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        					echo "<tr>
                					<td>{$row['property_id']}</td>
                					<td>{$row['owner_name']}</td>
                					<td>{$row['manager_name']}</td>
              					</tr>";
    				}
    				echo "</table>";
				} 
				?>
			</div>
		</div>
	</body>
</html>



