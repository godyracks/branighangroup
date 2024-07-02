<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blog', 'BlogController::index');
$routes->get('blog/latest_articles', 'BlogController::latestArticles');
$routes->get('blog/search', 'BlogController::search');
$routes->get('/designs', 'DesignController::index');
$routes->get('/designs/filter', 'DesignController::filter');
$routes->get('/about', 'AboutController::index');
$routes->get('/faqs', 'FaqsController::index');
$routes->get('/contact-us', 'ContactController::index');
$routes->get('show/(:num)/(:segment)', 'HouseController::show/$1/$2');
$routes->get('design/show/(:num)/(:segment)', 'DesignController::show/$1/$2');
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
//$routes->get('/dashboard', 'DashboardController::index');
$routes->post('/addhouse', 'DashboardController::createHouse');
$routes->post('/posthouse', 'DashboardController::posthouse');
$routes->post('/postblog', 'DashboardController::createBlog');
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
$routes->get('dashboard/analytics', 'Dashboard\AnalyticsController::index');
$routes->get('dashboard/notifications', 'Dashboard\NotificationsController::index');
$routes->get('dashboard/support', 'Dashboard\SupportController::index');
$routes->get('dashboard/user_management', 'Dashboard\UserController::index');
