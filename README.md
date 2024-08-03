# Laravel PDF: mPDF wrapper for Laravel 7.0

> Easily generate PDF documents from HTML right inside of Laravel using this mPDF wrapper.


## Installation

Require this package in your `composer.json` or install it by running:

```
composer require ashik/pdf
```

> Note: This package supports auto-discovery features of Laravel 5.5+, You only need to manually add the service provider and alias if working on Laravel version lower then 7.0

To start using Laravel, add the Service Provider and the Facade to your `config/app.php`:

```php
'providers' => [
	// ...
	Ashik\Pdf\PdfServiceProvider::class
]
```

```php
'aliases' => [
	// ...
	'PDF' => Ashik\Pdf\Facades\Mpdf::class
]
```

Now, you should publish package's config file to your config directory by using following command:

```
php artisan vendor:publish --tag=pdf-config
```
