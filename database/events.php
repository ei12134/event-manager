<?php
function createEvent($ownerId, $typeId, $visibility, $imageURL, $title, $description, $eventTime)
{
	global $db;
	$stmt = $db->prepare('INSERT INTO events VALUES(NULL, ?, ?, ?, ?, ?, ?, ?);');
	$stmt->execute(array($ownerId, $typeId, $visibility, $imageURL, $title, $description, $eventTime));
	return $db->lastInsertId();
}

function getOwnerEvents($owner)
{
	global $db;
	$stmt = $db->prepare('SELECT * FROM events WHERE ownerId = ?;');
	$stmt->execute(array($owner));
	return $stmt->fetchAll();
}

function getRegisteredEvents($userId)
{
	global $db;
	$stmt = $db->prepare('SELECT * FROM events WHERE eventId IN (SELECT eventId FROM registrations WHERE userId = ?);');
	$stmt->execute(array($userId));
	return $stmt->fetchAll();
}

function getEventById($eventId)
{
	global $db;
	$stmt = $db->prepare('SELECT * FROM events WHERE eventId = ?;');
	$stmt->execute(array($eventId));
	return $stmt->fetch();
}

function searchEvents($query)
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM events WHERE visibility != 0 AND description LIKE '%" . $query . "%'");
	$stmt->execute();
	return $stmt->fetchAll();
}

function advancedSearchEvents($title, $description, $typeId)
{
	global $db;

	if ($typeId != -1)
	{
		$stmt = $db->prepare("SELECT * FROM events WHERE visibility != 0 AND title LIKE '%$title%' AND description LIKE '%$description%' AND typeId LIKE '%$typeId%'");
	} 
	else
	{
		$stmt = $db->prepare("SELECT * FROM events WHERE visibility != 0 AND title LIKE '%$title%' AND description LIKE '%$description%'");
	}

	$stmt->execute();
	return $stmt->fetchAll();
}

function removeEvent($eventId)
{
	global $db;
	$stmt = $db->prepare('DELETE FROM events WHERE eventId = ?;');
	$stmt->execute(array($eventId));
}

function updateEvent($typeId, $visibility, $imageURL, $title, $description, $eventTime, $eventId)
{
	global $db;
	$stmt = $db->prepare('UPDATE events SET typeID = ?, visibility = ?, imageURL = ?, title = ?, description = ?, eventTime = ? WHERE eventId = ?;');
	$stmt->execute(array($typeId, $visibility, $imageURL, $title, $description, $eventTime, $eventId)); 
}
?>