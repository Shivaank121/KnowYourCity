<html>
<body>
    <form action = "./InsertWebsite.php" method ="post">
        
        <input type = "submit" name = "submit" value = "Insert All">
    
    </form>
    <?php
    require 'connect.php';
    
    if(isset($_POST['submit']) && !empty($_POST['submit']))
    {
        $fp = fopen("DistrictWebsite.txt","r");
        $j=0;
        while(!feof($fp))
        {
            $line= fgets($fp);
            $pos=my_ofset($line);
            $len=strlen($line)-1;
            
            $Code = substr($line, 0, 2);
            
            $line2 = substr($line, 2);        
            $details[0] = strtok($line2, "\t");
            $details[0] = trim($details[0]);
            $Name = $details[0];
            
                    
            $i=0;
            while ($details[$i] !== false)
            {
               $details[++$i] = strtok("\t");
            }
            $Website = $details[5];
            
            $Name= trim($Name);        
           
            $Code= trim($Code);
       
            $Website= trim($Website);
            
            echo ++$j."\t".$Code."\t".$Name."\t".$Website."<br>";
            
            $query = "INSERT INTO WebsiteDistricts VALUES('$Code', '$Name','$Website','Punjab' )";
            if($conn->query($query))
            {
                echo "Data inserted.<br>";
            }
            else
            {
                echo "Error during inserting data.\n";
            } 
        }

    }
   
    function my_ofset($text){
        preg_match('/^\D*(?=\d)/', $text, $m);
        return isset($m[0]) ? strlen($m[0]) : false;
    }
    
    ?>
 
    
    </body>

</html>
