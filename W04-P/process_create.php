<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'thema_id'=> mysqli_real_escape_string($link, $_POST['thema_id'])
  );
  $query = "
    INSERT INTO song
      (title, description, thema_id)
      VALUE (
        '{$filtered['title']}',
        '{$filtered['description']}',
        '{$filtered['thema_id']}'
        )
  ";

  $result = mysqli_multi_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 뒤로 돌아가서 다시 시도하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">메인으로 돌아가기 </a>';
  }
