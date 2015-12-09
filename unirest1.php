<?php
	These code snippets use an open-source library. http://unirest.io/php
	require_once 'unirest-php-master/src/Unirest.php';
	
	// These code snippets use an open-source library.
	$request = Unirest\Request::get("https://itunes.apple.com/search?term=metallica",
		array("Accept" => "application/json"
				)
			);
			
	echo "<pre>";
	$output = "<ul>";
	foreach($request->body->results as $data){
		print_r($data);
	/*	
    $output .= "<h4>".$data['id']."</h4>";
    $output .= "<h5>".$data['title']."</h5>";
    $output .= "<li>Meal: ".$data['imageUrls']."</li>";
    $output .= "<a href=>".$data['image']."</a>";
	*/
}
$output .= "</ul>";
echo utf8_decode($output);

?>

