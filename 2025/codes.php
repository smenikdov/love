<?php
header('Content-Type: application/json');

$codes = [
    0 => "1234",
    1 => "4353",
    2 => "2545",
    3 => "2545",
    4 => "2545",
    5 => "2545",
    6 => "2545",
    7 => "2545",
    8 => "2545",
    9 => "2545",
    10 => "2545",
    11 => "2545"
];

// возвращает номер месяца (1–12)
$currentMonth = date('n');
// Текущий год
$currentYear = date('Y');

// $currentTime = date('Y-m-d H:i:s');
$currentTime = gmdate('Y-m-d\TH:i:s\Z');

$filteredCodes = [];

if ($currentYear < 2025) {
    $filteredCodes = [];
} elseif ($currentYear > 2025) {
    $filteredCodes = $codes;
} else {
    // Фильтруем массив, оставляя только те коды, где месяц уже наступил
    $filteredCodes = array_filter($codes, function($code, $index) use ($currentMonth) {
        return $index + 1 < $currentMonth;
    }, ARRAY_FILTER_USE_BOTH);
}

$response = [
    "codes" => $filteredCodes,
    "currentTime" => $currentTime
];

echo json_encode($response);
?>
