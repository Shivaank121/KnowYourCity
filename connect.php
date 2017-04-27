<html>
    <body>
          
        <?php

        $servername= "localhost";
        $username= "root";
        $password="";
        $dbname = "KnowYourCity";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error)
        {
            die("Connection Failed");
        }
        
	

        ?>
    </body>

</html>
