
<?php

  require_once __DIR__.'/router.php';

  get('/posts', function(){
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->getAllData($db);
  });

  get('/post/$id', function($id){
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->getDataId($db , $id);
  });

  post('/post', function(){
    $requestData = json_decode(file_get_contents('php://input'), true);
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->postData($db, $requestData);
  });

  put('/post/$id', function($id) {
    $updatedData = json_decode(file_get_contents('php://input'), true);
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->putData($db, $id, $updatedData);
  });

  delete('/post/$id', function($id){
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->deleteData($db, $id);
  });

  any('/404','../views/404.php');

?>