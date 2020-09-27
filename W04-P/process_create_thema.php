<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

    $filtered = array(
        'category' => mysqli_real_escape_string($link, $_POST['category']),
        'note' => mysqli_real_escape_string($link, $_POST['note'])
    );
    $query = "
        INSERT INTO thema
            (category, note)
            VALUES(
                '{$filtered['category']}',
                '{$filtered['note']}'
            )
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: thema.php');
    }
