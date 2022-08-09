<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= CONF_SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?= url("assets/web/css/styles.css"); ?>">
</head>
<body>
<nav>
    <?php
        if($this->section("sidebar")){
            echo $this->section("sidebar");
        } else {
    ?>
            <a title="" href="<?= url() ?>">Home</a>
            <a title="" href="<?= url("sobre") ?>">Sobre</a>
    <?php
        }
    ?>
</nav>
<main>
    <?= $this->section("content"); ?>
</main>
<footer>
    <?= CONF_SITE_NAME; ?>
</footer>
</body>
</html>
