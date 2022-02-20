<!DOCTYPE html>
<html>

<head>
    <title>
        Вход
    </title>
   
</head>
<?php
include("navbar.php");

$stmt = $pdo->query("SELECT * FROM articles ORDER BY id DESC LIMIT 10");
while ($row = $stmt->fetch()) {
    $author_id = $row["author_id"];
    $author_query = $pdo->query("SELECT name FROM authors WHERE id = '$author_id' LIMIT 1 ");
    $ftc = $author_query->fetch();
    ?>
    <div class="article_wrapper">
        <h1 class="article_h1">
            <a href="article.php?id=<?php echo $row["id"];?>">
            <?php echo $row["title"];?>
            </a>
        </h1>
        <h5 class="authorname">Автор: <?php echo $ftc["name"];?> </h5>
        <p><?php echo mb_substr(strip_tags($row["text"]), 0, 200, 'utf-8');?>...</p>
    </div>
    

    <?php
}

include('footer.php');
