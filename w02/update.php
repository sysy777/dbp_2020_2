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
   <form action="process_update.php" method="post">
     <p>바꿀제목을 입력하세요<br/><input type="text" name="update_title" placeholder="title"></p>
     <p>바꿀내용을 입력하세요(줄바꿈하려면 원하는 위치에 < b r / >을 입력하세요.)<br/><textarea name="update_description">
최초공개일: <br/>
연출/음악: 신혁<br/>
출연: 세진<br/>
편집: 은택<br/>
조명: 추추<br/><br/>
</textarea></p>
     <p><input type="submit"></p>
   </form><br/><br/>
 </body>
 </html>
