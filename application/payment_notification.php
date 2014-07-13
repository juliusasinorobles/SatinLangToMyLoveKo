<?php

$notif =  json_encode($_REQUEST);

if($fh = fopen("mytest/test.txt", "a"))
{
	fwrite($fh, $notif."\n\r");
	fclose($fh);
	echo "OK";
}
else
{
	echo "unable to write file...";
}

?>