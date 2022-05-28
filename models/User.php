<?php



class User 
{
    public $id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $email;
    public $username;
    public $phone;
    public $birthdate;
    public $createdAt;
    public $updatedAt;
    public $createdBy;
    public $updatedBy;
    public $visible;
    public $user_status = array();
    public $user_role = array();
    protected $user;
    // this works
    public function __construct($id=null, $db)
    {
        $this->dbHandler = $db;
        if(!empty($id) && is_numeric($id)){
            try
            {
                $this->id = $id;
                $sql = "SELECT * FROM users WHERE id = ?";
                $stmt = $this->dbHandler->prepare($sql);
                $stmt->execute(array($this->id));
                $this->user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                die("Data fetching failed: ".$e->getMessage());
            }
            
        }
    }

    public function getUserData()
    {
        if(!empty($this->user)) return $this->user;
    }
    // this works
    public function createUser($params=[])
    {
        try
        {
            $sql  =  "INSERT INTO users(firstname, middlename, lastname, email, username, phone, birthdate, createdAt, updatedAt, createdBy, updatedBy, visible, user_status, user_role) VALUES(:firstname, :middlename, :lastname, :email, :username, :phone, :birthdate, :createdAt, :updatedAt, :createdBy, :updatedBy, :visible, :user_status, :user_role)";
            $stmt =  $this->dbHandler->prepare($sql);

            $this->firstname   =  $params['firstname'];
            $this->middlename  =  $params['middlename'];
            $this->lastname    =  $params['lastname'];
            $this->email       =  $params['email'];
            $this->username    =  $params['username'];
            $this->phone       =  $params['phone'];
            $this->birthdate   =  $params['birthdate'];
            $this->createdAt   =  date('Y-m-d H:i:s');
            $this->updatedAt   =  null;
            $this->createdBy   =  $params['created_by'];
            $this->updatedBy   =  null;
            $this->visible     =  $params['visible'];
            $this->user_status =  $params['status'];
            $this->user_role   =  $params['role'];
            
            $userData = array(':firstname'=>$this->firstname, ':middlename'=>$this->middlename, ':lastname'=>$this->lastname, ':email'=>$this->email, ':username'=>$this->username, ':phone'=>$this->phone, ':birthdate'=>$this->birthdate, ':createdAt'=>$this->createdAt, ':updatedAt'=>$this->updatedAt, ':createdBy'=>$this->createdBy, ':updatedBy'=>$this->updatedBy, ':visible'=>$this->visible, ':user_status'=>$this->user_status, ':user_role'=>$this->user_role);
            $stmt     = $stmt->execute($userData); 

            return $this->dbHandler->lastInsertId();

        }catch(Exception $e){

            die("Data fetching failed: ".$e->getMessage());

        }
    }
    // this works
    public function updateUser($params=[])
    {
        if(is_array($params) && count($params)){
            $sql = "UPDATE users SET ";
            $sql_proceed = "";
            foreach($params as $col=>$key){
                $sql .= "$col=".":$col,";
            }
            $sql = rtrim($sql, ",");
            $sql .= " WHERE id = $this->id";
            try
            {
                $stmt = $this->dbHandler->prepare($sql);
                $stmt = $stmt->execute($params);
            }catch(Exception $e){
                die("Database update failed ".$e->getMessage());
            }
        }
    }

    public function deleteUser()
    {

    }

    public function getUser($params=[])
    {

    }

    public function queryUser($sql, $params=[])
    {

    }
}