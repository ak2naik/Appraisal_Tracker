<?php
//echo "<a href='rnsto.php'> <h1> Set Task To Others </h1> </a>";
//echo "<a href='rntso.php'><h1> Tasks Set By Others </h1> </a>";
echo<<<_END
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");;$("#panel1").slideToggle("slow");
  });
});
</script>
 
<style type="text/css"> 
#panel,#panel1,#flip
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
</style>
</head>
<body>
 
<div id="flip">Click to see options! </h1></div>
<div id="panel"> <a href='rnsto.php'><button> <h1>Set Task To Others </button> </div>
<div id="panel1"><a href='rntso.php'><button><h1> Tasks Set By Others</button> </div>

</body>
_END;
?>

