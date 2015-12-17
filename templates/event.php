<?php
include_once('../database/registrations.php');
?>

<div class="event-item">
	<?php 

	switch ($event['typeId'])
	{
		case 1:
		$eventType = "Party";
		break;
		case 2:
		$eventType = "Concert";
		break;
		case 3:
		$eventType = "Conference";
		break;
		case 4:
		$eventType = "Other";
		break;
		default: 
		$eventType = "Undefined";
		break;
	}

	if ($event['visibility'] == 0)
	{
		?>
		<img class="visibility" src="../images/private.jpg" alt="Private event" title="Private event">
		<?php 
	}
	else
	{ 
		?>
		<img class="visibility" src="../images/public.jpg" alt="Public event" title="Public event">
		<?php 
	} ?>

	<form action="../actions/action_delete_event.php" method="post"> 
		<input type="hidden" name="eventId" value="<?=$event['eventId']?>">

		<h3><?php echo $eventType ?> - <?php echo $event['title'] ?></h3>
		<img src="<?php echo $event['imageURL'] ?>" class="image" alt="<?php echo $event['title'] ?>">

		<div class="item-text">
			<p class="date"> Event date: <?php echo $event['eventTime'] ?></p>
			<p> <?php echo $event['description'] ?> </p>

			<div id="dialog-confirm" title="Event deletion confirmation">
				<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This event will be permanently deleted and cannot be recovered. Are you sure?</p>

			</div>

			<ul>
				<li><a href="#comments">comments</a></li>
				<?php if (isset($_SESSION['userId']) && $_SESSION['userId'] == $event['ownerId']) { ?>
				<li><a href="edit_event.php?id=<?php echo $event['eventId'] ?>#content">edit</a></li>
				<li><a href="" class="delete">delete</a></li>
				<?php }
				$_SESSION['eventId'] = $event['eventId'];
				if (isRegistered($event['eventId'], $_SESSION['userId']))
				{
					?>
					<li><a href="../actions/action_deregister_event.php">deregister</a></li>
					<?php
				}
				else
				{
					?>
					<li><a href="../actions/action_register_event.php">register</a></li>
					<?php
				}
				?>
			</ul>
		</div>
	</form>
</div>