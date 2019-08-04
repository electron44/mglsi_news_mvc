<?php
 declare(strict_types=1);
 require_once('../assets/Utilities/HydratationTrait.php');

class UserDAO
{
    private $db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function getDb()
    {
        return $this->db;
    }
    private function setDb($db)
    {
        $this->db = $db;
    }

    
   
    public function get($id)
    {
        $id = (int) $id;
        $request = $this->db->query('SELECT * FROM user WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $user = ($data === false) ? null : new User($data);
        return $user;
    }

    public function allUser()
    { /**
        *statut 1 mean a user simple
        * stayut 2 mean a adminuser
        */
        $statutUser = 1;
        $users = array();
        $request = $this->db->query('SELECT * FROM user WHERE deleted = 0 and statut = $statut');
        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $users [] = new User($data);
        }
        
        return $users;
    }


    public function checkUser()
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE username = ?';
        $request = $this->db->prepare($sql);
        $request->bindParam(1,$_POST['username']);
        $request->execute();
        $isUnique = $request->fetchColumn();

        if($isUnique){
            echo "Cet utilisateur existe déja !";
        }
    }

   /* public function register(User $user)
    {
        
        $this->checkUser($post);
        $salt ="azertyuiopqsdfhklmnbvcxw123456489";
        $sql = 'INSERT INTO user (username, mdp, nom,prenom, statut ,deleted) VALUES (?,?,?,?,?)';
        $
    }*/


  /*  public function createQuery($request,$parameter=array()){
        foreach($parameter as $param){
            echo $param[0];
        }
    }
*/
public function getAllAdmins()
{
    $users = array();
    $request = $this->db->query('SELECT * FROM user WHERE statut = 1 and deleted=0');
    while($data = $request->fetch(PDO::FETCH_ASSOC))
    {
        $users [] = new User($data);
    }
    
    return $users;
}

}