<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_WEB,CONF_VIEW_EXT);
    }

    public function home() : void
    {
        $user = new User(2);
        $user->findById();

        echo $this->view->render(
            "home",[
                "title" => CONF_SITE_NAME,
                "user" => $user,
                "name" => "Fábio"
            ]);
    }

    public function about() : void
    {
        echo $this->view->render("about",[
            "title" => CONF_SITE_NAME
        ]);
    }

    public function project()
    {

    }

    public function error(array $data) : void
    {
//      echo "<h1>Erro {$data["errcode"]}</h1>";
//      include __DIR__ . "/../../themes/web/404.php";
        echo $this->view->render("404", [
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

}