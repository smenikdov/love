<?php
header('Content-Type: application/json');

$codes = [
    ['code' => '8825', 'availableFrom' => new DateTime('2025-01-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '1432', 'availableFrom' => new DateTime('2025-02-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '1137', 'availableFrom' => new DateTime('2025-03-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '5701', 'availableFrom' => new DateTime('2025-04-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '4743', 'availableFrom' => new DateTime('2025-05-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '9812', 'availableFrom' => new DateTime('2025-06-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '7163', 'availableFrom' => new DateTime('2025-07-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '7733', 'availableFrom' => new DateTime('2025-08-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '2699', 'availableFrom' => new DateTime('2025-09-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '4591', 'availableFrom' => new DateTime('2025-10-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '7379', 'availableFrom' => new DateTime('2025-10-01', new DateTimeZone('Asia/Yekaterinburg'))],
    ['code' => '0450', 'availableFrom' => new DateTime('2025-12-01', new DateTimeZone('Asia/Yekaterinburg'))],
];

$currentTime = new DateTime('now', new DateTimeZone('Asia/Yekaterinburg'));

$filteredCodes = array_map(function ($item) use ($currentTime) {
    return [
        'code' => $item['availableFrom'] <= $currentTime ? $item['code'] : null,
        'availableFrom' => $item['availableFrom']->format('Y-m-d\TH:i:s\Z'),
    ];
}, $codes);

$response = [
    "codes" => $filteredCodes,
    "currentTime" => $currentTime->format('Y-m-d\TH:i:s\Z')
];

echo json_encode($response);
?>
