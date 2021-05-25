<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName/methodActionName
 ****************************************************************************/

//*********************** Rotas Publicas ***********************

// HomeController

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');

// LoginController

Router::get('login/login',          'LoginController/getLoginForm');
Router::get('login/registration',   'LoginController/getRegistrationForm');
Router::get('login/logout',         'LoginController/destroySession');
Router::post('login/doregistration','LoginController/doRegistration');
Router::post('login/dologin',       'LoginController/doLogin');

//*********************** Rotas Protegidas ***********************

// ** AdminAppController **

Router::get('adminapp/index',               'AdminAppController/index');

//Users
Router::get('adminapp/gerirusers',         'AdminAppController/gerirUsers');
Router::get('adminapp/createuser',         'AdminAppController/createUser');
Router::post('adminapp/storeuser',         'AdminAppController/storeUser');
Router::get('adminapp/edituser',           'AdminAppController/editUser');
Router::post('adminapp/updateuser',        'AdminAppController/updateUser');
Router::get('adminapp/destroyuser',        'AdminAppController/destroyUser');

//Aeroportos
Router::get('adminapp/geriraeroportos',         'AdminAppController/gerirAeroportos');
Router::get('adminapp/createaeroporto',         'AdminAppController/createAeroporto');
Router::post('adminapp/storeaeroporto',         'AdminAppController/storeAeroporto');
Router::get('adminapp/editaeroporto',           'AdminAppController/editAeroporto');
Router::post('adminapp/updateaeroporto',        'AdminAppController/updateAeroporto');
Router::get('adminapp/destroyaeroporto',        'AdminAppController/destroyAeroporto');

// ** PassageiroAppController **

Router::get('passageiroapp/index', 'PassageiroAppController/index');

// ** OpCheckinAppController **

Router::get('opcheckinapp/index', 'OpCheckinAppController/index');

// ** GestorVooAppController **

Router::get('gestorvooapp/index', 'GestorVooAppController/index');


/************** End of URLEncoder Routing Rules ************************************/