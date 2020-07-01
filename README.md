# Instagram PHP Scraper
This library is based on the Instagram web version. We develop it because nowadays it is hard to get an approved Instagram application. The purpose is to support every feature that the web desktop and mobile version support. 

## Dependencies

- [PSR-16](http://www.php-fig.org/psr/psr-16/)


## Code Example
```php
$instagram = \InstagramScraper\Instagram::withCredentials('username', 'password');
$instagram->login();
$account = $instagram->getAccountById(3);
echo $account->getUsername();
```

#Authentication via cookie
```php
$instagram = \InstagramScraper\Instagram::setcookieFile('cookie.txt');
$instagram = new \InstagramScraper\Instagram();
$account = $instagram->getAccountById(3);
echo $account->getUsername();
```

Some methods do not require authentication: 
```php
$instagram = new \InstagramScraper\Instagram();
$nonPrivateAccountMedias = $instagram->getMedias('kevin');
echo $nonPrivateAccountMedias[0]->getLink();
```

If you use authentication it is recommended to cache the user session. In this case you don't need to run the `$instagram->login()` method every time your program runs:

```php
use Phpfastcache\Helper\Psr16Adapter;

$instagram = \InstagramScraper\Instagram::withCredentials('username', 'password', new Psr16Adapter('Files'));
$instagram->login(); // will use cached session if you want to force login $instagram->login(true)
$instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
$account = $instagram->getAccountById(3);
echo $account->getUsername();
```

Using proxy for requests:

```php
$instagram = new \InstagramScraper\Instagram();
Instagram::setProxy([
    'address' => '111.112.113.114',
    'port'    => '8080',
    'tunnel'  => true,
    'timeout' => 30,
]);
// Request with proxy
$account = $instagram->getAccount('kevin');
Instagram::disableProxy();
// Request without proxy
$account = $instagram->getAccount('kevin');
```

## Installation

### Using composer

```sh
composer.phar saqijaan/instagram-scraper
```
or 
```sh
composer require saqijaan/instagram-scraper
```

### If you don't have composer
You can download it [here](https://getcomposer.org/download/).

## Examples
See examples [here](https://github.com/saqijaan/instagram-scraper/tree/master/examples).
