<?php
$numbers = [1, 2, 3, 4, 5];
$squares = array_map(fn($n) => $n ** 2, $numbers);

echo "Квадраты чисел: ";
print_r($squares);
echo "<br>";
?>
