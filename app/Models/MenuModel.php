<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = "web_menu";
    protected $primaryKey = "id";
    protected $allowedFields = ["title", "slug", "has_meta", "status"];

    public function getAll()
    {
        return $this->findAll();
    }
}
