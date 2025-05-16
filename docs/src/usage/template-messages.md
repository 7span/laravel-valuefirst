# Template Messages

ValueFirst’s WhatsApp integration allows you to send pre-approved message templates via the WhatsApp Cloud API, with or without buttons.

## Sending Template Messages

WhatsApp Business API allows you to send pre-approved message templates:

```php
use SevenSpan\WhatsApp\Facades\ValueFirst;

$to = '919XXXXXXXXX';
$templateName = 'order_confirmation';
$parameters = [
    'order_number' => 'ORD-12345',
    'customer_name' => 'John Doe',
    'delivery_date' => '2025-05-10'
];


$response = ValueFirst::sendTemplate($to, $templateName, $parameters);

```

## Sending Template Messages with Button

For templates with a button (Call-To-Action) like "Track Order" or "Visit Site":

```php
use SevenSpan\WhatsApp\Facades\ValueFirst;

$to = '919876543210';
$templateName = 'order_tracking_button';
$parameters = [
    'ORD-67890',
    'John Doe'
];
$urlParam = 'https://yourdomain.com/track-order/ORD-67890';
$tag = 'tracking';

$response = ValueFirst::sendTemplateMessageWithButton($to, $templateName, $parameters, $tag, $urlParam);

```
