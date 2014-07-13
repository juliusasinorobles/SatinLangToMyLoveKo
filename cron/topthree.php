<?php
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'underdogidols';
	
	$rank = 0;
	$round_month = intval(date('m')) . ',' . date('Y'); 
	
	echo $round_month;
	
	$connection = mysql_connect($host, $user, $pass);
	
	if(!$connection):
		die('Could not connect: ' . mysql_error());
	endif;
	
	mysql_select_db($database) or die(mysql_error());
	
	$select_top = mysql_query("
				SELECT 
					video.contestant_id as contestant_id,
					video.id as video_id,
					video.round_month as round_month,
					COUNT(*) AS votes
				
				FROM video 
				INNER JOIN vote
				ON video.id = vote.video_id
				WHERE video.round_month = '$round_month'
				AND video.round = 2
				GROUP BY video.id
				ORDER BY votes asc
				LIMIT 3;	
				");
	
	if($select_top) :	
		while($row = mysql_fetch_array($select_top)):
			$rank ++;
			$sql = "INSERT INTO top_three 
					(contestant_id, video_id, round_month, ranking, votes)
					VALUES
					('".$row['contestant_id']."', '".$row['video_id']."', 
						'".$round_month."', '".$rank."', '".$row['votes']."')";
						
			mysql_query($sql) or die(mysql_error());			
		endwhile;
	endif;
	
	mysql_close($connection);
?>