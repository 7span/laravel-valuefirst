# Configuration

This guide will help you set up the Laravel ValueFirst package in your application. We'll walk through each step to get you up and running quickly.

## Quick Setup

### Publishing Configuration

Publish the configuration file to customize package settings:

```bash
php artisan vendor:publish --provider="SevenSpan\ValueFirst\Providers\ValueFirstServiceProvider" --tag="config"
```

This creates `config/valuefirst.php` in your Laravel project.

### Environment Setup

Add these variables to your `.env` file:

```
VALUEFIRST_API_URI=https://api.myvaluefirst.com/psms/servlet/psms.JsonEservice
VALUEFIRST_USERNAME=your_username
VALUEFIRST_PASSWORD=your_password
VALUEFIRST_FROM=your_registered_phone_number
```

### Environment Variable Details

| Variable | Description | Example |
|----------|-------------|---------|
| `VALUEFIRST_API_URI` | ValueFirst API endpoint URL | `https://api.myvaluefirst.com/psms/servlet/psms.JsonEservice` |
| `VALUEFIRST_USERNAME` | Your ValueFirst account username | `business_username` |
| `VALUEFIRST_PASSWORD` | Your ValueFirst account password | `api_password` |
| `VALUEFIRST_FROM` | Your registered WhatsApp business number | `911234567890` |

### Configuration File Explained

The `config/valuefirst.php` file contains:

```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ValueFirst API Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration for the ValueFirst WhatsApp API integration.
    |
    */

    // API endpoint for ValueFirst services
    'api_uri' => env('VALUEFIRST_API_URI', 'https://api.myvaluefirst.com/psms/servlet/psms.JsonEservice'),

    // Your ValueFirst account username
    'username' => env('VALUEFIRST_USERNAME', ''),

    // Your ValueFirst account password
    'password' => env('VALUEFIRST_PASSWORD', ''),

    // Your registered WhatsApp business phone number
    'from' => env('VALUEFIRST_FROM', ''),
];
```