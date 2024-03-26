

<?php

    require 'responseController.php';
    require 'authController.php';

    class ApiController {
        private function authenticate() {
            $authController = new Auth();
            return $authController->middelware();
        }

        private function handleAccess($accessGranted) {
            if (!$accessGranted) {
                echo "Accès non autorisé";
                exit; 
            }
        }
    
        public function getAllData($db, $offset) {
            $accessGranted = $this->authenticate();
            $this->handleAccess($accessGranted);
            $dataModel = new DataModel($db);
            $data = $dataModel->getAll($offset);
            $response = new Statut($data);
            $response->ok($data);
        }
    
        public function getDataId($db, $id) {
            $accessGranted = $this->authenticate();
            $this->handleAccess($accessGranted);
            $dataModel = new DataModel($db);
            $data = $dataModel->getDataId($id);
            $response = new Statut($data);
            $response->ok($data);
        }
    
        public function postData($db, $requestData) {
            $accessGranted = $this->authenticate();
            $this->handleAccess($accessGranted);
            $dataModel = new DataModel($db);
            $result = $dataModel->postData($requestData);
            $response = new Statut($data);
            $response->create($data);
        }
    
        public function putData($db, $id, $updatedData) {
            $accessGranted = $this->authenticate();
            $this->handleAccess($accessGranted);
            $dataModel = new DataModel($db);
            $result = $dataModel->updatedData($id, $updatedData);
            $response = new Statut($data);
            $response->create($data);
        }
    
        public function deleteData($db, $id) {
            $accessGranted = $this->authenticate();
            $this->handleAccess($accessGranted);
            $dataModel = new DataModel($db);
            $result = $dataModel->deleteData($id);
            $response = new Statut($data);
            $response->create($data);
        }
    }
    
