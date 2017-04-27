<!DOCTYPE html>
<html>
<head>
<title>Welcome To Know Your City</title>

<style>
p
{
	padding:100px;
}
    .button{
        height: 30px;
        
    }
.abc
{
	background-size: 100%;
  background-repeat: no-repeat;
  width:100%;
  position:absolute;
  height:100%;
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
	padding-top:200px;
	text-align:center;
	font-size:20px;
}
.autosuggest, .dropdown, .result{
    margin:0;
    padding: 0;
    border: 0;
    width: 500px; 
    height: 30px;
}
.autosuggest{
    padding-left : 25px;
    padding-top: 4px;
    border : 3px solid #c2c2a3;   
    font-size: 20px;
    color:#7a7a52;
    height: 30px;

    background-image: url('search.png');
    background-size:20px 20px;
    background-repeat: no-repeat;
    background-position: left;
}
    
    .result{
        padding-left: 4px;
    color: black;
    width: 531px;
}
   
.result li{
    
    padding: 5px;
    padding-left: 25px;
    border : 3px solid #c2c2a3;
    border-top: 0;
    cursor:pointer;
   text-align: left;
    list-style-type: =none;
}
.result li:hover{
    background: #ffff66;
    color: #000;    
}
    
    
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
       function findmatch()
       {
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }
                else{
                    xmlhttp= new ActiveXObject('Microsoft.XMLHTTP');
                }
                
                var i=0;
               
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState ==4 && xmlhttp.status == 200 ){
                      document.getElementById("id").innerHTML = xmlhttp.responseText;
                       $('.result li').click(function(){
                           var result_value = $(this).text();
                            
                            $('.autosuggest').val(result_value);
                            $('.result').html('');
                        });
                        
                        $(document).keydown(function(e){
                            if (e.keyCode == 40) 
                            {
                                i++;
                                var pos = i.toString();
                                var res = $('#pos').text();
                                
                                 $('.autosuggest').val(document.getElementById(pos).innerHTML);
                            }
                        });
                       
                         
                    }
                }
                xmlhttp.open('GET', 'search.php?state='+document.search.state.value, true);
                xmlhttp.send();        
       }
       
        
    
    </script>


</head>


<body onclick = "$('.result').html('');">
    
    
<div class="header">
<center><h1>Know Your City</h1></center>
</div>
<img src="websitebackground.jpg" class="abc" alt="no image">

<form action="state.php" class="input" method = "post" name="search">
  
  State Name: <input type="text" name="state" size="35" class="autosuggest" autocomplete="off"  onkeyup="findmatch();">
  <input type="submit" name = "Submit" value="Submit" class="button">
    
    <br>
    <center>
        <div class="dropdown" id="div" >
            <ul class="result" id="id"  style="list-style: none;"  ></ul>
        </div>
    </center>

</form>
</body>

</html>
