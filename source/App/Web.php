<?php

namespace Source\App;

use Source\Models\User;

class Web
{
    public function home() : void
    {
        require __DIR__ . "/../../themes/web/home.php";
    }

    public function about() : void
    {
        require __DIR__ . "/../../themes/web/about.php";
    }

    public function error(array $data) : void
    {
        include __DIR__ . "/../../themes/web/404.php";
    }

    public function pdoTest(array $data) : void
    {
        $model = new User();
        $users = $model->find()->fetch(true);
        //var_dump($users);

        $model = new User();
        $user = $model->findById(7  );
        //var_dump($user);

        $model = new User();
        $user = $model->findByEmail("fabiosantos@ifsul.edu.br");
        var_dump($user);
        $user->name = "Fábio";
        $user->save();
        var_dump($user);
    }

}