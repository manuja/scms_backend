<?php

defined('BASEPATH') or exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */




//Routes for user management
$route['default_controller'] = 'auth/login';
$route['admin_dashboard'] = 'auth/dashboard';
$route['signin'] = 'auth/login';
$route['login'] = 'auth/login';
$route['signout'] = 'auth/logout';
$route['users'] = 'auth';
$route['add-users'] = 'auth/create_user';
$route['edit-users/(:num)'] = 'auth/edit_user/$1';
$route['groups'] = 'auth/groups';
$route['create_sub_group'] = 'auth/save_sub_group';
$route['add_groups'] = 'auth/add_groups';
$route['forgot_password'] = 'auth/forgot_password';
$route['dashboard/(:any)'] = 'auth/group_dashboard/$1';
$route['member_dashboard'] = 'member/Dashboard/showDashboard';
$route['user_permissions'] = 'User_permissions_new';
$route['group_permissions'] = 'Group_permissions_new';
$route['edit_member/(:num)'] = 'auth/edit_slgs_member/$1';
$route['view_member/(:num)'] = 'auth/view_slgs_member/$1';

$route['404'] = 'Welcome/show_underConstruction'; // for menu link failures edit_user
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Routes to the order
//$route['orders'] = 'Order/index';



//event_management_module


$route['event_management'] = 'Event_management_Controller';
$route['orders'] = 'OrderController';
$route['event_management/add_events'] = 'Event_management_Controller/add_events';
$route['event_management/edit_events/(:num)'] = 'Event_management_Controller/edit_events/$1';
$route['event_management/view_events/(:num)'] = 'Event_management_Controller/view_event/$1';
$route['event_management/delete_events'] = 'Event_management_Controller/delete_events';
$route['event_management/view_event_tiles'] = 'Event_management_Controller/view_event_tiles';




$route['my-profile'] = 'auth/viewMyProfile';



$route['amenities/list'] = 'Amenities/index';
$route['amenities/view/(:num)'] = 'Amenities/view/$1';
$route['amenities/add'] = 'Amenities/form';
$route['amenities/add/(:num)'] = 'Amenities/form/$1';
$route['amenities/delete/(:num)'] = 'Amenities/delete/$1';


//publication_module
$route['publication'] = 'PublicationController';
$route['publication/add-new-publication'] = 'PublicationController/addPublication';
$route['publication/view-publication/(:num)'] = 'PublicationController/viewPublication/$1';
$route['publication/update-publication/(:num)'] = 'PublicationController/updatePublication/$1';
$route['view-user-publication'] = 'PublicationController/userIndex';
$route['publication/view-user-publication/(:num)'] = 'PublicationController/viewUserPublication/$1';
$route['publication/status_update'] = 'PublicationController/publicationstatusupdate';
$route['get-publicationdata'] = 'PublicationController/getpublicationdata';
$route['get-publicationtypedata'] = 'PublicationController/getpublicationtypedata';


$route['member-management'] = 'MemberManagementController';
$route['add-members'] = 'MemberManagementController/create_member';
$route['member-management/edit_member/(:num)'] = 'MemberManagementController/edit_slgs_member/$1';
$route['member-management/view_member/(:num)'] = 'MemberManagementController/view_slgs_member/$1';
$route['member-management/test'] = 'MemberManagementController/test_fun';



$route['custome-notification'] = 'CustomeNotificationContrller';
$route['custome-notification/fire_notify'] = 'CustomeNotificationContrller/fire_custome_notifiacation';


$route['member-management/payment_history/(:num)'] = 'MemberManagementController/payment_staff_member/$1';
$route['member-management/member_payment_history'] = 'MemberManagementController/payment_member';
$route['member-management/getEmailwithFormat'] = 'MemberManagementController/getEmailwithFormat';

