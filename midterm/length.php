<?php
	$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');

	if(mysqli_connect_errno()){
		echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
		echo "<br>";
		echo mysqli_connect_error();
	}

	$filtered_length = mysqli_real_escape_string($link, $_GET['length']);
	$min = "";
	$max = "";

	if ($filtered_length == 60)
	{
		$min = 0;
		$max = 60;
	} else if ($filtered_length == 90)
	{
		$min = 60;
		$max = 90;
	} else if ($filtered_length == 120)
	{
		$min = 90;
		$max = 120;
	} else if ($filtered_length == 150)
	{
		$min = 120;
		$max = 150;
	} else if ($filtered_length == 180)
	{
		$min = 150;
		$max = 180;
	} else
	{
		$min = 180;
		$max = 10000;
	}

	$filtered_order = mysqli_real_escape_string($link, $_GET['order']);
	$order = "";
	$order_name = "";
	if ($filtered_order=="title"){
		$order = "film.title asc";
		$order_name = "제목 오름차순";
	} else if ($filtered_order=="time"){
		$order = "film.length asc";
		$order_name = "상영시간 적은 순";
	} else {
		$order = "count desc, length asc, title asc";
		$order_name = "최다 대여순(동일할경우 상영시간 적은순/ 제목 오름차순)";
	}

	$query = "
		select distinct film.title, film.length, 
		film.description, count(rental.inventory_id) as count 
		from rental, inventory, film 
		where inventory.inventory_id=rental.inventory_id 
		and film.film_id=inventory.film_id 
		and film.length>='$min'
		and film.length<='$max'
		group by film.title 
		order by {$order};
	";

	$article = '';
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)){
		$article .= '<tr><td>';
		$article .= $row['title'];
		$article .= '</td><td>';
		$article .= $row['description'];
		$article .= '</td><td>';
		$article .= $row['length'];
		$article .= '</td><td>';
		$article .= $row['count'];
		$article .= '</td></tr>';
	}

	mysqli_free_result($result);
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> DVD 상영시간 별 분류 정보 </title>
	<style>
		body{
			font-family: Consolas, monospace;
			font-family: 12px;
		}
		table{
			width: 100%;
		}
		th{
			padding: 10px;
			border-bottom: 1px solid #dadada;
			background-color: #F08080;
		}
		td{
			padding: 10px;
			border-bottom: 1px solid #dadada;
		}
		.top{
			color: #F08080;
            line-height: 1.5;
		}
	</style>
</head>
<body>
	<h2><a href="index.php">DVD 분류 시스템</a> | <a class="top">DVD 상영시간 별 분류</a></h2>
	<TT>상영시간: <?= $min ?>분 ~ <?= $max ?>분</TT><br>
	<TT>정렬기준: <?= $order_name ?></TT>
	<table>
		<tr>
			<th>DVD제목</th>
			<th>설명</th>
			<th>상영시간</th>
			<th>대여횟수</th>
		</tr>
		<?= $article ?>
		</table>
</body>
</html>
