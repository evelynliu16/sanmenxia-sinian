<?php
$name = $_POST['name'] ?: "无";
$phone = $_POST['phone']?: 0000;
$time = $_POST['time'] ?: "无";
$info = $_POST['info'] ?: "无";
if (!empty($_POST['day'])) {
	$day = implode(",", $_POST['day']);
} else {
	$day = "无";
}



$conn = mysqli_connect('localhost','evelynliu16','@P!URn;{%F(&', 'contacts_info');
if (!mysqli_set_charset ($conn, "utf8")) {
    printf("Error loading utf8", mysqli_error($link));
    exit();
}
if (!$conn) {
	die("No connection:" . mysqli_connect_error());
} else {
	$stmt = $conn->prepare("insert into contacts_info(name, phone, day, time, info) values(?, ?, ?, ?, ?)");
	$stmt->bind_param("sisss", $name, $phone, $day, $time, $info);
	$execval = $stmt->execute();
	echo $execval;
	$stmt->close();
	$conn->close();
	header("Location:http://www.smxsn.com/confirmation.html");
}
?>