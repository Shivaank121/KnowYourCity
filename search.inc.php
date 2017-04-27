<?php
    require 'connect.php';

    if(isset( $_GET['district'])){
        $district= $_GET['district'];
        $Table = $_GET['Table'];
    
        @$query ="Select Name FROM $Table WHERE Name LIKE '$district%' LIMIT 4";
        $result = $conn->query($query);

        if($result->num_rows > 0 && !empty($district))
        {    
            while( $row = $result->fetch_assoc())
             {
                echo "<li>".$row["Name"]."</li>" ; 
             }
        }
    }
?>