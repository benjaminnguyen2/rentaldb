<?php
require_once 'connect.php';

$sql = "SELECT 'House' AS category, AVG(p.cost) AS avg_rent FROM House h
	INNER JOIN Property p ON h.id = p.id
	UNION
	SELECT 'Apartment' AS category, AVG(p.cost) AS avg_rent FROM Apartment a
	INNER JOIN Property p ON a.id = p.id
	UNION
	SELECT 'Room' AS category, AVG(p.cost) AS avg_rent FROM Room r
	INNER JOIN Property p ON r.id = p.id";
$stmt = $pdo->query($sql);
$averages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Monthly Rent</title>
	<link rel="stylesheet" href="style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com/" />
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />
</head>
<body>
	<div class="searchpage">
		<div class="top-navigation">
			<a href="rental.php" class="btn">Home</a>
			<a href="properties.php" class="btn">All Properties</a>
			<a href="groups.php" class="btn">Rental Groups</a>
		</div>
		<div class="hero-text hero-spacing">
			<h1>Monthly Rent</h1>
			<table>
				<?php foreach ($averages as $average): ?>
					<?php if ($average['category'] !== 'Property'): ?>
						<tr>
							<td><?php echo $average['category']; ?></td>
							<td>$<?php echo number_format($average['avg_rent'], 2); ?></td>
                        					</tr>
                    				<?php endif; ?>
                				<?php endforeach; ?>
            			</table>
        		</div>
    	</div>
</body>
</html>
