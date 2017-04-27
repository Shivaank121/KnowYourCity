
<?php
     require 'connect.php';

    header('Content-Type: application/json; Charset=UTF-8');
        
    if(isset($_GET['State']) && !empty($_GET['State']))
    {
        $state = ucfirst($_GET['State']);      // first char capital
        
        $state2 = $state;                       // removes spaces
        $token = strtok($state, " ");
        $state  = "";
        while ($token !== false)
        {
            $token = ucfirst($token);
            $state = $state.$token;
            $token = strtok(" ");
        }    
        $state = trim($state);
        
        $what = $_GET['what'];
        
        $query ="SELECT * FROM States WHERE Name = '$state2'";        
        $results = $conn->query($query);	              
        $rows = $results->fetch_array();
        
        if($what == "Clothing")
        {
            $text = $rows['Clothing'];
        }
        else if($what == "FamousPlaces")
        {
            $text = $rows['FamousPlaces'];
        }
        else if($what == "Text")
        {
            $text = $rows['Text'];
        }
        else 
        {
            $text = $rows['Food'];
        }
        
        $text = strip_tags($text);
        echo $text;
            
    }

?>