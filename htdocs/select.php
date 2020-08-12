<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');
$sql = "SELECT * FROM topic WHERE id=6 LIMIT 1000";
$result = mysqli_query($conn, $sql);
$row = (mysqli_fetch_array($result));
echo '<h1>'.$row['title'].'</h1>';
echo $row['description'];
        //echo $row['title']; ['title'], ['1'] 이런 배열을 연관배열이라 한다.
        //print_r(mysqli_fetch_array($result));
        //var_dump($result->num_rows);

?>