<div class="item-text">
	<div id="comments">
		<h3><?php echo count($comments);?> Comments</h3>

		<form action="../actions/action_create_comment.php" method="post">
			<input type="hidden" name="eventId" value="<?php echo $event['eventId']?>">
			<p><textarea name="comment" required placeholder="Write comments..." rows="1" cols="50" ></textarea></p>
			<input type="submit" value="Post">
		</form>

		<?php foreach ($comments as $comment) { ?>
		<div class="comment">
			<p class="name"><?php echo getName($comment['userId'])[0]?></p>
			<p class="text"><?php echo $comment['text']?></p>
		</div>
		<?php } ?>
	</div> 
</div>
