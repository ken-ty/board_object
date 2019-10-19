<?php

require_once __DIR__ . '/../library/Smarty.class.php';
require_once __DIR__ . '/../libs/dao/UserDao.php';
require_once __DIR__ . '/../libs/entity/UserEntity.php';

abstract class BaseController
{
    protected  $smarty;

    protected  $template = '';

    /** @var UserDao */
    protected $userDao;

    /** @var UserEntity */
    protected  $user;

    /** @var Boolean ログイン必須か */
    protected $isLogin = true;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        //smartyの読み込みと定義
        $this->smarty = new Smarty();
        $this->smarty->escape_html = true;
        $this->smarty->setTemplateDir(__DIR__ . '/../templates');
        $this->smarty->setCompileDir(  __DIR__ . '/../templates_c');
        $this->userDao = new UserDao();
        /*CAUTION!*/

    }

    public function execute()
    {
        try {
            $this->beforeMain();
            //ログイン処理
            session_start();
            $mail     = empty($_SESSION['mail'    ]) ? '' : $_SESSION['mail'    ];
            $password = empty($_SESSION['password']) ? '' : $_SESSION['password'];
            $this->user = $this->userDao->findByMailAndPassword($mail, $password);
            //ログイン必須でログインしていなかったらログインページに遷移する
            if ($this->isLogin && empty($this->user)) {
                header('Location: ./login.php');
                exit();
            }
            $this->smarty->assign('user', $this->user);
            $this->main();
            $this->smarty->display($this->template);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $this->afterMain();
    }
    protected function beforeMain(){

    }
    protected  function main(){

    }
    protected  function afterMain(){

    }

}