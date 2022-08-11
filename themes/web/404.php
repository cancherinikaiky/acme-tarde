<?php
  $this->layout("_theme");
?>

<div>
    <h2>Página não encontrada! Erro <?= $error; ?></h2>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
</div>

<?php $this->start("sidebar"); ?>
    <a href="<?= url(); ?>">Voltar para o início!</a>
<?php $this->end(); ?>