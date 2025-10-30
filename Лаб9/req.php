<?php
$name = htmlspecialchars($_REQUEST['username'] ?? 'Гость');
echo "Привет, $name!";
