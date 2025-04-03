<?php

include('config.php');

include('utils.php');



$dbConn =  connect($db);



/*

  listar todos los posts o solo uno

 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arregloPath = explode("/", $_SERVER['PATH_INFO']);
    // echo '<pre>'; print_r($arregloPath); echo '</pre>';
    //   if (isset($_GET['id'])) {
        
    if(isset($arregloPath['1']) && $arregloPath['1'] !=''){
     $_GET['id'] ==    $arregloPath['1'];
    // echo '<br>Se encontro un id.. '. $arregloPath['1'];
   
    $sql = $dbConn->prepare("SELECT * FROM carros where idcarro =:id");
    $sql->bindValue(':id', $arregloPath['1']);

    $sql->execute();

    header("HTTP/1.1 200 OK");

    echo json_encode($sql->fetch(PDO::FETCH_ASSOC));

    exit();

  } else {

    //Mostrar lista de producto

    $sql = $dbConn->prepare("SELECT placa,marca,tipo,modelo,propietario,idcarro FROM carros order by idcarro desc limit 10");

    $sql->execute();

    $sql->setFetchMode(PDO::FETCH_ASSOC);

    header("HTTP/1.1 200 OK");

    echo json_encode($sql->fetchAll());

    exit();

  }

}



// Crear un nuevo producto

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $input = $_POST;

  $sql = "INSERT INTO carros

          (codigo, descripcion, precio)

          VALUES

          (:codigo, :descripcion, :precio)";

  $statement = $dbConn->prepare($sql);

  bindAllValues($statement, $input);

  $statement->execute();

  $postId = $dbConn->lastInsertId();

  if ($postId) {

    $input['id'] = $postId;

    header("HTTP/1.1 200 OK");

    echo json_encode($input);

    exit();

  }

}



//Borrar

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
     echo '<pre>'; print_r($_SERVER['REQUEST_METHOD']); echo '</pre>';
    exit();
    // $arregloPath = explode("/", $_SERVER['PATH_INFO']);  
    // if(isset($arregloPath['1']) && $arregloPath['1'] !='')
    // {
    //     $id = $arregloPath['1'];

    //     $statement = $dbConn->prepare("DELETE FROM carros where idcarro =:id");

    //     $statement->bindValue(':id', $id);

    //     $statement->execute();

    //     header("HTTP/1.1 200 OK");
    //     echo json_encode('Placa eliminada del sistema');
    //     exit();
    // }

}



//Actualizar

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

  $input = $_GET;

  $postId = $input['id'];

  $fields = getParams($input);

  $sql = " UPDATE carros SET $fields WHERE id='$postId'";

  $statement = $dbConn->prepare($sql);

  bindAllValues($statement, $input);

  $statement->execute();

  header("HTTP/1.1 200 OK");

  exit();

}



//En caso de que ninguna de las opciones anteriores se haya ejecutado

header("HTTP/1.1 400 Bad Request");

