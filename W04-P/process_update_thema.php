<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
    settype($_POST['id'], 'integer');
    $filtered = array(
        'id' => mysqli_real_escape_string($link, $_POST['id']),
        'category' => mysqli_real_escape_string($link, $_POST['category']),
        'note' => mysqli_real_escape_string($link, $_POST['note'])
    );
    $query = "
        UPDATE thema
            SET
                category = '{$filtered['category']}',
                note = '{$filtered['note']}'
            WHERE
                id = '{$filtered['id']}'
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: thema.php');
    }
