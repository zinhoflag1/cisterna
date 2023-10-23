<?php

/**
 * @param $className
 */


spl_autoload_register(function ($filename) {

  $folder = 'cisterna';

  $core = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/Application/core/' . $filename . '.php';
  $controller = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/Application/controllers/' . $filename . '.php';
  $model = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder . '/Application/models/' . $filename . '.php';

  if (DIRECTORY_SEPARATOR === '/') :
    $core = str_replace('\\', '/', $core);
    $controller = str_replace('\\', '/', $controller);
    $model = str_replace('\\', '/', $model);
  endif;

  //var_dump($file);
  if (file_exists($core)) {
    require $core;
  } else if (file_exists($controller)) {
    require $controller;
  } else if (file_exists($model)) {
    require $model;
  } else {
    echo 'Erro ao importar o arquivo!';
  }
});
