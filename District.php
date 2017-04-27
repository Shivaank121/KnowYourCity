<html>
    <body>
            <style>
            div.header
            {
                width:103%;
                background-color:#809fff;
                color:white;
                margin:0px 0px 20px 0px;
                 padding-top:0px;
                 border:1px solid grey;
                 font-size:20px;
            }
            </style>    
        
            <div class="header">
                <center><h1><?
                    require 'connect.php';
                    $district = $_POST['district'];
                    $state = $_POST['Stname'];
                    echo ucfirst($district); ?></h1></center>
            </div>
            <?php
                
                
                $district = $_POST['district'];
                
                $district = strtolower($district);
               
                $state2 = $state; 
                $token = strtok($state, " ");
                $state  = "";
                while ($token !== false)
                {
                    $token = ucfirst($token);
                    $state = $state.$token;
                    $token = strtok(" ");
                } 
                 
                $Table = $state.'Table';
                $state = strtolower($state);
                if($state=="kerela")
                    $state="kerala";
                 echo "<center><img src='http://www.mapsofindia.com/maps/".$state."/districts/".$district."-district-map.jpg'  style='width:400px;height:300px;'></center><br>";
        
              

                if(isset($_POST['Submit']) && !empty($_POST['district']))
                {
                    $query = "SELECT * FROM $Table WHERE Name = '$district'";
                    $result = $conn->query($query);
	                
                    $row = $result->fetch_assoc();
                    
                    $state = ucfirst($state);
                    $district = ucfirst($district);
                    
                    $query = "SELECT Website FROM WebsiteDistricts WHERE State = '$state2' AND Name = '$district'";
                    $result2 = $conn->query($query);                    
                    $row2 = $result2->fetch_assoc();
                    $Website = $row2['Website'];
                    
                   /* echo "District : ".$row['Name']. " <br>Population : ".$row['Population']. "<br>Area : ". $row['Area'] . "<br>Population Density : ".$row['Density']. "<br> Official Website : <a href = ".$row['Website']. "  >Click Here</a>";
                    echo "<br>"; */
                }
                     ?>
                    <table width="60%" border="0" align="center" style="border-bottom:#000000 solid 1px; border-top:#000000 solid 1px; border-left:#000000 solid 1px; border-right:#000000 solid 1px; line-height:30px;">
        <tbody>
            
            <tr> <td bgcolor="#99CCFF" width="50%" ><div align="center"><strong>State</strong></div></td>
            <td ><div align="center"><strong><?php echo ucfirst($state2); ?></strong></div></td>
            
            
            </tr>
            
            
            
         <tr> <td bgcolor="#99CCFF" width="50%" ><div align="center"><strong>Code</strong></div></td>
            <td ><div align="center"><strong><?php echo $row['Code'] ?></strong></div></td>
            
            
            </tr>
            
            
          <tr><td bgcolor="#99CCFF"><div align="center"><strong>District</strong></div></td>
            
            <td ><div align="center"><strong><?php echo $row['Name'] ?></strong></div></td></tr>
            
            
         <tr><td bgcolor="#99CCFF"><div align="center"><strong>Headquarter</strong></div></td>
            <td ><div align="center"><strong><?php echo $row['Headquarters'] ?></strong></div></td>
            </tr>
            
            
          <tr><td bgcolor="#99CCFF"><div align="center"><strong>Pincode</strong></div></td>
            <td ><div align="center"><strong><?php  echo $row['Pincode'] ?></strong></div></td>
            </tr>
            
            
          <tr><td bgcolor="#99CCFF"><div align="center"><strong>Area code</strong></div></td>
            <td ><div align="center"><strong><?php echo $row['AreaCode'] ?></strong></div></td>
            </tr>
            
            
          <tr><td bgcolor="#99CCFF"><div align="center"><strong>Latitude</strong></div></td>
            <td ><div align="center"><strong><?php $row['Latitude'] = str_replace("d","°",$row['Latitude']); $row['Latitude'] = str_replace("m","'",$row['Latitude']); echo $row['Latitude'] ?></strong></div></td>
            </tr>
            
            
          <tr><td bgcolor="#99CCFF"><div align="center"><strong>Longitude</strong></div></td>
            <td ><div align="center"><strong><?php $row['Longitude'] = str_replace("d","°",$row['Longitude']); $row['Longitude'] = str_replace("m","'",$row['Longitude']); echo $row['Longitude'] ?></strong></div></td>
            </tr>
            
            
         <tr> <td bgcolor="#99CCFF"><div align="center"><strong>Population(2001)</strong> </div></td>
            <td ><div align="center"><strong><?php echo $row['Population'] ?></strong></div></td>
            </tr>
            
            
         <tr> <td bgcolor="#99CCFF"><div align="center"><strong>Area (/km²)</strong></div></td>
            <td ><div align="center"><strong><?php echo $row['Area'] ?></strong></div></td>
            </tr>
            
            
         <tr> <td bgcolor="#99CCFF"><div align="center"><strong>Density (/km²)</strong></div></td>
            <td ><div align="center"><strong><?php echo $row['Density'] ?></strong></div></td>
            </tr>
            
            
            <tr> <td bgcolor="#99CCFF"><div align="center"><strong>Official Website</strong></div></td>
            <td ><div align="center"> <?php echo "<a href =".$Website. " target= _blank> Click here</a>" ?></div></td>
            </tr>
            
      </tbody></table>
          
    </body>

</html>