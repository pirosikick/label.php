label.php
=========

[![Build Status](https://secure.travis-ci.org/pirosikick/label.php.png?branch=dev)](https://travis-ci.org/pirosikick/label.php)

label.php manages set of text label.

Usage
-----
```php
<?php
require_once '/path/to/src/Label/Autoloader.php';
Label\Autoloader::register();

$employees = new Label\LabelSet(array(
    'hanai' => array(
        'firstname' => 'Hiroyuki',
        'lastname' => 'Anai',
    ),
));

echo $employees['hanai.firstname'], "\n"; // Hiroyuki
echo $employees['hanai.lastname'], "\n"; // Anai

$error = new Label\LabelSet(array(
    'jp' => array(
        '404' => "'%s'が見つかりません",
    ),
    'en' => array(
        '404' => "'%s' not found",
    ),
));

echo $error['jp.404']->sprintf('http://hoge.jp/'), "\n"; // 'http://hoge.jp'が見つかりません
echo $error['en.404']->sprintf('http://hoge.com/'), "\n"; // 'http://hoge.com' not found
```
