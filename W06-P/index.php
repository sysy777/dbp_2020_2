<?php
	$link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    $query = "SELECT * FROM employees ORDER BY emp_no DESC limit 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $num = $row['emp_no'];
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> 직원 관리 시스템 </title>
</head>

<body>
	<h1> 직원 관리 시스템 </h1>
	현재 직원이 <?=$num?>명 있습니다.<br><br>
	<form action="emp_select.php" method="POST">
		(1) 직원 정보 조회:<br>
		<input type="text" name="number" value="10" placeholder="how many row?">
		<input type="submit" value="Search">
	</form>
	<a href="emp_insert.php">(2) 신규 직원 등록</a><br>
	<form action="emp_update.php" method="POST">
		(3) 직원 정보 수정:<br>
		<input type="text" name="emp_no" placeholder="enter emp_no">
		<input type="submit" value="Search">
	</form>
	<form action="emp_delete.php" method="POST">
		(4) 직원 정보 삭제:<br>
		<input type="text" name="emp_no" placeholder="enter emp_no">
		<input type="submit" value="Delete">
	</form>
</body>
</html>