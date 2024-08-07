<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blog', 'BlogController::index');
$routes->get('blog/latest_articles', 'BlogController::latestArticles');
$routes->get('blog/search', 'BlogController::search');
$routes->get('blog/view/(:any)', 'BlogController::view/$1');
$routes->get('/designs', 'DesignController::index');
$routes->get('/designs/filter', 'DesignController::filter');
$routes->get('/about', 'AboutController::index');
$routes->get('/faqs', 'FaqsController::index');
$routes->get('/contact-us', 'ContactController::index');

$routes->get('property/(:num)/(:segment)', 'HouseController::show/$1/$2');
$routes->get('design/view/(:num)/(:segment)', 'DesignController::show/$1/$2');
$routes->get('/houses', 'HouseController::index');
$routes->get('/house/filterByCategory/(:num)', 'HouseController::filterByCategory/$1');
$routes->get('/house/filterByBudgetRange/(:segment)/(:segment)', 'HouseController::filterByBudgetRange/$1/$2');
$routes->get('/filter', 'HouseController::filter');
$routes->get('search', 'HouseController::search');
$routes->get('designs/search', 'DesignController::search');
$routes->get('/homesearch', 'SearchController::index');
$routes->get('houses/filterByAmenities/(:any)', 'HouseController::filterByAmenities/$1');
$routes->match(['get', 'post'], 'register', 'AuthController::register');
$routes->get('verify-email', 'AuthController::verifyEmail');
$routes->match(['get', 'post'], 'login', 'AuthController::login');

$routes->post('/addhouse', 'DashboardController::createHouse');
$routes->post('/posthouse', 'DashboardController::posthouse');

$routes->post('/postdesign', 'DashboardController::postdesign');
$routes->get('profile', 'ProfileController::index'); 
$routes->get('logout', 'AuthController::logout');
$routes->get('/sellyourhouse', 'SellHouseController::index');
$routes->post('/sellhouse', 'SellHouseController::sellsubmit');
$routes->get('/google-login', 'GoogleAuthController::login');
$routes->get('/google-callback', 'GoogleAuthController::callback');

// dash
$routes->get('dashboard', 'Dashboard\DashboardController::dashboard');
$routes->get('dashboard/welcome', 'Dashboard\DashboardController::index');
$routes->get('dashboard/blog_management', 'Dashboard\BlogController::index');
$routes->post('/postblog', 'Dashboard\BlogController::createBlog');
$routes->get('dashboard/analytics', 'Dashboard\GoogleAnalyticsController::index');
$routes->get('dashboard/notifications', 'Dashboard\NotificationsController::index');
$routes->get('dashboard/support', 'Dashboard\SupportController::index');
$routes->get('dashboard/user_management', 'Dashboard\UserController::index');
$routes->get('/dashboard/edithouse/(:num)', 'Dashboard\DashboardController::editHouse/$1');
$routes->post('/dashboard/updatehouse/(:num)', 'Dashboard\DashboardController::updateHouse/$1');
$routes->get('/dashboard/editdesign/(:num)', 'Dashboard\DashboardController::editDesign/$1');
$routes->post('/dashboard/updateDesign/(:num)', 'Dashboard\DashboardController::updateDesign/$1');
$routes->delete('dashboard/designs/delete/(:num)', 'Dashboard\DashboardController::deleteDesign/$1');

$routes->get('dashboard/edit_blog/(:num)', 'Dashboard\BlogController::edit/$1');
$routes->post('dashboard/update_blog/(:num)', 'Dashboard\BlogController::update/$1');
