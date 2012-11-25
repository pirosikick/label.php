label.php
=========
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

echo $employees->get('hanai.firstname'), "\n"; // Hiroyuki
echo $employees->get('hanai.lastname'), "\n"; // Anai

$error = new Label\LabelSet(array(
    'jp' => array(
        '404' => "'%s'が見つかりません",
    ),
    'en' => array(
        '404' => "'%s' not found",
    ),
));

echo $error->get('jp.404', 'http://hoge.jp/'), "\n"; // 'http://hoge.jp'が見つかりません
echo $error->get('en.404', 'http://hoge.com/'), "\n"; // 'http://hoge.com' not found
```
