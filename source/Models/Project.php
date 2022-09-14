<?php

namespace Source\Models;

use Source\Core\Connect;

class Project
{
    private $id;
    private $title;
    private $abstract;
    private $text;
    private $idCategory;

    /**
     * @param $id
     * @param $title
     * @param $abstract
     * @param $text
     * @param $idCategory
     */
    public function __construct(
        int $id = null,
        string $title = null,
        string $abstract = null,
        string $text = null,
        int $idCategory = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->abstract = $abstract;
        $this->text = $text;
        $this->idCategory = $idCategory;
    }

    public function findByCategory(int $idCategory)
    {
        $query = "SELECT * FROM projects WHERE idCategory = :idCategory";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idCategory",$idCategory);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

}