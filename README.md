# Caesar Cipher Php Class


[![License](https://poser.pugx.org/rebing/graphql-laravel/license)](https://packagist.org/packages/rebing/graphql-laravel)

A class for working with Caesar encryption in php in persian



## How to Use

```php
$caesar = new CaesarCipher();
$text = 'ایمان برومند زاده';

echo $encodeText = $caesar->encode($text);
echo '<br/>';
echo $caesar->decode($encodeText);

