<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$host = 'localhost';
$dbusername = 'pierre';
$dbpassword = 'oodStudio';
$dbname = 'tajsystem';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);

function sanitizeData($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=strip_tags($data);
	$data=htmlspecialchars($data);
	return $data;
}

if (isset($_POST['btn1'])) {
	$search_id = sanitizeData($_POST['search_id']);
	$stmt = $conn->query("SELECT * FROM visitors WHERE id=$search_id");
	if ($stmt->rowCount() > 0) {
		echo "Visitor exists";
	}
	else {
		echo 'Not found';
	}
}

if (isset($_POST['btn2'])) {
	$fname = sanitizeData($_POST['fname']);
	$lname = sanitizeData($_POST['lname']);
	$id = sanitizeData($_POST['id']);
	$floorNum = sanitizeData($_POST['floorNum']);
	$dateandtime = date('d-m-y h:i:s');
	$stmt = $conn->query("INSERT INTO visitors (id, firstname, lastname, floornum, created_at) VALUES ($id, '$fname', '$lname', $floorNum, '$dateandtime')");
}

if (isset($_POST['btn3'])) {
	$id = sanitizeData($_POST['id']);
	$floorNum = sanitizeData($_POST['floorNum']);
	$dateandtime = date('d-m-y h:i:s');
	$stmt = $conn->query("SELECT * FROM visitors WHERE id=$id");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$fname = $results[0]["firstname"];
	$lname = $results[0]["lastname"];
	$stmt = $conn->query("INSERT INTO visitors (id, firstname, lastname, floornum, created_at) VALUES ($id, '$fname', '$lname', $floorNum, '$dateandtime')");
}

?>