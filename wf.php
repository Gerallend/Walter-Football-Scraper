<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  font-size: calc(1em + 1vw)
}
.content {
  width:100%;
}
#url {
	width:75%;
}

</style>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 
	var all = document.getElementsByTagName("img");
	for(var i = 0, max = all.length; i < max; i++) 
	{
		all[i].src = 'https://www.walterfootball.com/' + all[i].dataset.cfsrc;
		all[i].style = '';
	}
});
</script>
<?php

require('simple_html_dom.php');

$url = "";
if (isset($_POST['url']))
	$url = $_POST['url'];

// Create DOM from URL or file

$pick = 0;

?>
<div class="content">
	<form method="POST">
		<input id="url" name="url" value="<?php echo $url;?>">
		<input type="Submit" value="Submit" />
	</form>
<?php
if ($url != "")
{
	$html = file_get_html($url);
	
	foreach ($html->find('#MainContentBlock ol li') as $grade) {
			echo '<b>' . ++$pick . '</b>';
			echo $grade;
	}
}
else
{
	echo 'Enter a URL into the text input above';
}

?>
</div>
</body>
</html>