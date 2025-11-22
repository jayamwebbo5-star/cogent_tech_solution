<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuMetaModel extends Model
{
    protected $table = "web_menu_meta";
    protected $primaryKey = "id";
    protected $allowedFields = ["menu_id", "meta_title", "meta_description", "meta_keywords"];

    public function saveMeta($menuId, $data)
    {
        $exists = $this->where("menu_id", $menuId)->first();

        if ($exists) {
            $this->update($exists['id'], $data);
        } else {
            $this->insert($data);
        }
    }
}
