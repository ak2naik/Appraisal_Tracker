<?php
include 'rnfunctions.php';

echo<<<_END
<form method='post' action='rnrated.php'>
Efficiency:
<select id="myselect";
<option> 0 </option>
<option> 1 </option>
<option> 2 </option>
<option> 3 </option>
<option> 4 </option>
<option> 5 </option>
<option> 6 </option>
<option> 7 </option>
<option> 8 </option>
<option> 9 </option>
<option> 10 </option>
</select>
<input type='submit' value='submit'/>
</form>
_END;
?>