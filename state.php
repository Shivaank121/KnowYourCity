<!DOCTYPE html>
<html>
<head>
<style>
  /*  shivaank  */
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
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
</style>
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

</head>
<body>

<div class="container">
    
<header>
    <?php
    $state = $_POST['state'];
   echo "<h1>".$state."</h1>";
       
       ?>
</header>
  
<div class="slideshow-container" >

<?php
    if(isset($_POST['Submit']) && !empty($_POST['state']))
    {
        $state = $_POST['state'];
        require 'connect.php';
        
        
        
        $query ="SELECT Pic FROM Slideshow WHERE Name = '$state'";
        
         $result = $conn->query($query);
	     $i=0;
         while($row = $result->fetch_assoc())
         {
            $i++;
            echo '<div class="mySlides fade" ><div class="numbertext">'.$i.'/4</div><center> <img src = "data:image/jpg; base64,'.base64_encode($row['Pic']).'" style="width:500px "/></center><div class="text"></div></div>';   
         }
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
</script>

 <hr>
    
    

<article>
   <center>
     <form method = 'post' action ='District.php'>
        Search any district here:
        <input type = 'text' name = 'district'>
         <input type="hidden" name="Stname" value="<?php echo $state ?>">
        <input type = 'submit' name = 'Submit' value = 'Search'>
        
    </form>
       
       </center>
    <?php
      
        
      $query ="SELECT * FROM States WHERE Name = '$state' ";
        
      $results = $conn->query($query);
	              
      $rows = $results->fetch_array();
                
        echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['Map']).'" style="width:500px "/></center><div class="text"></div></div>';
        
      echo $rows['Text'];
      echo "<h1>Clothing:</h1>";
     
      echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['ClothingPic']).'" style="width:500px "/></center><div class="text"></div></div>';  
    
      echo  $rows['Clothing'];
    
      echo "<h1>Cuisines:</h1>";
    
    echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['FoodPic']).'" style="width:500px "/></center><div class="text"></div></div>';
      echo  $rows['Food'];
    
     echo "<h1>Famous Places:</h1>";
    
    echo '<div ><div class="numbertext"></div><center> <img src = "data:image/jpg; base64,'.base64_encode($rows['FPPic']).'" style="width:500px "/></center><div class="text"></div></div>';
    
    echo  $rows['FamousPlaces'];
    
    echo '<center><a href = https://www.'.$rows['Websites'].'>Official website: Click here</a></center>';
      
      
    ?>
    
</article>

</div>

</body>
</html>