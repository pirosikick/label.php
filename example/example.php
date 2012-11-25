<?php
require_once dirname(__FILE__).'/../src/Label/AutoLoader.php';
Label\AutoLoader::register();

$employees = new Label\LabelSet(array(
    'hanai' => array(
        'firstname' => 'Hiroyuki',
        'lastname' => 'Anai',
    ),
));

echo $employees->get('hanai.firstname'), "\n";
echo $employees->get('hanai.lastname'), "\n";

$error = new Label\LabelSet(array(
    'jp' => array(
        '404' => "'%s'が見つかりません",
    ),
    'en' => array(
        '404' => "'%s' not found",
    ),
));

echo $error->get('jp.404', 'http://hoge.jp/'), "\n";
echo $error->get('en.404', 'http://hoge.com/'), "\n";
