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

$round = 1;
if (isset($_GET['r']))
	$round = $_GET['r'];

// Create DOM from URL or file

for ($i = 1; $i <= 7; $i++)
{
	echo '<a href="?r=' . $i . '">' . $i . '</a> ';
}

$pick = 0;

echo '<div class="content">';
echo '<h2>Round ' . $round . '</h2>';
if ($round == 1)
{
	$html = file_get_html('https://walterfootball.com/nfldraftgrades.php');
	
	foreach ($html->find('#MainContentBlock ol li') as $grade) {
			echo '<b>' . ++$pick . '</b>';
			echo $grade;
	}

	$html = file_get_html('https://walterfootball.com/nfldraftgrades1.php');
	
	foreach ($html->find('#MainContentBlock ol li') as $grade) {
			echo '<b>' . ++$pick . '</b>';
			echo $grade;
	}
}
else
{
	$html = file_get_html('https://walterfootball.com/nfldraftgrades' . $round . '.php' );

	foreach ($html->find('#MainContentBlock ol li') as $grade) {
		echo '<b>' . ++$pick . '</b>';
		echo $grade;
	}
}

?>
</div>
</body>
</html>