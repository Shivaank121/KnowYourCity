<?php
    require 'connect.php';
    if(isset($_GET["district"]) && !empty($_GET["district"]) )
    {
        $district = ucfirst($_GET['district']);      // first char capital
        
      /*  $state2 = $state;                       // removes spaces
        $token = strtok($state, " ");
        $state  = "";
        while ($token !== false)
        {
            $token = ucfirst($token);
            $state = $state.$token;
            $token = strtok(" ");
        }    
        $state = trim($state);
        */
        
        $query ="SELECT * FROM UttarPradeshTable WHERE Name = '$district' ";
        
        $results = $conn->query($query);

        $rows = $results->fetch_array();
        
        
        @$myObj->Name = $rows["Name"];
        $myObj->Code =  $rows["Code"];
        $myObj->Headquarter =  $rows["Headquarters"];
        
        $myObj->Pincode = $rows["Pincode"];
        $myObj->AreaCode =  $rows["AreaCode"];
        $myObj->Latitude = $rows["Latitude"];
        
        $myObj->Longitude =  $rows["Longitude"];
        $myObj->Area =  $rows["Area"];
        $myObj->Population = $rows["Population"];
        
        $myObj->Density = $rows["Density"];
        

        $myJSON = json_encode($myObj);

        echo $myJSON;     
                
    }
    
    ?>