
<?php

class AuthModel {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($email, $password) {
        $query = $this->db->prepare("SELECT * FROM user WHERE user_email = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if ($password == $user['user_password']) {
                return $user['user_name'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>


