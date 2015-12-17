<?php

if (count($result) == 0)
	{?>
<h3 class="no_events">No events to display</h3>
<?php 
}?>

<?php
foreach($result as $event)
{

	switch ($event['typeId']) {
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
	}

	?>
	<div class="event-item-list">
		
		<?php 
		if ($event['visibility'] == 0)
		{ 
			?>
			<img class="visibility" src="../images/private.jpg" alt="Private event" title="Private event">
			<?php 
		}
		else
		{
			?>
			<a href='event_item.php?id=<?php echo $event['eventId'] ?>'>

				<div class="clickable">
					<img class="visibility" src="../images/public.jpg" alt="Public event" title="Public event">
					<?php } ?>

					<h3 title="<?php echo $eventType ?>"> <?php echo $event['title'] ?> </h3>


					<img src="<?php echo $event['imageURL'] ?>" class="image" alt="<?php echo $event['title'] ?>">
					<p class="date"> Event date: <?php echo $event['eventTime'] ?></p>
					<p> <?php echo substr($event['description'], 0, 140) ?> ...</p>
				</div>
			</a>
		</div>
		<?php
	}
	?>