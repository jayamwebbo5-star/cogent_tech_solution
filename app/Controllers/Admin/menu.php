<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\MenuMetaModel;

class Menu extends BaseController
{
    public function index()
    {
        return view('admin/menu', [
            "title" => "Menu Management"
        ]);
    }

    public function list()
    {
        $menu = new MenuModel();
        return $this->response->setJSON([
            "data" => $menu->getAll()
        ]);
    }

    public function save()
    {
        $menu = new MenuModel();
        $meta = new MenuMetaModel();

        $id = $this->request->getPost('id');

        // Save main menu
        $data = [
            "title" => $this->request->getPost('title'),
            "slug" => $this->request->getPost('slug'),
        ];

        if ($id == -1) {
            $id = $menu->insert($data);
        } else {
            $menu->update($id, $data);
        }

        // Save meta data
        $metaData = [
            "menu_id" => $id,
            "meta_title" => $this->request->getPost('meta_title'),
            "meta_description" => $this->request->getPost('meta_description'),
            "meta_keywords" => $this->request->getPost('meta_keywords'),
        ];

        $meta->saveMeta($id, $metaData);

        return $this->response->setJSON(["status" => true]);
    }
}
