<!DOCTYPE html>
<html>
<head>
<style>
  /*  shivaank  */
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;
    background: #e6e6e6;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  padding-top: 20px;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
    .art{
        background: #FFF;
    }

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    
    
    /* shivaank   */
div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
table,th,td{
  border:1px solid black;
}
th{
  text-align:left;
}
    /* autosuggestion*/
    
    .autosuggest, .dropdown, .result{
    margin:0;
    padding: 0;
    border: 0;
    width: 250px;    
}

.autosuggest{
    padding : 4px;
    border : 1px solid #000;   
}

.result{
    width:250px;
    list-style: =none; 
    color: black;
}
.result li{    
    padding : 5px;
    border : 1px solid #000;
    border-top: 0;
    cursor:pointer;
}
.result li:hover{
    background: #ffff66;
    color: #000;    
}
    
.autodiv{
    padding-top: 30px;
    padding-bottom: 70px;        
}
.heading{
    padding-right: 70px;
}
    
    /* autosuggestion*/ 
    
</style>
    </head>
<body onclick = "$('.result').html('')">

<div class="container">
    
<header>
    <?php
   $state = ucfirst($_POST['state']);
   echo "<h1>".$state."</h1>";
       $state3 = $state;
    $token = strtok($state3, " ");
                $state3  = "";
                while ($token !== false)
                {
                    $token = ucfirst($token);
                    $state3 = $state3.$token;
                    $token = strtok(" ");
                } 
                $Table = $state3.'Table';
             
       ?>
</header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides fade");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
    
    

    
}
</script>


  
<div class="slideshow-container" >

<?php
    if(isset($_POST['Submit']) && !empty($_POST['state']))
    {
        require 'connect.php';
        
        $query ="SELECT Pic FROM Slideshow WHERE Name = '$state'";
        
         $result = $conn->query($query);
         if($result->num_rows == 0)
         {
              exit("<center><h1> Either the data you want is not available yet or you are just trying to play with us. Go home son.</h1></center>");
         }
	     $i=0;
         while($row = $result->fetch_assoc())
         {
            $i++;
            echo '<div class="mySlides fade" ><div class="numbertext">'.$i.'/4</div><center> <img src = "data:image/jpg; base64,'.base64_encode($row['Pic']).'" style="width:500px "/></center><div class="text"></div></div>';   
         }
     }
     else
     {
         exit("<center><h1> Don't mess with us.</h1></center>");
     }
    
?>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
   <span class="dot"></span> 
    <span class="dot"></span> 
</div>

<script>
showSlides();
    
        function findmatch(){
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }
                else{
                    xmlhttp= new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState ==4 && xmlhttp.status == 200 ){
                      document.getElementById("id").innerHTML = xmlhttp.responseText;
                      $('.result li').click(function(){
                           var result_value = $(this).text();
                            
                            $('.autosuggest').val(result_value);
                            $('.result').html('');
                        }); 
                    }
                }
                xmlhttp.open('GET', 'search.inc.php?district='+document.search.district.value+'&Table='+"<?php echo $Table;?>", true);
                xmlhttp.send();
            }
    
</script>

 <hr>
    
    <?php
    $query ="SELECT * FROM States WHERE Name = '$state' ";

          $results = $conn->query($query);

          $rows = $results->fetch_array();
    
    ?>
    
    <nav >
       <!-- <a href='listofdistricts/<?php 
     /*   $state2 = $state;
        $token = strtok($state, " ");
        $state  = "";
        while ($token !== false)
        {
        $token = ucfirst($token);
        $state = $state.$token;
        $token = strtok(" ");
        }    
        trim($state);
                 
        echo $state; $state = $state2;*/?>Districts.html'>List of districts</a><br><br> -->
        
        <a href = "StateDistricts.php?state=<?php echo $state3 ; ?>">List of districts</a><br><br>
       
        <a class="links"  href="#clothing">Clothing</a><br><br>
         <a class="links" href="#cuisines">Famous Cuisines</a><br><br>
         <a class="links" href="#places">Famous Places</a><br><br>
        <?php
         echo '<a class="links" href = http://www.'.$rows['Websites'].' target= _blank>Official website</a>';
        ?>
    </nav>
    

<article class="art">
    
   
    <?php
               
        echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['Map']).'" style="width:500px "/></center><div class="text"></div></div>';
        
    ?>
    
    <div class ="autodiv">
    
     <!--<form method = 'post' action ='District.php'>
        Search any district here:
        <input type = 'text' name = 'district'>
         <input type="hidden" name="Stname" value="<?php //echo $state ?>">
        <input type = 'submit' name = 'Submit' value = 'Search'>
        
    </form>-->
        
        <form action="District.php" method ="post" name="search" id= "search">
           <h3 class = "heading"> Search any district here:</h3> 
            <input type='text' class="autosuggest" autocomplete="off" name="district" onkeyup ="findmatch();" >
            <input type="hidden" name="Stname" value="<?php echo $state ?>">
            <input type='submit' name='Submit' value='Search' id="btn" >
           
         <div id ="adiv" class ="dropdown" >  
            <ul id="id" class = "result"  style="list-style: none;" >             
            </ul>        
         </div>
    </form>
       
       
    
    </div>
    
    
    <?php
      echo $rows['Text'];
      echo "<a id='clothing'>";
      echo "<h1 >Clothing:</h1></a>";
     
      echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['ClothingPic']).'" style="width:500px "/></center><div class="text"></div></div>';  
      
      echo  $rows['Clothing'];
    
                   
      echo "<a id='cuisines'>"; 
      echo "<h1>Cuisines:</h1></a>";
    
    echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['FoodPic']).'" style="width:500px "/></center><div class="text"></div></div>';
                  
      echo  $rows['Food'];
    
    echo "<a id='places'>";
     echo "<h1>Famous Places:</h1></a>";
    
    echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['FPPic']).'" style="width:500px "/></center><div class="text"></div></div>';
    
    echo  $rows['FamousPlaces'];
    
   
      
      
    ?>
    
</article>

</div>

</body>
</html>