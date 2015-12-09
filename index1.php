
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>pricetree</title>
</head>
<body>

<h3 class="text-center"><a href="jsonExample.html" class="btn btn-default">More Offers</a></h3>
</body>
</html>		

<?php
$request = "http://www.pricetree.com/dev/api.ashx?pricetreeId=125805&apikey=7770AD31-382F-4D32-8C36-3743C0271699";
$response = file_get_contents($request);
$results = json_decode($response, TRUE);
$output = "<ul>";
foreach($results['data'] as $data){
    $output .= "<h4>".$data['Product_Name']."</h4>";
    $output .= "<h5>".$data['Product_Color']."</h5>";
	$output .= "<li>Seller: ".$data['Seller_Name']."</li>";
    $output .= "<li>In_Stock: ".$data['In_Stock']."</li>";
    $output .= "<li>Price: ".$data['Best_Price']."</li>";
    //$output .= "<li>URL: ".$data['Uri']."</li>";
	//$output .= "<a href=>".$data['Uri']."</a>";
	$output .= "<a href=> ".$data['Uri'] ."</a>";
   
	
	}
$output .= "</ul>";
echo utf8_decode($output);

?>








