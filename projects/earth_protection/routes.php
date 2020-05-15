<?php 
    
  $server = 'mysql32.mydevil.net';
  $user = 'm11573_tomcio61';
  $pass = 'DBApollo1?';
  $db = 'm11573_earth_protection';
  
  $con = new mysqli($server, $user, $pass, $db);
  
  
  if ($con->connect_error) die("Connection failed!"); 
  
  $routes = array();
  $routes["result"] = array();
  if ($result = $con->query("SELECT * FROM routes")) {
    while($row = $result->fetch_assoc()) {
      $routes["result"][] = $row;
    }
    echo json_encode($routes);
  }
  
  $result->close();
  
  $con->close();
  
?>