<?php

    require 'connect.php';
    if(isset($_GET['Table']) && !empty($_GET['Table']) && isset($_GET['District']) && !empty($_GET['District']) )
    {
        $District = $_GET['District'];
        $Table = $_GET['Table'];
        
        $query = "SELECT * FROM $Table WHERE Name = '$District' ";
        
        $result = $conn->query($query);
        
        if($result->num_rows > 0)
        {   
             $row = $result->fetch_assoc();
           
            /*echo "<b>Code :" .$row["Code"]. "  <br>Pincode :" .$row["Pincode"]. "  <br>Name :" .$row["Name"]. "<br><br><br>" ; */
            
             @$myObj->Name = $row['Name'];
             $myObj->Code = $row['Code'];
             $myObj->Pincode = $row['Pincode'];
             $myObj->AreaCode = $row['AreaCode'];
             $myObj->Headquarter = $row['Headquarters'];
             $myObj->Population = $row['Population'];
             $myObj->Latitude = $row['Latitude'];
             $myObj->Longitude = $row['Longitude'];
             $myObj->Density = $row['Density'];
             $myObj->Area = $row['Area'];
            
             $myJSON = json_encode($myObj);
             echo $myJSON;
         
         
        }
    }

?>