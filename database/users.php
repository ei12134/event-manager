<?php
function getUserId($username)
{
	global $db;
	$stmt = $db->prepare('SELECT userId FROM users WHERE username = ?');
	$stmt->execute(array($username));
	return $stmt->fetch()[0];
}

function getName($userId)
{
	global $db;
	$stmt = $db->prepare('SELECT name FROM users WHERE userId = ?;');
	$stmt->execute(array($userId));
	return $stmt->fetch();
}

function userExists($username)
{
	global $db;
	$stmt = $db->prepare('SELECT COUNT(*) FROM users WHERE username = ?;');
	$stmt->execute(array($username));
	$result = $stmt->fetch();
	return ($result[0] == 1);
}

function createUser($username, $name, $password)
{
	global $db;
	$stmt = $db->prepare('INSERT INTO users VALUES(NULL, ?, ?, ?);');
	$stmt->execute(array($username, $name, sha1($password)));
}

function checkPassword($username, $password)
{
	global $db;
	$stmt = $db->prepare('SELECT password FROM users WHERE username = ?;');
	$stmt->execute(array($username));
	$result = $stmt->fetch();
	return (isset($result['password']) && $result['password'] == sha1($password));
}
?>
