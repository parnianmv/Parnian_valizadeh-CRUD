<?php

namespace CRUD\Helper;

class PersonHelper
{
    public function insert($user)
    {
		$db = new DBConnector();
		$db->connect();
		$first_name = $user->getFirstName();
		$last_name = $user->getLastName();
		$username = $user->getUsername();
		$sql = "INSERT INTO Person (firstname, lastname, username)VALUES ('$first_name', '$last_name', '$username')";
		$db->execQuery($sql); 	
    }

    public function fetch(int $id)
    {
		$db = new DBConnector();
		$db->connect();
		$sql = "SELECT * FROM Person WHERE id='$id'";
		$res = $db->execQuery($sql);
		var_dump(mysqli_fetch_assoc($res));		
    }

    public function fetchAll()
    {
		$db = new DBConnector();
		$db->connect();
		$sql = "SELECT * FROM Person";
		$res = $db->execQuery($sql);
		var_dump(mysqli_fetch_assoc($res));
    }

    public function update($user)
    {
		$db = new DBConnector();
		$db->connect();
		$first_name = $user->getFirstName();
		$last_name = $user->getLastName();
		$username = $user->getUsername();
		$sql = "UPDATE Person SET firstname ='$first_name', lastname = '$last_name' WHERE username = '$username'";
		$db->execQuery($sql);
    }

    public function delete($username)
    {
		$db = new DBConnector();
		$db->connect();
		$sql = "DELETE FROM Person WHERE username= '$username'";
		$db->execQuery($sql);
    }

}