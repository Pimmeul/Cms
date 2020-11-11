<?php



require __DIR__.'/vendor/autoload.php';

include_once('config.php');
//router


$Routes = scandir(__DIR__ . '/App/Controller',SCANDIR_SORT_NONE );
$ClassesAndMethode = array();
foreach($Routes as $route){
    $routeArray = explode('.',$route);
    if($routeArray[1] !== 'php'){
        unset($Routes[array_search($route,$Routes)]);
        continue;
    }
    $classLink = "\Controllers\\".$routeArray[0];
    include(__DIR__ . "/App/Controller/" .$routeArray[0].".php");
    $obj =  new  $classLink;
    array_push($ClassesAndMethode,array($routeArray[0] => get_class_methods($obj)));
}

$routeURL = $_SERVER['REQUEST_URI'];
$routeURlArray = explode('/',$routeURL);
if($routeURlArray == NULL){
    $ClassesAndMethode[$CONFIG['DEFAULT_CONTROLLER']];
    call_user_func(array(__NAMESPACE__.'\\'.$CONFIG['DEFAULT_CONTROLLER']),'ActionIndex');

}


var_dump($Routes);
var_dump($ClassesAndMethode);

//APP::RUN($CONFIG['DEFAULT_PATH']);

