<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Controller/Exception.php';
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Log.php';
require_once 'Zend/Log/Writer/Stream.php';
require_once 'application/smarty/Zend_View_Smarty.class.php';
require_once 'application/common/comConst.php';
require_once 'application/controllers/OrderpageController.php';



class ErrorController extends Zend_Controller_Action {
	private $_config;
	private $_view;
    private $_session;                  // セッション

	public function init() {
		/* ========== 設定情報を読み取り ========== */
        $this->_config = new Zend_Config_Ini('application/configs/application.ini', null);

        // データベース関連の設定をレジストリに登録
        Zend_Registry::set('database', $this->_config->datasource->database->toArray());

        /* ========== セッション設定 ========== */
        Zend_Session::start();
        $this->_session = new Zend_Session_Namespace(comConst::SESSION);
        $this->_session->setExpirationSeconds(comConst::SESSION_TIME);

		/* ========== Smarty設定 ========== */
        $this->_view = new Zend_View_Smarty();
        $this->_view->setScriptPath(comConst::SMARTY_TEMP_PATH.'templates');
        $this->_view->setCompilePath(comConst::SMARTY_TEMP_PATH.'templates_c');
	}


    public function errorAction() {
    	/* ========== ログ出力 ========== */
		$errors = $this->_getParam('error_handler');

		$writer = new Zend_Log_Writer_Stream('data/logs/application.log');
		$logger = new Zend_Log($writer);
	    
	    $logger->setTimestampFormat("y/m/d-h:i:s");
	    $error_log_text = $logger->emerg($errors->exception->getMessage());

        //セッションからuseridを取得
        $userid = $this->_session->user_self_id;
        //ビューにセット
        $this->_view->customerId = $userid;

        //ログファイルに出力
        $sendLogFile = "FamilyTreeLog/send_log_" . date("Ymd", time()) . ".txt";
        clearstatcache();
        //ファイルが存在しない場合は、空のファイルを作成
        if (is_file($sendLogFile) === false) {
            touch($sendLogFile);
        }
        //テキスト追加書込モードでファイルを開く
        $sendLogFhandle = fopen($sendLogFile, "at");
        if ($sendLogFhandle === false) {
            echo 'ファイルが開けません';
        } else {
            //エラーメッセージをログに書き込み
            fwrite($sendLogFhandle, $error_log_text . "\n");
        }
        fclose($sendLogFhandle);



		/* ========== エラーページ表示 ========== */
        echo $this->_view->render('family_tree_error.tpl');
    }
}