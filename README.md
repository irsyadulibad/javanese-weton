<p align="center">
  <img alt="Packagist Downloads (custom server)" src="https://img.shields.io/packagist/dt/irsyadulibad/weton">
  <img alt="GitHub" src="https://img.shields.io/github/license/irsyadulibad/javanese-weton">
  <img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/irsyadulibad/javanese-weton">
</p>

## 🔭 About Javanese Weton
Calculate and output the Javanese Weton from regular date. This package can handle conversions from January 1, 1900 onwards

## 💻 Installation
You may use [composer](https://getcomposer.org) to install **javanese-weton** into your project:

```bash
composer require irsyadulibad/weton
```

## ✈️ Usage
### Getting Started
First, you need pass a *DateTime* to convert it into weton:

```php
$date = new DateTime('2022-04-15');
$weton = new Weton($date);
```

> Or, you can use static style instead

```php
$date = new DateTime('2022-04-15');
$weton = Weton::from($date);
```

### Docs
- **Get weton's day an it's neptu value**

```php
// Weton's day name | ex: Friday
$weton->day->name;

// Weton's day neptu | ex: 6
$weton->day->neptu;

// Both day and neptu as object
// ex: name => Friday, neptu => 6
$weton->day;
```

- **Get weton's pasaran and it's neptu value**

```php
// Weton's pasaran name | ex: Kliwon
$weton->pasaran->name;

// Weton's pasaran neptu | ex: 8
$weton->pasaran->neptu;

// Both day and neptu as object
// ex: name => Kliwon, neptu => 8
$weton->pasaran;
```

- **Get total neptu**

```php
$weton->totalNeptu;
```

- **Format to indonesian**\
You can change output to indonesian format using ``toIndonesian()`` method

```php
$weton->toIndonesian();
```

- **Output as string**\
You can directly output the object as string, it will return pasaran and day name

```php
// ex: Legi Friday
echo $weton;

// if indonesian, it will be `Jum'at Legi`
echo $weton->toIndonesian();
```

## Credits
Github: [https://github.com/irsyadulibad]\
Website: [http://irsyadulibad.my.id]\
Facebook: [https://facebook.com/irsyadulibad.dev]
