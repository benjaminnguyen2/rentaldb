<?php
require_once 'connect.php';
$sql = "SELECT code FROM RentalGroup";
$stmt = $pdo->query($sql); 
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Rental Groups</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com/" />
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
			rel="stylesheet" />
	</head>
	<body>
		<div class="searchpage">
			<div class="top-navigation">
				<a href="rental.php" class="btn">Home</a>
				<a href="properties.php" class="btn">All Properties</a>
				<a href="rent.php" class="btn">Monthly Rent</a>
			</div>
			<div class="hero-text hero-spacing">
				<h1>Rental Groups</h1>
				<div class="flex-container">
					<?php foreach ($groups as $group): ?>
					<a class="group-button" href="view.php?code=<?php echo $group['code']; ?>"
						><?php echo $group['code']; ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</body>
</html>