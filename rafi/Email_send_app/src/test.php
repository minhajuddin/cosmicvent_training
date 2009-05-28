<?php
if(!isset($_POST['test'])){
  echo "in the get";
  $user = "Rafi";
  echo $user;
} else {
  echo "In the post";
  echo $user;
}
?>

<form action='test.php' method='POST' >
<input type='hidden' value='x' name='test' />
<input type='submit' value='Hit me' />
</form>