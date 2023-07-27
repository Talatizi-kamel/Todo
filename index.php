<?php
const ERROR_REQUIRED = 'Veuillez renseigner une todo';
const ERROR_TOO_SHORT = 'Veuillez entrer au moins 5 caractéres';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $todo = $_POST['todo'] ?? '';

    if (!$todo) {
        $error = ERROR_REQUIRED;
    } else if (strlen($todo) < 5) {
        $error = ERROR_TOO_SHORT;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/index.js">
    </script>
    <title>Todo</title>
</head>

<body>
    <div class="container">
        <?php require_once 'include/header.php'; ?>
        <div class="content">
            <div class="todo-container">
                <h1>Ma Todo</h1>

                <form action="/" method="POST" class="todo-form">
                    <input type="text" name="todo">
                    <button class="btn btn-primary">Ajouter</button>
                </form>
                <?php if ($error) : ?>
                    <p class="text-danger"><?= $error ?></p>
                <?php endif ?>
                <div class="todo-list"></div>
            </div>
        </div>
        <?php require_once 'include/footer.php'; ?>
    </div>
</body>

</html>