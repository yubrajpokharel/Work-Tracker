<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'powerclean';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['addEmp'] = 'admin/add_employee';
$route['listEmp'] = 'admin/list_employee';

$route['viewEmp/(:any)'] = 'admin/view_employee/$1';
$route['viewEmp'] = 'pagenotfound';

$route['editEmp/(:any)'] = 'admin/edit_user/$1';
$route['editEmp'] = 'pagenotfound';

$route['deleteEmp/(:any)'] = 'admin/delete_user/$1';
$route['deleteEmp'] = 'pagenotfound';


$route['viewEmp/(:any)'] = 'admin/view_employee/$1';
$route['viewEmp'] = 'pagenotfound';

//****MANAGER 
$route['addEmpManager'] = 'manager/add_employee';
$route['listEmpManager'] = 'manager/list_employee';

$route['viewEmpManager/(:any)'] = 'manager/view_employee/$1';
$route['viewEmpManager'] = 'pagenotfound';

$route['editEmpManager/(:any)'] = 'manager/edit_user/$1';
$route['editEmpManager'] = 'pagenotfound';

$route['deleteEmpManager/(:any)'] = 'manager/delete_user/$1';
$route['deleteEmpManager'] = 'pagenotfound';

$route['Emphours'] = 'manager/employee_hours';
$route['PaidEmphours'] = 'manager/paid_employee_hours';

$route['viewEmpHistory/(:any)'] = 'manager/view_employee_history/$1';

$route['stats'] = 'employee/stats';
$route['puncher'] = 'employee/puncher';
$route['profile'] = 'employee/profile';
$route['paid'] = 'employee/paid_hours';
$route['remaining'] = 'employee/remaining_hours';

$route['manager_paid'] = 'manager/paid_hours';
$route['manager_remaining'] = 'manager/remaining_hours';


/* End of file routes.php */
/* Location: ./application/config/routes.php */