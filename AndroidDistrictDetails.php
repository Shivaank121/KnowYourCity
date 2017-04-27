<?php

if(isset($_GET['Table']) && !empty($_GET['Table']))
{
    $Table = $_GET['Table'];
    
    require 'connect.php';
    $query ="SELECT Name FROM $Table" ;
        
    $results = $conn->query($query);
	$arr = array();
    $j = -1;
    
    if($results->num_rows > 0)
        {   
            while( $row = $results->fetch_assoc())
            {
                if($row['Name'] != "")
                    $arr[++$j] = $row['Name'];
            }   
        }
    @$myObj->State = $arr;
    $myObj->Number = $j+1;
    
    $myJSON = json_encode($myObj);
    echo $myJSON;
}

?>