
<?php

class Statut{
        public function ok($response){
            if($response !== false && $response !== null && empty($response) !== true){
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode(array("status" => 200, "message" => "ok" , "data" => $response), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            else if (empty($response)){
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode(array("status" => 404, "message" => "Ressource not find"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            else{
                http_response_code(400);
                echo json_encode(array("status" => 400, "message" => "Erreur lors de la récupération des données."), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        }

        public function created($response){
            if($response !== false){
                http_response_code(201);
                echo json_encode(array("status" => 201, "message" => "OK", "data" => $result), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        }
}