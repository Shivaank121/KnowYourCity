<h1 align="center"><strong>Districts of <?php
        require 'connect.php';
        if(isset($_GET['state']) && !empty($_GET['state']))
        {
            $Table = $_GET['state']."Table";
            $_GET['state'] = str_replace("P"," P",$_GET['state']);
            echo $_GET['state'];
        }
    ?> &nbsp;</strong></h1>
<table width="90%" height="803" border="0" align="center" style="border:#666666 solid 1px;border-bottom:#000000 solid 1px; border-top:#000000 solid 1px; border-left:#000000 solid 1px; border-right:#000000 solid 1px;line-height:30px;">
<tbody><tr>
          <td height="33" row="" span="9" bgcolor="#99CCFF"><div align="center"><strong>Code</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>District</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Headquarters</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Pincode</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Area code</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Latitude</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Longitude</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Population <br>
            (2001)</strong> </div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Area (/km²)</strong></div></td>
          <td bgcolor="#99CCFF"><div align="center"><strong>Density (/km²)</strong></div></td>
        </tr>
    <?php
        require 'connect.php';
        @$query ="Select * FROM $Table";
        $result = $conn->query($query);

        if($result->num_rows > 0)
        {    
            while( $row = $result->fetch_assoc())
             {
                echo "<tr><td><div align='center'>".$row['Code']."</div></td>
                    <td><div align='center'>".$row['Name']."</div></td>
                    <td><div align='center'>".$row['Headquarters']."</div></td>
                    <td><div align='center'>".$row['Pincode']."</div></td>
                    <td><div align='center'>".$row['AreaCode']."</div></td>
                    <td><div align='center'>".$row['Latitude']."</div></td>
                    <td><div align='center'>".$row['Longitude']."</div></td>

                    <td><div align='center'>".$row['Population']."</div></td>
                    <td><div align='center'>".$row['Area']."</div></td>
                    <td><div align='center'>".$row['Density']."</div></td>
                    </tr>" ; 
             }
        }
        else 
        {
            echo "Invalid State Name Entered";
        }
        
        
        
    
    ?>