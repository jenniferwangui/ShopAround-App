<?php
  // This demo project requires jQuery Data Tables installed (http://datatables.net) in order to run
    
  // Set up request
  $returnType = 'xml'; // xml or json
  $accessKey="B7D2A97FC37B32DF861F036201F70C93"; // put your access key here
  $projectId=0; // replace with your project id
 
  if (($accessKey=="") or ($accessKey=="B7D2A97FC37B32DF861F036201F70C93") or ($projectId<1))
   {
     echo "Please check, if you have specified projectId and accessKey in the script.";
     exit;
   }
 
   $request="https://api.netbiter.net/operation/v1/rest/$returnType/project/$projectId/system?accesskey=$accessKey";
    
   $ch = curl_init();
     
   curl_setopt($ch, CURLOPT_URL, $request);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $responseBody = curl_exec($ch);
    
   curl_close($ch);
    
   $response = new SimpleXMLElement($responseBody); // create XML object $response
   ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <style type="text/css" title="currentStyle">
         @import "jQueryUI/media/css/demo_page.css";
         @import "jQueryUI/media/css/jquery.dataTables.css";
         @import "jQueryUI/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
      </style>
      <script type="text/javascript" language="javascript" src="jQueryUI/media/js/jquery.js"></script>
      <script type="text/javascript" language="javascript" src="jQueryUI/media/js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8">
         $(document).ready(function() {
             $('#dataTable').dataTable( {
             "bJQueryUI": true
             } );
         } );
      </script>
   </head>
   <body id="dt_example">
      <div style="width:400px;margin:auto;">
         <center>
            <h1>System listing for the current project id <?php echo $projectId;?></h1>
         </center>
         <table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="dataTable">
            <thead>
               <tr>
                  <th>Project id</th>
                  <th>Project name</th>
               </tr>
            </thead>
            <tbody>   
               <?php
                  foreach ($response as $value) {
                   $id=$value->id;
                   $name=$value->name;
                   echo "<tr><td>$id</td><td>$name</td></tr>";
                  }
                  ?>
            </tbody>
         </table>
      </div>
   </body>
</html>