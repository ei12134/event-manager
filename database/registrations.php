<?php
function deregisterEvent($eventId, $userId)
{
	global $db;
	$stmt = $db->prepare('DELETE FROM registrations WHERE eventId = ? AND userId = ?;');
	$stmt->execute(array($eventId, $userId));
}

function registerEvent($eventId, $userId)
{
	global $db;
	$stmt = $db->prepare('INSERT INTO registrations VALUES (?, ?);');
	$stmt->execute(array($eventId, $userId));
}

function isRegistered($eventId, $userId)
{
	global $db;
	$stmt = $db->prepare('SELECT COUNT(*) FROM registrations WHERE eventId = ? AND userId = ?;');
	$stmt->execute(array($eventId, $userId));
	return $stmt->fetch()[0] == 1;
}
?>