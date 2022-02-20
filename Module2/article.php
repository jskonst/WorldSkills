<?php
include("navbar.php");
$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM articles WHERE  id = '$id'");
while ($row = $stmt->fetch()) {
    $author_id = $row["author_id"];
    $author_query = $pdo->query("SELECT name FROM authors WHERE id = '$author_id' LIMIT 1 ");
    $ftc = $author_query->fetch();
    ?>

    <div class="article">
        <h1>
        <?php echo $row['title']; ?>
        </h1>
        <h5>
            Автор: <?php echo $ftc['name']; ?>
        </h5>
        <p>
        <?php echo $row['text']; ?>
        </p>
        <p class="pubdate mr-sm-2">
            Опубликовано: <?php echo $row['pubdate']; ?>
        </p>
    </div>

    



    <?php
}