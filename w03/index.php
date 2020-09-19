<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM song";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

 $article = array(
   'title' => '티키틱',
   'description' => '오늘이 무대, 티키틱<br/>다양한 뮤지컬과 단편 영상을 제작합니다.'
 );

 $update_link = '';
 $delete_link = '';

 if (isset($_GET['id'])) {
     $query = "SELECT * FROM song WHERE id={$_GET['id']}";
     $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);
     $article = array(
     'title' => $row['title'],
     'description' => $row['description']
   );
     $update_link = '<a href="update.php?id='.$_GET['id'].'"><TT>노래 수정하기</TT></a>';
     $delete_link = '
     <form action="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="노래 삭제하기">
     </form>
   ';
 }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> TIKITIK </title>
</head>
<body>
  <h1> <a href="index.php"> 티키틱 TIKITIK </a></h1>
  <a href="https://www.youtube.com/channel/UCSQ55iSysqYErLRDC6ARi9w"><TT>유튜브 바로가기</TT></a> <br/>
  <a href="https://www.instagram.com/tikitik.official"><TT>인스타 바로가기</TT></a> <br/>
  <a href="https://www.facebook.com/tikitik.official"><TT>페이스북 바로가기</TT></a> <br/><br/>
  <img src="tikitik.jpg" width="300" height="200">
  <h3> 노래목록 </h3>
  <ol> <?= $list ?> </ol> <br/>
  <a href="create.php" ><TT>노래 추가하기</TT></a><br/>
  <?=$update_link?>
  <?=$delete_link?>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?><br/><br/>
</body>
</html>
