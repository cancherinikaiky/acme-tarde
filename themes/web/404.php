<?php $this->layout("_theme"); ?>

<div>
    <h2>Página não encontrada! Erro <?= $error; ?></h2>
    <p></p>
</div>

<?php $this->start("sidebar"); ?>
<a href="<?= url(); ?>">Voltar para o início!</a>
<?php $this->end(); ?>
