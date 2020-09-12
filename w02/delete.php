<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM song";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

 $article = array(
   'title' => '티키틱',
   'description' => '오늘이 무대, 티키틱\n다양한 뮤지컬과 단편 영상을 제작합니다.'
 );
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
   <a href="https://www.facebook.com/tikitik.official"><TT>페이스북 바로가기</TT></a> <br/>
   <img src="tikitik.jpg" width="300" height="200">
   <ol> <?= $list ?> </ol>
   <form action="process_delete.php" method="post">
     <p>삭제할 노래 이름을 입력하세요<br/><input type="text" name="delete_title"></p>
     <p><input type="submit"></p>
   </form><br/><br/>
 </body>
 </html>
