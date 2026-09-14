<?php

// ============================================================
// WhatsApp Cloud API Configuration
// ============================================================

return [

    // Meta WhatsApp Cloud API
    'api_version' => 'v23.0',

    // Your WhatsApp Business Phone Number ID
    'phone_number_id' => getenv('WHATSAPP_PHONE_NUMBER_ID'),

    // Your Meta access token
    'access_token' => getenv('WHATSAPP_ACCESS_TOKEN'),

];