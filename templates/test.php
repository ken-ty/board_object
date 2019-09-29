<?php
clude_once __DIR__ . '/libs/smarty.class.php';
$fruit = 'リンゴ';
$smarty = new Smarty();
$smarty->assign('fruit', $fruit);
$smarty->display('test.tpl');
