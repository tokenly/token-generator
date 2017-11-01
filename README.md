A tiny library to generate secure random strings.

## Usage

```php
$token = (new \Tokenly\TokenGenerator\TokenGenerator())->generateToken(40, 'KEY');
// KEYi5IXk1sDoHOiQcyv4b9hEkv8Q6eXjuwlvh0F8
```