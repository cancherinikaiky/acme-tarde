<?php

namespace Source\App;

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

}

?>