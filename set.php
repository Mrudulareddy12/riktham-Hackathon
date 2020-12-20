<?php
$value = isset($_POST['item']) ? $_POST['item'] : 1; 
if(isset($_POST['incqty'])){
   $value += 1;
}

if(isset($_POST['decqty'])){
   $value -= 1;                                            
}
?>