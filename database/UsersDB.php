<?php
class UsersDB
{
    public static function read($id)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE id=:id";
        $db=$conn->prepare($query);
        $db->execute(['id'=>$id]);  
	    $result = $db->fetch(PDO::FETCH_OBJ);
        if ($result)
            return new Users($result->id,$result->username,$result->email,$result->role,$result->password,$result->createAt);
        else
            return false;

    }
    public static function login($username,$password)
    {
        global $conn;
        $query = "SELECT * FROM users WHERE username=:username and password=:password";
        $db=$conn->prepare($query);
        $db->execute(['username'=>$username,'password'=>$password]);  
	    $result = $db->fetch(PDO::FETCH_OBJ);
        if ($result)
            return true;
        else
            return false;

    }
    // enregistrement d'un nouvel utilisateiur
    public static function create(Users $newUser,bool $isAdmin)
    {
    global $conn;
    $errors = [];
    // the email and usernames should be unique
	$user_check_query = "SELECT * FROM users WHERE username=:username 
							OR email=:email LIMIT 1";
     $db=$conn->prepare($user_check_query);
     $db->execute([
        'username'=>$newUser->getUsername(),
        'email'=>$newUser->getEmail()
    ]);  

	$result = $db->fetchAll();
	if (count($result)>0) { // if user exists
		if ($result['username'] === $newUser->getUsername()) {
		  array_push($errors, "Cet utilisateur existe déjà");
		}

		if ($result['email'] === $newUser->getEmail()) {
		  array_push($errors, "Cet email existe déjà");
		}
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($newUser->getPassword());//encrypt the password before saving in the database
		$query = "INSERT INTO users (username, email, role, password, created_at, updated_at) 
				  VALUES(:username, :email,:role,:password, now(), now())";
		 $db=$conn->prepare($query);
         $db->execute([
            'username'=>$newUser->getUsername(),
            'email'=>$newUser->getEmail(),
            'role'=>$newUser->getRole(),
            'role'=>$newUser->getPassword()
        ]);  

	}
    return (count($errors) == 0);
    }
}