<?php


$router->get('','PagesController@home');
$router->get('login','PagesController@login');
$router->get('register','PagesController@register');
$router->get('message','PagesController@message');
$router->get('users','UsersController@index');
$router->post('users','UsersController@store');
$router->POST('login','UsersController@login');
$router->POST('register','UsersController@register');
$router->get('logout','UsersController@logout');
$router->POST('message','UsersController@message');
// var_dump($router->routes);
?>