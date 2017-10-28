<?php
/**
 * 家系図用DBアクセスを制御するクラス
 */

require_once 'Zend/Db.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Session.php';


class orderpageModel {
    //データベースアダプタのハンドル
    private $_db;


    /**
     * コンストラクタ
     */
    public function __construct() {
        //レジストリからデータを取得
        if(Zend_Registry::isRegistered('database')) {
            $database = Zend_Registry::get('database');
        }

        //データベースアダプタを作成する
        $params = array('host'     => $database['host'],
                        'username' => $database['username'],
                        'password' => $database['password'],
                        'dbname'   => $database['name']);
        $this->_db = Zend_Db::factory($database['type'], $params);
        $this->_db->query("set names 'utf8'");
        $this->_db->setFetchMode(Zend_Db::FETCH_ASSOC);
    }


/**  　　　　　アプリ故人一覧からデータ取得　　　　　　　　　　　　*/

    /**
     * 故人データ削除
     *
     * @param _family_name      名前
     * @return boolean
     */
    public function deletetestarraydata($userid)
    {
     try {
            $sql = "DELETE FROM t_deceasedlist WHERE customer_id = :userid";
            $this->_db->query($sql, array('userid' => $userid));
        } catch(Exception $e) {
            return false;
        }
        return true;

    }


    /**
     * 故人一覧データ挿入
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function inserttestarraydata($userid,$username)
    {
        if(0 < count($username)){
            $sql = "INSERT INTO t_deceasedlist (customer_id, deceasedlist_family_name) VALUES ";
            $values = array();
            foreach ($username as $usernamecount) {
                $values[] ="('".$userid."','" .$usernamecount."')";
            }
            //配列を','で連結
            $sql .= implode(',', $values);
            $this->_db->query($sql);
        }

    }


    /**
     * 故人データ挿入
     *
     * @param deceasedlist_family_name      名前
     * @return boolean
     */
    public function insertdeceasedlistarray($userid,$username,$userbirthday,$userdeathday,$userphotopath) {
        try {
        $sql = "    INSERT INTO  t_deceasedlist
                    (
                    customer_id ,
                    deceasedlist_family_name ,
                    deceasedlist_birthday ,
                    deceasedlist_deathday ,
                    deceasedlist_img_name,
                    timestamp
                    )
                    VALUES
                    (
                    :userid ,
                    :username,
                    :userbirthday ,
                    :userdeathday,
                    :userphotopath,
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'userid'        => $userid,
                                        'username'      => $username,
                                        'userbirthday'  => $userbirthday,
                                        'userdeathday'  => $userdeathday,
                                        'userphotopath' => $userphotopath
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

/**             大切な故人　選択時                       */

    /**
     * 大切な故人選択時、名前に紐づけられた生年月日、没年月日を取得
     *　@param  String $mid          選択されたID
     * @param  String $selectname   選択された名前
     * @return array 顧客情報
     */

    public function selectdeceasedlistdata($mid,$selectname){

        $sql = "SELECT *
                FROM
                t_deceasedlist
                WHERE
                customer_id = :mid
                AND
                deceasedlist_family_name = :selectname";

        $customer = $this->_db->fetchRow($sql, array(   'mid' => $mid,
                                                        'selectname' => $selectname
                                                    ));

        return $customer;
    }


/**             デ  ー  タ  取   得                        */

    /**
     * 故人一覧データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getdeceasedid($userid) {

        $sql = "SELECT deceasedlist_family_name
                FROM
                t_deceasedlist
                WHERE
                customer_id = :userid";

        $customer = $this->_db->fetchAll($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 自分データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getselfid($userid) {

        $sql = "SELECT *
                FROM
                t_self
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 父親データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getfatherid($userid) {

        $sql = "SELECT *
                FROM
                t_father
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 母親データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getmatherid($userid) {

        $sql = "SELECT *
                FROM
                t_mather
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　配偶者データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getspouseid($userid) {

        $sql = "SELECT *
                FROM
                t_spouse
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　兄弟姉妹１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getbrotheroneid($userid) {

        $sql = "SELECT *
                FROM
                t_brother_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　兄弟姉妹２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getbrothertwoid($userid) {

        $sql = "SELECT *
                FROM
                t_brother_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　兄弟姉妹３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getbrotherthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_brother_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildoneid($userid) {

        $sql = "SELECT *
                FROM
                t_child_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildtwoid($userid) {

        $sql = "SELECT *
                FROM
                t_child_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供４データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildfourid($userid) {

        $sql = "SELECT *
                FROM
                t_child_four
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供１孫１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildonegrandsononeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_one_grandson_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供１孫２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildonegrandsontwoid($userid) {

        $sql = "SELECT *
                FROM
                t_child_one_grandson_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　子供１孫３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildonegrandsonthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_one_grandson_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供２孫１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildtwograndsononeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_two_grandson_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供２孫２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildtwograndsontwoid($userid) {

        $sql = "SELECT *
                FROM
                t_child_two_grandson_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供２孫３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildtwograndsonthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_two_grandson_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　子供３孫１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildthreegrandsononeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_three_grandson_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供３孫２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildthreegrandsontwoid($userid) {

        $sql = "SELECT *
                FROM
                t_child_three_grandson_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供３孫３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildthreegrandsonthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_three_grandson_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供４孫１データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildfourgrandsononeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_four_grandson_one
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　子供４孫２データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildfourgrandsontwoid($userid) {

        $sql = "SELECT *
                FROM
                t_child_four_grandson_two
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


    /**
     * 　子供４孫３データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getchildfourgrandsonthreeid($userid) {

        $sql = "SELECT *
                FROM
                t_child_four_grandson_three
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　祖父（父方）データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getgrandfatherfatherid($userid) {

        $sql = "SELECT *
                FROM
                t_grandfather_father
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　祖母（父方）データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getgrandfathermatherid($userid) {

        $sql = "SELECT *
                FROM
                t_grandfather_mather
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　祖父（母方）データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getgrandmatherfatherid($userid) {

        $sql = "SELECT *
                FROM
                t_grandmather_father
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }

    /**
     * 　祖母（母方）データに紐づけられたデータ全て取得
     *
     * @param  String $userid ユーザーID
     * @return array 顧客情報
     */
    public function getgrandmathermatherid($userid) {

        $sql = "SELECT *
                FROM
                t_grandmather_mather
                WHERE
                customer_id = :userid ";

        $customer = $this->_db->fetchRow($sql, array('userid' => $userid));

        return $customer;
    }


/**             デ  ー  タ  修　　　正 　　・　　挿　　　　入                  */

//======================自分=========================//

    /**
     * 自分データ挿入(アプリ初回利用時)
     *
     * @param self_family_name      名前
     * @param birthday              誕生日
     * @param customer_id           ユーザーID
     * @return array                修正データ
     */
    public function initselfdata($customer_id,$self_family_name,$self_birthday) {
        try {
        $sql = "    INSERT INTO  t_self
                    (
                    customer_id ,
                    self_family_name ,
                    self_birthday ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :self_family_name,
                    :self_birthday,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'self_family_name' => $self_family_name,
                                        'customer_id' => $customer_id,
                                        'self_birthday' => $self_birthday
                                    ));
        } catch(Exception $e) {

           // var_dump($e->getMessage());
            return false;
        }
            return true;
    }



    /**
     * 自分データ修正
     *
     * @param self_family_name      名前
     * @param self_birthday         生年月日
     * @param self_deathday         没年月日
     * @param self_profession       職業
     * @param self_memo             メモ
     * @param customer_id           ユーザーID
     * @return array                修正データ
     */
    public function changeselfdata( $customer_id,
                                    $self_family_name,
                                    $self_birthday,
                                    $self_deathday,
                                    $self_profession,
                                    $self_memo
                                   )
    {
        try {
        $sql = "    UPDATE  t_self
                    SET     self_family_name    = :self_family_name,
                            self_birthday       = :self_birthday,
                            self_deathday       = :self_deathday,
                            self_profession     = :self_profession,
                            self_memo           = :self_memo,
                            timestamp           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'self_family_name'  => $self_family_name,
                                            'self_birthday'     => $self_birthday,
                                            'self_deathday'     => $self_deathday,
                                            'self_profession'   => $self_profession,
                                            'self_memo'         => $self_memo
                                            ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 自分データ挿入
     *
     * @param self_family_name      名前
     * @param birthday              誕生日
     * @param customer_id           ユーザーID
     * @return array                修正データ
     */
    public function insertselfdata($customer_id,$self_family_name,$self_birthday,$self_profession,$self_memo) {
        try {
        $sql = "    INSERT INTO  t_self
                    (
                    customer_id ,
                    self_family_name ,
                    self_birthday ,
                    self_profession ,
                    self_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :self_family_name,
                    :self_birthday,
                    :self_profession,
                    :self_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'self_family_name'  => $self_family_name,
                                        'customer_id'       => $customer_id,
                                        'self_birthday'     => $self_birthday,
                                        'self_profession'   => $self_profession,
                                        'self_memo'         => $self_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//======================父親=========================//

    /**
     * 父親データ修正
     *
     * @param father_family_name        名前
     * @param father_birthday           生年月日
     * @param father_deathday           没年月日
     * @param father_profession         職業
     * @param father_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changefatherdata(   $customer_id,
                                        $father_family_name,
                                        $father_birthday,
                                        $father_deathday,
                                        $father_profession,
                                        $father_memo
                                        )
    {
        try {
        $sql = "    UPDATE  t_father
                    SET     father_family_name  = :father_family_name,
                            father_birthday     = :father_birthday,
                            father_deathday     = :father_deathday,
                            father_profession   = :father_profession,
                            father_memo         = :father_memo,
                            timestamp           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'           => $customer_id,
                                            'father_family_name'    => $father_family_name,
                                            'father_birthday'       => $father_birthday,
                                            'father_deathday'       => $father_deathday,
                                            'father_profession'     => $father_profession,
                                            'father_memo'           => $father_memo
                                            ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 父親データ挿入
     *
     * @param father_family_name        名前
     * @param father_birthday           生年月日
     * @param father_deathday           没年月日
     * @param father_profession         職業
     * @param father_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertfatherdata(   $customer_id,
                                        $father_family_name,
                                        $father_birthday,
                                        $father_deathday,
                                        $father_profession,
                                        $father_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_father
                    (
                    customer_id ,
                    father_family_name ,
                    father_birthday ,
                    father_deathday ,
                    father_profession ,
                    father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :father_family_name,
                    :father_birthday,
                    :father_deathday,
                    :father_profession,
                    :father_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'father_family_name'    => $father_family_name,
                                        'father_birthday'       => $father_birthday,
                                        'father_deathday'       => $father_deathday,
                                        'father_profession'     => $father_profession,
                                        'father_memo'           => $father_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


    /**
     * 父親データ挿入（大切な故人）
     *
     * @param father_family_name        名前
     * @param father_birthday           生年月日
     * @param father_deathday           没年月日
     * @param $father_img_name          画像名
     * @param father_profession         職業
     * @param father_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertfatherdeceaseddata(   $customer_id,
                                                $father_family_name,
                                                $father_birthday,
                                                $father_deathday,
                                                $father_img_name,
                                                $father_profession,
                                                $father_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_father
                    (
                    customer_id ,
                    father_family_name ,
                    father_birthday ,
                    father_deathday ,
                    father_img_name ,
                    father_profession ,
                    father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :father_family_name,
                    :father_birthday,
                    :father_deathday,
                    :father_img_name,
                    :father_profession,
                    :father_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'father_family_name'    => $father_family_name,
                                        'father_birthday'       => $father_birthday,
                                        'father_deathday'       => $father_deathday,
                                        'father_img_name'       => $father_img_name,
                                        'father_profession'     => $father_profession,
                                        'father_memo'           => $father_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//======================母親=========================//

    /**
     * 母親データ修正
     *
     * @param mather_family_name        名前
     * @param mather_birthday           生年月日
     * @param mather_deathday           没年月日
     * @param mather_profession         職業
     * @param mather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changematherdata(   $customer_id,
                                        $mather_family_name,
                                        $mather_birthday,
                                        $mather_deathday,
                                        $mather_profession,
                                        $mather_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_mather
                    SET     mather_family_name  = :mather_family_name,
                            mather_birthday     = :mather_birthday,
                            mather_deathday     = :mather_deathday,
                            mather_profession   = :mather_profession,
                            mather_memo         = :mather_memo,
                            timestamp           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'           => $customer_id,
                                            'mather_family_name'    => $mather_family_name,
                                            'mather_birthday'       => $mather_birthday,
                                            'mather_deathday'       => $mather_deathday,
                                            'mather_profession'     => $mather_profession,
                                            'mather_memo'           => $mather_memo
                                            ));

        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 母親データ挿入
     *
     * @param mather_family_name        名前
     * @param mather_birthday           生年月日
     * @param mather_deathday           没年月日
     * @param mather_profession         職業
     * @param mather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertmatherdata(   $customer_id,
                                        $mather_family_name,
                                        $mather_birthday,
                                        $mather_deathday,
                                        $mather_profession,
                                        $mather_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_mather
                    (
                    customer_id ,
                    mather_family_name ,
                    mather_birthday ,
                    mather_deathday ,
                    mather_profession ,
                    mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :mather_family_name,
                    :mather_birthday,
                    :mather_deathday,
                    :mather_profession,
                    :mather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'       => $customer_id,
                                        'mather_family_name'=> $mather_family_name,
                                        'mather_birthday'   => $mather_birthday,
                                        'mather_deathday'   => $mather_deathday,
                                        'mather_profession' => $mather_profession,
                                        'mather_memo'       => $mather_memo,
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 母親データ挿入（大切な故人）
     *
     * @param mather_family_name        名前
     * @param mather_birthday           生年月日
     * @param mather_deathday           没年月日
     * @param $mather_img_name          画像名
     * @param mather_profession         職業
     * @param mather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertmatherdeceaseddata(   $customer_id,
                                                $mather_family_name,
                                                $mather_birthday,
                                                $mather_deathday,
                                                $mather_img_name,
                                                $mather_profession,
                                                $mather_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_mather
                    (
                    customer_id ,
                    mather_family_name ,
                    mather_birthday ,
                    mather_deathday ,
                    mather_img_name ,
                    mather_profession ,
                    mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :mather_family_name,
                    :mather_birthday,
                    :mather_deathday,
                    :mather_img_name,
                    :mather_profession,
                    :mather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'mather_family_name'    => $mather_family_name,
                                        'mather_birthday'       => $mather_birthday,
                                        'mather_deathday'       => $mather_deathday,
                                        'mather_img_name'       => $mather_img_name,
                                        'mather_profession'     => $mather_profession,
                                        'mather_memo'           => $mather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//======================配偶者=========================//

    /**
     * 配偶者データ挿入
     *
     * @param spouse_family_name        名前
     * @param spouse_birthday           生年月日
     * @param spouse_deathday           没年月日
     * @param spouse_profession         職業
     * @param spouse_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */

    public function insertspousedata(   $customer_id,
                                        $spouse_family_name,
                                        $spouse_birthday,
                                        $spouse_deathday,
                                        $spouse_profession,
                                        $spouse_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_spouse
                    (
                    customer_id ,
                    spouse_family_name ,
                    spouse_birthday ,
                    spouse_deathday ,
                    spouse_profession ,
                    spouse_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :spouse_family_name,
                    :spouse_birthday,
                    :spouse_deathday,
                    :spouse_profession,
                    :spouse_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'       => $customer_id,
                                        'spouse_family_name'=> $spouse_family_name,
                                        'spouse_birthday'   => $spouse_birthday,
                                        'spouse_deathday'   => $spouse_deathday,
                                        'spouse_profession' => $spouse_profession,
                                        'spouse_memo'       => $spouse_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 配偶者データ修正
     *
     * @param spouse_family_name        名前
     * @param spouse_birthday           生年月日
     * @param spouse_deathday           没年月日
     * @param spouse_profession         職業
     * @param spouse_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changespousedata(   $customer_id,
                                        $spouse_family_name,
                                        $spouse_birthday,
                                        $spouse_deathday,
                                        $spouse_profession,
                                        $spouse_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_spouse
                    SET     spouse_family_name = :spouse_family_name,
                            spouse_birthday     = :spouse_birthday,
                            spouse_deathday     = :spouse_deathday,
                            spouse_profession   = :spouse_profession,
                            spouse_memo         = :spouse_memo,
                            timestamp           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'spouse_family_name'=> $spouse_family_name,
                                            'spouse_birthday'   => $spouse_birthday,
                                            'spouse_deathday'   => $spouse_deathday,
                                            'spouse_profession' => $spouse_profession,
                                            'spouse_memo'       => $spouse_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 配偶者データ挿入（大切な故人）
     *
     * @param spouse_family_name        名前
     * @param spouse_birthday           生年月日
     * @param spouse_deathday           没年月日
     * @param $spouse_img_name          画像名
     * @param spouse_profession         職業
     * @param spouse_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertspousedeceaseddata(   $customer_id,
                                                $spouse_family_name,
                                                $spouse_birthday,
                                                $spouse_deathday,
                                                $spouse_img_name,
                                                $spouse_profession,
                                                $spouse_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_spouse
                    (
                    customer_id ,
                    spouse_family_name ,
                    spouse_birthday ,
                    spouse_deathday ,
                    spouse_img_name ,
                    spouse_profession ,
                    spouse_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :spouse_family_name,
                    :spouse_birthday,
                    :spouse_deathday,
                    :spouse_img_name,
                    :spouse_profession,
                    :spouse_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'spouse_family_name'    => $spouse_family_name,
                                        'spouse_birthday'       => $spouse_birthday,
                                        'spouse_deathday'       => $spouse_deathday,
                                        'spouse_img_name'       => $spouse_img_name,
                                        'spouse_profession'     => $spouse_profession,
                                        'spouse_memo'           => $spouse_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================兄弟姉妹１================================//

    /**
     * 兄弟姉妹１データ挿入
     *
     * @param brotherone_family_name        名前
     * @param brotherone_sex                性別
     * @param brotherone_birthday           生年月日
     * @param brotherone_deathday           没年月日
     * @param brotherone_profession         職業
     * @param brotherone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertbrotheronedata(   $customer_id,
                                        $brotherone_family_name,
                                        $brotherone_sex,
                                        $brotherone_birthday,
                                        $brotherone_deathday,
                                        $brotherone_profession,
                                        $brotherone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_brother_one
                    (
                    customer_id ,
                    brother_one_family_name ,
                    brother_one_sex ,
                    brother_one_birthday ,
                    brother_one_deathday ,
                    brother_one_profession ,
                    brother_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brotherone_family_name,
                    :brotherone_sex,
                    :brotherone_birthday,
                    :brotherone_deathday,
                    :brotherone_profession,
                    :brotherone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'brotherone_family_name'    => $brotherone_family_name,
                                        'brotherone_sex'            => $brotherone_sex,
                                        'brotherone_birthday'       => $brotherone_birthday,
                                        'brotherone_deathday'       => $brotherone_deathday,
                                        'brotherone_profession'     => $brotherone_profession,
                                        'brotherone_memo'           => $brotherone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 兄弟姉妹１データ修正
     *
     * @param brotherone_family_name        名前
     * @param brotherone_sex                性別
     * @param brotherone_birthday           生年月日
     * @param brotherone_deathday           没年月日
     * @param brotherone_profession         職業
     * @param brotherone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changebrotheronedata(   $customer_id,
                                        $brotherone_family_name,
                                        $brotherone_sex,
                                        $brotherone_birthday,
                                        $brotherone_deathday,
                                        $brotherone_profession,
                                        $brotherone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_brother_one
                    SET     brother_one_family_name  = :brotherone_family_name,
                            brother_one_sex          = :brotherone_sex,
                            brother_one_birthday     = :brotherone_birthday,
                            brother_one_deathday     = :brotherone_deathday,
                            brother_one_profession   = :brotherone_profession,
                            brother_one_memo         = :brotherone_memo,
                            timestamp                = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'brotherone_family_name'=> $brotherone_family_name,
                                            'brotherone_sex'        => $brotherone_sex,
                                            'brotherone_birthday'   => $brotherone_birthday,
                                            'brotherone_deathday'   => $brotherone_deathday,
                                            'brotherone_profession' => $brotherone_profession,
                                            'brotherone_memo'       => $brotherone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 兄弟姉妹１データ挿入（大切な故人）
     *
     * @param brotherone_family_name        名前
     * @param brotherone_birthday           生年月日
     * @param brotherone_deathday           没年月日
     * @param brotherone_img_name          画像名
     * @param brotherone_profession         職業
     * @param brotherone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertbrotheronedeceaseddata(   $customer_id,
                                                $brotherone_family_name,
                                                $brotherone_birthday,
                                                $brotherone_deathday,
                                                $brotherone_img_name,
                                                $brotherone_profession,
                                                $brotherone_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_brother_one
                    (
                    customer_id ,
                    brother_one_family_name ,
                    brother_one_birthday ,
                    brother_one_deathday ,
                    brother_one_img_name ,
                    brother_one_profession ,
                    brother_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brotherone_family_name,
                    :brotherone_birthday,
                    :brotherone_deathday,
                    :brotherone_img_name,
                    :brotherone_profession,
                    :brotherone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'brotherone_family_name'    => $brotherone_family_name,
                                        'brotherone_birthday'       => $brotherone_birthday,
                                        'brotherone_deathday'       => $brotherone_deathday,
                                        'brotherone_img_name'       => $brotherone_img_name,
                                        'brotherone_profession'     => $brotherone_profession,
                                        'brotherone_memo'           => $brotherone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================兄弟姉妹２================================//

    /**
     * 兄弟姉妹２データ挿入
     *
     * @param brothertwo_family_name        名前
     * @param brothertwo_sex                性別
     * @param brothertwo_birthday           生年月日
     * @param brothertwo_deathday           没年月日
     * @param brothertwo_profession         職業
     * @param brothertwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertbrothertwodata(   $customer_id,
                                        $brothertwo_family_name,
                                        $brothertwo_sex,
                                        $brothertwo_birthday,
                                        $brothertwo_deathday,
                                        $brothertwo_profession,
                                        $brothertwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_brother_two
                    (
                    customer_id ,
                    brother_two_family_name ,
                    brother_two_sex ,
                    brother_two_birthday ,
                    brother_two_deathday ,
                    brother_two_profession ,
                    brother_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brothertwo_family_name,
                    :brothertwo_sex,
                    :brothertwo_birthday,
                    :brothertwo_deathday,
                    :brothertwo_profession,
                    :brothertwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'brothertwo_family_name'    => $brothertwo_family_name,
                                        'brothertwo_sex'            => $brothertwo_sex,
                                        'brothertwo_birthday'       => $brothertwo_birthday,
                                        'brothertwo_deathday'       => $brothertwo_deathday,
                                        'brothertwo_profession'     => $brothertwo_profession,
                                        'brothertwo_memo'           => $brothertwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 兄弟姉妹２データ修正
     *
     * @param brothertwo_family_name        名前
     * @param brothertwo_sex                性別
     * @param brothertwo_birthday           生年月日
     * @param brothertwo_deathday           没年月日
     * @param brothertwo_profession         職業
     * @param brothertwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changebrothertwodata(   $customer_id,
                                        $brothertwo_family_name,
                                        $brothertwo_sex,
                                        $brothertwo_birthday,
                                        $brothertwo_deathday,
                                        $brothertwo_profession,
                                        $brothertwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_brother_two
                    SET     brother_two_family_name  = :brothertwo_family_name,
                            brother_two_sex          = :brothertwo_sex,
                            brother_two_birthday     = :brothertwo_birthday,
                            brother_two_deathday     = :brothertwo_deathday,
                            brother_two_profession   = :brothertwo_profession,
                            brother_two_memo         = :brothertwo_memo,
                            timestamp                = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'brothertwo_family_name'=> $brothertwo_family_name,
                                            'brothertwo_sex'        => $brothertwo_sex,
                                            'brothertwo_birthday'   => $brothertwo_birthday,
                                            'brothertwo_deathday'   => $brothertwo_deathday,
                                            'brothertwo_profession' => $brothertwo_profession,
                                            'brothertwo_memo'       => $brothertwo_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 兄弟姉妹２データ挿入（大切な故人）
     *
     * @param brothertwo_family_name        名前
     * @param brothertwo_birthday           生年月日
     * @param brothertwo_deathday           没年月日
     * @param brothertwo_img_name           画像名
     * @param brothertwo_profession         職業
     * @param brothertwo_memo               メモ
     * @param customer_id                   ユーザーID
     * @return array                        修正データ
     */
    public function insertbrothertwodeceaseddata(   $customer_id,
                                                    $brothertwo_family_name,
                                                    $brothertwo_birthday,
                                                    $brothertwo_deathday,
                                                    $brothertwo_img_name,
                                                    $brothertwo_profession,
                                                    $brothertwo_memo
                                                )
    {
        try {
        $sql = "    INSERT INTO  t_brother_two
                    (
                    customer_id ,
                    brother_two_family_name ,
                    brother_two_birthday ,
                    brother_two_deathday ,
                    brother_two_img_name ,
                    brother_two_profession ,
                    brother_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brothertwo_family_name,
                    :brothertwo_birthday,
                    :brothertwo_deathday,
                    :brothertwo_img_name,
                    :brothertwo_profession,
                    :brothertwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'brothertwo_family_name'    => $brothertwo_family_name,
                                        'brothertwo_birthday'       => $brothertwo_birthday,
                                        'brothertwo_deathday'       => $brothertwo_deathday,
                                        'brothertwo_img_name'       => $brothertwo_img_name,
                                        'brothertwo_profession'     => $brothertwo_profession,
                                        'brothertwo_memo'           => $brothertwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================兄弟姉妹３================================//

    /**
     * 兄弟姉妹３データ挿入
     *
     * @param brotherthree_family_name        名前
     * @param brotherthree_sex                性別
     * @param brotherthree_birthday           生年月日
     * @param brotherthree_deathday           没年月日
     * @param brotherthree_profession         職業
     * @param brotherthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertbrotherthreedata(   $customer_id,
                                        $brotherthree_family_name,
                                        $brotherthree_sex,
                                        $brotherthree_birthday,
                                        $brotherthree_deathday,
                                        $brotherthree_profession,
                                        $brotherthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_brother_three
                    (
                    customer_id ,
                    brother_three_family_name ,
                    brother_three_sex ,
                    brother_three_birthday ,
                    brother_three_deathday ,
                    brother_three_profession ,
                    brother_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brotherthree_family_name,
                    :brotherthree_sex,
                    :brotherthree_birthday,
                    :brotherthree_deathday,
                    :brotherthree_profession,
                    :brotherthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'brotherthree_family_name'    => $brotherthree_family_name,
                                        'brotherthree_sex'            => $brotherthree_sex,
                                        'brotherthree_birthday'       => $brotherthree_birthday,
                                        'brotherthree_deathday'       => $brotherthree_deathday,
                                        'brotherthree_profession'     => $brotherthree_profession,
                                        'brotherthree_memo'           => $brotherthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 兄弟姉妹３データ修正
     *
     * @param brotherthree_family_name        名前
     * @param brotherthree_sex                性別
     * @param brotherthree_birthday           生年月日
     * @param brotherthree_deathday           没年月日
     * @param brotherthree_profession         職業
     * @param brotherthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changebrotherthreedata(   $customer_id,
                                        $brotherthree_family_name,
                                        $brotherthree_sex,
                                        $brotherthree_birthday,
                                        $brotherthree_deathday,
                                        $brotherthree_profession,
                                        $brotherthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_brother_three
                    SET     brother_three_family_name  = :brotherthree_family_name,
                            brother_three_sex          = :brotherthree_sex,
                            brother_three_birthday     = :brotherthree_birthday,
                            brother_three_deathday     = :brotherthree_deathday,
                            brother_three_profession   = :brotherthree_profession,
                            brother_three_memo         = :brotherthree_memo,
                            timestamp                  = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'brotherthree_family_name'=> $brotherthree_family_name,
                                            'brotherthree_sex'        => $brotherthree_sex,
                                            'brotherthree_birthday'   => $brotherthree_birthday,
                                            'brotherthree_deathday'   => $brotherthree_deathday,
                                            'brotherthree_profession' => $brotherthree_profession,
                                            'brotherthree_memo'       => $brotherthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 兄弟姉妹３データ挿入（大切な故人）
     *
     * @param brotherthree_family_name        名前
     * @param brotherthree_birthday           生年月日
     * @param brotherthree_deathday           没年月日
     * @param brotherthree_img_name          画像名
     * @param brotherthree_profession         職業
     * @param brotherthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertbrotherthreedeceaseddata(   $customer_id,
                                                $brotherthree_family_name,
                                                $brotherthree_birthday,
                                                $brotherthree_deathday,
                                                $brotherthree_img_name,
                                                $brotherthree_profession,
                                                $brotherthree_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_brother_three
                    (
                    customer_id ,
                    brother_three_family_name ,
                    brother_three_birthday ,
                    brother_three_deathday ,
                    brother_three_img_name ,
                    brother_three_profession ,
                    brother_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :brotherthree_family_name,
                    :brotherthree_birthday,
                    :brotherthree_deathday,
                    :brotherthree_img_name,
                    :brotherthree_profession,
                    :brotherthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'brotherthree_family_name'    => $brotherthree_family_name,
                                        'brotherthree_birthday'       => $brotherthree_birthday,
                                        'brotherthree_deathday'       => $brotherthree_deathday,
                                        'brotherthree_img_name'       => $brotherthree_img_name,
                                        'brotherthree_profession'     => $brotherthree_profession,
                                        'brotherthree_memo'           => $brotherthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================子供１================================//

    /**
     * 子供１データ挿入
     *
     * @param childone_family_name        名前
     * @param childone_sex                性別
     * @param childone_spouse_name        配偶者名
     * @param childone_birthday           生年月日
     * @param childone_deathday           没年月日
     * @param childone_profession         職業
     * @param childone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildonedata(   $customer_id,
                                        $childone_family_name,
                                        $childone_sex,
                                        $childone_spouse_name,
                                        $childone_birthday,
                                        $childone_deathday,
                                        $childone_profession,
                                        $childone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_one
                    (
                    customer_id ,
                    child_one_family_name ,
                    child_one_sex ,
                    child_one_spouse_name ,
                    child_one_birthday ,
                    child_one_deathday ,
                    child_one_profession ,
                    child_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childone_family_name,
                    :childone_sex,
                    :childone_spouse_name,
                    :childone_birthday,
                    :childone_deathday,
                    :childone_profession,
                    :childone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childone_family_name'    => $childone_family_name,
                                        'childone_sex'            => $childone_sex,
                                        'childone_spouse_name'    => $childone_spouse_name,
                                        'childone_birthday'       => $childone_birthday,
                                        'childone_deathday'       => $childone_deathday,
                                        'childone_profession'     => $childone_profession,
                                        'childone_memo'           => $childone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供１データ修正
     *
     * @param childone_family_name        名前
     * @param childone_sex                性別
     * @param childone_spouse_name        配偶者名
     * @param childone_birthday           生年月日
     * @param childone_deathday           没年月日
     * @param childone_profession         職業
     * @param childone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildonedata(   $customer_id,
                                        $childone_family_name,
                                        $childone_sex,
                                        $childone_spouse_name,
                                        $childone_birthday,
                                        $childone_deathday,
                                        $childone_profession,
                                        $childone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_one
                    SET     child_one_family_name  = :childone_family_name,
                            child_one_sex          = :childone_sex,
                            child_one_spouse_name  = :childone_spouse_name,
                            child_one_birthday     = :childone_birthday,
                            child_one_deathday     = :childone_deathday,
                            child_one_profession   = :childone_profession,
                            child_one_memo         = :childone_memo,
                            timestamp              = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'         => $customer_id,
                                            'childone_family_name'=> $childone_family_name,
                                            'childone_sex'        => $childone_sex,
                                            'childone_spouse_name'=> $childone_spouse_name,
                                            'childone_birthday'   => $childone_birthday,
                                            'childone_deathday'   => $childone_deathday,
                                            'childone_profession' => $childone_profession,
                                            'childone_memo'       => $childone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供１データ挿入（大切な故人）
     *
     * @param childone_family_name        名前
     * @param childone_sex                性別
     * @param childone_birthday           生年月日
     * @param childone_deathday           没年月日
     * @param childone_img_name           画像名
     * @param childone_profession         職業
     * @param childone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildonedeceaseddata(   $customer_id,
                                        $childone_family_name,
                                        $childone_sex,
                                        $childone_spouse_name,
                                        $childone_birthday,
                                        $childone_deathday,
                                        $childone_img_name,
                                        $childone_profession,
                                        $childone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_one
                    (
                    customer_id ,
                    child_one_family_name ,
                    child_one_sex ,
                    child_one_spouse_name ,
                    child_one_birthday ,
                    child_one_deathday ,
                    child_one_img_name ,
                    child_one_profession ,
                    child_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childone_family_name,
                    :childone_sex,
                    :childone_spouse_name,
                    :childone_birthday,
                    :childone_deathday,
                    :childone_img_name,
                    :childone_profession,
                    :childone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childone_family_name'    => $childone_family_name,
                                        'childone_sex'            => $childone_sex,
                                        'childone_spouse_name'    => $childone_spouse_name,
                                        'childone_birthday'       => $childone_birthday,
                                        'childone_deathday'       => $childone_deathday,
                                        'childone_img_name'       => $childone_img_name,
                                        'childone_profession'     => $childone_profession,
                                        'childone_memo'           => $childone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//=========================子供２================================//

    /**
     * 子供２データ挿入
     *
     * @param childtwo_family_name        名前
     * @param childtwo_sex                性別
     * @param childtwo_spouse_name        配偶者名
     * @param childtwo_birthday           生年月日
     * @param childtwo_deathday           没年月日
     * @param childtwo_profession         職業
     * @param childtwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildtwodata(   $customer_id,
                                        $childtwo_family_name,
                                        $childtwo_sex,
                                        $childtwo_spouse_name,
                                        $childtwo_birthday,
                                        $childtwo_deathday,
                                        $childtwo_profession,
                                        $childtwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_two
                    (
                    customer_id ,
                    child_two_family_name ,
                    child_two_sex ,
                    child_two_spouse_name ,
                    child_two_birthday ,
                    child_two_deathday ,
                    child_two_profession ,
                    child_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwo_family_name,
                    :childtwo_sex,
                    :childtwo_spouse_name,
                    :childtwo_birthday,
                    :childtwo_deathday,
                    :childtwo_profession,
                    :childtwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childtwo_family_name'    => $childtwo_family_name,
                                        'childtwo_sex'            => $childtwo_sex,
                                        'childtwo_spouse_name'    => $childtwo_spouse_name,
                                        'childtwo_birthday'       => $childtwo_birthday,
                                        'childtwo_deathday'       => $childtwo_deathday,
                                        'childtwo_profession'     => $childtwo_profession,
                                        'childtwo_memo'           => $childtwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供２データ修正
     *
     * @param childtwo_family_name        名前
     * @param childtwo_sex                性別
     * @param childtwo_spouse_name        配偶者名
     * @param childtwo_birthday           生年月日
     * @param childtwo_deathday           没年月日
     * @param childtwo_profession         職業
     * @param childtwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildtwodata(   $customer_id,
                                        $childtwo_family_name,
                                        $childtwo_sex,
                                        $childtwo_spouse_name,
                                        $childtwo_birthday,
                                        $childtwo_deathday,
                                        $childtwo_profession,
                                        $childtwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_two
                    SET     child_two_family_name  = :childtwo_family_name,
                            child_two_sex          = :childtwo_sex,
                            child_two_spouse_name  = :childtwo_spouse_name,
                            child_two_birthday     = :childtwo_birthday,
                            child_two_deathday     = :childtwo_deathday,
                            child_two_profession   = :childtwo_profession,
                            child_two_memo         = :childtwo_memo,
                            timestamp              = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childtwo_family_name'=> $childtwo_family_name,
                                            'childtwo_sex'        => $childtwo_sex,
                                            'childtwo_spouse_name'=> $childtwo_spouse_name,
                                            'childtwo_birthday'   => $childtwo_birthday,
                                            'childtwo_deathday'   => $childtwo_deathday,
                                            'childtwo_profession' => $childtwo_profession,
                                            'childtwo_memo'       => $childtwo_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

   /**
     * 子供２データ挿入（大切な故人）
     *
     * @param childtwo_family_name        名前
     * @param childtwo_sex                性別
     * @param childtwo_birthday           生年月日
     * @param childtwo_deathday           没年月日
     * @param childtwo_img_name           画像名
     * @param childtwo_profession         職業
     * @param childtwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildtwodeceaseddata(   $customer_id,
                                        $childtwo_family_name,
                                        $childtwo_sex,
                                        $childtwo_spouse_name,
                                        $childtwo_birthday,
                                        $childtwo_deathday,
                                        $childtwo_img_name,
                                        $childtwo_profession,
                                        $childtwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_two
                    (
                    customer_id ,
                    child_two_family_name ,
                    child_two_sex ,
                    child_two_spouse_name ,
                    child_two_birthday ,
                    child_two_deathday ,
                    child_two_img_name ,
                    child_two_profession ,
                    child_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwo_family_name,
                    :childtwo_sex,
                    :childtwo_spouse_name,
                    :childtwo_birthday,
                    :childtwo_deathday,
                    :childtwo_img_name,
                    :childtwo_profession,
                    :childtwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childtwo_family_name'    => $childtwo_family_name,
                                        'childtwo_sex'            => $childtwo_sex,
                                        'childtwo_spouse_name'    => $childtwo_spouse_name,
                                        'childtwo_birthday'       => $childtwo_birthday,
                                        'childtwo_deathday'       => $childtwo_deathday,
                                        'childtwo_img_name'       => $childtwo_img_name,
                                        'childtwo_profession'     => $childtwo_profession,
                                        'childtwo_memo'           => $childtwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//=========================子供３================================//

    /**
     * 子供３データ挿入
     *
     * @param childthree_family_name        名前
     * @param childthree_sex                性別
     * @param childthree_spouse_name        配偶者名
     * @param childthree_birthday           生年月日
     * @param childthree_deathday           没年月日
     * @param childthree_profession         職業
     * @param childthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildthreedata(   $customer_id,
                                        $childthree_family_name,
                                        $childthree_sex,
                                        $childthree_spouse_name,
                                        $childthree_birthday,
                                        $childthree_deathday,
                                        $childthree_profession,
                                        $childthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_three
                    (
                    customer_id ,
                    child_three_family_name ,
                    child_three_sex ,
                    child_three_spouse_name ,
                    child_three_birthday ,
                    child_three_deathday ,
                    child_three_profession ,
                    child_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthree_family_name,
                    :childthree_sex,
                    :childthree_spouse_name,
                    :childthree_birthday,
                    :childthree_deathday,
                    :childthree_profession,
                    :childthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'               => $customer_id,
                                        'childthree_family_name'    => $childthree_family_name,
                                        'childthree_sex'            => $childthree_sex,
                                        'childthree_spouse_name'    => $childthree_spouse_name,
                                        'childthree_birthday'       => $childthree_birthday,
                                        'childthree_deathday'       => $childthree_deathday,
                                        'childthree_profession'     => $childthree_profession,
                                        'childthree_memo'           => $childthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供３データ修正
     *
     * @param childthree_family_name        名前
     * @param childthree_sex                性別
     * @param childthree_spouse_name        配偶者名
     * @param childthree_birthday           生年月日
     * @param childthree_deathday           没年月日
     * @param childthree_profession         職業
     * @param childthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildthreedata(   $customer_id,
                                        $childthree_family_name,
                                        $childthree_sex,
                                        $childthree_spouse_name,
                                        $childthree_birthday,
                                        $childthree_deathday,
                                        $childthree_profession,
                                        $childthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_three
                    SET     child_three_family_name  = :childthree_family_name,
                            child_three_sex          = :childthree_sex,
                            child_three_spouse_name  = :childthree_spouse_name,
                            child_three_birthday     = :childthree_birthday,
                            child_three_deathday     = :childthree_deathday,
                            child_three_profession   = :childthree_profession,
                            child_three_memo         = :childthree_memo,
                            timestamp                = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'           => $customer_id,
                                            'childthree_family_name'=> $childthree_family_name,
                                            'childthree_sex'        => $childthree_sex,
                                            'childthree_spouse_name'=> $childthree_spouse_name,
                                            'childthree_birthday'   => $childthree_birthday,
                                            'childthree_deathday'   => $childthree_deathday,
                                            'childthree_profession' => $childthree_profession,
                                            'childthree_memo'       => $childthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供３データ挿入（大切な故人）
     *
     * @param childthree_family_name        名前
     * @param childthree_sex                性別
     * @param childthree_birthday           生年月日
     * @param childthree_deathday           没年月日
     * @param childthree_img_name           画像名
     * @param childthree_profession         職業
     * @param childthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildthreedeceaseddata(   $customer_id,
                                        $childthree_family_name,
                                        $childthree_sex,
                                        $childthree_spouse_name,
                                        $childthree_birthday,
                                        $childthree_deathday,
                                        $childthree_img_name,
                                        $childthree_profession,
                                        $childthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_three
                    (
                    customer_id ,
                    child_three_family_name ,
                    child_three_sex ,
                    child_three_spouse_name ,
                    child_three_birthday ,
                    child_three_deathday ,
                    child_three_img_name ,
                    child_three_profession ,
                    child_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthree_family_name,
                    :childthree_sex,
                    :childthree_spouse_name,
                    :childthree_birthday,
                    :childthree_deathday,
                    :childthree_img_name,
                    :childthree_profession,
                    :childthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childthree_family_name'    => $childthree_family_name,
                                        'childthree_sex'            => $childthree_sex,
                                        'childthree_spouse_name'    => $childthree_spouse_name,
                                        'childthree_birthday'       => $childthree_birthday,
                                        'childthree_deathday'       => $childthree_deathday,
                                        'childthree_img_name'       => $childthree_img_name,
                                        'childthree_profession'     => $childthree_profession,
                                        'childthree_memo'           => $childthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//=========================子供４================================//

    /**
     * 子供４データ挿入
     *
     * @param childfour_family_name        名前
     * @param childfour_sex                性別
     * @param childfour_spouse_name        配偶者名
     * @param childfour_birthday           生年月日
     * @param childfour_deathday           没年月日
     * @param childfour_profession         職業
     * @param childfour_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildfourdata(   $customer_id,
                                        $childfour_family_name,
                                        $childfour_sex,
                                        $childfour_spouse_name,
                                        $childfour_birthday,
                                        $childfour_deathday,
                                        $childfour_profession,
                                        $childfour_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_four
                    (
                    customer_id ,
                    child_four_family_name ,
                    child_four_sex ,
                    child_four_spouse_name ,
                    child_four_birthday ,
                    child_four_deathday ,
                    child_four_profession ,
                    child_four_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfour_family_name,
                    :childfour_sex,
                    :childfour_spouse_name,
                    :childfour_birthday,
                    :childfour_deathday,
                    :childfour_profession,
                    :childfour_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'               => $customer_id,
                                        'childfour_family_name'    => $childfour_family_name,
                                        'childfour_sex'            => $childfour_sex,
                                        'childfour_spouse_name'    => $childfour_spouse_name,
                                        'childfour_birthday'       => $childfour_birthday,
                                        'childfour_deathday'       => $childfour_deathday,
                                        'childfour_profession'     => $childfour_profession,
                                        'childfour_memo'           => $childfour_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供４データ修正
     *
     * @param childfour_family_name        名前
     * @param childfour_sex                性別
     * @param childfour_spouse_name        配偶者名
     * @param childfour_birthday           生年月日
     * @param childfour_deathday           没年月日
     * @param childfour_profession         職業
     * @param childfour_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildfourdata(   $customer_id,
                                        $childfour_family_name,
                                        $childfour_sex,
                                        $childfour_spouse_name,
                                        $childfour_birthday,
                                        $childfour_deathday,
                                        $childfour_profession,
                                        $childfour_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_four
                    SET     child_four_family_name  = :childfour_family_name,
                            child_four_sex          = :childfour_sex,
                            child_four_spouse_name  = :childfour_spouse_name,
                            child_four_birthday     = :childfour_birthday,
                            child_four_deathday     = :childfour_deathday,
                            child_four_profession   = :childfour_profession,
                            child_four_memo         = :childfour_memo,
                            timestamp               = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'           => $customer_id,
                                            'childfour_family_name'=> $childfour_family_name,
                                            'childfour_sex'        => $childfour_sex,
                                            'childfour_spouse_name'=> $childfour_spouse_name,
                                            'childfour_birthday'   => $childfour_birthday,
                                            'childfour_deathday'   => $childfour_deathday,
                                            'childfour_profession' => $childfour_profession,
                                            'childfour_memo'       => $childfour_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供４データ挿入（大切な故人）
     *
     * @param childfour_family_name        名前
     * @param childfour_sex                性別
     * @param childfour_birthday           生年月日
     * @param childfour_deathday           没年月日
     * @param childfour_img_name           画像名
     * @param childfour_profession         職業
     * @param childfour_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildfourdeceaseddata(   $customer_id,
                                        $childfour_family_name,
                                        $childfour_sex,
                                        $childfour_spouse_name,
                                        $childfour_birthday,
                                        $childfour_deathday,
                                        $childfour_img_name,
                                        $childfour_profession,
                                        $childfour_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_four
                    (
                    customer_id ,
                    child_four_family_name ,
                    child_four_sex ,
                    child_four_spouse_name ,
                    child_four_birthday ,
                    child_four_deathday ,
                    child_four_img_name ,
                    child_four_profession ,
                    child_four_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfour_family_name,
                    :childfour_sex,
                    :childfour_spouse_name,
                    :childfour_birthday,
                    :childfour_deathday,
                    :childfour_img_name,
                    :childfour_profession,
                    :childfour_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childfour_family_name'    => $childfour_family_name,
                                        'childfour_sex'            => $childfour_sex,
                                        'childfour_spouse_name'    => $childfour_spouse_name,
                                        'childfour_birthday'       => $childfour_birthday,
                                        'childfour_deathday'       => $childfour_deathday,
                                        'childfour_img_name'       => $childfour_img_name,
                                        'childfour_profession'     => $childfour_profession,
                                        'childfour_memo'           => $childfour_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }




//=========================子供１孫１================================//
    /**
     * 子供１孫１データ挿入
     *
     * @param childonegrandsonone_family_name        名前
     * @param childonegrandsonone_sex                性別
     * @param childonegrandsonone_birthday           生年月日
     * @param childonegrandsonone_deathday           没年月日
     * @param childonegrandsonone_profession         職業
     * @param childonegrandsonone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildonegrandsononedata(   $customer_id,
                                        $childonegrandsonone_family_name,
                                        $childonegrandsonone_sex,
                                        $childonegrandsonone_birthday,
                                        $childonegrandsonone_deathday,
                                        $childonegrandsonone_profession,
                                        $childonegrandsonone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_one
                    (
                    customer_id ,
                    child_one_grandson_one_family_name ,
                    child_one_grandson_one_sex ,
                    child_one_grandson_one_birthday ,
                    child_one_grandson_one_deathday ,
                    child_one_grandson_one_profession ,
                    child_one_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsonone_family_name,
                    :childonegrandsonone_sex,
                    :childonegrandsonone_birthday,
                    :childonegrandsonone_deathday,
                    :childonegrandsonone_profession,
                    :childonegrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childonegrandsonone_family_name'    => $childonegrandsonone_family_name,
                                        'childonegrandsonone_sex'            => $childonegrandsonone_sex,
                                        'childonegrandsonone_birthday'       => $childonegrandsonone_birthday,
                                        'childonegrandsonone_deathday'       => $childonegrandsonone_deathday,
                                        'childonegrandsonone_profession'     => $childonegrandsonone_profession,
                                        'childonegrandsonone_memo'           => $childonegrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



    /**
     * 子供１孫１データ修正
     *
     * @param childonegrandsonone_family_name        名前
     * @param childonegrandsonone_sex                性別
     * @param childonegrandsonone_birthday           生年月日
     * @param childonegrandsonone_deathday           没年月日
     * @param childonegrandsonone_profession         職業
     * @param childonegrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildonegrandsononedata(   $customer_id,
                                        $childonegrandsonone_family_name,
                                        $childonegrandsonone_sex,
                                        $childonegrandsonone_birthday,
                                        $childonegrandsonone_deathday,
                                        $childonegrandsonone_profession,
                                        $childonegrandsonone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_one_grandson_one
                    SET     child_one_grandson_one_family_name  = :childonegrandsonone_family_name,
                            child_one_grandson_one_sex          = :childonegrandsonone_sex,
                            child_one_grandson_one_birthday     = :childonegrandsonone_birthday,
                            child_one_grandson_one_deathday     = :childonegrandsonone_deathday,
                            child_one_grandson_one_profession   = :childonegrandsonone_profession,
                            child_one_grandson_one_memo         = :childonegrandsonone_memo,
                            timestamp                           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childonegrandsonone_family_name'=> $childonegrandsonone_family_name,
                                            'childonegrandsonone_sex'        => $childonegrandsonone_sex,
                                            'childonegrandsonone_birthday'   => $childonegrandsonone_birthday,
                                            'childonegrandsonone_deathday'   => $childonegrandsonone_deathday,
                                            'childonegrandsonone_profession' => $childonegrandsonone_profession,
                                            'childonegrandsonone_memo'       => $childonegrandsonone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 子供１孫１データ挿入（大切な故人）
     *
     * @param childonegrandsonone_family_name        名前
     * @param childonegrandsonone_sex                性別
     * @param childonegrandsonone_birthday           生年月日
     * @param childonegrandsonone_deathday           没年月日
     * @param childonegrandsonone_img_name           画像名
     * @param childonegrandsonone_profession         職業
     * @param childonegrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildonegrandsononedeceaseddata(   $customer_id,
                                                $childonegrandsonone_family_name,
                                                $childonegrandsonone_sex,
                                                $childonegrandsonone_birthday,
                                                $childonegrandsonone_deathday,
                                                $childonegrandsonone_img_name,
                                                $childonegrandsonone_profession,
                                                $childonegrandsonone_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_one
                    (
                    customer_id ,
                    child_one_grandson_one_family_name ,
                    child_one_grandson_one_sex ,
                    child_one_grandson_one_birthday ,
                    child_one_grandson_one_deathday ,
                    child_one_grandson_one_img_name ,
                    child_one_grandson_one_profession ,
                    child_one_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsonone_family_name,
                    :childonegrandsonone_sex,
                    :childonegrandsonone_birthday,
                    :childonegrandsonone_deathday,
                    :childonegrandsonone_img_name,
                    :childonegrandsonone_profession,
                    :childonegrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'                        => $customer_id,
                                        'childonegrandsonone_family_name'    => $childonegrandsonone_family_name,
                                        'childonegrandsonone_sex'            => $childonegrandsonone_sex,
                                        'childonegrandsonone_birthday'       => $childonegrandsonone_birthday,
                                        'childonegrandsonone_deathday'       => $childonegrandsonone_deathday,
                                        'childonegrandsonone_img_name'       => $childonegrandsonone_img_name,
                                        'childonegrandsonone_profession'     => $childonegrandsonone_profession,
                                        'childonegrandsonone_memo'           => $childonegrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================子供１孫２================================//

    /**
     * 子供１孫２データ挿入
     *
     * @param childonegrandsontwo_family_name        名前
     * @param childonegrandsontwo_sex                性別
     * @param childonegrandsontwo_birthday           生年月日
     * @param childonegrandsontwo_deathday           没年月日
     * @param childonegrandsontwo_profession         職業
     * @param childonegrandsontwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildonegrandsontwodata(   $customer_id,
                                        $childonegrandsontwo_family_name,
                                        $childonegrandsontwo_sex,
                                        $childonegrandsontwo_birthday,
                                        $childonegrandsontwo_deathday,
                                        $childonegrandsontwo_profession,
                                        $childonegrandsontwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_two
                    (
                    customer_id ,
                    child_one_grandson_two_family_name ,
                    child_one_grandson_two_sex ,
                    child_one_grandson_two_birthday ,
                    child_one_grandson_two_deathday ,
                    child_one_grandson_two_profession ,
                    child_one_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsontwo_family_name,
                    :childonegrandsontwo_sex,
                    :childonegrandsontwo_birthday,
                    :childonegrandsontwo_deathday,
                    :childonegrandsontwo_profession,
                    :childonegrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childonegrandsontwo_family_name'    => $childonegrandsontwo_family_name,
                                        'childonegrandsontwo_sex'            => $childonegrandsontwo_sex,
                                        'childonegrandsontwo_birthday'       => $childonegrandsontwo_birthday,
                                        'childonegrandsontwo_deathday'       => $childonegrandsontwo_deathday,
                                        'childonegrandsontwo_profession'     => $childonegrandsontwo_profession,
                                        'childonegrandsontwo_memo'           => $childonegrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供１孫２データ修正
     *
     * @param childonegrandsontwo_family_name        名前
     * @param childonegrandsontwo_sex                性別
     * @param childonegrandsontwo_birthday           生年月日
     * @param childonegrandsontwo_deathday           没年月日
     * @param childonegrandsontwo_profession         職業
     * @param childonegrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildonegrandsontwodata(   $customer_id,
                                        $childonegrandsontwo_family_name,
                                        $childonegrandsontwo_sex,
                                        $childonegrandsontwo_birthday,
                                        $childonegrandsontwo_deathday,
                                        $childonegrandsontwo_profession,
                                        $childonegrandsontwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_one_grandson_two
                    SET     child_one_grandson_two_family_name  = :childonegrandsontwo_family_name,
                            child_one_grandson_two_sex          = :childonegrandsontwo_sex,
                            child_one_grandson_two_birthday     = :childonegrandsontwo_birthday,
                            child_one_grandson_two_deathday     = :childonegrandsontwo_deathday,
                            child_one_grandson_two_profession   = :childonegrandsontwo_profession,
                            child_one_grandson_two_memo         = :childonegrandsontwo_memo,
                            timestamp                           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childonegrandsontwo_family_name'=> $childonegrandsontwo_family_name,
                                            'childonegrandsontwo_sex'        => $childonegrandsontwo_sex,
                                            'childonegrandsontwo_birthday'   => $childonegrandsontwo_birthday,
                                            'childonegrandsontwo_deathday'   => $childonegrandsontwo_deathday,
                                            'childonegrandsontwo_profession' => $childonegrandsontwo_profession,
                                            'childonegrandsontwo_memo'       => $childonegrandsontwo_memo
                                        ));
        } catch(Exception $e) {

            return $customer_id;
        }
            return $customer_id;
    }


/**
     * 子供１孫２データ挿入（大切な故人）
     *
     * @param childonegrandsontwo_family_name        名前
     * @param childonegrandsontwo_sex                性別
     * @param childonegrandsontwo_birthday           生年月日
     * @param childonegrandsontwo_deathday           没年月日
     * @param childonegrandsontwo_img_name           画像名
     * @param childonegrandsontwo_profession         職業
     * @param childonegrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildonegrandsontwodeceaseddata(   $customer_id,
                                                $childonegrandsontwo_family_name,
                                                $childonegrandsontwo_sex,
                                                $childonegrandsontwo_birthday,
                                                $childonegrandsontwo_deathday,
                                                $childonegrandsontwo_img_name,
                                                $childonegrandsontwo_profession,
                                                $childonegrandsontwo_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_two
                    (
                    customer_id ,
                    child_one_grandson_two_family_name ,
                    child_one_grandson_two_sex ,
                    child_one_grandson_two_birthday ,
                    child_one_grandson_two_deathday ,
                    child_one_grandson_two_img_name ,
                    child_one_grandson_two_profession ,
                    child_one_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsontwo_family_name,
                    :childonegrandsontwo_sex,
                    :childonegrandsontwo_birthday,
                    :childonegrandsontwo_deathday,
                    :childonegrandsontwo_img_name,
                    :childonegrandsontwo_profession,
                    :childonegrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childonegrandsontwo_family_name'    => $childonegrandsontwo_family_name,
                                        'childonegrandsontwo_sex'            => $childonegrandsontwo_sex,
                                        'childonegrandsontwo_birthday'       => $childonegrandsontwo_birthday,
                                        'childonegrandsontwo_deathday'       => $childonegrandsontwo_deathday,
                                        'childonegrandsontwo_img_name'       => $childonegrandsontwo_img_name,
                                        'childonegrandsontwo_profession'     => $childonegrandsontwo_profession,
                                        'childonegrandsontwo_memo'           => $childonegrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//=========================子供１孫３================================//

    /**
     * 子供１孫３データ挿入
     *
     * @param childonegrandsonthree_family_name        名前
     * @param childonegrandsonthree_sex                性別
     * @param childonegrandsonthree_birthday           生年月日
     * @param childonegrandsonthree_deathday           没年月日
     * @param childonegrandsonthree_profession         職業
     * @param childonegrandsonthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildonegrandsonthreedata(   $customer_id,
                                        $childonegrandsonthree_family_name,
                                        $childonegrandsonthree_sex,
                                        $childonegrandsonthree_birthday,
                                        $childonegrandsonthree_deathday,
                                        $childonegrandsonthree_profession,
                                        $childonegrandsonthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_three
                    (
                    customer_id ,
                    child_one_grandson_three_family_name ,
                    child_one_grandson_three_sex ,
                    child_one_grandson_three_birthday ,
                    child_one_grandson_three_deathday ,
                    child_one_grandson_three_profession ,
                    child_one_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsonthree_family_name,
                    :childonegrandsonthree_sex,
                    :childonegrandsonthree_birthday,
                    :childonegrandsonthree_deathday,
                    :childonegrandsonthree_profession,
                    :childonegrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childonegrandsonthree_family_name'    => $childonegrandsonthree_family_name,
                                        'childonegrandsonthree_sex'            => $childonegrandsonthree_sex,
                                        'childonegrandsonthree_birthday'       => $childonegrandsonthree_birthday,
                                        'childonegrandsonthree_deathday'       => $childonegrandsonthree_deathday,
                                        'childonegrandsonthree_profession'     => $childonegrandsonthree_profession,
                                        'childonegrandsonthree_memo'           => $childonegrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供１孫３データ修正
     *
     * @param childonegrandsonthree_family_name        名前
     * @param childonegrandsonthree_sex                性別
     * @param childonegrandsonthree_birthday           生年月日
     * @param childonegrandsonthree_deathday           没年月日
     * @param childonegrandsonthree_profession         職業
     * @param childonegrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildonegrandsonthreedata(   $customer_id,
                                        $childonegrandsonthree_family_name,
                                        $childonegrandsonthree_sex,
                                        $childonegrandsonthree_birthday,
                                        $childonegrandsonthree_deathday,
                                        $childonegrandsonthree_profession,
                                        $childonegrandsonthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_one_grandson_three
                    SET     child_one_grandson_three_family_name  = :childonegrandsonthree_family_name,
                            child_one_grandson_three_sex          = :childonegrandsonthree_sex,
                            child_one_grandson_three_birthday     = :childonegrandsonthree_birthday,
                            child_one_grandson_three_deathday     = :childonegrandsonthree_deathday,
                            child_one_grandson_three_profession   = :childonegrandsonthree_profession,
                            child_one_grandson_three_memo         = :childonegrandsonthree_memo,
                            timestamp                             = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childonegrandsonthree_family_name'=> $childonegrandsonthree_family_name,
                                            'childonegrandsonthree_sex'        => $childonegrandsonthree_sex,
                                            'childonegrandsonthree_birthday'   => $childonegrandsonthree_birthday,
                                            'childonegrandsonthree_deathday'   => $childonegrandsonthree_deathday,
                                            'childonegrandsonthree_profession' => $childonegrandsonthree_profession,
                                            'childonegrandsonthree_memo'       => $childonegrandsonthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

/**
     * 子供１孫３データ挿入（大切な故人）
     *
     * @param childonegrandsonthree_family_name        名前
     * @param childonegrandsonthree_sex                性別
     * @param childonegrandsonthree_birthday           生年月日
     * @param childonegrandsonthree_deathday           没年月日
     * @param childonegrandsonthree_img_name           画像名
     * @param childonegrandsonthree_profession         職業
     * @param childonegrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildonegrandsonthreedeceaseddata(   $customer_id,
                                                $childonegrandsonthree_family_name,
                                                $childonegrandsonthree_sex,
                                                $childonegrandsonthree_birthday,
                                                $childonegrandsonthree_deathday,
                                                $childonegrandsonthree_img_name,
                                                $childonegrandsonthree_profession,
                                                $childonegrandsonthree_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_one_grandson_three
                    (
                    customer_id ,
                    child_one_grandson_three_family_name ,
                    child_one_grandson_three_sex ,
                    child_one_grandson_three_birthday ,
                    child_one_grandson_three_deathday ,
                    child_one_grandson_three_img_name ,
                    child_one_grandson_three_profession ,
                    child_one_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childonegrandsonthree_family_name,
                    :childonegrandsonthree_sex,
                    :childonegrandsonthree_birthday,
                    :childonegrandsonthree_deathday,
                    :childonegrandsonthree_img_name,
                    :childonegrandsonthree_profession,
                    :childonegrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childonegrandsonthree_family_name'    => $childonegrandsonthree_family_name,
                                        'childonegrandsonthree_sex'            => $childonegrandsonthree_sex,
                                        'childonegrandsonthree_birthday'       => $childonegrandsonthree_birthday,
                                        'childonegrandsonthree_deathday'       => $childonegrandsonthree_deathday,
                                        'childonegrandsonthree_img_name'       => $childonegrandsonthree_img_name,
                                        'childonegrandsonthree_profession'     => $childonegrandsonthree_profession,
                                        'childonegrandsonthree_memo'           => $childonegrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//=========================子供２孫１================================//

    /**
     * 子供２孫１データ挿入
     *
     * @param childtwograndsonone_family_name        名前
     * @param childtwograndsonone_sex                性別
     * @param childtwograndsonone_birthday           生年月日
     * @param childtwograndsonone_deathday           没年月日
     * @param childtwograndsonone_profession         職業
     * @param childtwograndsonone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildtwograndsononedata(   $customer_id,
                                        $childtwograndsonone_family_name,
                                        $childtwograndsonone_sex,
                                        $childtwograndsonone_birthday,
                                        $childtwograndsonone_deathday,
                                        $childtwograndsonone_profession,
                                        $childtwograndsonone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_one
                    (
                    customer_id ,
                    child_two_grandson_one_family_name ,
                    child_two_grandson_one_sex ,
                    child_two_grandson_one_birthday ,
                    child_two_grandson_one_deathday ,
                    child_two_grandson_one_profession ,
                    child_two_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsonone_family_name,
                    :childtwograndsonone_sex,
                    :childtwograndsonone_birthday,
                    :childtwograndsonone_deathday,
                    :childtwograndsonone_profession,
                    :childtwograndsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childtwograndsonone_family_name'    => $childtwograndsonone_family_name,
                                        'childtwograndsonone_sex'            => $childtwograndsonone_sex,
                                        'childtwograndsonone_birthday'       => $childtwograndsonone_birthday,
                                        'childtwograndsonone_deathday'       => $childtwograndsonone_deathday,
                                        'childtwograndsonone_profession'     => $childtwograndsonone_profession,
                                        'childtwograndsonone_memo'           => $childtwograndsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供２孫１データ修正
     *
     * @param childtwograndsonone_family_name        名前
     * @param childtwograndsonone_sex                性別
     * @param childtwograndsonone_birthday           生年月日
     * @param childtwograndsonone_deathday           没年月日
     * @param childtwograndsonone_profession         職業
     * @param childtwograndsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildtwograndsononedata(   $customer_id,
                                        $childtwograndsonone_family_name,
                                        $childtwograndsonone_sex,
                                        $childtwograndsonone_birthday,
                                        $childtwograndsonone_deathday,
                                        $childtwograndsonone_profession,
                                        $childtwograndsonone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_two_grandson_one
                    SET     child_two_grandson_one_family_name  = :childtwograndsonone_family_name,
                            child_two_grandson_one_sex          = :childtwograndsonone_sex,
                            child_two_grandson_one_birthday     = :childtwograndsonone_birthday,
                            child_two_grandson_one_deathday     = :childtwograndsonone_deathday,
                            child_two_grandson_one_profession   = :childtwograndsonone_profession,
                            child_two_grandson_one_memo         = :childtwograndsonone_memo,
                            timestamp                           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childtwograndsonone_family_name'=> $childtwograndsonone_family_name,
                                            'childtwograndsonone_sex'        => $childtwograndsonone_sex,
                                            'childtwograndsonone_birthday'   => $childtwograndsonone_birthday,
                                            'childtwograndsonone_deathday'   => $childtwograndsonone_deathday,
                                            'childtwograndsonone_profession' => $childtwograndsonone_profession,
                                            'childtwograndsonone_memo'       => $childtwograndsonone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供２孫１データ挿入（大切な故人）
     *
     * @param childtwograndsonone_family_name        名前
     * @param childtwograndsonone_sex                性別
     * @param childtwograndsonone_birthday           生年月日
     * @param childtwograndsonone_deathday           没年月日
     * @param childtwograndsonone_img_name           画像名
     * @param childtwograndsonone_profession         職業
     * @param childtwograndsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildtwograndsononedeceaseddata(   $customer_id,
                                                $childtwograndsonone_family_name,
                                                $childtwograndsonone_sex,
                                                $childtwograndsonone_birthday,
                                                $childtwograndsonone_deathday,
                                                $childtwograndsonone_img_name,
                                                $childtwograndsonone_profession,
                                                $childtwograndsonone_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_one
                    (
                    customer_id ,
                    child_two_grandson_one_family_name ,
                    child_two_grandson_one_sex ,
                    child_two_grandson_one_birthday ,
                    child_two_grandson_one_deathday ,
                    child_two_grandson_one_img_name ,
                    child_two_grandson_one_profession ,
                    child_two_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsonone_family_name,
                    :childtwograndsonone_sex,
                    :childtwograndsonone_birthday,
                    :childtwograndsonone_deathday,
                    :childtwograndsonone_img_name,
                    :childtwograndsonone_profession,
                    :childtwograndsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'               => $customer_id,
                                        'childtwograndsonone_family_name'    => $childtwograndsonone_family_name,
                                        'childtwograndsonone_sex'            => $childtwograndsonone_sex,
                                        'childtwograndsonone_birthday'       => $childtwograndsonone_birthday,
                                        'childtwograndsonone_deathday'       => $childtwograndsonone_deathday,
                                        'childtwograndsonone_img_name'       => $childtwograndsonone_img_name,
                                        'childtwograndsonone_profession'     => $childtwograndsonone_profession,
                                        'childtwograndsonone_memo'           => $childtwograndsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================子供２孫２================================//
    /**
     * 子供２孫２データ挿入
     *
     * @param childtwograndsontwo_family_name        名前
     * @param childtwograndsontwo_sex                性別
     * @param childtwograndsontwo_birthday           生年月日
     * @param childtwograndsontwo_deathday           没年月日
     * @param childtwograndsontwo_profession         職業
     * @param childtwograndsontwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildtwograndsontwodata(   $customer_id,
                                        $childtwograndsontwo_family_name,
                                        $childtwograndsontwo_sex,
                                        $childtwograndsontwo_birthday,
                                        $childtwograndsontwo_deathday,
                                        $childtwograndsontwo_profession,
                                        $childtwograndsontwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_two
                    (
                    customer_id ,
                    child_two_grandson_two_family_name ,
                    child_two_grandson_two_sex ,
                    child_two_grandson_two_birthday ,
                    child_two_grandson_two_deathday ,
                    child_two_grandson_two_profession ,
                    child_two_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsontwo_family_name,
                    :childtwograndsontwo_sex,
                    :childtwograndsontwo_birthday,
                    :childtwograndsontwo_deathday,
                    :childtwograndsontwo_profession,
                    :childtwograndsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childtwograndsontwo_family_name'    => $childtwograndsontwo_family_name,
                                        'childtwograndsontwo_sex'            => $childtwograndsontwo_sex,
                                        'childtwograndsontwo_birthday'       => $childtwograndsontwo_birthday,
                                        'childtwograndsontwo_deathday'       => $childtwograndsontwo_deathday,
                                        'childtwograndsontwo_profession'     => $childtwograndsontwo_profession,
                                        'childtwograndsontwo_memo'           => $childtwograndsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供２孫２データ修正
     *
     * @param childtwograndsontwo_family_name        名前
     * @param childtwograndsontwo_sex                性別
     * @param childtwograndsontwo_birthday           生年月日
     * @param childtwograndsontwo_deathday           没年月日
     * @param childtwograndsontwo_profession         職業
     * @param childtwograndsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildtwograndsontwodata(   $customer_id,
                                        $childtwograndsontwo_family_name,
                                        $childtwograndsontwo_sex,
                                        $childtwograndsontwo_birthday,
                                        $childtwograndsontwo_deathday,
                                        $childtwograndsontwo_profession,
                                        $childtwograndsontwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_two_grandson_two
                    SET     child_two_grandson_two_family_name  = :childtwograndsontwo_family_name,
                            child_two_grandson_two_sex          = :childtwograndsontwo_sex,
                            child_two_grandson_two_birthday     = :childtwograndsontwo_birthday,
                            child_two_grandson_two_deathday     = :childtwograndsontwo_deathday,
                            child_two_grandson_two_profession   = :childtwograndsontwo_profession,
                            child_two_grandson_two_memo         = :childtwograndsontwo_memo,
                            timestamp                           = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childtwograndsontwo_family_name'=> $childtwograndsontwo_family_name,
                                            'childtwograndsontwo_sex'        => $childtwograndsontwo_sex,
                                            'childtwograndsontwo_birthday'   => $childtwograndsontwo_birthday,
                                            'childtwograndsontwo_deathday'   => $childtwograndsontwo_deathday,
                                            'childtwograndsontwo_profession' => $childtwograndsontwo_profession,
                                            'childtwograndsontwo_memo'       => $childtwograndsontwo_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供２孫２データ挿入（大切な故人）
     *
     * @param childtwograndsontwo_family_name        名前
     * @param childtwograndsontwo_sex                性別
     * @param childtwograndsontwo_birthday           生年月日
     * @param childtwograndsontwo_deathday           没年月日
     * @param childtwograndsontwo_img_name           画像名
     * @param childtwograndsontwo_profession         職業
     * @param childtwograndsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildtwograndsontwodeceaseddata(   $customer_id,
                                                $childtwograndsontwo_family_name,
                                                $childtwograndsontwo_sex,
                                                $childtwograndsontwo_birthday,
                                                $childtwograndsontwo_deathday,
                                                $childtwograndsontwo_img_name,
                                                $childtwograndsontwo_profession,
                                                $childtwograndsontwo_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_two
                    (
                    customer_id ,
                    child_two_grandson_two_family_name ,
                    child_two_grandson_two_sex ,
                    child_two_grandson_two_birthday ,
                    child_two_grandson_two_deathday ,
                    child_two_grandson_two_img_name ,
                    child_two_grandson_two_profession ,
                    child_two_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsontwo_family_name,
                    :childtwograndsontwo_sex,
                    :childtwograndsontwo_birthday,
                    :childtwograndsontwo_deathday,
                    :childtwograndsontwo_img_name,
                    :childtwograndsontwo_profession,
                    :childtwograndsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childtwograndsontwo_family_name'    => $childtwograndsontwo_family_name,
                                        'childtwograndsontwo_sex'            => $childtwograndsontwo_sex,
                                        'childtwograndsontwo_birthday'       => $childtwograndsontwo_birthday,
                                        'childtwograndsontwo_deathday'       => $childtwograndsontwo_deathday,
                                        'childtwograndsontwo_img_name'       => $childtwograndsontwo_img_name,
                                        'childtwograndsontwo_profession'     => $childtwograndsontwo_profession,
                                        'childtwograndsontwo_memo'           => $childtwograndsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================子供２孫３================================//

    /**
     * 子供２孫３データ挿入
     *
     * @param childtwograndsonthree_family_name        名前
     * @param childtwograndsonthree_sex                性別
     * @param childtwograndsonthree_birthday           生年月日
     * @param childtwograndsonthree_deathday           没年月日
     * @param childtwograndsonthree_profession         職業
     * @param childtwograndsonthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildtwograndsonthreedata(   $customer_id,
                                        $childtwograndsonthree_family_name,
                                        $childtwograndsonthree_sex,
                                        $childtwograndsonthree_birthday,
                                        $childtwograndsonthree_deathday,
                                        $childtwograndsonthree_profession,
                                        $childtwograndsonthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_three
                    (
                    customer_id ,
                    child_two_grandson_three_family_name ,
                    child_two_grandson_three_sex ,
                    child_two_grandson_three_birthday ,
                    child_two_grandson_three_deathday ,
                    child_two_grandson_three_profession ,
                    child_two_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsonthree_family_name,
                    :childtwograndsonthree_sex,
                    :childtwograndsonthree_birthday,
                    :childtwograndsonthree_deathday,
                    :childtwograndsonthree_profession,
                    :childtwograndsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childtwograndsonthree_family_name'    => $childtwograndsonthree_family_name,
                                        'childtwograndsonthree_sex'            => $childtwograndsonthree_sex,
                                        'childtwograndsonthree_birthday'       => $childtwograndsonthree_birthday,
                                        'childtwograndsonthree_deathday'       => $childtwograndsonthree_deathday,
                                        'childtwograndsonthree_profession'     => $childtwograndsonthree_profession,
                                        'childtwograndsonthree_memo'           => $childtwograndsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供２孫３データ修正
     *
     * @param childtwograndsonthree_family_name        名前
     * @param childtwograndsonthree_sex                性別
     * @param childtwograndsonthree_birthday           生年月日
     * @param childtwograndsonthree_deathday           没年月日
     * @param childtwograndsonthree_profession         職業
     * @param childtwograndsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildtwograndsonthreedata(   $customer_id,
                                        $childtwograndsonthree_family_name,
                                        $childtwograndsonthree_sex,
                                        $childtwograndsonthree_birthday,
                                        $childtwograndsonthree_deathday,
                                        $childtwograndsonthree_profession,
                                        $childtwograndsonthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_two_grandson_three
                    SET     child_two_grandson_three_family_name  = :childtwograndsonthree_family_name,
                            child_two_grandson_three_sex          = :childtwograndsonthree_sex,
                            child_two_grandson_three_birthday     = :childtwograndsonthree_birthday,
                            child_two_grandson_three_deathday     = :childtwograndsonthree_deathday,
                            child_two_grandson_three_profession   = :childtwograndsonthree_profession,
                            child_two_grandson_three_memo         = :childtwograndsonthree_memo,
                            timestamp                             = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childtwograndsonthree_family_name'=> $childtwograndsonthree_family_name,
                                            'childtwograndsonthree_sex'        => $childtwograndsonthree_sex,
                                            'childtwograndsonthree_birthday'   => $childtwograndsonthree_birthday,
                                            'childtwograndsonthree_deathday'   => $childtwograndsonthree_deathday,
                                            'childtwograndsonthree_profession' => $childtwograndsonthree_profession,
                                            'childtwograndsonthree_memo'       => $childtwograndsonthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供２孫３データ挿入（大切な故人）
     *
     * @param childtwograndsonthree_family_name        名前
     * @param childtwograndsonthree_sex                性別
     * @param childtwograndsonthree_birthday           生年月日
     * @param childtwograndsonthree_deathday           没年月日
     * @param childtwograndsonthree_img_name           画像名
     * @param childtwograndsonthree_profession         職業
     * @param childtwograndsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    
    public function insertchildtwograndsonthreedeceaseddata(   $customer_id,
                                                $childtwograndsonthree_family_name,
                                                $childtwograndsonthree_sex,
                                                $childtwograndsonthree_birthday,
                                                $childtwograndsonthree_deathday,
                                                $childtwograndsonthree_img_name,
                                                $childtwograndsonthree_profession,
                                                $childtwograndsonthree_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_two_grandson_three
                    (
                    customer_id ,
                    child_two_grandson_three_family_name ,
                    child_two_grandson_three_sex ,
                    child_two_grandson_three_birthday ,
                    child_two_grandson_three_deathday ,
                    child_two_grandson_three_img_name ,
                    child_two_grandson_three_profession ,
                    child_two_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childtwograndsonthree_family_name,
                    :childtwograndsonthree_sex,
                    :childtwograndsonthree_birthday,
                    :childtwograndsonthree_deathday,
                    :childtwograndsonthree_img_name,
                    :childtwograndsonthree_profession,
                    :childtwograndsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childtwograndsonthree_family_name'    => $childtwograndsonthree_family_name,
                                        'childtwograndsonthree_sex'            => $childtwograndsonthree_sex,
                                        'childtwograndsonthree_birthday'       => $childtwograndsonthree_birthday,
                                        'childtwograndsonthree_deathday'       => $childtwograndsonthree_deathday,
                                        'childtwograndsonthree_img_name'       => $childtwograndsonthree_img_name,
                                        'childtwograndsonthree_profession'     => $childtwograndsonthree_profession,
                                        'childtwograndsonthree_memo'           => $childtwograndsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//=========================子供３孫１================================//

    /**
     * 子供３孫１データ挿入
     *
     * @param childthreegrandsonone_family_name        名前
     * @param childthreegrandsonone_sex                性別
     * @param childthreegrandsonone_birthday           生年月日
     * @param childthreegrandsonone_deathday           没年月日
     * @param childthreegrandsonone_profession         職業
     * @param childthreegrandsonone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildthreegrandsononedata(   $customer_id,
                                        $childthreegrandsonone_family_name,
                                        $childthreegrandsonone_sex,
                                        $childthreegrandsonone_birthday,
                                        $childthreegrandsonone_deathday,
                                        $childthreegrandsonone_profession,
                                        $childthreegrandsonone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_one
                    (
                    customer_id ,
                    child_three_grandson_one_family_name ,
                    child_three_grandson_one_sex ,
                    child_three_grandson_one_birthday ,
                    child_three_grandson_one_deathday ,
                    child_three_grandson_one_profession ,
                    child_three_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsonone_family_name,
                    :childthreegrandsonone_sex,
                    :childthreegrandsonone_birthday,
                    :childthreegrandsonone_deathday,
                    :childthreegrandsonone_profession,
                    :childthreegrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childthreegrandsonone_family_name'    => $childthreegrandsonone_family_name,
                                        'childthreegrandsonone_sex'            => $childthreegrandsonone_sex,
                                        'childthreegrandsonone_birthday'       => $childthreegrandsonone_birthday,
                                        'childthreegrandsonone_deathday'       => $childthreegrandsonone_deathday,
                                        'childthreegrandsonone_profession'     => $childthreegrandsonone_profession,
                                        'childthreegrandsonone_memo'           => $childthreegrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供３孫１データ修正
     *
     * @param childthreegrandsonone_family_name        名前
     * @param childthreegrandsonone_sex                性別
     * @param childthreegrandsonone_birthday           生年月日
     * @param childthreegrandsonone_deathday           没年月日
     * @param childthreegrandsonone_profession         職業
     * @param childthreegrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildthreegrandsononedata(   $customer_id,
                                        $childthreegrandsonone_family_name,
                                        $childthreegrandsonone_sex,
                                        $childthreegrandsonone_birthday,
                                        $childthreegrandsonone_deathday,
                                        $childthreegrandsonone_profession,
                                        $childthreegrandsonone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_three_grandson_one
                    SET     child_three_grandson_one_family_name  = :childthreegrandsonone_family_name,
                            child_three_grandson_one_sex          = :childthreegrandsonone_sex,
                            child_three_grandson_one_birthday     = :childthreegrandsonone_birthday,
                            child_three_grandson_one_deathday     = :childthreegrandsonone_deathday,
                            child_three_grandson_one_profession   = :childthreegrandsonone_profession,
                            child_three_grandson_one_memo         = :childthreegrandsonone_memo,
                            timestamp                             = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childthreegrandsonone_family_name'=> $childthreegrandsonone_family_name,
                                            'childthreegrandsonone_sex'        => $childthreegrandsonone_sex,
                                            'childthreegrandsonone_birthday'   => $childthreegrandsonone_birthday,
                                            'childthreegrandsonone_deathday'   => $childthreegrandsonone_deathday,
                                            'childthreegrandsonone_profession' => $childthreegrandsonone_profession,
                                            'childthreegrandsonone_memo'       => $childthreegrandsonone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 子供３孫１データ挿入（大切な故人）
     *
     * @param childthreegrandsonone_family_name        名前
     * @param childthreegrandsonone_sex                性別
     * @param childthreegrandsonone_birthday           生年月日
     * @param childthreegrandsonone_deathday           没年月日
     * @param childthreegrandsonone_img_name           画像名
     * @param childthreegrandsonone_profession         職業
     * @param childthreegrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildthreegrandsononedeceaseddata(   $customer_id,
                                                $childthreegrandsonone_family_name,
                                                $childthreegrandsonone_sex,
                                                $childthreegrandsonone_birthday,
                                                $childthreegrandsonone_deathday,
                                                $childthreegrandsonone_img_name,
                                                $childthreegrandsonone_profession,
                                                $childthreegrandsonone_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_one
                    (
                    customer_id ,
                    child_three_grandson_one_family_name ,
                    child_three_grandson_one_sex ,
                    child_three_grandson_one_birthday ,
                    child_three_grandson_one_deathday ,
                    child_three_grandson_one_img_name ,
                    child_three_grandson_one_profession ,
                    child_three_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsonone_family_name,
                    :childthreegrandsonone_sex,
                    :childthreegrandsonone_birthday,
                    :childthreegrandsonone_deathday,
                    :childthreegrandsonone_img_name,
                    :childthreegrandsonone_profession,
                    :childthreegrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childthreegrandsonone_family_name'    => $childthreegrandsonone_family_name,
                                        'childthreegrandsonone_sex'            => $childthreegrandsonone_sex,
                                        'childthreegrandsonone_birthday'       => $childthreegrandsonone_birthday,
                                        'childthreegrandsonone_deathday'       => $childthreegrandsonone_deathday,
                                        'childthreegrandsonone_img_name'       => $childthreegrandsonone_img_name,
                                        'childthreegrandsonone_profession'     => $childthreegrandsonone_profession,
                                        'childthreegrandsonone_memo'           => $childthreegrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//=========================子供３孫２================================//
    /**
     * 子供３孫２データ挿入
     *
     * @param childthreegrandsontwo_family_name        名前
     * @param childthreegrandsontwo_sex                性別
     * @param childthreegrandsontwo_birthday           生年月日
     * @param childthreegrandsontwo_deathday           没年月日
     * @param childthreegrandsontwo_profession         職業
     * @param childthreegrandsontwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildthreegrandsontwodata(   $customer_id,
                                        $childthreegrandsontwo_family_name,
                                        $childthreegrandsontwo_sex,
                                        $childthreegrandsontwo_birthday,
                                        $childthreegrandsontwo_deathday,
                                        $childthreegrandsontwo_profession,
                                        $childthreegrandsontwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_two
                    (
                    customer_id ,
                    child_three_grandson_two_family_name ,
                    child_three_grandson_two_sex ,
                    child_three_grandson_two_birthday ,
                    child_three_grandson_two_deathday ,
                    child_three_grandson_two_profession ,
                    child_three_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsontwo_family_name,
                    :childthreegrandsontwo_sex,
                    :childthreegrandsontwo_birthday,
                    :childthreegrandsontwo_deathday,
                    :childthreegrandsontwo_profession,
                    :childthreegrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childthreegrandsontwo_family_name'    => $childthreegrandsontwo_family_name,
                                        'childthreegrandsontwo_sex'            => $childthreegrandsontwo_sex,
                                        'childthreegrandsontwo_birthday'       => $childthreegrandsontwo_birthday,
                                        'childthreegrandsontwo_deathday'       => $childthreegrandsontwo_deathday,
                                        'childthreegrandsontwo_profession'     => $childthreegrandsontwo_profession,
                                        'childthreegrandsontwo_memo'           => $childthreegrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供３孫２データ修正
     *
     * @param childthreegrandsontwo_family_name        名前
     * @param childthreegrandsontwo_sex                性別
     * @param childthreegrandsontwo_birthday           生年月日
     * @param childthreegrandsontwo_deathday           没年月日
     * @param childthreegrandsontwo_profession         職業
     * @param childthreegrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildthreegrandsontwodata(   $customer_id,
                                        $childthreegrandsontwo_family_name,
                                        $childthreegrandsontwo_sex,
                                        $childthreegrandsontwo_birthday,
                                        $childthreegrandsontwo_deathday,
                                        $childthreegrandsontwo_profession,
                                        $childthreegrandsontwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_three_grandson_two
                    SET     child_three_grandson_two_family_name  = :childthreegrandsontwo_family_name,
                            child_three_grandson_two_sex          = :childthreegrandsontwo_sex,
                            child_three_grandson_two_birthday     = :childthreegrandsontwo_birthday,
                            child_three_grandson_two_deathday     = :childthreegrandsontwo_deathday,
                            child_three_grandson_two_profession   = :childthreegrandsontwo_profession,
                            child_three_grandson_two_memo         = :childthreegrandsontwo_memo,
                            timestamp                             = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childthreegrandsontwo_family_name'=> $childthreegrandsontwo_family_name,
                                            'childthreegrandsontwo_sex'        => $childthreegrandsontwo_sex,
                                            'childthreegrandsontwo_birthday'   => $childthreegrandsontwo_birthday,
                                            'childthreegrandsontwo_deathday'   => $childthreegrandsontwo_deathday,
                                            'childthreegrandsontwo_profession' => $childthreegrandsontwo_profession,
                                            'childthreegrandsontwo_memo'       => $childthreegrandsontwo_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供３孫２データ挿入（大切な故人）
     *
     * @param childthreegrandsontwo_family_name        名前
     * @param childthreegrandsontwo_sex                性別
     * @param childthreegrandsontwo_birthday           生年月日
     * @param childthreegrandsontwo_deathday           没年月日
     * @param childthreegrandsontwo_img_name           画像名
     * @param childthreegrandsontwo_profession         職業
     * @param childthreegrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildthreegrandsontwodeceaseddata(   $customer_id,
                                                $childthreegrandsontwo_family_name,
                                                $childthreegrandsontwo_sex,
                                                $childthreegrandsontwo_birthday,
                                                $childthreegrandsontwo_deathday,
                                                $childthreegrandsontwo_img_name,
                                                $childthreegrandsontwo_profession,
                                                $childthreegrandsontwo_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_two
                    (
                    customer_id ,
                    child_three_grandson_two_family_name ,
                    child_three_grandson_two_sex ,
                    child_three_grandson_two_birthday ,
                    child_three_grandson_two_deathday ,
                    child_three_grandson_two_img_name ,
                    child_three_grandson_two_profession ,
                    child_three_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsontwo_family_name,
                    :childthreegrandsontwo_sex,
                    :childthreegrandsontwo_birthday,
                    :childthreegrandsontwo_deathday,
                    :childthreegrandsontwo_img_name,
                    :childthreegrandsontwo_profession,
                    :childthreegrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childthreegrandsontwo_family_name'    => $childthreegrandsontwo_family_name,
                                        'childthreegrandsontwo_sex'            => $childthreegrandsontwo_sex,
                                        'childthreegrandsontwo_birthday'       => $childthreegrandsontwo_birthday,
                                        'childthreegrandsontwo_deathday'       => $childthreegrandsontwo_deathday,
                                        'childthreegrandsontwo_img_name'       => $childthreegrandsontwo_img_name,
                                        'childthreegrandsontwo_profession'     => $childthreegrandsontwo_profession,
                                        'childthreegrandsontwo_memo'           => $childthreegrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//=========================子供３孫３================================//
    /**
     * 子供３孫３データ挿入
     *
     * @param childthreegrandsonthree_family_name        名前
     * @param childthreegrandsonthree_sex                性別
     * @param childthreegrandsonthree_birthday           生年月日
     * @param childthreegrandsonthree_deathday           没年月日
     * @param childthreegrandsonthree_profession         職業
     * @param childthreegrandsonthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildthreegrandsonthreedata(   $customer_id,
                                        $childthreegrandsonthree_family_name,
                                        $childthreegrandsonthree_sex,
                                        $childthreegrandsonthree_birthday,
                                        $childthreegrandsonthree_deathday,
                                        $childthreegrandsonthree_profession,
                                        $childthreegrandsonthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_three
                    (
                    customer_id ,
                    child_three_grandson_three_family_name ,
                    child_three_grandson_three_sex ,
                    child_three_grandson_three_birthday ,
                    child_three_grandson_three_deathday ,
                    child_three_grandson_three_profession ,
                    child_three_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsonthree_family_name,
                    :childthreegrandsonthree_sex,
                    :childthreegrandsonthree_birthday,
                    :childthreegrandsonthree_deathday,
                    :childthreegrandsonthree_profession,
                    :childthreegrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childthreegrandsonthree_family_name'    => $childthreegrandsonthree_family_name,
                                        'childthreegrandsonthree_sex'            => $childthreegrandsonthree_sex,
                                        'childthreegrandsonthree_birthday'       => $childthreegrandsonthree_birthday,
                                        'childthreegrandsonthree_deathday'       => $childthreegrandsonthree_deathday,
                                        'childthreegrandsonthree_profession'     => $childthreegrandsonthree_profession,
                                        'childthreegrandsonthree_memo'           => $childthreegrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供３孫３データ修正
     *
     * @param childthreegrandsonthree_family_name        名前
     * @param childthreegrandsonthree_sex                性別
     * @param childthreegrandsonthree_birthday           生年月日
     * @param childthreegrandsonthree_deathday           没年月日
     * @param childthreegrandsonthree_profession         職業
     * @param childthreegrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildthreegrandsonthreedata(   $customer_id,
                                        $childthreegrandsonthree_family_name,
                                        $childthreegrandsonthree_sex,
                                        $childthreegrandsonthree_birthday,
                                        $childthreegrandsonthree_deathday,
                                        $childthreegrandsonthree_profession,
                                        $childthreegrandsonthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_three_grandson_three
                    SET     child_three_grandson_three_family_name  = :childthreegrandsonthree_family_name,
                            child_three_grandson_three_sex          = :childthreegrandsonthree_sex,
                            child_three_grandson_three_birthday     = :childthreegrandsonthree_birthday,
                            child_three_grandson_three_deathday     = :childthreegrandsonthree_deathday,
                            child_three_grandson_three_profession   = :childthreegrandsonthree_profession,
                            child_three_grandson_three_memo         = :childthreegrandsonthree_memo,
                            timestamp                               = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childthreegrandsonthree_family_name'=> $childthreegrandsonthree_family_name,
                                            'childthreegrandsonthree_sex'        => $childthreegrandsonthree_sex,
                                            'childthreegrandsonthree_birthday'   => $childthreegrandsonthree_birthday,
                                            'childthreegrandsonthree_deathday'   => $childthreegrandsonthree_deathday,
                                            'childthreegrandsonthree_profession' => $childthreegrandsonthree_profession,
                                            'childthreegrandsonthree_memo'       => $childthreegrandsonthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 子供３孫３データ挿入（大切な故人）
     *
     * @param childthreegrandsonthree_family_name        名前
     * @param childthreegrandsonthree_sex                性別
     * @param childthreegrandsonthree_birthday           生年月日
     * @param childthreegrandsonthree_deathday           没年月日
     * @param childthreegrandsonthree_img_name           画像名
     * @param childthreegrandsonthree_profession         職業
     * @param childthreegrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildthreegrandsonthreedeceaseddata(   $customer_id,
                                                $childthreegrandsonthree_family_name,
                                                $childthreegrandsonthree_sex,
                                                $childthreegrandsonthree_birthday,
                                                $childthreegrandsonthree_deathday,
                                                $childthreegrandsonthree_img_name,
                                                $childthreegrandsonthree_profession,
                                                $childthreegrandsonthree_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_three_grandson_three
                    (
                    customer_id ,
                    child_three_grandson_three_family_name ,
                    child_three_grandson_three_sex ,
                    child_three_grandson_three_birthday ,
                    child_three_grandson_three_deathday ,
                    child_three_grandson_three_img_name ,
                    child_three_grandson_three_profession ,
                    child_three_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childthreegrandsonthree_family_name,
                    :childthreegrandsonthree_sex,
                    :childthreegrandsonthree_birthday,
                    :childthreegrandsonthree_deathday,
                    :childthreegrandsonthree_img_name,
                    :childthreegrandsonthree_profession,
                    :childthreegrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childthreegrandsonthree_family_name'    => $childthreegrandsonthree_family_name,
                                        'childthreegrandsonthree_sex'            => $childthreegrandsonthree_sex,
                                        'childthreegrandsonthree_birthday'       => $childthreegrandsonthree_birthday,
                                        'childthreegrandsonthree_deathday'       => $childthreegrandsonthree_deathday,
                                        'childthreegrandsonthree_img_name'       => $childthreegrandsonthree_img_name,
                                        'childthreegrandsonthree_profession'     => $childthreegrandsonthree_profession,
                                        'childthreegrandsonthree_memo'           => $childthreegrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//=========================子供４孫１================================//
    /**
     * 子供４孫１データ挿入
     *
     * @param childfourgrandsonone_family_name        名前
     * @param childfourgrandsonone_sex                性別
     * @param childfourgrandsonone_birthday           生年月日
     * @param childfourgrandsonone_deathday           没年月日
     * @param childfourgrandsonone_profession         職業
     * @param childfourgrandsonone_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildfourgrandsononedata(   $customer_id,
                                        $childfourgrandsonone_family_name,
                                        $childfourgrandsonone_sex,
                                        $childfourgrandsonone_birthday,
                                        $childfourgrandsonone_deathday,
                                        $childfourgrandsonone_profession,
                                        $childfourgrandsonone_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_one
                    (
                    customer_id ,
                    child_four_grandson_one_family_name ,
                    child_four_grandson_one_sex ,
                    child_four_grandson_one_birthday ,
                    child_four_grandson_one_deathday ,
                    child_four_grandson_one_profession ,
                    child_four_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsonone_family_name,
                    :childfourgrandsonone_sex,
                    :childfourgrandsonone_birthday,
                    :childfourgrandsonone_deathday,
                    :childfourgrandsonone_profession,
                    :childfourgrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childfourgrandsonone_family_name'    => $childfourgrandsonone_family_name,
                                        'childfourgrandsonone_sex'            => $childfourgrandsonone_sex,
                                        'childfourgrandsonone_birthday'       => $childfourgrandsonone_birthday,
                                        'childfourgrandsonone_deathday'       => $childfourgrandsonone_deathday,
                                        'childfourgrandsonone_profession'     => $childfourgrandsonone_profession,
                                        'childfourgrandsonone_memo'           => $childfourgrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供４孫１データ修正
     *
     * @param childfourgrandsonone_family_name        名前
     * @param childfourgrandsonone_sex                性別
     * @param childfourgrandsonone_birthday           生年月日
     * @param childfourgrandsonone_deathday           没年月日
     * @param childfourgrandsonone_profession         職業
     * @param childfourgrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildfourgrandsononedata(   $customer_id,
                                        $childfourgrandsonone_family_name,
                                        $childfourgrandsonone_sex,
                                        $childfourgrandsonone_birthday,
                                        $childfourgrandsonone_deathday,
                                        $childfourgrandsonone_profession,
                                        $childfourgrandsonone_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_four_grandson_one
                    SET     child_four_grandson_one_family_name  = :childfourgrandsonone_family_name,
                            child_four_grandson_one_sex          = :childfourgrandsonone_sex,
                            child_four_grandson_one_birthday     = :childfourgrandsonone_birthday,
                            child_four_grandson_one_deathday     = :childfourgrandsonone_deathday,
                            child_four_grandson_one_profession   = :childfourgrandsonone_profession,
                            child_four_grandson_one_memo         = :childfourgrandsonone_memo,
                            timestamp                            = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childfourgrandsonone_family_name'=> $childfourgrandsonone_family_name,
                                            'childfourgrandsonone_sex'        => $childfourgrandsonone_sex,
                                            'childfourgrandsonone_birthday'   => $childfourgrandsonone_birthday,
                                            'childfourgrandsonone_deathday'   => $childfourgrandsonone_deathday,
                                            'childfourgrandsonone_profession' => $childfourgrandsonone_profession,
                                            'childfourgrandsonone_memo'       => $childfourgrandsonone_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供４孫１データ挿入（大切な故人）
     *
     * @param childfourgrandsonone_family_name        名前
     * @param childfourgrandsonone_sex                性別
     * @param childfourgrandsonone_birthday           生年月日
     * @param childfourgrandsonone_deathday           没年月日
     * @param childfourgrandsonone_img_name           画像名
     * @param childfourgrandsonone_profession         職業
     * @param childfourgrandsonone_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildfourgrandsononedeceaseddata(   $customer_id,
                                                $childfourgrandsonone_family_name,
                                                $childfourgrandsonone_sex,
                                                $childfourgrandsonone_birthday,
                                                $childfourgrandsonone_deathday,
                                                $childfourgrandsonone_img_name,
                                                $childfourgrandsonone_profession,
                                                $childfourgrandsonone_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_one
                    (
                    customer_id ,
                    child_four_grandson_one_family_name ,
                    child_four_grandson_one_sex ,
                    child_four_grandson_one_birthday ,
                    child_four_grandson_one_deathday ,
                    child_four_grandson_one_img_name ,
                    child_four_grandson_one_profession ,
                    child_four_grandson_one_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsonone_family_name,
                    :childfourgrandsonone_sex,
                    :childfourgrandsonone_birthday,
                    :childfourgrandsonone_deathday,
                    :childfourgrandsonone_img_name,
                    :childfourgrandsonone_profession,
                    :childfourgrandsonone_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childfourgrandsonone_family_name'    => $childfourgrandsonone_family_name,
                                        'childfourgrandsonone_sex'            => $childfourgrandsonone_sex,
                                        'childfourgrandsonone_birthday'       => $childfourgrandsonone_birthday,
                                        'childfourgrandsonone_deathday'       => $childfourgrandsonone_deathday,
                                        'childfourgrandsonone_img_name'       => $childfourgrandsonone_img_name,
                                        'childfourgrandsonone_profession'     => $childfourgrandsonone_profession,
                                        'childfourgrandsonone_memo'           => $childfourgrandsonone_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

//=========================子供４孫２================================//
    /**
     * 子供４孫２データ挿入
     *
     * @param childfourgrandsontwo_family_name        名前
     * @param childfourgrandsontwo_sex                性別
     * @param childfourgrandsontwo_birthday           生年月日
     * @param childfourgrandsontwo_deathday           没年月日
     * @param childfourgrandsontwo_profession         職業
     * @param childfourgrandsontwo_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildfourgrandsontwodata(   $customer_id,
                                        $childfourgrandsontwo_family_name,
                                        $childfourgrandsontwo_sex,
                                        $childfourgrandsontwo_birthday,
                                        $childfourgrandsontwo_deathday,
                                        $childfourgrandsontwo_profession,
                                        $childfourgrandsontwo_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_two
                    (
                    customer_id ,
                    child_four_grandson_two_family_name ,
                    child_four_grandson_two_sex ,
                    child_four_grandson_two_birthday ,
                    child_four_grandson_two_deathday ,
                    child_four_grandson_two_profession ,
                    child_four_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsontwo_family_name,
                    :childfourgrandsontwo_sex,
                    :childfourgrandsontwo_birthday,
                    :childfourgrandsontwo_deathday,
                    :childfourgrandsontwo_profession,
                    :childfourgrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childfourgrandsontwo_family_name'    => $childfourgrandsontwo_family_name,
                                        'childfourgrandsontwo_sex'            => $childfourgrandsontwo_sex,
                                        'childfourgrandsontwo_birthday'       => $childfourgrandsontwo_birthday,
                                        'childfourgrandsontwo_deathday'       => $childfourgrandsontwo_deathday,
                                        'childfourgrandsontwo_profession'     => $childfourgrandsontwo_profession,
                                        'childfourgrandsontwo_memo'           => $childfourgrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供４孫２データ修正
     *
     * @param childfourgrandsontwo_family_name        名前
     * @param childfourgrandsontwo_sex                性別
     * @param childfourgrandsontwo_birthday           生年月日
     * @param childfourgrandsontwo_deathday           没年月日
     * @param childfourgrandsontwo_profession         職業
     * @param childfourgrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildfourgrandsontwodata(   $customer_id,
                                        $childfourgrandsontwo_family_name,
                                        $childfourgrandsontwo_sex,
                                        $childfourgrandsontwo_birthday,
                                        $childfourgrandsontwo_deathday,
                                        $childfourgrandsontwo_profession,
                                        $childfourgrandsontwo_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_four_grandson_two
                    SET     child_four_grandson_two_family_name  = :childfourgrandsontwo_family_name,
                            child_four_grandson_two_sex          = :childfourgrandsontwo_sex,
                            child_four_grandson_two_birthday     = :childfourgrandsontwo_birthday,
                            child_four_grandson_two_deathday     = :childfourgrandsontwo_deathday,
                            child_four_grandson_two_profession   = :childfourgrandsontwo_profession,
                            child_four_grandson_two_memo         = :childfourgrandsontwo_memo,
                            timestamp                            = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childfourgrandsontwo_family_name'=> $childfourgrandsontwo_family_name,
                                            'childfourgrandsontwo_sex'        => $childfourgrandsontwo_sex,
                                            'childfourgrandsontwo_birthday'   => $childfourgrandsontwo_birthday,
                                            'childfourgrandsontwo_deathday'   => $childfourgrandsontwo_deathday,
                                            'childfourgrandsontwo_profession' => $childfourgrandsontwo_profession,
                                            'childfourgrandsontwo_memo'       => $childfourgrandsontwo_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供４孫２データ挿入（大切な故人）
     *
     * @param childfourgrandsontwo_family_name        名前
     * @param childfourgrandsontwo_sex                性別
     * @param childfourgrandsontwo_birthday           生年月日
     * @param childfourgrandsontwo_deathday           没年月日
     * @param childfourgrandsontwo_img_name           画像名
     * @param childfourgrandsontwo_profession         職業
     * @param childfourgrandsontwo_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildfourgrandsontwodeceaseddata(   $customer_id,
                                                $childfourgrandsontwo_family_name,
                                                $childfourgrandsontwo_sex,
                                                $childfourgrandsontwo_birthday,
                                                $childfourgrandsontwo_deathday,
                                                $childfourgrandsontwo_img_name,
                                                $childfourgrandsontwo_profession,
                                                $childfourgrandsontwo_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_two
                    (
                    customer_id ,
                    child_four_grandson_two_family_name ,
                    child_four_grandson_two_sex ,
                    child_four_grandson_two_birthday ,
                    child_four_grandson_two_deathday ,
                    child_four_grandson_two_img_name ,
                    child_four_grandson_two_profession ,
                    child_four_grandson_two_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsontwo_family_name,
                    :childfourgrandsontwo_sex,
                    :childfourgrandsontwo_birthday,
                    :childfourgrandsontwo_deathday,
                    :childfourgrandsontwo_img_name,
                    :childfourgrandsontwo_profession,
                    :childfourgrandsontwo_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childfourgrandsontwo_family_name'    => $childfourgrandsontwo_family_name,
                                        'childfourgrandsontwo_sex'            => $childfourgrandsontwo_sex,
                                        'childfourgrandsontwo_birthday'       => $childfourgrandsontwo_birthday,
                                        'childfourgrandsontwo_deathday'       => $childfourgrandsontwo_deathday,
                                        'childfourgrandsontwo_img_name'       => $childfourgrandsontwo_img_name,
                                        'childfourgrandsontwo_profession'     => $childfourgrandsontwo_profession,
                                        'childfourgrandsontwo_memo'           => $childfourgrandsontwo_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//=========================子供４孫３================================//
    /**
     * 子供４孫３データ挿入
     *
     * @param childfourgrandsonthree_family_name        名前
     * @param childfourgrandsonthree_sex                性別
     * @param childfourgrandsonthree_birthday           生年月日
     * @param childfourgrandsonthree_deathday           没年月日
     * @param childfourgrandsonthree_profession         職業
     * @param childfourgrandsonthree_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertchildfourgrandsonthreedata(   $customer_id,
                                        $childfourgrandsonthree_family_name,
                                        $childfourgrandsonthree_sex,
                                        $childfourgrandsonthree_birthday,
                                        $childfourgrandsonthree_deathday,
                                        $childfourgrandsonthree_profession,
                                        $childfourgrandsonthree_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_three
                    (
                    customer_id ,
                    child_four_grandson_three_family_name ,
                    child_four_grandson_three_sex ,
                    child_four_grandson_three_birthday ,
                    child_four_grandson_three_deathday ,
                    child_four_grandson_three_profession ,
                    child_four_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsonthree_family_name,
                    :childfourgrandsonthree_sex,
                    :childfourgrandsonthree_birthday,
                    :childfourgrandsonthree_deathday,
                    :childfourgrandsonthree_profession,
                    :childfourgrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'childfourgrandsonthree_family_name'    => $childfourgrandsonthree_family_name,
                                        'childfourgrandsonthree_sex'            => $childfourgrandsonthree_sex,
                                        'childfourgrandsonthree_birthday'       => $childfourgrandsonthree_birthday,
                                        'childfourgrandsonthree_deathday'       => $childfourgrandsonthree_deathday,
                                        'childfourgrandsonthree_profession'     => $childfourgrandsonthree_profession,
                                        'childfourgrandsonthree_memo'           => $childfourgrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 子供４孫３データ修正
     *
     * @param childfourgrandsonthree_family_name        名前
     * @param childfourgrandsonthree_sex                性別
     * @param childfourgrandsonthree_birthday           生年月日
     * @param childfourgrandsonthree_deathday           没年月日
     * @param childfourgrandsonthree_profession         職業
     * @param childfourgrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changechildfourgrandsonthreedata(   $customer_id,
                                        $childfourgrandsonthree_family_name,
                                        $childfourgrandsonthree_sex,
                                        $childfourgrandsonthree_birthday,
                                        $childfourgrandsonthree_deathday,
                                        $childfourgrandsonthree_profession,
                                        $childfourgrandsonthree_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_child_four_grandson_three
                    SET     child_four_grandson_three_family_name  = :childfourgrandsonthree_family_name,
                            child_four_grandson_three_sex          = :childfourgrandsonthree_sex,
                            child_four_grandson_three_birthday     = :childfourgrandsonthree_birthday,
                            child_four_grandson_three_deathday     = :childfourgrandsonthree_deathday,
                            child_four_grandson_three_profession   = :childfourgrandsonthree_profession,
                            child_four_grandson_three_memo         = :childfourgrandsonthree_memo,
                            timestamp                              = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'childfourgrandsonthree_family_name'=> $childfourgrandsonthree_family_name,
                                            'childfourgrandsonthree_sex'        => $childfourgrandsonthree_sex,
                                            'childfourgrandsonthree_birthday'   => $childfourgrandsonthree_birthday,
                                            'childfourgrandsonthree_deathday'   => $childfourgrandsonthree_deathday,
                                            'childfourgrandsonthree_profession' => $childfourgrandsonthree_profession,
                                            'childfourgrandsonthree_memo'       => $childfourgrandsonthree_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 子供４孫３データ挿入（大切な故人）
     *
     * @param childfourgrandsonthree_family_name        名前
     * @param childfourgrandsonthree_sex                性別
     * @param childfourgrandsonthree_birthday           生年月日
     * @param childfourgrandsonthree_deathday           没年月日
     * @param childfourgrandsonthree_img_name           画像名
     * @param childfourgrandsonthree_profession         職業
     * @param childfourgrandsonthree_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertchildfourgrandsonthreedeceaseddata(   $customer_id,
                                                $childfourgrandsonthree_family_name,
                                                $childfourgrandsonthree_sex,
                                                $childfourgrandsonthree_birthday,
                                                $childfourgrandsonthree_deathday,
                                                $childfourgrandsonthree_img_name,
                                                $childfourgrandsonthree_profession,
                                                $childfourgrandsonthree_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_child_four_grandson_three
                    (
                    customer_id ,
                    child_four_grandson_three_family_name ,
                    child_four_grandson_three_sex ,
                    child_four_grandson_three_birthday ,
                    child_four_grandson_three_deathday ,
                    child_four_grandson_three_img_name ,
                    child_four_grandson_three_profession ,
                    child_four_grandson_three_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :childfourgrandsonthree_family_name,
                    :childfourgrandsonthree_sex,
                    :childfourgrandsonthree_birthday,
                    :childfourgrandsonthree_deathday,
                    :childfourgrandsonthree_img_name,
                    :childfourgrandsonthree_profession,
                    :childfourgrandsonthree_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'childfourgrandsonthree_family_name'    => $childfourgrandsonthree_family_name,
                                        'childfourgrandsonthree_sex'            => $childfourgrandsonthree_sex,
                                        'childfourgrandsonthree_birthday'       => $childfourgrandsonthree_birthday,
                                        'childfourgrandsonthree_deathday'       => $childfourgrandsonthree_deathday,
                                        'childfourgrandsonthree_img_name'       => $childfourgrandsonthree_img_name,
                                        'childfourgrandsonthree_profession'     => $childfourgrandsonthree_profession,
                                        'childfourgrandsonthree_memo'           => $childfourgrandsonthree_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//==============================祖父父方==========================================//

    /**
     * 祖父父方データ挿入
     *
     * @param grandfatherfather_family_name        名前
     * @param grandfatherfather_birthday           生年月日
     * @param grandfatherfather_deathday           没年月日
     * @param grandfatherfather_profession         職業
     * @param grandfatherfather_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertgrandfatherfatherdata(   $customer_id,
                                        $grandfatherfather_family_name,
                                        $grandfatherfather_birthday,
                                        $grandfatherfather_deathday,
                                        $grandfatherfather_profession,
                                        $grandfatherfather_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_grandfather_father
                    (
                    customer_id ,
                    grandfather_father_family_name ,
                    grandfather_father_birthday ,
                    grandfather_father_deathday ,
                    grandfather_father_profession ,
                    grandfather_father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandfatherfather_family_name,
                    :grandfatherfather_birthday,
                    :grandfatherfather_deathday,
                    :grandfatherfather_profession,
                    :grandfatherfather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'grandfatherfather_family_name'    => $grandfatherfather_family_name,
                                        'grandfatherfather_birthday'       => $grandfatherfather_birthday,
                                        'grandfatherfather_deathday'       => $grandfatherfather_deathday,
                                        'grandfatherfather_profession'     => $grandfatherfather_profession,
                                        'grandfatherfather_memo'           => $grandfatherfather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 祖父父方データ修正
     *
     * @param grandfatherfather_family_name        名前
     * @param grandfatherfather_birthday           生年月日
     * @param grandfatherfather_deathday           没年月日
     * @param grandfatherfather_profession         職業
     * @param grandfatherfather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changegrandfatherfatherdata(   $customer_id,
                                        $grandfatherfather_family_name,
                                        $grandfatherfather_birthday,
                                        $grandfatherfather_deathday,
                                        $grandfatherfather_profession,
                                        $grandfatherfather_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_grandfather_father
                    SET     grandfather_father_family_name  = :grandfatherfather_family_name,
                            grandfather_father_birthday     = :grandfatherfather_birthday,
                            grandfather_father_deathday     = :grandfatherfather_deathday,
                            grandfather_father_profession   = :grandfatherfather_profession,
                            grandfather_father_memo         = :grandfatherfather_memo,
                            timestamp                       = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'grandfatherfather_family_name'=> $grandfatherfather_family_name,
                                            'grandfatherfather_birthday'   => $grandfatherfather_birthday,
                                            'grandfatherfather_deathday'   => $grandfatherfather_deathday,
                                            'grandfatherfather_profession' => $grandfatherfather_profession,
                                            'grandfatherfather_memo'       => $grandfatherfather_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 祖父父方データ挿入（大切な故人）
     *
     * @param grandfatherfather_family_name        名前
     * @param grandfatherfather_birthday           生年月日
     * @param grandfatherfather_deathday           没年月日
     * @param grandfatherfather_img_name          画像名
     * @param grandfatherfather_profession         職業
     * @param grandfatherfather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertgrandfatherfatherdeceaseddata(   $customer_id,
                                                $grandfatherfather_family_name,
                                                $grandfatherfather_birthday,
                                                $grandfatherfather_deathday,
                                                $grandfatherfather_img_name,
                                                $grandfatherfather_profession,
                                                $grandfatherfather_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_grandfather_father
                    (
                    customer_id ,
                    grandfather_father_family_name ,
                    grandfather_father_birthday ,
                    grandfather_father_deathday ,
                    grandfather_father_img_name ,
                    grandfather_father_profession ,
                    grandfather_father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandfatherfather_family_name,
                    :grandfatherfather_birthday,
                    :grandfatherfather_deathday,
                    :grandfatherfather_img_name,
                    :grandfatherfather_profession,
                    :grandfatherfather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'                      => $customer_id,
                                        'grandfatherfather_family_name'    => $grandfatherfather_family_name,
                                        'grandfatherfather_birthday'       => $grandfatherfather_birthday,
                                        'grandfatherfather_deathday'       => $grandfatherfather_deathday,
                                        'grandfatherfather_img_name'       => $grandfatherfather_img_name,
                                        'grandfatherfather_profession'     => $grandfatherfather_profession,
                                        'grandfatherfather_memo'           => $grandfatherfather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }



//==============================祖母父方==========================================//

    /**
     * 祖母父方データ挿入
     *
     * @param grandfathermather_family_name        名前
     * @param grandfathermather_birthday           生年月日
     * @param grandfathermather_deathday           没年月日
     * @param grandfathermather_profession         職業
     * @param grandfathermather_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertgrandfathermatherdata(   $customer_id,
                                        $grandfathermather_family_name,
                                        $grandfathermather_birthday,
                                        $grandfathermather_deathday,
                                        $grandfathermather_profession,
                                        $grandfathermather_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_grandfather_mather
                    (
                    customer_id ,
                    grandfather_mather_family_name ,
                    grandfather_mather_birthday ,
                    grandfather_mather_deathday ,
                    grandfather_mather_profession ,
                    grandfather_mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandfathermather_family_name,
                    :grandfathermather_birthday,
                    :grandfathermather_deathday,
                    :grandfathermather_profession,
                    :grandfathermather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'grandfathermather_family_name'    => $grandfathermather_family_name,
                                        'grandfathermather_birthday'       => $grandfathermather_birthday,
                                        'grandfathermather_deathday'       => $grandfathermather_deathday,
                                        'grandfathermather_profession'     => $grandfathermather_profession,
                                        'grandfathermather_memo'           => $grandfathermather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 祖母父方データ修正
     *
     * @param grandfathermather_family_name        名前
     * @param grandfathermather_birthday           生年月日
     * @param grandfathermather_deathday           没年月日
     * @param grandfathermather_profession         職業
     * @param grandfathermather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changegrandfathermatherdata(   $customer_id,
                                        $grandfathermather_family_name,
                                        $grandfathermather_birthday,
                                        $grandfathermather_deathday,
                                        $grandfathermather_profession,
                                        $grandfathermather_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_grandfather_mather
                    SET     grandfather_mather_family_name  = :grandfathermather_family_name,
                            grandfather_mather_birthday     = :grandfathermather_birthday,
                            grandfather_mather_deathday     = :grandfathermather_deathday,
                            grandfather_mather_profession   = :grandfathermather_profession,
                            grandfather_mather_memo         = :grandfathermather_memo,
                            timestamp                       = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'grandfathermather_family_name'=> $grandfathermather_family_name,
                                            'grandfathermather_birthday'   => $grandfathermather_birthday,
                                            'grandfathermather_deathday'   => $grandfathermather_deathday,
                                            'grandfathermather_profession' => $grandfathermather_profession,
                                            'grandfathermather_memo'       => $grandfathermather_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 祖母父方データ挿入（大切な故人）
     *
     * @param grandfathermather_family_name        名前
     * @param grandfathermather_birthday           生年月日
     * @param grandfathermather_deathday           没年月日
     * @param grandfathermather_img_name          画像名
     * @param grandfathermather_profession         職業
     * @param grandfathermather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertgrandfathermatherdeceaseddata(   $customer_id,
                                                $grandfathermather_family_name,
                                                $grandfathermather_birthday,
                                                $grandfathermather_deathday,
                                                $grandfathermather_img_name,
                                                $grandfathermather_profession,
                                                $grandfathermather_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_grandfather_mather
                    (
                    customer_id ,
                    grandfather_mather_family_name ,
                    grandfather_mather_birthday ,
                    grandfather_mather_deathday ,
                    grandfather_mather_img_name ,
                    grandfather_mather_profession ,
                    grandfather_mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandfathermather_family_name,
                    :grandfathermather_birthday,
                    :grandfathermather_deathday,
                    :grandfathermather_img_name,
                    :grandfathermather_profession,
                    :grandfathermather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'grandfathermather_family_name'    => $grandfathermather_family_name,
                                        'grandfathermather_birthday'       => $grandfathermather_birthday,
                                        'grandfathermather_deathday'       => $grandfathermather_deathday,
                                        'grandfathermather_img_name'       => $grandfathermather_img_name,
                                        'grandfathermather_profession'     => $grandfathermather_profession,
                                        'grandfathermather_memo'           => $grandfathermather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//==============================祖父母方==========================================//
    /**
     * 祖父母方データ挿入
     *
     * @param grandmatherfather_family_name        名前
     * @param grandmatherfather_birthday           生年月日
     * @param grandmatherfather_deathday           没年月日
     * @param grandmatherfather_profession         職業
     * @param grandmatherfather_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertgrandmatherfatherdata(   $customer_id,
                                        $grandmatherfather_family_name,
                                        $grandmatherfather_birthday,
                                        $grandmatherfather_deathday,
                                        $grandmatherfather_profession,
                                        $grandmatherfather_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_grandmather_father
                    (
                    customer_id ,
                    grandmather_father_family_name ,
                    grandmather_father_birthday ,
                    grandmather_father_deathday ,
                    grandmather_father_profession ,
                    grandmather_father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandmatherfather_family_name,
                    :grandmatherfather_birthday,
                    :grandmatherfather_deathday,
                    :grandmatherfather_profession,
                    :grandmatherfather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'grandmatherfather_family_name'    => $grandmatherfather_family_name,
                                        'grandmatherfather_birthday'       => $grandmatherfather_birthday,
                                        'grandmatherfather_deathday'       => $grandmatherfather_deathday,
                                        'grandmatherfather_profession'     => $grandmatherfather_profession,
                                        'grandmatherfather_memo'           => $grandmatherfather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 祖父母方データ修正
     *
     * @param grandmatherfather_family_name        名前
     * @param grandmatherfather_birthday           生年月日
     * @param grandmatherfather_deathday           没年月日
     * @param grandmatherfather_profession         職業
     * @param grandmatherfather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changegrandmatherfatherdata(   $customer_id,
                                        $grandmatherfather_family_name,
                                        $grandmatherfather_birthday,
                                        $grandmatherfather_deathday,
                                        $grandmatherfather_profession,
                                        $grandmatherfather_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_grandmather_father
                    SET     grandmather_father_family_name  = :grandmatherfather_family_name,
                            grandmather_father_birthday     = :grandmatherfather_birthday,
                            grandmather_father_deathday     = :grandmatherfather_deathday,
                            grandmather_father_profession   = :grandmatherfather_profession,
                            grandmather_father_memo         = :grandmatherfather_memo,
                            timestamp                       = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'grandmatherfather_family_name'=> $grandmatherfather_family_name,
                                            'grandmatherfather_birthday'   => $grandmatherfather_birthday,
                                            'grandmatherfather_deathday'   => $grandmatherfather_deathday,
                                            'grandmatherfather_profession' => $grandmatherfather_profession,
                                            'grandmatherfather_memo'       => $grandmatherfather_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }


    /**
     * 祖母父方データ挿入（大切な故人）
     *
     * @param grandmatherfather_family_name        名前
     * @param grandmatherfather_birthday           生年月日
     * @param grandmatherfather_deathday           没年月日
     * @param grandmatherfather_img_name          画像名
     * @param grandmatherfather_profession         職業
     * @param grandmatherfather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertgrandmatherfatherdeceaseddata(   $customer_id,
                                                $grandmatherfather_family_name,
                                                $grandmatherfather_birthday,
                                                $grandmatherfather_deathday,
                                                $grandmatherfather_img_name,
                                                $grandmatherfather_profession,
                                                $grandmatherfather_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_grandmather_father
                    (
                    customer_id ,
                    grandmather_father_family_name ,
                    grandmather_father_birthday ,
                    grandmather_father_deathday ,
                    grandmather_father_img_name ,
                    grandmather_father_profession ,
                    grandmather_father_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandmatherfather_family_name,
                    :grandmatherfather_birthday,
                    :grandmatherfather_deathday,
                    :grandmatherfather_img_name,
                    :grandmatherfather_profession,
                    :grandmatherfather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'grandmatherfather_family_name'    => $grandmatherfather_family_name,
                                        'grandmatherfather_birthday'       => $grandmatherfather_birthday,
                                        'grandmatherfather_deathday'       => $grandmatherfather_deathday,
                                        'grandmatherfather_img_name'       => $grandmatherfather_img_name,
                                        'grandmatherfather_profession'     => $grandmatherfather_profession,
                                        'grandmatherfather_memo'           => $grandmatherfather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


//==============================祖母母方==========================================//

    /**
     * 祖母母方データ挿入
     *
     * @param grandmathermather_family_name        名前
     * @param grandmathermather_birthday           生年月日
     * @param grandmathermather_deathday           没年月日
     * @param grandmathermather_profession         職業
     * @param grandmathermather_memo               メモ
     * @param customer_id                 ユーザーID
     * @return array                      修正データ
     */
    public function insertgrandmathermatherdata(   $customer_id,
                                        $grandmathermather_family_name,
                                        $grandmathermather_birthday,
                                        $grandmathermather_deathday,
                                        $grandmathermather_profession,
                                        $grandmathermather_memo
                                    )
    {
        try {
        $sql = "    INSERT INTO  t_grandmather_mather
                    (
                    customer_id ,
                    grandmather_mather_family_name ,
                    grandmather_mather_birthday ,
                    grandmather_mather_deathday ,
                    grandmather_mather_profession ,
                    grandmather_mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandmathermather_family_name,
                    :grandmathermather_birthday,
                    :grandmathermather_deathday,
                    :grandmathermather_profession,
                    :grandmathermather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'             => $customer_id,
                                        'grandmathermather_family_name'    => $grandmathermather_family_name,
                                        'grandmathermather_birthday'       => $grandmathermather_birthday,
                                        'grandmathermather_deathday'       => $grandmathermather_deathday,
                                        'grandmathermather_profession'     => $grandmathermather_profession,
                                        'grandmathermather_memo'           => $grandmathermather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }

    /**
     * 祖母母方データ修正
     *
     * @param grandmathermather_family_name        名前
     * @param grandmathermather_birthday           生年月日
     * @param grandmathermather_deathday           没年月日
     * @param grandmathermather_profession         職業
     * @param grandmathermather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function changegrandmathermatherdata(   $customer_id,
                                        $grandmathermather_family_name,
                                        $grandmathermather_birthday,
                                        $grandmathermather_deathday,
                                        $grandmathermather_profession,
                                        $grandmathermather_memo
                                    )
    {
        try {
        $sql = "    UPDATE  t_grandmather_mather
                    SET     grandmather_mather_family_name  = :grandmathermather_family_name,
                            grandmather_mather_birthday     = :grandmathermather_birthday,
                            grandmather_mather_deathday     = :grandmathermather_deathday,
                            grandmather_mather_profession   = :grandmathermather_profession,
                            grandmather_mather_memo         = :grandmathermather_memo,
                            timestamp                       = NOW( )
                    WHERE   customer_id = :customer_id
                    limit   1 ";

        $this->_db->fetchRow($sql, array(   'customer_id'       => $customer_id,
                                            'grandmathermather_family_name'=> $grandmathermather_family_name,
                                            'grandmathermather_birthday'   => $grandmathermather_birthday,
                                            'grandmathermather_deathday'   => $grandmathermather_deathday,
                                            'grandmathermather_profession' => $grandmathermather_profession,
                                            'grandmathermather_memo'       => $grandmathermather_memo
                                        ));
        } catch(Exception $e) {

            // var_dump($e->getMessage());
        }
            return $customer_id;
    }

    /**
     * 祖母母方データ挿入（大切な故人）
     *
     * @param grandmathermather_family_name        名前
     * @param grandmathermather_birthday           生年月日
     * @param grandmathermather_deathday           没年月日
     * @param grandmathermather_img_name          画像名
     * @param grandmathermather_profession         職業
     * @param grandmathermather_memo               メモ
     * @param customer_id               ユーザーID
     * @return array                    修正データ
     */
    public function insertgrandmathermatherdeceaseddata(   $customer_id,
                                                $grandmathermather_family_name,
                                                $grandmathermather_birthday,
                                                $grandmathermather_deathday,
                                                $grandmathermather_img_name,
                                                $grandmathermather_profession,
                                                $grandmathermather_memo
                                            )
    {
        try {
        $sql = "    INSERT INTO  t_grandmather_mather
                    (
                    customer_id ,
                    grandmather_mather_family_name ,
                    grandmather_mather_birthday ,
                    grandmather_mather_deathday ,
                    grandmather_mather_img_name ,
                    grandmather_mather_profession ,
                    grandmather_mather_memo ,
                    entry_datetime ,
                    timestamp
                    )
                    VALUES
                    (
                    :customer_id ,
                    :grandmathermather_family_name,
                    :grandmathermather_birthday,
                    :grandmathermather_deathday,
                    :grandmathermather_img_name,
                    :grandmathermather_profession,
                    :grandmathermather_memo,
                    NOW( ),
                    NOW( )
                    );";

        $this->_db->query($sql, array(  'customer_id'           => $customer_id,
                                        'grandmathermather_family_name'    => $grandmathermather_family_name,
                                        'grandmathermather_birthday'       => $grandmathermather_birthday,
                                        'grandmathermather_deathday'       => $grandmathermather_deathday,
                                        'grandmathermather_img_name'       => $grandmathermather_img_name,
                                        'grandmathermather_profession'     => $grandmathermather_profession,
                                        'grandmathermather_memo'           => $grandmathermather_memo
                                    ));
        } catch(Exception $e) {

            return false;
        }
            return true;
    }


/** ================ デ  ー  タ  削　　除 ====================== */

    /**
     * 父親のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletefatherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_father WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 母親のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletematherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_mather WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }


    /**
     * 配偶者のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletespousedata($customer_id) {
        try {
            $sql = "DELETE FROM t_spouse WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildonedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildtwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供４のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildfourdata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_four WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供１孫１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildonegrandsononedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_one_grandson_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供１孫２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildonegrandsontwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_one_grandson_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }


    /**
     * 子供１孫３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildonegrandsonthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_one_grandson_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供２孫１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildtwograndsononedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_two_grandson_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供２孫２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildtwograndsontwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_two_grandson_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供２孫３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildtwograndsonthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_two_grandson_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供３孫１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildthreegrandsononedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_three_grandson_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供３孫２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildthreegrandsontwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_three_grandson_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供３孫３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildthreegrandsonthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_three_grandson_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供４孫１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildfourgrandsononedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_four_grandson_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供４孫２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildfourgrandsontwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_four_grandson_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 子供４孫３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletechildfourgrandsonthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_child_four_grandson_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 兄弟姉妹１のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletebrotheronedata($customer_id) {
        try {
            $sql = "DELETE FROM t_brother_one WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 兄弟姉妹２のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletebrothertwodata($customer_id) {
        try {
            $sql = "DELETE FROM t_brother_two WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }


    /**
     * 兄弟姉妹３のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletebrotherthreedata($customer_id) {
        try {
            $sql = "DELETE FROM t_brother_three WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 祖父（父方）のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletegrandfatherfatherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_grandfather_father WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 祖母（父方）のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletegrandfathermatherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_grandfather_mather WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 祖父（母方）のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletegrandmatherfatherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_grandmather_father WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 祖母（母方）のデータを削除する
     * @param   String  $customer_id       ユーザーID
     * @return  boolean true:正常終了 false:エラー
     */
    public function deletegrandmathermatherdata($customer_id) {
        try {
            $sql = "DELETE FROM t_grandmather_mather WHERE customer_id = :customer_id";
            $this->_db->query($sql, array('customer_id' => $customer_id));
        } catch(Exception $e) {
            return false;
        }
        return true;
    }

}
