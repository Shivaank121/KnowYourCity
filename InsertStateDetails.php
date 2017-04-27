<html>
<body>
  
    
    <form action = "./InsertStateDetails.php" method ="post">
        
        <input type = "submit" name = "submit" value = "Insert All">
    
    </form>
    <?php
    
    require 'connect.php';
    
    $query = "CREATE TABLE WestBengalTable (Code TEXT, Name TEXT, Headquarters TEXT, Pincode TEXT, AreaCode TEXT, Latitude TEXT, Longitude TEXT, Population TEXT, Area TEXT, Density TEXT )";
    
    if($conn->query($query))
    {
        echo " Table created.<br>";
    }
    
    else
    {
        echo "Error\n";
    }
    
    $fp = fopen("data.txt","r");
    $j=0;
    if(isset($_POST['submit']) && !empty($_POST['submit']))
    {
        while(!feof($fp))
        {
            $line= fgets($fp);
            $Code = trim($line);
        //    echo $line."<br>";
           
            $line= fgets($fp);
            $Name = trim($line);
          //  echo $line."<br>";
           
            $line= fgets($fp);
            $Headquarters = trim($line);
          //  echo $line."<br>";
           
            $line= fgets($fp);
            $Pincode = trim($line);
           // echo $line."<br>";
           
            $line= fgets($fp);            
            $AreaCode = trim($line);
           // echo $line."<br>";
            
            $line= fgets($fp);
           // echo $line."<br>";
            $token = strtok($line, "&");

            $Latitude = trim($token);
            $Latitude = str_replace("°", 'd', $Latitude);
            $Latitude = str_replace("'", 'm', $Latitude);
            $token = strtok("&");
            $Longitude = trim($token);
            $Longitude = str_replace("°", 'd', $Longitude);
            $Longitude = str_replace("'", 'm', $Longitude);
                        
            $line= fgets($fp);
            $Population = trim($line);
            //echo $line."<br>";
            
            $line= fgets($fp);
            $Area = trim($line);
            //echo $line."<br>";
            
            $line= fgets($fp);
            $Density = trim($line);
            // echo $line."<br>";
            
            
            
            $query = "INSERT INTO WestBengalTable VALUES('$Code', '$Name', '$Headquarters' , '$Pincode', '$AreaCode', '$Latitude','$Longitude','$Population','$Area', '$Density' )";
            if($conn->query($query))
            {
                echo ++$j." Data inserted.<br>";
            }
            else
            {
                echo "Error during inserting data.\n";
            }  
          
        }
    }
    
    ?>
    
    </body>
</html>