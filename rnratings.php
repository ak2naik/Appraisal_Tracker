<?php
//echo "<a href='rnrates.php'> <h1> Rate Others </h1> </a>";
//echo "<a href='rnrateo.php'><h1> Rating By Others </h1> </a>";
echo<<<_END
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");;$("#panel1").slideToggle("slow");;$("#panel2").slideToggle("slow");
  });
});
</script>
 
<style type="text/css"> 
#panel,#panel1,#panel2,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
#panel1
{
padding:50px;
display:none;
}
#panel2
{
padding:50px;
display:none;
}
</style>
</head>
<body>
 
<div id="flip">Click to see options! </h1></div>
<div id="panel"><a href='rnrates.php'> <button><h1> Rate Others</button></div>
<div id="panel1"><a href='rnrateo.php'><button><h1> Rating by others</button> </div>
<div id="panel2"><a href='selrate.php'><button><h1> Self Rate</button> </div>

</body>
_END;
?>