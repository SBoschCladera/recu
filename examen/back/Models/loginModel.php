
<?php

include_once "../DB/dbo.php";
include_once "../Entities/user.php";

class loginModel
{
    protected dbo $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }

    public function getUser($mail, $password): user
    {
        $this->dbo->default();
        $sql = "SELECT * FROM user WHERE mail = '" . $mail . "'";
        $query = $this->dbo->query($sql);
        if ($result = $query->fetch_assoc()) {
            if (crypt($password, $result["password"]) == $result["password"]) {
                return new user($result["user_id"], $result["mail"], $result["password"]);
            }
        }
        return new user(0, "-", "-");
    }
}
