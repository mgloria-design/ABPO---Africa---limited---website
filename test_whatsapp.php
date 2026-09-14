<?php

require_once __DIR__ . '/services/WhatsAppService.php';

$whatsapp = new WhatsAppService();

$result = $whatsapp->sendTextMessage(
    '2547XXXXXXXX',
    'Hello from ABPO Africa! This message was sent through the WhatsApp Cloud API.'
);

header('Content-Type: application/json');

echo json_encode(
    $result,
    JSON_PRETTY_PRINT
);