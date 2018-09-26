<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__."/../src/routes.php";

$request = Request::createFromGlobals();

$name = htmlspecialchars($request->query->get('name'));


$response = new Response();

$routing = str_replace("/", "", $request->getPathInfo());

$dir = "../templates"; // Template directory

ob_start();

if($routing == "" || $routing == "hello")
{
   require "$dir/hello.php";
}else {
    if(file_exists($dir."/".$routing.".php")) {

        require($dir."/".$routing.".php");

    }else {
        require($dir."/404.php");
    }
}

$result = ob_get_clean();

$response->setContent($result);

$response->prepare($request);
sprintf($response->send());


?>