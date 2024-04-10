<?php
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['code']) && isset($_POST['accommodation'])) {
		$code = filter_var($_POST['code'], FILTER_SANITIZE_STRING);
		$accommodation = filter_var($_POST['accommodation'], FILTER_SANITIZE_STRING);
		$sql = "UPDATE RentalGroup SET accommodation = :accommodation WHERE code = :code";
		$stmt = $pdo->prepare($sql);
        		$stmt->execute(['code' => $code, 'accommodation' => $accommodation]);
        		header("Location: view.php?code=$code&success=1");
        	exit();
	}
}
header("Location: view.php?error=1");
exit();
?>
