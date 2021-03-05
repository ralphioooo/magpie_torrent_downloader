<?php

//Use pwd to figure out what dir

//define('MAGPIE_DIR', '../');
define('MAGPIE_DIR', '');
//require_once(MAGPIE_DIR.'rss_fetch.inc');
require_once('rss_fetch.inc');


define('MAGPIE_CACHE_ON', false);
//$url = $_GET['url'];

$url='https://revolutiontt.me/rss.php?feed=dl&bookmarks=on&passkey=2084a8fa08e7da525508a6d77f20be58';

if ( $url ) {
	$rss = fetch_rss( $url );

	echo "Channel: " . $rss->channel['title'] . "<p>";
	echo "<ul>";
	foreach ($rss->items as $item) {
		$href = $item['link'];
		$title = $item['title'];	
		echo "<li><a href=$href>$title</a></li>";

		//$filename='torrents/'.$title.'.torrent';
		$filename='/Users/ralphvugts/Documents/sites/magpie/scripts/torrents/'.$title.'.torrent';
		if (file_exists($filename)) {
		    echo "The file $filename exists";
		} else {
		    file_put_contents($filename, fopen($href, 'r'));
		}				

	}
	echo "</ul>";
}
?>

<!--
<form>
	RSS URL: <input type="text" size="30" name="url" value="<?php echo $url ?>"><br />
	<input type="submit" value="Parse RSS">
</form>
-->  

<p>
<h2>Security Note:</h2>
This is a simple <b>example</b> script.  If this was a <b>real</b> script we probably wouldn't allow  strangers to submit random URLs, and we certainly wouldn't simply echo anything passed in the URL.  Additionally its a bad idea to leave this example script lying around.
</p>