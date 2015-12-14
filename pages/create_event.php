<?php
include_once('../database/connection.php');
include_once('../database/events.php');

$title = "Create Event";
include_once('../templates/header.php');

if (!isset($_SESSION['userId']))
	header('Location: ../index.php');
?>

<form action="../actions/action_create_event.php" method="post">

	<h2>Create event</h2>

	<table class="radioButton">
		<tr>
			<td>
				Private
			</td>
			<td>
				<input type="radio" name="visibility" value="0" checked="checked">
			</td>
			<td>
				Public
			</td>
			<td>
				<input type="radio" name="visibility" value="1">
			</td>
		</tr>		
	</table>

	<fieldset> 
		<table class="edit_table">
			<tr>
				<td>Title</td>
				<td> <input type="text" name="title" placeholder="Event title"  required></td>
			</tr>

			<tr>
				<td>Event time</td>
				<td> <input type="text" name="eventTime" id="date" required></td>
			</tr>

			<tr>
				<td>Event type</td>
				<td>
				<select name="eventType">
						<option value="1">Party</option>
						<option value="2">Concert</option>
						<option value="3">Conference</option>
						<option value="4">Other</option>
					</select>
				</td>	
			</tr>

			<tr>
				<td>Description</td>
				<td> <textarea placeholder="Event description text" rows="11" cols="70" name="description" required></textarea> </td>
			</tr>

			<tr>
				<td>Image</td>
				<td><input type="text" name="imageURL" placeholder="Event Image URL" required></td>
			</tr>

			<tr>
				<td colspan="2"> <input type="submit" class="button" value="Create" > </td>
			</tr>
		</table>
	</fieldset>
	
</form>

<?php
include('../templates/footer.php');
?>