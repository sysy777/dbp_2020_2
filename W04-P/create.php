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

$updated_link = '';

 if (isset($_GET['id'])) {
     $query = "SELECT * FROM song WHERE id={$_GET['id']}";
     $result = mysqli_query($link, $query);
     $row = mysqli_fetch_array($result);
     $article = array(
     'title' => $row['title'],
     'description' => $row['description']
   );
     $updated_link = '<a href="update.php?id'.$_GET['id'].'">update</a>';
 }

   $query = "SELECT * FROM thema";
   $result = mysqli_query($link, $query);
   $select_form = '<select name="thema_id">';
   while ($row = mysqli_fetch_array($result)) {
       $select_form .= '<option value="'.$row['id'].'">'.$row['category'].'</option>';
   }
   $select_form .= '</select>'
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
<a href="영상의 url을 입력하세요">영상 바로가기</a><br/></textarea></p>
    <?= $select_form ?>
     <p><input type="submit"></p>
   </form><br/><br/>
 </body>
 </html>
