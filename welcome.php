<!DOCTYPE html>
<html>
<head>
<title>Welcome To Know Your City</title>

<style>
p
{
	padding:100px;
}
.abc
{
	background-size: 80%;
  background-repeat: no-repeat;
  width:100%;
  position:absolute;
  height:auto;
  top:0;
  left:0;
  z-index: -1;
  opacity=0.6;
  /*blurring*/
  filter: blur(2px);
}
div.para
{
	font-family:verdana;
	font-size:25px;
	text-align: center;
	padding:150px;
	margin:3px solid black;
}

div.header
{
	width:103%;
	background-color:black;
	color:white;
	margin:0px 0px 0px 0px;
	 padding-top:0px;
	 border:1px solid grey;
	 font-size:20px;
}

.input
{
	padding-top:300px;
	text-align:center;
	font-size:20px;
}


</style>


</head>


<body>
<div class="header">
<center><h1>Know Your City</h1></center>
</div>

<img src="websitebackground.jpg" class="abc" alt="no image">

<form action="state.php" class="input" method = "post">
  
  City Name: <input type="text" name="state" size="35">
  <input type="submit" name = "Submit" value="Submit">

</form>
</div>
</body>

</html>
