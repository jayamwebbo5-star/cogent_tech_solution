<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    // List services (HTML fragment for AJAX inject)
    public function list()
    {
        $model = new ServiceModel();
        $services = $model->orderBy('service_id', 'DESC')->findAll();

        if (!empty($services)) {
            foreach ($services as $s) {
                echo '<div style="border:1px solid #ddd; border-radius:6px; padding:12px; margin-bottom:10px;">';
                echo '<div style="display:flex; align-items:center; justify-content:space-between;">';
                echo    '<div style="max-width:75%;">';
                echo        '<h5 style="margin:0 0 6px; font-size:16px;">' . esc($s['title']) . '</h5>';
                echo        '<p style="margin:0; color:#555; font-size:14px;">' . nl2br(esc($s['content'])) . '</p>';
                echo    '</div>';

                // Inline toggle (Active/Inactive)
                $checked = $s['is_active'] ? 'checked' : '';
                $trackColor = $s['is_active'] ? '#0d6efd' : '#ccc';
                $thumbLeft = $s['is_active'] ? '27px' : '3px';

                echo    '<div style="text-align:right;">';
                echo        '<div style="display:flex; align-items:center; gap:12px; justify-content:flex-end; margin-bottom:8px;">';
                echo            '<span style="color:#6c757d; font-size:13px;">Inactive</span>';
                echo            '<label style="position:relative; display:inline-block; width:50px; height:26px;">';
                echo                '<input type="checkbox" class="toggleActive" data-id="'. $s['service_id'] .'" '. $checked .' style="opacity:0; width:0; height:0;">';
                echo                '<span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:'. $trackColor .'; transition:.3s; border-radius:34px;"></span>';
                echo                '<span style="position:absolute; height:20px; width:20px; left:'. $thumbLeft .'; bottom:3px; background-color:white; transition:.3s; border-radius:50%;"></span>';
                echo            '</label>';
                echo            '<span style="color:#0d6efd; font-weight:600; font-size:13px;">Active</span>';
                echo        '</div>';

                // Action buttons
                echo        '<button class="btn btn-sm btn-warning editService" '.
                                'data-id="'. $s['service_id'] .'" '.
                                'data-title="'. esc($s['title']) .'" '.
                                'data-content="'. esc($s['content']) .'">Edit</button> ';
                echo        '<button class="btn btn-sm btn-danger deleteService" data-id="'. $s['service_id'] .'">Delete</button>';

                echo '<button class="btn btn-sm btn-warning editService" 
         data-id="'.$s['service_id'].'" 
         data-title="'.esc($s['title']).'" 
         data-content="'.esc($s['content']).'" 
         data-active="'.$s['is_active'].'">Edit</button>';

                echo    '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-muted">No services available</p>';
        }
    }

    // Save service (create or update)
    public function save()
    {
        $model = new ServiceModel();

        $id = $this->request->getPost('service_id');
        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0
        ];

        try {
            if (empty($id)) {
                $model->insert($data);
            } else {
                $model->update($id, $data);
            }
            return $this->response->setJSON(['status' => true]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Save failed: ' . $e->getMessage()
            ]);
        }
    }

    // Delete service
    public function delete()
    {
        $id = $this->request->getPost('service_id');
        $model = new ServiceModel();
        try {
            $model->delete($id);
            return $this->response->setJSON(['status' => true]);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    // Toggle active
    public function toggle()
    {
        $id = $this->request->getPost('service_id');
        $active = $this->request->getPost('is_active') ? 1 : 0;

        $model = new ServiceModel();
        try {
            $model->update($id, ['is_active' => $active]);
            return $this->response->setJSON(['status' => true]);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => false, 'message' => $e->getMessage()]);
        }
    }
}
