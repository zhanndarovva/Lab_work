<?php
function isPrime($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

echo "Проверка числа 7: " . (isPrime(7) ? "простое" : "непростое") . "<br>";
echo "Проверка числа 10: " . (isPrime(10) ? "простое" : "непростое") . "<br>";
?>
