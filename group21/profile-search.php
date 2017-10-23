<!-- Page Info -->
<?php
		$title = "Campus Crush - Search";
		$createddate = "September 19 2017";
		$updateddate = "xxxx xx 2017";
		$filename = "profile-search.php";
		$banner = "Campus Crush - User Search";
		$description = "Find your Friends - Or your Crush";
?>
<!--
	Creator:      Connlaoi Smith
	Filename:    <?php echo $filename; ?>
	Created:      <?php echo $createddate; ?>
	Updated:     <?php echo $updateddate; ?>
	Description: <?php echo $description; ?>
-->

<!-- Include Header PHP -->
<?php include 'header.php';

if(!isLoggedIn()) { 
  header("Location:user-login.php");
  ob_flush();
}
  ?>

<!-- HTML -->
<p class="content"><?php echo $description; ?></p>

<br />
<hr />
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
    <tr>
      <td style="padding-left:300px;"><input type="text" name="search" placeholder="Search for Friends, Crushes, etc..." size="60" /></td>
      <td style="padding-left:10px;"><input type="submit" value="Search" /></td>
    </tr>
  </table>

<hr />
<br />

<?php
	
	// SELECT * FROM users WHERE first_name = 'carol';
		// create array from select statement
		// for each row in the array
			// create a new table row
				// create a new table div for each property value in the row
				// make the userid clickable -> redirect to profile-display using GET (?user=csmith) for sharing purposes

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$input = $_GET["search"];
		
		buildSearchResults($input);
	}
?>
</form>


<!-- Include Footer PHP -->
 <?php include 'footer.php'; ?>