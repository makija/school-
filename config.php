<?php

function __autoload ($class) {

  if(file_exists("app/model/{$class}.php"))
 require_once "app/model/{$class}.php";

 else

 if(file_exists("app/controllers/{$class}.php"))
require_once "app/controllers/{$class}.php";



}