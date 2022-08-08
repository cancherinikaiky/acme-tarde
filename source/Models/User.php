<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("clients",["name","email","password","dtBorn"]);
    }

    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find =  $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }
}