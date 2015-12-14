<form action="../actions/action_edit_event.php" method="post">
	<input type="hidden" name="eventId" value="<?=$event['eventId']?>">
	
	<h2>Edit event</h2>

	<table class="radioButton">
		<tr>
			<td>
				Private
			</td>
			<td>
				<input type="radio" name="visibility" value="0" 
				<?php if ($event['visibility'] == 0)
				{?> checked="checked" <?php }?>>
			</td>
			<td>
				Public
			</td>
			<td>
				<input type="radio" name="visibility" value="1" <?php if ($event['visibility'] != 0)
				{?> checked="checked" <?php }?>>
			</td>
		</tr>		
	</table>

	<fieldset> 
		<table class="edit_table">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $event['title'] ?>"></td>
			</tr>

			<tr>
				<td>Event time</td>
				<td> <input type="text" name="eventTime" id="date" value="<?php echo $event['eventTime'] ?>"></td>
			</tr>

			<tr>
				<td>Event type</td>
				<td>
					<select name="eventType">
						<option value="1" <?php if ($event['typeId'] == 1)
						{?> selected <?php }?>>Party</option>
						<option value="2" <?php if ($event['typeId'] == 2)
						{?> selected <?php }?>>Concert</option>
						<option value="3" <?php if ($event['typeId'] == 3)
						{?> selected <?php }?>>Conference</option>
						<option value="4" <?php if ($event['typeId'] == 4)
						{?> selected <?php }?>>Other</option>
					</select>
				</td>	
			</tr>

			<tr>
				<td>Description</td>
				<td><textarea name="description"><?php echo $event['description'] ?></textarea></td>
			</tr>

			<tr>
				<td>Image</td>
				<td><span><input type="text" name="imageURL" value="<?php echo $event['imageURL'] ?>"></span></td>
			</tr>

			<tr>
				<td colspan="2"> <input class="button" type="submit" value="Save"></td>
			</tr>
		</table>
	</fieldset>
</form>