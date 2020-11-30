<?php
namespace App\Models;

// require_once '../core/Model.php'; # preparo el acceso a otro fichero

use PDO;
use Core\Model; # sigo preparando mediante use.

class User extends Model
{
    public function __construct()
    {
        # code...
    }

    public static function all()
    {
        $db = User::db();
        $statement = $db->query('SELECT * FROM users');
        $users = $statement->fetchAll(PDO::FETCH_CLASS, User::class);

        return $users;        
    }

    public static function find($id)
    {
        $db = User::db();

        $statement = $db->prepare('SELECT * FROM users WHERE id=:id');
        $statement->execute(array(':id' => $id));        
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $statement->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public static function findByEmail($email)
    {
        $db = User::db();

        $statement = $db->prepare('SELECT * FROM users WHERE email=:email');
        $statement->execute(array(':email' => $email));        
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $statement->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public function insert()
    {
        $db = User::db();
        $statement = $db->prepare('INSERT INTO users(`name`, `surname`, `email`, `birthdate`) VALUES(:name, :surname, :email, :birthdate)');
        $data = [
            ':name' => $this->name,
            ':surname' => $this->surname,
            ':email' => $this->email,
            ':birthdate' => $this->birthdate
        ];
        return $statement->execute($data);
    }

    public function save()
    {
        $db = User::db();
        $statement = $db->prepare('UPDATE users SET `name`=:name, `surname`=:surname, `email`=:email, `birthdate`=:birthdate WHERE id=:id');
        $data = [
            ':id' => $this->id,
            ':name' => $this->name,
            ':surname' => $this->surname,
            ':email' => $this->email,
            ':birthdate' => $this->birthdate
        ];
        return $statement->execute($data);
    }
    
    public function delete()
    {
        $db = User::db();
        $statement = $db->prepare('DELETE FROM users WHERE id=:id');        
        return $statement->execute([':id' => $this->id]);        
    }

    public static function destroy($id)
    {
        $db = User::db();
        $statement = $db->prepare('DELETE FROM users WHERE id=:id');        
        return $statement->execute([':id' => $id]);        
    }

    public function setPassword($password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $db = User::db();
        $stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $password;
    }
    public function passwordVerify($password)
    {
        return password_verify($password, $this->password);
    }

    public function __toString()
    {
        return "$this->name $this->surname";
    }
}
