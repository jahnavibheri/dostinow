<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
$envelope = '<img src="note_dead.png" width="22" height="12" alt="Notes" title="This envelope is for logged in members">';
$loginLink = '<a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="signup.php">Sign Up</a>';
if($user_ok == true) {
	$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$notescheck = $row[0];
	$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
		$envelope = '<a href="notifications.php" title="Your notifications and friend requests"><img src="note_still.jpg" width="20" height="20" alt="Notes"></a>';
    } else {
		$envelope = '<a href="notifications.php" title="You have new notifications"><img src="note_flash1.gif" width="20" height="20" alt="Notes"></a>';
	
	}
    $loginLink = '<a href="user.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
}

?>
<div id="pageTop">
<img src="logo.png" alt="logo" title="Dosti Now" align="left" height = "120" width = "120">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="http://www.dostinow.com">
        
      </a>
    </div>
    <div id="pageTopRest">
      <div id="menu1">
        <div>
          <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
        </div>
      </div>
      <div id="menu2">
        <div>
          <a href="http://www.dostinow.com">
            
          </a>
          
        </div>
      </div>
    </div>
  </div>
</div>


