<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/task2/settings.php";
?>

<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Форма обратной связи">
    <meta name="keywords" content="форма, письмо">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <link href="/task2/form.css" rel="stylesheet">
    <title>Форма обратной связи</title>
</head>

<body class="text-center">
<main class="form-signin w-100 m-auto">

    <form id="form" method="POST" action="/task2/form.php">
        <h1 class="h3 mb-3 fw-normal">Форма обратной связи</h1>

        <div class="alert alert-danger" style="display: none;" role="alert" id="errorAlert"></div>

        <div class="form-floating">
            <input type="email" required class="form-control" id="email" name="<?= EMAIL_INPUT_NAME ?>">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input type="text" required class="form-control" maxlength="20" id="name" name="<?= NAME_INPUT_NAME ?>">
            <label for="name">Имя</label>
        </div>
        <div class="mb-3">
            <select class="form-select" id="rating" name="<?= RATING_INPUT_NAME ?>">
                <option selected>Оцените страницу :)</option>
                <option>10</option>
                <option>9</option>
                <option>8</option>
                <option>7</option>
                <option>6</option>
                <option>5</option>
                <option>4</option>
                <option>3</option>
                <option>2</option>
                <option>1</option>
                <option>0</option>
            </select>
        </div>
        <div class="mb-3">
            <textarea class="form-control" placeholder="Оставьте комментарий..." rows="3" cols="500" maxlength="500"
                      id="comment"
                      name="<?= COMMENT_INPUT_NAME ?>"></textarea>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
    </form>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>
</html>