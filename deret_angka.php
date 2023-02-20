<?php
for ($i = 1; $i <= 100; $i++) {
    if($i%3==0 && $i%2==1){
        echo $i.'fizz';
        echo '<br>';
    } elseif($i%5==0 && $i%4==1){
        echo $i.'buzz';
        echo '<br>';
    }elseif($i%3==0 && $i%5==0){
        echo $i.'fizzbuzz';
        echo '<br>';
    }
    else{
        echo $i;
        echo '<br>';
    }
}   

?>
