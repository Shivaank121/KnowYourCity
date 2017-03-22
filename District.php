<html>
    <body>
            <?php
                
                require 'connect.php';
        
                $state = $_POST['Stname'];

                if(isset($_POST['Submit']) && !empty($_POST['district']))
                {
                    $district = $_POST['district'];
                    $Table = $state.'Table';
                    $query = "SELECT * FROM $Table WHERE Name = '$district'";
                    $result = $conn->query($query);
	                
                    $row = $result->fetch_assoc();
                    
                    echo "District : ".$row['Name']. " <br>Population : ".$row['Population']. "<br>Area : ". $row['Area'] . "<br>Population Density : ".$row['Density']. "<br> Official Website : <a href = ".$row['Website']. "  >Click Here</a>";
                    echo "<br>";                   
                        
                }
            
        
            ?>
    
    </body>

</html>