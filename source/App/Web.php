<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(CONF_VIEW_WEB,'php');
        //$this->view = new Engine(__DIR__ . "/../../themes/web",'php');
    }

    public function home() : void
    {
        // require __DIR__ . "/../../themes/web/home.php";

        $user = new User(2);
        $user->findById();
        //var_dump($user);

        echo $this->view->render(
            "home",["user" => $user]);
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",
            ["name" => "Fábio", "age" => 46]
        );

    }

    public function register(?array $data) : void
    {
        if(!empty($data)){
            //var_dump($data);
            echo json_encode($data);

            $user = new User(
                null,
                $data["name"],
                $data["email"],
                $data["password"]
            );
            $user->insert();
            return;
        }

        echo $this->view->render("register",[]);
    }


    public function login() : void
    {
        echo $this->view->render("login",[]);
    }

    public function contact(array $data) : void
    {
        var_dump($data);
        echo $this->view->render("contact");
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