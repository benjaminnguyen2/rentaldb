<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monthly Rent</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="searchpage">
        <div class="top-navigation">
            <a href="groups.php" class="btn">Back</a>
        </div>
        <div class="hero-text hero-spacing">
        <?php
            require_once 'connect.php';
                    
            if (isset($_GET['code'])) {
                $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
                $sql = "SELECT * FROM RentalGroup WHERE code = :code";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['code' => $code]);
                $group = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<h2>Rental Group Details</h2>";
                echo "<p><strong>Code:</strong> {$group['code']}</p>";
                echo "<p><strong>Description:</strong> {$group['accommodation']}</p>";
                $sql_renters = "SELECT * FROM Renter WHERE groupCode = :code";
                $stmt_renters = $pdo->prepare($sql_renters);
                $stmt_renters->execute(['code' => $code]);
                $renters = $stmt_renters->fetchAll(PDO::FETCH_ASSOC);

                echo "<p><strong>Renters:</strong></p>";
                echo "<ul>";
                foreach ($renters as $renter) {
                    echo "<li>{$renter['fname']} {$renter['lname']}</li>";
                }
                echo "</ul>";
                echo "<form action='update.php' method='post'>";
                echo "<input type='hidden' name='code' value='{$group['code']}' />";
                echo "<label for='accommodation'>Update Accommodation Type:</label>";
                echo "<input type='text' id='accommodation' name='accommodation' />";
                echo "<button type='submit'>Update</button>";
                echo "</form>";
            
            } else {
                header("Location: groups.php");
                exit();
            }
        ?>
        </div>
    </div>
</body>
</html>
