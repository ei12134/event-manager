<?php
function getComments($eventId)
{
	global $db;
	$stmt = $db->prepare('SELECT * FROM comments WHERE eventId = ? ORDER BY commentId DESC;');
	$stmt->execute(array($eventId));
	return $stmt->fetchAll();
}

function addComment($userId, $eventId, $text)
{
	global $db;
	$stmt = $db->prepare('INSERT INTO comments VALUES(NULL, ?, ?, ?);');
	$stmt->execute(array($userId, $eventId, $text));
}

function removeComment($eventId)
{
	global $db;
	$stmt = $db->prepare('DELETE FROM comments WHERE eventId = ?;');
	$stmt->execute(array($eventId));
}
?>