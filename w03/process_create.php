<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description'])
  );
  $query = "
    INSERT INTO song (
      title, description
      ) VALUE (
        '{$filtered['title']}',
        '{$filtered['description']}'
        )
  ";
  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 뒤로 돌아가서 다시 시도하세요.';
      error_log(mysqli_error($link));
  } else {
      echo '성공했습니다. <a href="index.php">메인으로 돌아가기 </a>';
  }
