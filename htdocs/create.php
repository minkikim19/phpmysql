<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result))
{
    $escape_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escape_title}</a></li>";
}

$article = array(
    'title'=>'Welcom',
    'description'=>'Hello, WEB'
);

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol><?=$list?></ol>
    <form action="process_create.php" method="POST">
    <P><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></P>
    <p><textarea name="description" placeholder="description" id="" cols="30" rows="10"></textarea></p>
    <p><input type="submit"></p>
</form>
  </body>
</html>