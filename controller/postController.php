

<?php

require 'responseController.php';


class ApiController {

    public function getAllData($db) {
        $dataModel = new DataModel($db);
        $data = $dataModel->getAll();
        $response = new Statut($data);
        $response->ok($data);
    }

    public function getDataId($db,$id){
        $dataModel = new DataModel($db);
        $data = $dataModel->getDataId($id);
        $response = new Statut($data);
        $response->ok($data);
    }

    public function postData($db, $requestData){
        $dataModel = new DataModel($db);
        $result = $dataModel->postData($requestData);
        $response = new Statut($data);
        $response->create($data);
    }

    public function putData($db,$id,$updatedData){
        $dataModel = new DataModel($db);
        $result = $dataModel->updatedData( $id , $updatedData );
        $response = new Statut($data);
        $response->create($data);
    }

    public function deleteData($db,$id){
        $dataModel = new DataModel($db);
        $result = $dataModel->deleteData($id);
        $response = new Statut($data);
        $response->create($data);
    }
}
