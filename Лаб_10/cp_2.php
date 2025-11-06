<?php
function reverseString($str) {
    $reversed = '';
    $len = mb_strlen($str, 'UTF-8');
    for ($i = $len - 1; $i >= 0; $i--) {
        $reversed .= mb_substr($str, $i, 1, 'UTF-8');
    }
    return $reversed;
}

echo "Оригинал: Саида<br>";
echo "Перевёрнутая: " . reverseString("Саида") . "<br>";
?>
