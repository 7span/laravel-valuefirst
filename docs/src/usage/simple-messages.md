# Simple Messages

This guide explains how to send WhatsApp messages using the Laravel ValueFirst package.


## Important Guidelines

### Phone Number Format
- Must include country code without '+' symbol
- Example: 919876543210 (not +919876543210)
- No spaces or special characters allowed


## Text Message

Here's how to send a text WhatsApp message:

```php
use SevenSpan\WhatsApp\Facades\ValueFirst;

$to = '919XXXXXXXXX';    // Recipient's phone number with country code
$message = 'Hello, this is a test message!';


$response = ValueFirst::sendMessage($to, $message);

```

## Message with Tag

You can add tags to your messages for better organization and tracking:

```php
use SevenSpan\WhatsApp\Facades\ValueFirst;

$to = '919XXXXXXXXX';
$message = 'Check out our latest offers!';
$tag = 'promotion';  // Optional tag for message categorization


$response = ValueFirst::sendMessage($to, $message, $tag);

```