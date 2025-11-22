<?php

namespace App\Controllers;

class Home extends BaseController {

    public $data = [];

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->data['setting'] = $this->db->table('web_setting')
                ->select('about_content, user_email, user_phone_1, map_url, address_1, address_2, address_3, pincode, facebook_url, instagram_url, linkedin_url')
                ->where('web_setting_id', 1)
                ->get()
                ->getRowArray();
    }

    public function index() {
        $this->data['meta'] = $this->db->table('web_menu')
                        ->select('meta_title,meta_desc,meta_key','is_active')
                        ->where('web_menu_id', 9)->get()->getRowArray();

       
        $this->data['banner_data'] = $this->db->table('web_banner')
            ->select('*, CONCAT("' . BANNER_IMG . '", web_image) AS image')
            ->where('is_deleted', 0)
            ->where('is_active', 1) // ✅ Only active banners
            ->orderBy('display_order', 'ASC')
            ->get()
            ->getResultArray();

    
        $this->data['bannermaster'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 20)->get()->getRowArray();


        $this->data['mission_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 1)->get()->getRowArray();

        $this->data['founder_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image')
                        ->where('web_content_id', 2)->get()->getRowArray();

        $this->data['about_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image, status')
                        ->where('web_content_id', 3)->get()->getRowArray();

        $this->data['action_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 4)->get()->getRowArray();

        $this->data['podcast_data'] = $this->db->table('web_podcast')
                        ->select('web_podcast_id, web_title, web_desc, web_time, web_url')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();
        $this->data['podcastvideomaster'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 24)->get()->getRowArray();

        // Fetch blog data
        $this->data['blog_data'] = $this->db->table('web_blog')
                        ->select('web_blog_id, web_title, web_cate_name, web_desc, web_time, web_url, concat("' . BLOG_IMG . '",web_image) as web_image')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->where('web_title IS NOT NULL') // Exclude blogs with NULL titles
                        ->orderBy('display_order')
                        ->get()->getResultArray();
                        
        $this->data['blognavstatus'] = $this->db->table('web_menu')
                        ->select('is_active')
                        ->where('web_menu_id', 7)->get()->getRowArray();
        $this->data['blogdatamaster'] = $this->db->table('web_content')
            ->select('web_content_1,web_content_2,status')
            ->where('web_content_id', 26)->get()->getRowArray();

        $this->data['content3'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 16)->get()->getRowArray();
        $this->data['content4'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 17)->get()->getRowArray();

        $this->data['content6'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 19)->get()->getRowArray();

        $this->data['looks_list'] = $this->db->table('web_looks')
                        ->select('web_looks_id,web_title,web_url,web_content,concat("' . LOOKS_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order', 'desc')
                        ->limit(3)
                        ->get()->getResultArray();

        return view('frontent/index', $this->data);
    }

    public function pageAbout() {
       $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 1)->get()->getRowArray();

        $this->data['mission_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 5)->get()->getRowArray();

        $this->data['founder_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image')
                        ->where('web_content_id', 7)->get()->getRowArray();

        $this->data['about_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image,status')
                        ->where('web_content_id', 6)->get()->getRowArray();

        $this->data['action_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 8)->get()->getRowArray();

                        

        return view('frontent/about', $this->data);
    }

    public function pageOurTeam() {
        $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 2)->get()->getRowArray();

        $this->data['founder_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image')
                        ->where('web_content_id', 9)->get()->getRowArray();

        $this->data['client_data'] = $this->db->table('web_content')
                        ->select('*,concat("' . CONTENT_IMG . '",web_image_1) as web_image')
                        ->where('web_content_id', 10)->get()->getRowArray();

        $this->data['client_list'] = $this->db->table('web_brand')
                        ->select('web_title,concat("' . BRAND_IMG . '",web_image) as web_image')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();

        return view('frontent/ourteam', $this->data);
    }

    public function pageResources() {
     
       $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 3)->get()->getRowArray();
        $this->data['about_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 12)->get()->getRowArray();

        $this->data['gallery_list'] = $this->db->table('web_gallery')
                        ->select('concat("' . GALLERY_IMG . '",web_image) as web_image')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();
        $this->data['gallerymaster'] = $this->db->table('web_content')
                            ->select('web_content_1,web_content_2,status')
                            ->where('web_content_id', 21)->get()->getRowArray();

        $this->data['video_list'] = $this->db->table('web_video')
                        ->select('*')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();

        $this->data['videomaster'] = $this->db->table('web_content')
                            ->select('web_content_1,web_content_2,status')
                            ->where('web_content_id', 22)->get()->getRowArray();

        return view('frontent/resources', $this->data);
    }

    public function pageGetInvolved() {
        $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 4)->get()->getRowArray();

        $this->data['about_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 11)->get()->getRowArray();

        $this->data['involved_list'] = $this->db->table('web_involved')
                        ->select('*')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();
        $this->data['involvemaster'] = $this->db->table('web_content')
                            ->select('web_content_1,web_content_2,status')
                            ->where('web_content_id', 23)->get()->getRowArray();
        $this->data['donatemaster'] = $this->db->table('web_content')
                            ->select('web_content_1,web_content_2,status')
                            ->where('web_content_id', 25)->get()->getRowArray();
                 

        return view('frontent/get-involved', $this->data);
    }

    public function pageContact() {
       $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 5)->get()->getRowArray();

        return view('frontent/contact', $this->data);
    }

    public function pagePodcast() {
       $this->data['meta']= $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 6)->get()->getRowArray();

        $this->data['podcast_data'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 13)->get()->getRowArray();

        $this->data['podcast_list'] = $this->db->table('web_podcast')
                        ->select("*,DATE_FORMAT(web_time, '%M %e, %Y') AS web_post_date,DATE_FORMAT(web_time, '%h:%i %p') AS web_post_time")
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();
        $this->data['podcastvideomaster'] = $this->db->table('web_content')
                        ->select('web_content_1,web_content_2,status')
                        ->where('web_content_id', 24)->get()->getRowArray();
        return view('frontent/podcast', $this->data);
    }

    public function pageBlog() {
       $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 7)->get()->getRowArray();

        $this->data['blog_list'] = $this->db->table('web_blog')
                        ->select("*,DATE_FORMAT(web_time, '%M %e, %Y') AS web_post_date,"
                                . 'concat("' . BLOG_IMG . '",web_image) as blog_image ')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order')
                        ->get()->getResultArray();
                        
        $this->data['blogdatamaster'] = $this->db->table('web_content')
            ->select('web_content_1,web_content_2,status')
            ->where('web_content_id', 26)->get()->getRowArray();
        return view('frontent/blog', $this->data);
    }

    public function pageBlogDetail($blog) {
     $this->data['meta']=   $this->data['blog_data'] = $this->db->table('web_blog')
                        ->select("*,DATE_FORMAT(web_time, '%M %e, %Y') AS web_post_date,meta_title,meta_desc,meta_key,"
                                . 'concat("' . BLOG_IMG . '",web_image) as blog_image,concat("' . BLOG_IMG . '",web_client_image) as bclient_image ')
                        ->where('is_deleted', 0)
                        ->where('web_url', $blog)
                        ->where('is_active', 1)
                        ->get()->getRowArray();

        $this->data['blog_list'] = $this->db->table('web_blog')
                        ->select('*,DATE_FORMAT(web_time, "%M %e, %Y") AS web_post_date,
                           concat("' . BLOG_IMG . '",web_image) as blog_image ')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->where('web_url!=', $blog)
                        ->orderBy('web_time', 'desc')
                        ->Limit(5)
                        ->get()->getResultArray();

        return view('frontent/blog-details', $this->data);
    }

    public function pageWorkWithUs() {
       $this->data['meta'] = $this->data['menu'] = $this->db->table('web_menu')
                        ->select('web_title,concat("' . MENU_IMG . '",web_image) as menu_image,meta_title,meta_desc,meta_key')
                        ->where('web_menu_id', 8)->get()->getRowArray();

        $this->data['content1'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 14)->get()->getRowArray();
        $this->data['content2'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 15)->get()->getRowArray();
        $this->data['content3'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 16)->get()->getRowArray();
        $this->data['content4'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 17)->get()->getRowArray();
        $this->data['content5'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 18)->get()->getRowArray();

        $this->data['content6'] = $this->db->table('web_content')
                        ->select('*')
                        ->where('web_content_id', 19)->get()->getRowArray();

        $this->data['sponser_list'] = $this->db->table('web_sponser')
                        ->select('web_sponser_id,concat("' . SPONSER_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order', 'desc')
                        ->get()->getResultArray();

        $this->data['looks_list'] = $this->db->table('web_looks')
                        ->select('web_looks_id,web_title,web_url,web_content,concat("' . LOOKS_IMG . '",web_image) as web_image,display_order,created_on,display_order,is_active')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->orderBy('display_order', 'desc')
                        ->get()->getResultArray();

        return view('frontent/workus', $this->data); // app/Views/work-with-us.php
    }

    public function pageCaseStudyDetail($study) {
       $this->data['meta'] = $this->data['study_data'] = $this->db->table('web_looks')
                        ->select('web_looks_id,web_title,web_content,web_url,web_content_page,concat("' . LOOKS_IMG . '",web_image) as web_image,meta_title,meta_desc,meta_key')
                        ->where('is_deleted', 0)
                        ->where('web_url', $study)
                        ->where('is_active', 1)
                        ->get()->getRowArray();

        $this->data['study_list'] = $this->db->table('web_looks')
                        ->select('web_looks_id,web_title,web_content,web_url,web_content_page,concat("' . LOOKS_IMG . '",web_image) as web_image')
                        ->where('is_deleted', 0)
                        ->where('is_active', 1)
                        ->where('web_url!=', $study)
                        ->orderBy('display_order', 'desc')
                        ->Limit(5)
                        ->get()->getResultArray();

        return view('frontent/report-details', $this->data);
    }
    
}
