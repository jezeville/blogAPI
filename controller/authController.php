

<?php

    require '../vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

   

    class Auth {
        public function login($db){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dataModel = new AuthModel($db);
            $response = $dataModel->login($email,$password);
            if ($response !== false){
                $payload = [
                    "username" => $response,
                    "exp" => time() + 3600
                ];
                $jwt = JWT::encode($payload, $_ENV['JWT_Key'], 'HS256');
                echo json_encode(["message" => "login réussi","token" => $jwt], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            else{
                echo 'Mot de passe ou email invalide';
            }
        }

        public function middelware(){
                $encodedToken = null;
                $headers = apache_request_headers();
                if (isset($headers['Authorization'])) {
                    $matches = array();
                    preg_match('/[Bb]earer (.*)/', $headers['Authorization'], $matches);
                    if (isset($matches[1])) {
                        $encodedToken = $matches[1];
                    }
                } 
            
                if ($encodedToken) {
                    try {
                        $key = $_ENV['JWT_Key'];
                        $token = JWT::decode($encodedToken, new Key($key, 'HS256'));
                        if (isset($token->exp) && time() > $token->exp) {
                            echo json_encode(["message" => "token expiré","statut" => "401"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                        }
                        return true;

                    } catch (Exception $e) {
                        error_log('Erreur lors du décodage du token JWT: ' . $e->getMessage());
                        return null; 
                    }
                } else {
                    echo json_encode(["message" => "aucun token","statut" => "401"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    return null; 
                }
            }
    }
?>