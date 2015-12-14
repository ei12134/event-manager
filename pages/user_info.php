<?php
include_once('../database/connection.php');
include_once('../database/users.php');

$title = "User information";
include_once('../templates/header.php');

if (!isset($_SESSION['userId']))
  header('Location: ../index.php');
?>

<div id="user_info">
  <h2>User information</h2>

  <img class="grow" height="150" src="../images/avatar.jpg" alt="avatar" />

  <table>
    <tr>
      <td>Username</td>
      <td><?php echo $_SESSION['username']?></td>
    </tr>

    <tr>
      <td>Name</td>
      <td><?php echo getName($_SESSION['userId'])[0] ?></td>
    </tr>
  </table> 

</div>  

<?php include_once('../templates/footer.php'); ?>  