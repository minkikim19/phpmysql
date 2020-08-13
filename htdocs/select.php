<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id=6 LIMIT 1000";
$result = mysqli_query($conn, $sql);
$row = (mysqli_fetch_array($result));
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];
        //echo $row['title']; ['title'], ['1'] 이런 배열을 연관배열이라 한다.
        //print_r(mysqli_fetch_array($result));
        //var_dump($result->num_rows);


//all row
echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];}
?>