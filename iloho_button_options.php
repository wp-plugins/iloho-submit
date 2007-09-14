<?php
/*
Version: 0.1
*/

### Variables Variables Variables
$base_name = plugin_basename('iloho_button/iloho_button_options.php');
$base_page = 'admin.php?page='.$base_name;

# make update
if(isset($_POST['icon']))
{
	$iloho_icon = $_POST['icon'] == 'small' ? 'small' : ($_POST['icon'] == 'text' ? 'text' : 'big');
	update_option('iloho_button_type', $iloho_icon);
	echo '<div id="message" class="updated fade"><p><font color="green">Updated</font></p></div>';
}
# no update
else
{
	if(!($iloho_icon = get_option('iloho_button_type'))){$iloho_icon = 'big';}
}
# html form
?>
<div class="wrap">
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<h2>Button Style</h2>
		<div align="center">
		<table width="300px" align="center">
			<tr><td width="80px"><input type="radio" name="icon" value="big" <?php echo $iloho_icon == 'big' ? 'checked="checked"' : '';?>></td><td align="left">Big : <img src="http://www.iloho.com/tools/iloho_big_button.gif" /></td></tr>
			<tr><td><input type="radio" name="icon" value="small" <?php echo $iloho_icon == 'small' ? 'checked="checked"' : '';?>></td><td align="left">Small : <img src="http://www.iloho.com/tools/iloho_small_button.gif" /></td></tr>
			<tr><td><input type="radio" name="icon" value="text" <?php echo $iloho_icon == 'text' ? 'checked="checked"' : '';?>></td><td align="left">Text : <span style="color:#0e61b2;background-color:#fff;">iloho it!</font></td></tr>
		</table>
		<p><input type="submit" name="Submit" class="button" value="Update Options" /></p>
		</div>
	</form>
</div>