<?php


	$xml = simplexml_load_file("xmlInput.xml") or die("Cannot create");

	echo 'List of links to items in the feed that have the search term in the item title are:<br> ';
	for($i=0;$i<3;$i++)
	{	
		echo '<li><a href='. $xml->channel->item[$i]->link. '>' . $xml->channel->item[$i]->title . '</a></li>';
	}
	
	
	
	
	
	
	
	
	
	
	/* header('Content-type: text/xml');
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	echo "<rss version=\"0.91\">"; */
	/* echo "<channel>
	<title> {$xml->channel->title} </title>
	<link> {$xml->channel->link} </link>
	<description> {$xml->channel->description} </description>";

	for($i=0;$i<3;$i++)
	{
		echo "<item>
		<title> {$xml->channel->item[$i]->title}</title>
		<link> {$xml->channel->item[$i]->link}</link>
		<description> {$xml->channel->item[$i]->description}</description>
		</item>"; 
	}
	echo "</channel></rss>";
	 */





?>











