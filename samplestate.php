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
   <h1>City Gallery</h1>
</header>
  
<div class="slideshow-container" >

<?php
        $db = mysqli_connect("localhost", "root", "", "KnowYourCity");
        $query ="SELECT * FROM Details";
        $results = mysqli_query($db, $query);
	    $i=0;
        while($row = mysqli_fetch_array($results))
        {
            $i++;
            echo '<div class="mySlides fade" ><div class="numbertext">'.$i.'/4</div><center> <img src = "data:image/jpg; base64,'.base64_encode($row['Pic']).'" style="width:500px;"/></center><div class="text"></div></div>';   
        }
    
?>

<!--
<div class="mySlides fade" >
  <div class="numbertext">1 / 4</div>
 <center> <img src="buddha statue.jpg" style="width:500px;"></center>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
    <center>  <img src="ruins nalanda.jpg" style="width:500px;"> </center>
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
    <center>  <img src="patna saheb.JPG" style="width:500px;">  </center>
  <div class="text"></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
    <center>  <img src="maha bodhi temple.JPG" style="width:300px;">  </center>
  <div class="text"></div>
</div>
-->

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

<nav>
  <ul>
    <li><a href="#">Famous Places</a></li><br>
    <li><a href="#">Clothing</a></li><br>
    <li><a href="#">Districts</a></li><br>
  </ul>
</nav>

<article>
  
    <?php
    
    $db = mysqli_connect("localhost", "root", "", "KnowYourCity");
    $query ="SELECT * FROM Details";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
   
    echo $row['Text'];
    
    ?>
  <!--  
    
 <h1>Bihar</h1>
  <p>Bihar is a state in the eastern part of India.It is the 13th-largest state of India, with an area of 94,163 km2 (36,357 sq mi). The third-largest state of India by population, it is contiguous with Uttar Pradesh to its west, Nepal to the north, the northern part of West Bengal to the east, with Jharkhand to the south. The Bihar plain is split by the river Ganges which flows from west to east.</p>
  <p>Other languages commonly used within the state include Bhojpuri, Maithili, Magahi, Bajjika, and Angika </p>
  <p>Gautama Buddha attained Enlightenment at Bodh Gaya, a town located in the modern day district of Gaya in Bihar. Vasupujya, the 12th Jain Tirthankara was born in Champapuri, Bhagalpur. Vardhamana Mahavira, the 24th and the last Tirthankara of Jainism, was born in Vaishali around the 6th century BC.</p>
  <h3>Statistics<h3>
  <table style="width:100%;">
  <tr>
  <th>S.No</th>
  <th>City</th>
  <th>Population</th>
  </tr>
  <tr>
  <td>1</td>
  <td>Patna</td>
  <td>2,046,652</td>
  </tr>
  <tr>
  <td>2</td>
  <td>Gaya</td>
  <td>470,839</td>
  </tr>
  <tr>
  <td>3</td>
  <td>Bhagalpur</td>
  <td>410,210</td>
  </tr>
  <tr>
  <td>4</td>
  <td>Muzaffarpur</td>
  <td>393,724</td>
  </tr>
  </table>
  <h3>Transportation</h3>
<ul>
<li><b style="font-size:15px">Airways</b><br>Bihar has three operational airports at Patna, Gaya Airport, and Purnea Airport. The Patna airport is categorised as a restricted international airport, with customs facilities to receive international chartered flights.</li>
<li><b style="font-size:15px">Inland Waterways</b><br>The Ganges  navigable throughout the year  was the principal river highway across the vast north Indo-Gangetic Plain. Vessels capable of accommodating five hundred merchants were known to ply this river in the ancient period; it served as a conduit for overseas trade, as goods were carried from Pataliputra (later Patna) and Champa (later Bhagalpur) out to the seas and to ports in Sri Lanka and Southeast Asia. The role of the Ganges as a channel for trade was enhanced by its natural links  it embraces all the major rivers and streams in both north and south Bihar</li>
</ul>
<h3>Climate</h3>
<p>Bihar has a diverse climate. Its temperature is subtropical in general, with hot summers and cool winters. Bihar is a vast stretch of fertile plain. It is drained by the Ganges River, including its northern tributaries Gandak and Koshi, originating in the Nepal Himalayas and the Bagmati originating in the Kathmandu Valley that regularly flood parts of the Bihar plains. The total area covered by the state of Bihar is 94,163 km2 (36,357 sq mi). the state is located between 24°-20'-10" N ~ 27°-31'-15" N latitude and between 83°-19'-50" E ~ 88°-17'-40" E longitude. Its average elevation above sea level is 173 feet (53 m).</p>
<h3>Economy</h3>
<p>Gross state domestic product of Bihar for the year 2013/2014 has been around 3683.37 billion INR. By sectors, its composition is:
Agriculture = 22%
Industry = 5%
Services = 73%.
Bihar is the fastest growing state in terms of gross state domestic product (GSDP), clocking a growth rate of 17.06% in FY 2014-15.The economy of Bihar is projected to grow at a compound annual growth rate (CAGR) of 13.4% during 2012-2017 i.e. the 12th Five-Year Plan. Bihar has witnessed strong growth in per capita net state domestic product (NSDP). At current prices, per capita NSDP of the state grew at a CAGR of 12.91 per cent during 2004-05 to 2014-15.Bihar's per capita income has gone up by 40.6 per cent in the financial year 2014-15.</p>

<h3>Tourism</h3>
<p>The culture and heritage of Bihar can be observed from the large number of ancient monuments spread throughout the state. Bihar is visited by many tourists from around the world,with about 24,000,000 (24 million) tourists visiting the state each year.</p>

    
    
    -->
    
</article>

</div>

</body>
</html>