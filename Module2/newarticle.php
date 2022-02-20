<?php
include('navbar.php');
?>
<div class="form_wrap">
    <div class="articlecreate_wrap">
        <h2>Создание новой статьи</h2><br>
        <form action="newarticle.php" method="post">
            <p class="inputs_article">
                <input class='title_input' type="text" placeholder="Загаловок" name="title" /><br>
                <textarea class='reg_areainput' type="text" placeholder="Текст" name="text">Текст статьи</textarea>
                <br>

            </p>
            <p><button type="submit" class="btn btn-primary">Создать</button></p>
        </form>
    </div>
</div>
<?php
if (isset($_POST["title"]) && isset($_POST["text"]) && $_POST["text"] != '' && $_POST["title"] != '') {
    $title = $_POST["title"];
    $text = $_POST["text"];
    $author_id = $_SESSION['author_id'];
    $stmt = $pdo->query("INSERT INTO articles (title, text, author_id) VALUES ('$title', '$text', '$author_id')");
    header("Location: index.php");
    exit;
}
include('footer.php');
