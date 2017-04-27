<?php
    require 'connect.php';

    if(isset( $_GET['state'])){
        
        $search_text= $_GET['state'];
        //echo $search_text;
    }
    $query ="Select Name FROM States WHERE Name LIKE '$search_text%' LIMIT 10";
    $result = $conn->query($query);

    $i=0;
    if($result->num_rows > 0 && !empty($search_text))
    {    while( $row = $result->fetch_assoc())
         {
            echo "<li id='".++$i."' >".$row["Name"]."</li>" ; 
         }
    }
?>