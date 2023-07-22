
<?php
$num1 = 10;
$num2 = 20;
$num3 = 30;

$max = ($num1 > $num2) ? ($num1 > $num3 ? $num1 : $num3) : ($num2 > $num3 ? $num2 : $num3);

echo "The largest of $num1, $num2, and $num3 is: $max";
?>

