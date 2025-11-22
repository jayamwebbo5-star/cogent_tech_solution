<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('about', 'Home::pageAbout', ['as' => 'about']);
$routes->get('ourteam', 'Home::pageOurTeam', ['as' => 'ourteam']);
$routes->get('resources', 'Home::pageResources', ['as' => 'resources']);
$routes->get('get-involved', 'Home::pageGetInvolved', ['as' => 'get-involved']);
$routes->get('contact', 'Home::pageContact', ['as' => 'contact']);
$routes->get('podcast', 'Home::pagePodcast', ['as' => 'podcast']);
$routes->get('blog', 'Home::pageBlog', ['as' => 'blog']);
$routes->get('blog/(:segment)', 'Home::pageBlogDetail/$1', ['as' => 'blog_detail']);
$routes->get('work-with-us', 'Home::pageWorkWithUs', ['as' => 'work-with-us']);
$routes->get('casestudy/(:segment)', 'Home::pageCaseStudyDetail/$1', ['as' => 'casestudy']);

$routes->group('admin/slides', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('list', 'Slides::list');
    $routes->post('save', 'Slides::save');
    $routes->post('delete', 'Slides::delete');
    $routes->get('videoPreview', 'Slides::videoPreview');
    $routes->post('saveVideo', 'Slides::saveVideo');

     $routes->get('list', 'Services::list');
    $routes->post('save', 'Services::save');
    $routes->post('delete', 'Services::delete');
    $routes->post('toggle', 'Services::toggle');
});




$routes->group(ADMIN_NAME, function ($routes) {
    $routes->get('/', 'Admin\Auth::index');

    $routes->get('logout', 'Admin\Auth::logout');
    $routes->post('upload-blog-content-image', 'Admin\Blog::upload_image');

    $routes->post('delete-blog-content-image', 'Admin\Blog::delete_image');
    

    //Menu    
    $routes->get('menu-manage', 'Admin\MainPage::pageMenu', ['as' => 'menu-manage']);

    //Setting
    $routes->get('social-manage', 'Admin\MainPage::pageSetting', ['as' => 'social-manage']);

    //Banner
    $routes->get('banner-manage', 'Admin\MainPage::pageBanner', ['as' => 'banner-manage']);

    //Home Page swiper
    $routes->get('swiper-manage', 'Admin\MainPage::swiper', ['as' => 'swiper-manage']);

    //Home Page Services
    $routes->get('homeservices-manage', 'Admin\MainPage::pageHomeServices', ['as' => 'homeservices-manage']);
    

    //Home Page Take Action
    $routes->get('hometakeaction-manage', 'Admin\MainPage::pageHomeTakeAction', ['as' => 'hometakeaction-manage']);

    //Home Page Founder's message
    $routes->get('homefounder-manage', 'Admin\MainPage::pageHomeFounder', ['as' => 'homefounder-manage']);

    //Home Page About
    $routes->get('homeabout-manage', 'Admin\MainPage::pageHomeAbout', ['as' => 'homeabout-manage']);

    //About Page Our Mission
    $routes->get('aboutourmission-manage', 'Admin\MainPage::pageAboutOurMission', ['as' => 'aboutourmission-manage']);

    //About Page Take Action
    $routes->get('abouttakeaction-manage', 'Admin\MainPage::pageAboutTakeAction', ['as' => 'abouttakeaction-manage']);

    //About Page Founder's message
    $routes->get('aboutfounder-manage', 'Admin\MainPage::pageAboutFounder', ['as' => 'aboutfounder-manage']);

    //Home Page About
    $routes->get('aboutabout-manage', 'Admin\MainPage::pageAboutAbout', ['as' => 'aboutabout-manage']);

    //Team Page Founder's message
    $routes->get('teamfounder-manage', 'Admin\MainPage::pageTeamFounder', ['as' => 'teamfounder-manage']);

    //Team page Brand
    $routes->get('brand-manage', 'Admin\MainPage::pageBrand', ['as' => 'brand-manage']);

    //Team Page Client
    $routes->get('teamclient-manage', 'Admin\MainPage::pageTeamClient', ['as' => 'teamclient-manage']);

    //Resources Page
    $routes->get('resources-manage', 'Admin\MainPage::pageResources', ['as' => 'resources-manage']);

    //Resources Gallery
    $routes->get('gallery-manage', 'Admin\MainPage::pageGallery', ['as' => 'gallery-manage']);

    //Resources Video
    $routes->get('video-manage', 'Admin\MainPage::pageVideo', ['as' => 'video-manage']);

    //Involved Page Resources
    $routes->get('involved-manage', 'Admin\MainPage::pageInvolved', ['as' => 'involved-manage']);

    //Involved Page List
    $routes->get('involvedlist-manage', 'Admin\MainPage::pageInvolvedList', ['as' => 'involvedlist-manage']);
    
    //Donaation Form 
    $routes->get('donation-form-manage', 'Admin\MainPage::getDonationForm', ['as' => 'donation-form-manage']);

    //Podcast Page content
    $routes->get('podcast-manage', 'Admin\MainPage::pagePodcast', ['as' => 'podcast-manage']);

    //Podcast page  List  
    $routes->get('podcastlist-manage', 'Admin\MainPage::pagePodcastList', ['as' => 'podcastlist-manage']);

    //blog page  List  
    $routes->get('blog-manage', 'Admin\MainPage::pageBlog', ['as' => 'blog-manage']);

    //Work with Us  content  
    $routes->get('work-content-manage', 'Admin\MainPage::pageWorkUsContent', ['as' => 'work-content-manage']);
    
    //Work with Us  contact  
    $routes->get('pilot-partner-manage', 'Admin\MainPage::pagePilotPartner', ['as' => 'pilot-partner-manage']);
    
     //Work with Us  Who we are  
    $routes->get('whatwedo-manage', 'Admin\MainPage::pageWhatWeDo', ['as' => 'whatwedo-manage']);
    
     //Work with Us  Our Measured Impact 
    $routes->get('measured-manage', 'Admin\MainPage::pageMeasured', ['as' => 'measured-manage']);
    
    //Work with Us  Sponser 
    $routes->get('sponsor-manage', 'Admin\MainPage::pageSponser', ['as' => 'sponsor-manage']);
    
    //Work with Us  Sponser 
    $routes->get('looks-manage', 'Admin\MainPage::pageLooks', ['as' => 'looks-manage']);

    $routes->group('api', function ($routes) {
        //Auth
        $routes->post('loginCheck', 'Admin\Auth::loginCheck');
        $routes->post('changeUserPassword', 'Admin\Auth::changeUserPassword');

        //Menu
        $routes->post('getMenu', 'Admin\MainPage::getMenu');
        $routes->post('saveMenu', 'Admin\MainPage::saveMenu');

        //Setting
        $routes->post('saveSetting', 'Admin\MainPage::saveSetting');

        //Banner
        $routes->post('getBanner', 'Admin\MainPage::getBanner');
        $routes->post('saveBanner', 'Admin\MainPage::saveBanner');
        $routes->post('pagefunctionmanage', 'Admin\MainPage::pagefunctionmanage');

        //Brand
        $routes->post('getBrand', 'Admin\MainPage::getBrand');
        $routes->post('saveBrand', 'Admin\MainPage::saveBrand');

        //Involved Page List
        $routes->post('getInvolvedList', 'Admin\MainPage::getInvolvedList');
        $routes->post('saveInvolvedList', 'Admin\MainPage::saveInvolvedList');

        //Gallery List
        $routes->post('getGallery', 'Admin\MainPage::getGallery');
        $routes->post('saveGallery', 'Admin\MainPage::saveGallery');
        
        //Video List
        $routes->post('getVideo', 'Admin\MainPage::getVideo');
        $routes->post('saveVideo', 'Admin\MainPage::saveVideo');
        

        //Podcast List
        $routes->post('getPodcastList', 'Admin\MainPage::getPodcastList');
        $routes->post('savePodcastList', 'Admin\MainPage::savePodcastList');

        $routes->post('saveContent', 'Admin\MainPage::saveContent');

        //Blog
        $routes->post('getBlog', 'Admin\MainPage::getBlog');
        $routes->post('saveBlog', 'Admin\MainPage::saveBlog');
        
        //Sponser
        $routes->post('getSponser', 'Admin\MainPage::getSponser');
        $routes->post('saveSponser', 'Admin\MainPage::saveSponser');
        
        //Looks
        $routes->post('getLooks', 'Admin\MainPage::getLooks');
        $routes->post('saveLooks', 'Admin\MainPage::saveLooks');
    });
});
