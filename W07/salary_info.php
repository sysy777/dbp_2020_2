<?php
	$link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

	if(mysqli_connect_errno()){
		echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
		echo "<br>";
		// 에러 내용 출력
		echo mysqli_connect_error();
	}
	// 바로 정보를 전달하면 XSS 공격위험이 있기때문에 GET방식으로 바로 전달받지 않고
	// 아래아래 코드처럼 mysqli_real_escape_string메서드를 이용하여 보안 강화
	//$number = $_GET['number'];
	$filtered_number = mysqli_real_escape_string($link, $_GET['number']);
	/* 직원 번호만 나와서 불편. 직원 번호대신 이름을 출력해주기 위해 주석 아래 쿼리를 사용
	$query = "
		SELECT *
		FROM salaries
		ORDER BY salary DESC LIMIT 10
	"; 
	*/
	$query = "
		SELECT first_name, last_name, salary, from_date, to_date
		FROM salaries
		LEFT JOIN employees on salaries.emp_no=employees.emp_no
		ORDER BY salary DESC LIMIT ".$filtered_number
	;

	$article = '';
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)){
		$article .= '<tr><td>';
		$article .= $row['first_name'];
		$article .= '</td><td>';
		$article .= $row['last_name'];
		$article .= '</td><td>';
		$article .= $row['salary'];
		$article .= '</td><td>';
		$article .= $row['from_date'];
		$article .= '</td><td>';
		$article .= $row['to_date'];
		$article .= '</td></tr>';

	}

	// 연결 끊기.(리소스 할당된 것들 해제)
	mysqli_free_result($result);
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> 연봉 정보 </title>
	<style>
		body{
			font-family: Consolas, monospace;
			font-family: 12px;
		}
		table{
			width: 100%;
		}
		th,td{
			padding: 10px;
			border-bottom: 1px solid #dadada;
		}
	</style>
</head>
<body>
	<h2><a href="index.php">직원 관리 시스템</a> | 연봉 정보</h2>
	<table>
		<tr>
			<th>frst_name</th>
			<th>last_name</th>
			<th>salary</th>
			<th>from_date</th>
			<th>to_date</th>
		</tr>
		<?= $article ?>
		</table>
</body>
</html>
