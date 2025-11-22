<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SlideModel;

class Slides extends BaseController
{
    public function list()
    {
        $model = new SlideModel();
        $slides = $model->orderBy('slide_id', 'DESC')->findAll();

        if (!empty($slides)) {
            foreach ($slides as $s) {
                echo '<div style="max-width:300px; margin:10px auto; border:1px solid #ddd; padding:10px; border-radius:6px;">';
                echo '<h5 style="margin:0; font-size:16px;">' . esc($s['slide_title']) . '</h5>';
                echo '<p style="margin:5px 0; font-size:14px; color:#555;">' . esc($s['slide_subtitle']) . '</p>';
                echo '<button class="btn btn-sm btn-warning editSlide" 
                          data-id="' . $s['slide_id'] . '" 
                          data-title="' . esc($s['slide_title']) . '" 
                          data-subtitle="' . esc($s['slide_subtitle']) . '">Edit</button> ';
                echo '<button class="btn btn-sm btn-danger deleteSlide" 
                          data-id="' . $s['slide_id'] . '">Delete</button>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-muted">No slides available</p>';
        }
    }

    public function save()
    {
        $model = new SlideModel();

        $id = $this->request->getPost('slide_id');
        $data = [
            'slide_title'    => $this->request->getPost('slide_title'),
            'slide_subtitle' => $this->request->getPost('slide_subtitle')
        ];

        if (empty($id)) {
            $model->insert($data);
        } else {
            $model->update($id, $data);
        }

        return $this->response->setJSON(['status' => true]);
    }

    public function delete()
    {
        $model = new SlideModel();
        $id = $this->request->getPost('slide_id');
        $model->delete($id);

        return $this->response->setJSON(['status' => true]);
    }

   public function videoPreview()
{
    $db = \Config\Database::connect();
    $row = $db->table('settings')->get()->getRowArray();
    $video_link = $row['video_link'] ?? null;
    $is_active  = $row['is_active'] ?? 0;

    if ($video_link && $is_active) {
       echo '<iframe width="280" height="160" src="' . esc($video_link) . '" frameborder="0" allowfullscreen style="max-width:100%; margin:0 auto; border-radius:8px;"></iframe>';

    } else {
        echo '<p class="text-muted">Video is inactive or not set</p>';
    }
}

    public function saveVideo()
    {
        $video_link = $this->request->getPost('video_link');
        $is_active  = $this->request->getPost('is_active') ? 1 : 0;

        $db = \Config\Database::connect();
        $builder = $db->table('settings');
        $row = $builder->get()->getRowArray();

        $data = [
            'video_link' => $video_link,
            'is_active'  => $is_active
        ];

        if ($row) {
            $builder->update($data, ['id' => $row['id']]);
        } else {
            $builder->insert($data);
        }

        return $this->response->setJSON(['status' => true]);
    }
}
