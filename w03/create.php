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
   'description' => '오늘이 무대, 티키틱\n다양한 뮤지컬과 단편 영상을 제작합니다.'
 );

 if (isset($_GET['id'])) {
     $query = "SELECT * FROM song WHERE id={$_GET['id']}";
     $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);
     $article = array(
     'title' => $row['title'],
     'description' => $row['description']
   );
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
   <a href="https://www.facebook.com/tikitik.official"><TT>페이스북 바로가기</TT></a> <br/>
   <img src="tikitik.jpg" width="300" height="200">
   <ol> <?= $list ?> </ol>
   <form action="process_create.php" method="post">
     <p>제목<br/><input type="text" name="title" placeholder="title"></p>
     <p>설명(줄바꿈하려면 원하는 위치에 < b r / >을 입력하세요.)<br/><textarea name="description">
최초공개일: <br/>
연출/음악: 신혁<br/>
주연: 세진<br/>
디자인: 은택<br/>
조명: 추추<br/>
가사<br/><br/>
<a href="영상의 url을 입력하세요">영상 바로가기</a>

</textarea></p>
     <p><input type="submit"></p>
   </form><br/><br/>
 </body>
 </html>
