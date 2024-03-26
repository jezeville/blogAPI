
<?php

  require_once __DIR__.'/router.php';

  post('/login',function(){
    require '../config/config.php';
    require '../model/authModel.php';
    require '../controller/authController.php';
    $authController = new Auth();
    $authController->login($db);
  });

  get('/posts', function(){
    $offset = 0;
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->getAllData($db,$offset);
  });

  get('/posts/$offset', function($offset){
    require '../config/config.php';
    require '../model/postModel.php';
    require '../controller/postController.php';
    $apiController = new ApiController();
    $apiController->getAllData($db,$offset);
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