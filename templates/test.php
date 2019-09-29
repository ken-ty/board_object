<?php
include_once '../libs/smarty.class.php';
$fruit = 'リンゴ';
$smarty = new Smarty();
$smarty->assign('fruit', $fruit);
$smarty->display('test.tpl');
