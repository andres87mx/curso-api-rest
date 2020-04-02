<?php

//Definimos los recursos disponibles
$allowedResorcesTypes = [
  'books',
  'authors',
  'genres',
];

//Validamos que el recurso este disponible
$resourceType = $_GET['resource_type'];

if(!in_array($resourceType, $allowedResorcesTypes)){
  die;
}

//Defino los recursos
$books = [
  1 => [
    'titulo' => 'Lo que el viento se llevó',
    'id_autor' => 2,
    'id_genero' => 2,
  ],
  2 => [
    'titulo' => 'La Iliada',
    'id_autor' => 1,
    'id_genero' => 1,
  ],
  3 => [
    'titulo' => 'La Odisea',
    'id_autor' => 1,
    'id_genero' => 1,
  ]
];

header ('Content-Type: application/json');

//Levantamos el ID del recurso buscado
$resourceId = array_key_exists('resource_id',$_GET) ? $_GET['resource_id'] : '';

//Generamos la respuesta, asumiendo que el pedido es correcto
switch ( strtoupper($_SERVER['REQUEST_METHOD']) ){
  case 'GET':
    if( empty($resourceId)){
      echo json_encode($books);
    }else {
      if( array_key_exists($resourceId, $books)){
        echo json_encode($books[ $resourceId ]);
      }
    }
    
  break;
  case 'POST':
  break;
  case 'PUT':
  break;
  case 'DELETE':
  break;
}