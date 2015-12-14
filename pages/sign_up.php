<?php	
include_once('../database/connection.php');
include_once('../database/users.php');
 
if($_SERVER["HTTPS"] != "on")
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

$title = "Sign up";
include_once('../templates/header.php');	
?>
    <div class="sign-up">
      <form action="../actions/action_sign_up.php" method="post">
        <h2>Create your Event Manager Account</h2>
        <fieldset> 
          <table>
            <tr>
              <td>Username</td>
              <td> <input type="text" pattern="[\w]{4,}" name="username" required="required"></td>
            </tr>

            <tr>
              <td>Name</td>
              <td> <input type="text" pattern="[^\d\\\|\!&quot;\@\#\£\$\§\%&amp;\/\(\)\=\?\{\[\]\}\'\«\»\*\+]{4,}" name="name" required="required"> </td>
            </tr>

            <tr>
              <td>Password</td>
              <td> <input type="password" pattern="[\w]{4,}" name="password" required="required"> </td>
            </tr>

						<tr>
              <td>Confirm password</td>
              <td> <input type="password" pattern="[\w]{4,}" name="password2" required="required"> </td>
						</tr>

            <tr>
              <td colspan="2"> <input type="submit" value="Sign-up"> </td>
            </tr>
          </table>
        </fieldset>

      </form>

    </div>

    <?php include('../templates/footer.php');?>  