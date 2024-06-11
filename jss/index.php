<?php
$url =  explode("/",$_SERVER['REQUEST_URI']);
$url =  explode("?",end($url));
if($url[0]=="index" || $url[0]==""){
    include_once("home.php");
}else{
    include_once($url[0].".php");
}