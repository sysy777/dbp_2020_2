<?php
	$link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

	if(mysqli_connect_errno()){
		echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
		echo "<br>";
		echo mysqli_connect_error();
	}

	$filtered_dept = mysqli_real_escape_string($link, $_GET['department']);

	$dept_query= "
		select dept_name from departments where dept_no='$filtered_dept'
	";
 	$dept_name = '';
	$dept_result = mysqli_query($link, $dept_query);
	while($dept_row = mysqli_fetch_array($dept_result)){
		$dept_name .= $dept_row['dept_name'];
	}
	
	$query = "
		select distinct first_name, last_name, salary, title
		from employees e  
		inner join dept_emp de on e.emp_no=de.emp_no  
		inner join salaries on salaries.emp_no=e.emp_no
		inner join titles on titles.emp_no=e.emp_no    
		inner join dept_emp on e.emp_no=dept_emp.emp_no 
		where dept_emp.dept_no='$filtered_dept'
		order by salary desc limit 5
	";

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
		$article .= $row['title'];
		$article .= '</td></tr>';
	}

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
	<h2><a href="index.php">직원 관리 시스템</a> | 부서별 현재 재직 직원 연봉 top 5</h2>
	부서: <?= $dept_name ?>
	<table>
		<tr>
			<th>first_name</th>
			<th>last_name</th>
			<th>salary</th>
			<th>title</th>
		</tr>
		<?= $article ?>
		</table>
</body>
</html>
