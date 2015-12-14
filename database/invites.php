<?php
function inviteUser($eventId, $userId)
{
	global $db;
	$stmt = $db->prepare('INSERT INTO invites VALUES (?, ?);');
	$stmt->execute(array($eventId, $userId));
}

function isInvited($eventId, $userId)
{
	global $db;
	$stmt = $db->prepare('SELECT COUNT(*) FROM invites WHERE eventId = ? AND userId = ?;');
	$stmt->execute(array($eventId, $userId));
	return ($stmt->fetch()[0] == 1);
}
?>