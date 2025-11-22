<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class MainPage extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper("util");
    }

    public function reorderDisplayOrder(
        string $table,
        string $primaryKey,
        int $currentId,
        int $newOrder,
        string $operation,
        string $isDeletedField = 'is_deleted'
    ): void {
        $builder = $this->db->table($table);
        $orderField = 'display_order';
        if ($operation === 'delete') {
            $row = $builder->where($primaryKey, $currentId)->get()->getRow();
            if (!$row)
                return;
            $deletedOrder = (int) $row->$orderField;
            $builder->set($orderField, "$orderField - 1", false)
                ->where($orderField . ' >', $deletedOrder)
                ->where("{$isDeletedField} !=", 1)
                ->update();
        } elseif ($operation === 'insert') {
            $builder->set($orderField, "$orderField + 1", false)
                ->where($orderField . ' >=', $newOrder)
                ->where("{$isDeletedField} !=", 1)
                ->update();
        } elseif ($operation === 'update') {
            $row = $builder->where($primaryKey, $currentId)->get()->getRow();
            if (!$row)
                return;

            $oldOrder = (int) $row->$orderField;

            if ($newOrder < $oldOrder) {
                $builder->set($orderField, "$orderField + 1", false)
                    ->where($orderField . ' >=', $newOrder)
                    ->where($orderField . ' <', $oldOrder)
                    ->where($primaryKey . ' !=', $currentId)
                    ->where("{$isDeletedField} !=", 1)
                    ->update();
            } elseif ($newOrder > $oldOrder) {
                $builder->set($orderField, "$orderField - 1", false)
                    ->where($orderField . ' <=', $newOrder)
                    ->where($orderField . ' >', $oldOrder)
                    ->where($primaryKey . ' !=', $currentId)
                    ->where("{$isDeletedField} !=", 1)
                    ->update();
            }
        }
    }

    //Menu
    public function pageMenu()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Menu";
        return view('admin/pages/menu', $page);
    }

    public function getMenu()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_menu')
            ->select('web_menu_id,web_title, 
            concat("' . MENU_IMG . '",web_image) as web_image,created_on,meta_title,meta_desc,meta_key,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_menu_id', NULL)) {
            $data->where('web_menu_id', $this->request->getPost('web_menu_id', NULL));
        }
        $data = $data->orderBy('web_menu_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);

        return $this->respond(data: $data, message: 'successfully');
    }

    public function saveMenu()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "edit":
                $manda_arr = ['web_menu_id'];
                $allowedFields = ['web_title', 'web_image', 'meta_title', 'meta_desc', 'meta_key', 'is_active'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/menu/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "menu_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_menu_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_menu');

        if ($data['web_menu_id'] > 0) {

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_menu_id', $data['web_menu_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {
            return $this->respond($data, 'Unable to save Data', 404);
        }
        return $this->respond([], 'successfully');
    }

    //Setting
    public function pageSetting()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Setting";
        $page['data'] = $this->db->table('web_setting')
            ->select('*')
            ->where('web_setting_id', 1)
            ->get()->getRowArray();
        return view('admin/pages/setting', $page);
    }

    public function saveSetting()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();
        $data['web_setting_id'] = 1;
        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "edit":
                $manda_arr = [];
                $allowedFields = [
                    "about_content",
                    "social_title",
                    "facebook_url",
                    "x_url",
                    "instagram_url",
                    "linkedin_url",
                    "youtube_url",
                    "user_email",
                    "user_phone_1",
                    "user_phone_2",
                    "contentus_title",
                    "contentus_title_content",
                    "map_url",
                    "address_1",
                    "address_2",
                    "address_3",
                    "address_4",
                    "state",
                    "country",
                    "pincode"
                ];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_setting');
        if ($data['web_setting_id'] > 0) {
            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_setting_id', $data['web_setting_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {
            return $this->respond($data, 'Unable to save Data', 404);
        }
        return $this->respond([], 'successfully');
    }

    //Banner
    public function pageBanner()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 13)
            ->get()->getRowArray();
        $page['title'] = "Banner";
            $page['bannermaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 20)->get()->getRowArray();
        return view('admin/pages/banner', $page);
    }



    public function getBanner()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_banner')
            ->select('web_banner_id,concat("' . BANNER_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_banner_id', NULL)) {
            $data->where('web_banner_id', $this->request->getPost('web_banner_id', NULL));
        }
        $data = $data->orderBy('web_banner_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }

        unset($row);
        $data_count = $this->db->table('web_banner')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();
      
        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveBanner()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_banner_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_banner',
                    primaryKey: 'web_banner_id',
                    currentId: $data['web_banner_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_banner_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_banner_id'];
                $allowedFields = ['web_title', 'web_image', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/banner/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "banner_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_banner_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_banner');

        if ($data['web_banner_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_banner',
                    primaryKey: 'web_banner_id',
                    currentId: $data['web_banner_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_banner_id', $data['web_banner_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_banner',
                primaryKey: 'web_banner_id',
                currentId: $data['web_banner_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }





        public function pagefunctionmanage()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
           $data = $this->request->getPost();

          $web_content_id = $data['web_content_id'];
          $is_active = $data['is_active'];

           $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id',$web_content_id)
            ->get()->getRowArray();
            $builder = $this->db->table('web_content');

            $updateData['status'] = $is_active;
            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_content_id', $web_content_id);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
            return $this->respond([], 'successfully');

    }

    //Home Page Swiper
    public function swiper()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 1)
            ->get()
            ->getRowArray();
            
        $page['title'] = "Our Mission";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i>
        <span>Swiper</span>
        </div>';

        return view('admin/pages/swiper', $page);
    }
  
    //Home page Services
    public function pageHomeServices()
{
    // Check login
    if (!session()->get('user_login_id')) {
        return redirect()->to(base_url(ADMIN_NAME));
    }

    // Load all services from the services table
    $serviceModel = new \App\Models\ServiceModel();
    $page['services'] = $serviceModel->orderBy('service_id', 'DESC')->findAll();

    // Page metadata
    $page['title'] = "Services";
    $page['breadcrumb'] = '<div class="own-breadcrumb">
        Home <i style="font-size:14px" class="fas fa-chevron-right"></i> 
        <span>Services</span>
    </div>';

    // Render the services view
    return view('admin/pages/services', $page);
}

    
    


    //Home Page Take Action
    public function pageHomeTakeAction()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 4)
            ->get()->getRowArray();
        $page['title'] = "Take Action";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Take Action</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //Home Page Founder message
    public function pageHomeFounder()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['richText'] = 1;

        $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id', 2)
            ->get()->getRowArray();

        $page['title'] = "Founder\'s Message";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Founder\'s Message</span></div>';
        return view('admin/pages/founder', $page);
    }

    //About Page Our Mission
    public function pageAboutOurMission()
{
    if (!session()->get('user_login_id')) {
        return redirect()->to(base_url(ADMIN_NAME));
    }

    $page['data'] = $this->db->table('web_content')
        ->select('*')
        ->where('web_content_id', 5)  // About Our Mission = ID 5
        ->get()
        ->getRowArray();

    $page['title'] = "About - Our Mission";
    $page['breadcrumb'] = '
        <div class="own-breadcrumb">
            About <i style="font-size:14px" class="fas fa-chevron-right"></i>
            <span>Our Mission</span>
        </div>';

    //  You can use a separate view if you want, e.g. 'aboutourmission'
    // or keep the same one if both use the same layout:
    return view('admin/pages/homeourmission', $page);
}


    //About Page TakeAction
    public function pageAboutTakeAction()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 8)
            ->get()->getRowArray();

        $page['title'] = "Take Action";
        $page['breadcrumb'] = '<div class="own-breadcrumb">About <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Take Action</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //About Page Founder message
    public function pageAboutFounder()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['richText'] = 1;

        $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id', 7)
            ->get()->getRowArray();

        $page['title'] = "Founder\'s Message";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Founder\'s Message</span></div>';
        return view('admin/pages/founder', $page);
    }

    //Team Page Founder message
    public function pageTeamFounder()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id', 9)
            ->get()->getRowArray();

        $page['title'] = "Founder\'s Message";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Founder\'s Message</span></div>';
        return view('admin/pages/founder', $page);
    }

    //Brand
    public function pageBrand()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Client";
        return view('admin/pages/brand', $page);
    }

    public function getBrand()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_brand')
            ->select('web_brand_id,web_title,
            concat("' . BRAND_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_brand_id', NULL)) {
            $data->where('web_brand_id', $this->request->getPost('web_brand_id', NULL));
        }
        $data = $data->orderBy('web_brand_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);

        $data_count = $this->db->table('web_brand')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveBrand()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_brand_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_brand',
                    primaryKey: 'web_brand_id',
                    currentId: $data['web_brand_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_brand_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "dashboard":
                $manda_arr = ['web_brand_id', 'is_dashboard'];
                $allowedFields = ['is_dashboard'];
                break;

            case "edit":
                $manda_arr = ['web_brand_id', 'web_title'];
                $allowedFields = ['web_title', 'is_dashboard', 'web_image', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/brand/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "project_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_brand_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_brand');

        if ($data['web_brand_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_brand',
                    primaryKey: 'web_brand_id',
                    currentId: $data['web_brand_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_brand_id', $data['web_brand_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_brand',
                primaryKey: 'web_brand_id',
                currentId: $data['web_brand_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }

    //Home Page Our Mission
    public function pageTeamClient()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 10)
            ->get()->getRowArray();

        $page['title'] = "Cilent";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Team <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Cilent</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //Get Home Page About
    public function pageHomeAbout()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id', 3)
            ->get()->getRowArray();

        $page['title'] = "About";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Home <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>About</span></div>';
        return view('admin/pages/aboutcontent', $page);
    }

    //Resources Page
    public function pageResources()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['richText'] = true;

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 12)
            ->get()->getRowArray();

        $page['title'] = "Resources";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Resorces <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Content</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //Resources Page Gallery
    public function pageGallery()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 11)
            ->get()->getRowArray();
        $page['title'] = "Gallery";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Resources <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Gallery</span></div>';
        $page['gallerymaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 21)->get()->getRowArray();
        
        return view('admin/pages/gallery', $page);
    }

    public function getGallery()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_gallery')
            ->select('web_gallery_id,concat("' . GALLERY_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_gallery_id', NULL)) {
            $data->where('web_gallery_id', $this->request->getPost('web_gallery_id', NULL));
        }
        $data = $data->orderBy('web_gallery_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);
        $data_count = $this->db->table('web_gallery')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveGallery()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_gallery_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_gallery',
                    primaryKey: 'web_gallery_id',
                    currentId: $data['web_gallery_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_gallery_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_gallery_id'];
                $allowedFields = ['web_title', 'web_image', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/gallery/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "gallery_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_gallery_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_gallery');

        if ($data['web_gallery_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_gallery',
                    primaryKey: 'web_gallery_id',
                    currentId: $data['web_gallery_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_gallery_id', $data['web_gallery_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_gallery',
                primaryKey: 'web_gallery_id',
                currentId: $data['web_gallery_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }


    //     public function saveGallerymaster()
    // {
    //     if (!session()->get('user_login_id')) {
    //         return $this->respond([], 'Session Expired', 404);
    //     }
    //        $data = $this->request->getPost();

    //       $web_content_id = $data['web_content_id'];
    //       $is_active = $data['is_active'];
    //           $page['data'] = $this->db->table('web_content')
    //             ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
    //             ->where('web_content_id',$web_content_id)
    //             ->get()->getRowArray();
    //             $builder = $this->db->table('web_content');
    
    //             $updateData['status'] = $is_active;
    //             $updateData['updated_by'] = session()->get('user_login_id');
    //             $updateData['updated_on'] = date('Y-m-d H:i:s');
    //             $builder->where('web_content_id', $web_content_id);
    //             if (!$builder->update($updateData)) {
    //              return $this->respond($data, 'Unable Update Data', 404);
    //             }
    //             return $this->respond([], 'successfully');

           

    // }



    //Resources Page Video
    public function pageVideo()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Video";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Resources <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Video</span></div>';
        $page['videomaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 22)->get()->getRowArray();
        
        return view('admin/pages/video', $page);
    }

    public function getVideo()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_video')
            ->select('web_video_id,web_title,web_name,web_url,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_video_id', NULL)) {
            $data->where('web_video_id', $this->request->getPost('web_video_id', NULL));
        }
        $data = $data->orderBy('web_video_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);
        $data_count = $this->db->table('web_video')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveVideo()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_video_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_video',
                    primaryKey: 'web_video_id',
                    currentId: $data['web_video_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_video_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_video_id'];
                $allowedFields = ['web_title', 'web_name', 'web_url', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_video');

        if ($data['web_video_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_video',
                    primaryKey: 'web_video_id',
                    currentId: $data['web_video_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_video_id', $data['web_video_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_video',
                primaryKey: 'web_video_id',
                currentId: $data['web_video_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }




    // public function savevideomaster()
    // {
    //     if (!session()->get('user_login_id')) {
    //         return $this->respond([], 'Session Expired', 404);
    //     }
    //        $data = $this->request->getPost();

    //       $web_content_id = $data['web_content_id'];
    //       $is_active = $data['is_active'];
    //             $page['data'] = $this->db->table('web_content')
    //                 ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
    //                 ->where('web_content_id',$web_content_id)
    //                 ->get()->getRowArray();
    //                 $builder = $this->db->table('web_content');
        
    //                 $updateData['status'] = $is_active;
    //                 $updateData['updated_by'] = session()->get('user_login_id');
    //                 $updateData['updated_on'] = date('Y-m-d H:i:s');
    //                 $builder->where('web_content_id', $web_content_id);
    //                 if (!$builder->update($updateData)) {
    //                  return $this->respond($data, 'Unable Update Data', 404);
    //                 }
    //                 return $this->respond([], 'successfully');

           
    // }
    //Get Involved Page
    public function pageInvolved()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 11)
            ->get()->getRowArray();

        $page['title'] = "Involved";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Get Involved <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Content</span></div>';

            
        return view('admin/pages/homeourmission', $page);
    }

    // Involved List
    public function pageInvolvedList()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Involved List";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Get Involved <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>List</span></div>';
        $page['involvemaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 23)->get()->getRowArray();
        return view('admin/pages/involvedlist', $page);
    }
    
    public function getDonationForm()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Donation Form";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Get Involved <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Donation Form</span></div>';  
        $page['donatemaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 25)->get()->getRowArray();
       
        return view('admin/pages/donationform', $page);
    }
    
    public function getInvolvedList()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_involved')
            ->select('web_involved_id,web_title,web_icon,web_content,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_involved_id', NULL)) {
            $data->where('web_involved_id', $this->request->getPost('web_involved_id', NULL));
        }
        $data = $data->orderBy('web_involved_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);

        $data_count = $this->db->table('web_involved')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveInvolvedList()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_involved_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_involved',
                    primaryKey: 'web_involved_id',
                    currentId: $data['web_involved_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_involved_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_involved_id', 'web_title', 'web_icon', 'web_content',];
                $allowedFields = ['web_title', 'web_icon', 'web_content', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_involved');

        if ($data['web_involved_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_involved',
                    primaryKey: 'web_involved_id',
                    currentId: $data['web_involved_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_involved_id', $data['web_involved_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_involved',
                primaryKey: 'web_involved_id',
                currentId: $data['web_involved_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }

    //Get Home Page About
    public function pageAboutAbout()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as image')
            ->where('web_content_id', 6)
            ->get()->getRowArray();

        $page['title'] = "About";
        $page['breadcrumb'] = '<div class="own-breadcrumb">About <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>About</span></div>';
        return view('admin/pages/aboutcontent', $page);
    }

    //Get Podcast Page content
    public function pagePodcast()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 13)
            ->get()->getRowArray();

        $page['title'] = "Podcast";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Podcast <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Content</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    public function saveContent()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();
          log_message('error',  print_r($data,true));
        $stats = $this->request->getPost('stats') ?? [];
        if ($stats) {
            if (!is_array($stats)) {
                $stats = []; // ensure it's always an array

            }
            $data['web_content_2'] = json_encode($stats, JSON_UNESCAPED_UNICODE);
        }
        $file = $this->request->getFile('web_file_1');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory
            $uploadPath = ROOTPATH . 'files/content/';

            // Ensure the directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Create a new file name
            $newName = "file_" . rand(1000, 9999) . time() . '.' . $file->getExtension();

            // Move the file
            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save file", 404);
            }

            // Save to the data array
            $data['web_file_1'] = $newName;
        }
    // If missionStatusHidden is posted, set status accordingly
    $missionStatus = $this->request->getPost('missionStatusHidden');
    if ($missionStatus !== null && $missionStatus !== '') {
        $data['status'] = $missionStatus;
    }


        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "edit":
                $manda_arr = [];
                $allowedFields = [
                    "web_content_1",
                    "web_content_2",
                    "web_content_3",
                    "web_content_4",
                    "web_content_5",
                    "web_content_6",
                    "web_content_7",
                    "web_content_8",
                    "web_content_9",
                    "web_content_10",
                    "web_content_11",
                    "web_content_12",
                    "web_content_13",
                    "web_content_14",
                    "web_content_15",
                    "web_content_16",
                    "web_content_17",
                    "web_content_18",
                    "web_content_19",
                    "web_content_20",
                    "web_content_21",
                    "web_content_22",
                    "web_content_23",
                    "web_content_24",
                    "web_content_25",
                    "web_content_26",
                    "web_content_27",
                    "web_content_28",
                    "web_content_29",
                    "web_content_30",
                    "web_content_31",
                    "web_content_32",
                    "web_content_33",
                    "web_content_34",
                    "web_content_35",
                    "web_content_36",
                    "web_content_37",
                    "web_file_1",
                    "web_image_1",
                    "web_image_2",
                    "web_image_3",
                    "status",
                ];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image_1');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/content/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "content_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image_1'] = $newName;
        }

        $file = $this->request->getFile('web_image_2');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/content/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "content_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image_2'] = $newName;
        }

        $file = $this->request->getFile('web_image_3');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/content/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "content_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image_3'] = $newName;
        }
        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_content');
        if ($data['web_content_id'] > 0) {
            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_content_id', $data['web_content_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {
            return $this->respond($data, 'Unable to save Data', 404);
        }
        return $this->respond([], 'successfully');
    }

    //podcast Page List
    public function pagePodcastList()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Podcast List";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Podcast <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>List</span></div>';
        
        $page['podcastvideomaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 24)->get()->getRowArray();
        return view('admin/pages/podcastlist', $page);
    }

    public function getPodcastList()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_podcast')
            ->select("web_podcast_id,web_title,web_desc,web_url,web_time,display_order,created_on,display_order,is_active,
                   DATE_FORMAT(web_time, '%d/%m/%Y %h:%i %p') AS web_time_formatted ")
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_podcast_id', NULL)) {
            $data->where('web_podcast_id', $this->request->getPost('web_podcast_id', NULL));
        }
        $data = $data->orderBy('web_podcast_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);
        $data_count = $this->db->table('web_podcast')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function savePodcastList()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_podcast_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_podcast',
                    primaryKey: 'web_podcast_id',
                    currentId: $data['web_podcast_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_podcast_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_podcast_id'];
                $allowedFields = ['web_title', 'web_desc', 'web_time', 'web_url', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        if (isset($data['web_time'])) {
            $date = $date = \DateTime::createFromFormat('d/m/Y h:i A', $data['web_time']);
            $data['web_time'] = $date->format('Y-m-d H:i:s');
        }


        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_podcast');

        if ($data['web_podcast_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_podcast',
                    primaryKey: 'web_podcast_id',
                    currentId: $data['web_podcast_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_podcast_id', $data['web_podcast_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_podcast',
                primaryKey: 'web_podcast_id',
                currentId: $data['web_podcast_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }

    //Brand
    public function pageBlog()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['title'] = "Blog";
        
       $page['blogdatamaster'] = $this->db->table('web_content')
                            ->select('status')
                            ->where('web_content_id', 26)->get()->getRowArray();
            
        return view('admin/pages/blog', $page);
    }

    public function getBlog()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_blog')
            ->select('web_blog_id,web_title,web_cate_name,web_desc,
                    web_content,web_arthur_name,web_client_name,
                    web_client_desc,web_url,display_order,meta_title,meta_desc,meta_key,
                    is_active,concat("' . BLOG_IMG . '",web_image) as web_image,
                    concat("' . BLOG_IMG . '",web_image) as web_client_image,
                    DATE_FORMAT(web_time, "%d/%m/%Y") AS web_time')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_blog_id', NULL)) {
            $data->where('web_blog_id', $this->request->getPost('web_blog_id', NULL));
        }
        $data = $data->orderBy('web_blog_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);

        $data_count = $this->db->table('web_blog')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveBlog()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_blog_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_blog',
                    primaryKey: 'web_blog_id',
                    currentId: $data['web_blog_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_blog_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "dashboard":
                $manda_arr = ['web_blog_id', 'is_dashboard'];
                $allowedFields = ['is_dashboard'];
                break;

            case "edit":
                $data['web_url'] = slugify($data['web_title'] ?? '');
                $manda_arr = ['web_title', 'web_cate_name', 'web_desc', 'web_content', 'web_arthur_name', 'web_time', 'web_url', 'display_order'];
                $allowedFields = [
                    'web_title',
                    'web_cate_name',
                    'web_desc',
                    'web_content',
                    'web_arthur_name',
                    'web_image',
                    'web_client_name',
                    'web_client_desc',
                    'web_client_image',
                    'web_time',
                    'web_url',
                    'display_order',
                    'meta_title',
                    'meta_desc',
                    'meta_key'
                ];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/blog/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "blog_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_blog_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $file = $this->request->getFile('web_client_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/blog/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "blogauth_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_client_image'] = $newName;
        }

        if (isset($data['web_time'])) {
            $date = $date = \DateTime::createFromFormat('d/m/Y', $data['web_time']);
            $data['web_time'] = $date->format('Y-m-d H:i:s');
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_blog');

        if ($data['web_blog_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_blog',
                    primaryKey: 'web_blog_id',
                    currentId: $data['web_blog_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_blog_id', $data['web_blog_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_blog',
                primaryKey: 'web_blog_id',
                currentId: $data['web_blog_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }

    public function upload_image()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }

        $file = $this->request->getFile('upload');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = ROOTPATH . 'images/blog/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $newName = "ckeditor_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if ($file->move($uploadPath, $newName)) {
                return $this->respond([
                    'url' => base_url('images/blog/' . $newName)
                ]);
            }
        }

        return $this->respond([], "Unable to upload image", 404);
    }

    //Get Work with Us Page
    public function pageWorkUsContent()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 14)
            ->get()->getRowArray();

        $page['title'] = "Content";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Content</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //Get Work with Us Page
    public function pagePilotPartner()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 15)
            ->get()->getRowArray();

        $page['title'] = "Pilot Partner";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Pilot Partner</span></div>';
        return view('admin/pages/homeourmission', $page);
    }

    //Get Work with Us Page
    public function pageWhatWeDo()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 16)
            ->get()->getRowArray();

        $page['title'] = "What We Do";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>What We Do</span></div>';
        return view('admin/pages/whatwedo', $page);
    }
    //Get Work with Us Page
    public function pageMeasured()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 17)
            ->get()->getRowArray();

        $page['title'] = "Our Measured Impact";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Our Measured Impact</span></div>';
        return view('admin/pages/measured', $page);
    }

    //we are work Page Banner
    public function pageSponser()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 18)
            ->get()->getRowArray();

        $page['title'] = "Sponser";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Sponser</span></div>';
        return view('admin/pages/sponsor', $page);
    }

    public function getSponser()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_sponser')
            ->select('web_sponser_id,concat("' . SPONSER_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_sponser_id', NULL)) {
            $data->where('web_sponser_id', $this->request->getPost('web_sponser_id', NULL));
        }
        $data = $data->orderBy('web_sponser_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);
        $data_count = $this->db->table('web_sponser')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveSponser()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_sponser_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_sponser',
                    primaryKey: 'web_sponser_id',
                    currentId: $data['web_sponser_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_sponser_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $manda_arr = ['web_sponser_id'];
                $allowedFields = ['web_title', 'web_image', 'display_order'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/sponser/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "sponser_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_sponser_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_sponser');

        if ($data['web_sponser_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_sponser',
                    primaryKey: 'web_sponser_id',
                    currentId: $data['web_sponser_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_sponser_id', $data['web_sponser_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_sponser',
                primaryKey: 'web_sponser_id',
                currentId: $data['web_sponser_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }


    //we are work Looks
    public function pageLooks()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }
        $page['data'] = $this->db->table('web_content')
            ->select('*')
            ->where('web_content_id', 19)
            ->get()->getRowArray();

        $page['title'] = "Looks Like in Action";
        $page['breadcrumb'] = '<div class="own-breadcrumb">Work with Us <i style="font-size:14px" class="fas fa-chevron-right"></i> <span>Looks Like in Action</span></div>';
        return view('admin/pages/looks', $page);
    }

    public function getLooks()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->db->table('web_looks')
            ->select('web_looks_id,web_title,web_content,web_content_page,concat("' . LOOKS_IMG . '",web_image) as web_image,'
                . 'display_order,created_on,display_order,is_active,meta_title,meta_desc,meta_key')
            ->where('is_deleted', 0);
        if ($this->request->getPost('web_looks_id', NULL)) {
            $data->where('web_looks_id', $this->request->getPost('web_looks_id', NULL));
        }
        $data = $data->orderBy('web_looks_id')
            ->get()->getResultArray();

        foreach ($data as $i => &$row) {
            $row['serial_no'] = $i + 1;
        }
        unset($row);
        $data_count = $this->db->table('web_looks')->select('count(*) as data_count')->where('is_deleted', 0)->get()->getRowArray();

        return $this->respond(data: $data, message: 'successfully', last_count: ($data_count['data_count'] ?? 1));
    }

    public function saveLooks()
    {
        if (!session()->get('user_login_id')) {
            return $this->respond([], 'Session Expired', 404);
        }
        $data = $this->request->getPost();

        // Check Mandatory Fielda
        switch ($data['for'] ?? '') {
            case "delete":
                $manda_arr = ['web_looks_id'];
                $allowedFields = ['is_deleted'];
                $this->reorderDisplayOrder(
                    table: 'web_looks',
                    primaryKey: 'web_looks_id',
                    currentId: $data['web_looks_id'],
                    newOrder: 0,
                    operation: 'delete',
                );
                break;

            case "status":
                $manda_arr = ['web_looks_id', 'is_active'];
                $allowedFields = ['is_active'];
                break;

            case "edit":
                $data['web_url'] = slugify($data['web_title'] ?? '');
                $manda_arr = ['web_looks_id'];
                $allowedFields = ['web_title', 'web_content', 'web_content_page', 'web_image', 'web_url', 'display_order', 'meta_title', 'meta_desc', 'meta_key'];
                break;

            default:
                return $this->respond([], "Missing Data 'for'", 404);
        }

        $manda = checkMandatory($manda_arr, $data);
        if ($manda) {
            return $this->respond([], $manda, 404);
        }
        $file = $this->request->getFile('web_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Define the upload directory (root folder)
            $uploadPath = ROOTPATH . 'images/looks/';

            // Ensure the upload directory exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $newName = "looks_" . rand(99, 9999) . time() . '.' . $file->getExtension();

            if (!$file->move($uploadPath, $newName)) {
                return $this->respond([], "Unable to save Image", 404);
            }
            $data['web_image'] = $newName;
        } else if ($data['web_looks_id'] == -1) {
            return $this->respond([], "Unable to save Image OR Missing Image", 404);
        }

        $updateData = array_intersect_key($data, array_flip($allowedFields));

        $builder = $this->db->table('web_looks');

        if ($data['web_looks_id'] > 0) {
            if (!in_array(($data['for'] ?? ''), ["delete", "status"])) {
                $this->reorderDisplayOrder(
                    table: 'web_looks',
                    primaryKey: 'web_looks_id',
                    currentId: $data['web_looks_id'],
                    newOrder: $data['display_order'],
                    operation: 'update',
                );
            }

            $updateData['updated_by'] = session()->get('user_login_id');
            $updateData['updated_on'] = date('Y-m-d H:i:s');
            $builder->where('web_looks_id', $data['web_looks_id']);
            if (!$builder->update($updateData)) {
                return $this->respond($data, 'Unable Update Data', 404);
            }
        } else {

            $this->reorderDisplayOrder(
                table: 'web_looks',
                primaryKey: 'web_looks_id',
                currentId: $data['web_looks_id'],
                newOrder: $data['display_order'],
                operation: 'insert',
            );

            $updateData['created_by'] = session()->get('user_login_id');
            if (!$builder->insert($updateData)) {
                return $this->respond($data, 'Unable to save Data', 404);
            }
        }
        return $this->respond([], 'successfully');
    }
}
