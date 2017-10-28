<?php

/**
*ログ出力クラス
* @copyright    2016 Digtalspase WOW CO.,Ltd
* @license
* @version      1.0.0
* @since        
*/

//ZendFramework
require_once 'Zend/Log.php';
require_once 'Zend/Log/Writer/Stream.php';

class comLogger {
    private $_logger;
    private $_writer;
    private $_logLevel;

    /**
    *コンストラクタ
    *
    */

    public function __construct(){
        //config.iniから設定を読み取り
        $this->_config = new Zend_Config_Ini('../../Family_Tree_test/application/configs/application.ini', null);

        //loggerを生成
        $this->_logger = new Zend_Log();
        $this->_writer = new Zend_Log_Writer_Stream(dirname(__FILE__) . "/../../" . $this->_config->log->filepath);
        $this->_logger->addWriter($this->_writer); 

        //ログレベルを設定
        $this->_logLevel = $this->_config->log->loglevel;

        if(strcmp($this->_logLevel, 'warn') == 0) {
            $this->_logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::WARN));
        } else if(strcmp($this->_logLevel, 'notice') == 0) {
            $this->_logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::NOTICE));
        } else if(strcmp($this->_logLevel, 'info') == 0) {
            $this->_logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::INFO));
        } else if(strcmp($this->_logLevel, 'debug') == 0) {
            $this->_logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::DEBUG));
        } else {
            //どれにも該当しない場合はレベルERR
            $this->_logger->addFilter(new Zend_Log_Filter_Priority(Zend_Log::ERR));
        }
    }

    /**
     * ログレベルERRのログを出力する
     *
     * @param string ログメッセージ
     */
    public function error($message) {
        $this->_logger->log($message, Zend_Log::ERR);
    }

    /**
     * ログレベルWARNのログを出力する
     *
     * @param string ログメッセージ
     */
    public function warn($message) {
        $this->_logger->log($message, Zend_Log::WARN);
    }

    /**
     * ログレベルNOTICEのログを出力する
     *
     * @param string ログメッセージ
     */
    public function notice($message) {
        $this->_logger->log($message, Zend_Log::NOTICE);
    }

    /**
     * ログレベルINFOのログを出力する
     *
     * @param string ログメッセージ
     */
    public function info($message) {
        $this->_logger->log($message, Zend_Log::INFO);
    }

    /**
     * ログレベルDEBUGのログを出力する
     *
     * @param string ログメッセージ
     */
    public function debug($message) {
        $this->_logger->log($message, Zend_Log::DEBUG);
    }

    
}

