<?php
$a = 1;
 function abc()
 {
 	global $a;
 	$b = $a;
 	return 123;
 }

 abc();