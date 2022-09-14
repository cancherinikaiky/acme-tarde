<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Faq;
use Source\Models\Project;
use Source\Models\User;

class Web
{
    private $view;
    private $categories;

    public function __construct()
    {
        $categories = new Category();
        $this->categories = $categories->selectAll();

        $this->view = new Engine(CONF_VIEW_WEB,'php');
    }

    public function home() : void
    {
        echo $this->view->render(
            "home",[
                "categories" => $this->categories
            ]
        );
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",[
                "categories" => $this->categories
            ]
        );

    }

    public function faq()
    {
        $faq = new Faq();
        $faqs = $faq->selectAll();

        echo $this->view->render("faq",
            [
                "categories" => $this->categories,
                "faqs" => $faqs
            ]
        );
    }

    public function register(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("", $data)) {
                $json = [
                    "message" => "Informe nome, e-mail e senha para cadastrar!",
                    "type" => "warning"
                ];

                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();

            if($user->findByEmail($data["email"])){
                $json = [
                    "message" => "Email já cadastrado!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User(
                null,
                $data["name"],
                $data["email"],
                $data["password"]
            );

            if(!$user->insert()){
                $json = [
                    "message" => $user->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "name" => $data["name"],
                    "message" => $user->getMessage(),
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            }

            // Usuário salvo com sucesso
            return;
        }

        echo $this->view->render(
            "register",
            [
                "categories" => $this->categories,
                "eventName" => CONF_SITE_NAME
            ]);
    }

    public function login(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();

            if(!$user->validate($data["email"],$data["password"])){
                $json = [
                    "message" => $user->getMessage(),
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            }

            $json = [
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "message" => $user->getMessage(),
                "type" => "success"
            ];
            echo json_encode($json);
            return;

        }

        echo $this->view->render(
            "login",
            [
                "categories" => $this->categories,
                "eventName" => CONF_SITE_NAME
            ]);

    }

    public function projects(?array $data) : void
    {
        if(!empty($data)){
            $project = new Project();
            $projects = $project->findByCategory($data["idCategory"]);
        }
        echo $this->view->render(
            "projects",[
                "categories" => $this->categories,
                "projects" => $projects
            ]
        );
    }

    public function contact(array $data) : void
    {
        echo $this->view->render(
            "contact",["categories" => $this->categories]
        );
    }

    public function error(array $data) : void
    {
        echo $this->view->render("404", [
            "categories" => $this->categories,
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

}