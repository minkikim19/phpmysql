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
    'description'=>'Hello, minki!'
);

$update_link = '';
$delete_link = '';
$author = '';
if(isset($_GET['id'])) 
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";

    $result = mysqli_query($conn, $sql);
    //echo  mysqli_error($conn);
    $row = mysqli_fetch_array($result);
    //print_r($row);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

    $update_link = '<a href = "update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = 
      '<form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>';

    $author = "<p>by {$article['name']}</p>";
}

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
    <a href = "create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <?=$author?>
  </body>
</html>