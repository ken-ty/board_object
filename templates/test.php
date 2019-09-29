<?php
clude_once '../libs/Smarty.class.php';
$fruit = 'リンゴ';
$smarty = new Smarty();
$smarty->assign('fruit', $fruit);
$smarty->display('test.tpl');
