<?php
require_once dirname(__FILE__).'/../src/Label/AutoLoader.php';
Label\AutoLoader::register();

$employees = new Label\LabelSet(array(
    'hanai' => array(
        'firstname' => 'Hiroyuki',
        'lastname' => 'Anai',
    ),
));

echo $employees['hanai.firstname'], "\n";
echo $employees['hanai.lastname'], "\n";

$error = new Label\LabelSet(array(
    'jp' => array(
        '404' => "'%s'が見つかりません",
    ),
    'en' => array(
        '404' => "'%s' not found",
    ),
));

echo $error['jp.404']->sprintf('http://hoge.jp/'), "\n";
echo $error['en.404']->sprintf('http://hoge.com/'), "\n";

$error['jp.404']->sprintf('http://hoge.jp/');

$error->context('jp');
echo $error['404']->sprintf('http://hoge.jp/'), "\n";
