<?php
require_once __DIR__ .
    '/libs/Smarty.class.php';
$fruit = 'リンゴリラ';
$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->assign('fruit', $fruit);
$smarty->display('test.tpl');
