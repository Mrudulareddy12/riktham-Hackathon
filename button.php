<?php
$value = isset($_POST['item']) ? $_POST['item'] : 1; 
if(isset($_POST['incqty'])){
   $value += 1;
}

if(isset($_POST['decqty'])){
   $value -= 1;                                            
}
?>

<form method='post' action='<?= $_SERVER['PHP_SELF']; ?>'>
$_value='<?= $value; ?>';
 echo $_value;
   <!--<input type='hidden' name='item'/> Why do you need this?-->
   <td>
       <button name='incqty'>+</button>
       <input type='text' size='1' name='item' value='<?= $value; ?>'/>
       <button name='decqty'>-</button>
   </td>
</form>