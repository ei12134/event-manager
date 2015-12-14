<?php
session_start(); 

if (!isset($_SESSION['userId']))
{
	header("Location: ../index.php");
}

include_once("../database/connection.php");
include_once("../database/comments.php");

$comment = filter_var($_POST['comment'], FILTER_SANITIZE_SPECIAL_CHARS);

addComment($_SESSION['userId'], $_POST['eventId'], $comment);

header("Location: ../pages/event_item.php?id=" . $_POST['eventId'] . "#comments");
?>