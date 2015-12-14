<?php
include_once('../database/connection.php');
include_once('../database/events.php');

$title = "Advanced search";
include('../templates/header.php');

if (!isset($_SESSION['userId']))
	header('Location: ../index.php');
?>

<form action="../pages/advanced_search_results.php" method="get">

	<h2>Advanced search</h2>

	<fieldset> 
		<table class="edit_table">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" ></td>
			</tr>

			<tr>
				<td>Description</td>
				<td><textarea name="description"></textarea></td>
			</tr>

			<tr>
				<td>Event type</td>
				<td>
					<select name="eventType">
						<option value="-1">Any</option>
						<option value="1">Party</option>
						<option value="2">Concert</option>
						<option value="3">Conference</option>
						<option value="4">Other</option>
					</select>
				</td>	
			</tr>

			<tr>
				<td colspan="2"> <input type="submit" class="button" value="Search"></td>
			</tr>
		</table>
	</fieldset>
</form>

<?php
include('../templates/footer.php');
?>