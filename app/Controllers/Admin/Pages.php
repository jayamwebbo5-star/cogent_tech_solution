<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function services()
    {
        if (!session()->get('user_login_id')) {
            return redirect()->to(base_url(ADMIN_NAME));
        }

        $page['title'] = "Services";
        $page['breadcrumb'] = '<div class="own-breadcrumb">
            Home <i style="font-size:14px" class="fas fa-chevron-right"></i>
            <span>Services</span>
        </div>';

        return view('admin/pages/services', $page);
    }
}
