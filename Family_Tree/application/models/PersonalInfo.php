<?php

/**
 * 個人情報を保持するデータクラス
 * 
 * 
 * @copyright   2015 Digtalspace WOW CO.,Ltd
 * @license     
 * @version     1.0.0
 * @link        
 * @since       File availabel since Release 1.0.0
 */
 
 class PersonalInfo {
    private $companyId;         //企業ID
    private $userId;            //利用者ID
    private $userName;          //利用者氏名
    private $userBirthday;      //生年月日
    private $userPostalcode;    //郵便番号
    private $userAddress;       //住所
    private $userTel;           //電話番号
    private $point;             //保有ポイント
    
    /**
     * コンストラクタ
     *
     */
    public function __construct() {
        //フィールドの初期化
        $this->companyId = '';
        $this->userId = '';
        $this->userName = '';
        $this->userBirthday = '0000-00-00';
        $this->userPostalcode = '';
        $this->userAddress = '';
        $this->userTel = '';
        $this->point = 0;
    }

    /**
     * 企業IDを設定する
     *
     * @param string $id 企業ID
     */
    public function setcompanyId($id) {
        $this->companyId = (string)$id;
    }

    /**
     * 企業IDを取得する
     *
     * @return string 企業ID
     */
    public function getcompanyId() {
        return $this->companyId;
    }

    /**
     * 利用者IDを設定する
     *
     * @param string $id 利用者ID
     */
    public function setUserId($id) {
        $this->userId = (string)$id;
    }

    /**
     * 利用者IDを取得する
     *
     * @return string 利用者ID
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * 利用者氏名を設定する
     *
     * @param string $name 利用者氏名
     */
    public function setUserName($name) {
        $this->userName = (string)$name;
    }

    /**
     * 利用者氏名を取得する
     *
     * @return string 利用者氏名
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * 生年月日を設定する
     *
     * @param string $birthday 生年月日(yyyy-mm-dd)
     */
    public function setUserBirthday($birthday) {
        if(0 < strlen($birthday)) $this->userBirthday = (string)$birthday;
    }

    /**
     * 生年月日を取得する
     *
     * @return string 生年月日(yyyy-mm-dd)
     */
    public function getUserBirthday() {
        return $this->userBirthday;
    }

    /**
     * 郵便番号を設定する
     *
     * @param string $postalcode 郵便番号
     */
    public function setUserPostalcode($postalcode) {
        $this->userPostalcode = (string)$postalcode;
    }

    /**
     * 郵便番号を取得する
     *
     * @return string 郵便番号
     */
    public function getUserPostalcode() {
        return $this->userPostalcode;
    }

    /**
     * 住所を設定する
     *
     * @param string $address 住所
     */
    public function setUserAddress($address) {
        $this->userAddress = (string)$address;
    }

    /**
     * 住所を取得する
     *
     * @return string 住所
     */
    public function getUserAddress() {
        return $this->userAddress;
    }

    /**
     * 電話番号を設定する
     *
     * @param string $tel 電話番号
     */
    public function setUserTel($tel) {
        $this->userTel = (string)$tel;
    }

    /**
     * 電話番号を取得する
     *
     * @return string 電話番号
     */
    public function getUserTel() {
        return $this->userTel;
    }

    /**
     * 保有ポイントを設定する
     *
     * @param int $point 保有ポイント
     */
    public function setPoint($point) {
        if(0 < strlen($point)) $this->point = (int)$point;
    }

    /**
     * 保有ポイントを取得する
     *
     * @return int 保有ポイント
     */
    public function getPoint() {
        return $this->point;
    }

    /**
     * DBから取得した1件分のarrayデータをメンバに格納する
     *
     * @param array 利用者マスタテーブルのレコード1件分
     */
    public function setArray($array) {
        $this->setcompanyId($array['company_id']);              //企業ID
        $this->setUserId($array['user_id']);                    //利用者ID
        $this->setUserName($array['user_name']);                //利用者氏名
        $this->setUserBirthday($array['user_birthday']);        //生年月日
        $this->setUserPostalcode($array['user_postalcode']);    //郵便番号
        $this->setUserAddress($array['user_address']);          //住所
        $this->setUserTel($array['user_tel']);                  //電話番号
        $this->setPoint($array['point']);                       //ポイント数
    }

    /**
     * メンバ変数の内容をarray化してオブジェクトを返却する
     *
     * @return array 利用者情報
     */
    public function getArray() {
        $array['company_id']      = $this->getcompanyId();          //企業ID
        $array['user_id']         = $this->getUserId();             //利用者ID
        $array['user_name']       = $this->getUserName();           //利用者氏名
        $array['user_birthday']   = $this->getUserBirthday();       //生年月日
        $array['user_postalcode'] = $this->getUserPostalcode();     //郵便番号
        $array['user_address']    = $this->getUserAddress();        //住所
        $array['user_tel']        = $this->getUserTel();            //電話番号
        $array['point']           = $this->getPoint();              //ポイント数

        return $array;
    }
}