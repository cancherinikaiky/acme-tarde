<?php
  $this->layout("_theme");
?>
<div>
    <h1>Página Principal</h1>
    <div>
        <?php
            if(!$user->getName()) {
        ?>
            <h1>Usuário não existe</h1>
        <?php
            }
            else {
        ?>
           <h1>Nome: <?= $user->getName(); ?></h1>
           <h1>Email: <?= $user->getEmail(); ?></h1>
        <?php
            }
        ?>
    </div>
</div>