<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

  $query = "SELECT * FROM thema";
  $result = mysqli_query($link, $query);
  $thema_info = '';

  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'category' => htmlspecialchars($row['category']),
      'note' => htmlspecialchars($row['note'])
    );
      $thema_info .= '<tr>';
      $thema_info .= '<td>'.$filtered['id'].'</td>';
      $thema_info .= '<td>'.$filtered['category'].'</td>';
      $thema_info .= '<td>'.$filtered['note'].'</td>';
      $thema_info .= '<td><a href="thema.php?id='.$filtered['id'].'">update</a></td>';
      $thema_info .= '
        <td>
            <form action="process_delete_thema.php" method="post">
              <input type="hidden" name="id" value="'.$filtered['id'].'">
              <input type="submit" value="delete">
            </form>
        </td>';
      $thema_info .= '</tr>';
  };

  $escaped = array(
    'category' => '',
    'note' => ''
  );

  $form_action = 'process_create_thema.php';
  $label_submit = 'Create thema';
  $form_id = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered_id, 'integer');
      $query = "SELECT * FROM thema WHERE id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['category'] = htmlspecialchars($row['category']);
      $escaped['note'] = htmlspecialchars($row['note']);

      $form_action = 'process_update_thema.php';
      $label_submit = 'Update thema';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title> TIKITIK </title>
</head>
<body>
  <h1> <a href="index.php"> 티키틱 TIKITIK </a></h1>
  <a href="https://www.youtube.com/channel/UCSQ55iSysqYErLRDC6ARi9w"><TT>유튜브 바로가기</TT></a> <br/>
  <a href="https://www.instagram.com/tikitik.official"><TT>인스타 바로가기</TT></a> <br/>
  <a href="https://www.facebook.com/tikitik.official"><TT>페이스북 바로가기</TT></a> <br/><br/>
  <img src="tikitik.jpg" width="300" height="200">
  <p><a href="index.php">메인페이지로 돌아가기</a></p>

    <table border="1">
      <tr>
        <th>id</th>
        <th>category</th>
        <th>note</th>
        <th>update</th>
        <th>delete</th>
      </tr>
      <?= $thema_info ?>
    </table>
    <br>
    <form action="<?= $form_action ?>" method="post">
      <?= $form_id ?>
      <label for="fcategory">category:</label><br>
      <input type="text" id="category" name="category" placeholder="category"
      value="<?=$escaped['category']?>"><br>
      <label for="lnote">note:</label><br>
      <input type="text" id="note" name="note" placeholder="note"
      value="<?=$escaped['note']?>"><br><br>
      <input type="submit" value="<?= $label_submit ?>">
    </form>
</body>
</html>
