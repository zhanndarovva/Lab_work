<?php
function convertToUpper($arr) {
    return array_map('strtoupper', $arr);
}

$words = ["привет", "мир", "php"];
$result = convertToUpper($words);
echo "Результат: ";
print_r($result);
echo "<br>";
?>
