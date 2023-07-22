<?php
function fibonacci($n){
    $num=0;
    $num2=1;

    $count=0;
    while($count<$n){
        echo ''.$num;
        $num3=$num2+$num;
        $num=$num2;
        $num2=$num3;
        $count=$count+1;
    }
}
$n=10;
fibonacci($n);
?>
