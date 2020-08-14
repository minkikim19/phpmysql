<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');
$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = 
"
    INSERT INTO topic
    (title, description, created)
    VALUES
    (
    '{$filtered['title']}',
    '{$filtered['description']}',
    NOW()
    )
";

$result = mysqli_query($conn, $sql);//정보 전달을 위한 함수 사용
if ($result == false)
    {
        echo 'There was a problem while saving. Please contact the administrator.';
        error_log(mysqli_error($conn));
    }
    else
    {
        echo 'Succeed. <a href = index.php>return</a>';
    }
?>