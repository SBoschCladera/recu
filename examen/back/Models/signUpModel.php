
<?php

include_once "../DBO/dbo.php";
include_once "../Entities/user.php";

class signUpModel
{
    private dbo $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }

    public function checkUserExists($mail): bool
    {
        $this->dbo->default();
        $sql = "SELECT * FROM user WHERE mail = '" . $mail . "';";
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        if ($query->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function saveUser($mail, $password): int
    {
        $this->dbo->default();
        $sql = "INSERT INTO user (mail, password) VALUES ('" . $mail . "','" . $password . "');";
        $this->dbo->query($sql);
        $insertId = $this->dbo->insert_id;
        $this->dbo->close();
        return $insertId > 0;
    }
}