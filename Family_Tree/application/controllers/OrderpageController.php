<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Registry.php';
require_once 'Zend/File/Transfer/Adapter/Http.php';
require_once 'Zend/File/Transfer.php';
require_once 'Zend/Session.php';
require_once 'Zend/Mail.php';
require_once 'Zend/Mail/Transport/Smtp.php';
require_once 'Zend/Paginator.php';
require_once 'Zend/Db.php';
require_once 'Zend/Json.php';
require_once 'Zend/Pdf.php';

require_once 'Zend/Paginator/Adapter/Array.php';

require_once '../../Family_Tree/application/models/orderpageModel.php';
require_once '../../Family_Tree/application/smarty/Zend_View_Smarty.class.php';
require_once '../../Family_Tree/application/common/comEncryption.php';
require_once '../../Family_Tree/application/common/comConst.php';
require_once '../../Family_Tree/application/common/common.php';



class OrderpageController extends Zend_Controller_Action {
    private $_config;                   // 設定情報
    private $_session;                  // セッション
    private $_view;                     // view

    private $_morticianId;              //ポイントシステム用葬儀社ID

    /**
     * 初期化処理
     *
     */
    public function init() {
        /* ========== 設定情報を読み取り ========== */
        $this->_config = new Zend_Config_Ini('../../Family_Tree/application/configs/application.ini', null);
        // データベース関連の設定をレジストリに登録
        Zend_Registry::set('database', $this->_config->datasource->database->toArray());

        /* ========== セッション設定 ========== */
        Zend_Session::start();
        $this->_session = new Zend_Session_Namespace(comConst::SESSION);
        $this->_session->setExpirationSeconds(comConst::SESSION_TIME);

        /* ========== Smarty設定 ========== */
        // Zend_View_Smartyを生成してviewを上書き
        $this->_view = new Zend_View_Smarty();
        $this->_view->setScriptPath(comConst::SMARTY_TEMP_PATH.'templates');
        $this->_view->setCompilePath(comConst::SMARTY_TEMP_PATH.'templates_c');
    }

    /**
     * セッションを初期化
     */
    private function initSession() {
        /* ========== セッションの値を初期化 ========== */

    }

/**  　　　　　　　テ　ス　ト　環　境　　　　　　　　　　*/

    //テスト
    public function urlconnecttestAction(){
        echo "できた";
    }


    public function testarrayAction()
    {

     try{
     	// orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

    	$userid = $this->getRequest()->getPost('userid');
     	$username = $this->getRequest()->getPost('username');

        //一度データを削除
        $orderpageModel->deletetestarraydata($userid);

     	//受け取ったueridと名前（配列）をDBに格納
     	$result = $orderpageModel->inserttestarraydata($userid,$username);

     	}catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
     	}
    }

    //ファイルアップテスト(フォームに遷移)
    public function testfileupAction()
    {
    echo $this->_view->render('fileup.tpl');
    }

    //ファイルアップテスト(実行プログラム)
    public function testfileupimgAction()
    {
        $userid = $this->getRequest()->getPost('userid');
        echo $userid;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //選択されている場合、フラグを1にする
            // $noticeInfo['image_existence_flg'] = IMAGE_EXISTENCE_FLG_YES;
            //一時保存用ファイル名を生成し、既にファイルが存在しないか重複チェック
            echo "string";
            do {
                //一時保存用ファイル名を生成
                $fileName = $userid . ".jpg";
                $uploadFile = comConst::TEMP_SELF_DIR . $fileName;
            } while(file_exists($uploadFile));
            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
            exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
            chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
            $this->_session->image_path = $uploadFile;
        }
    }


    /**
     * getimgsizeAttr
     * ：画像ファイルの高さと幅を取得して、width、height属性を返す
     * @param type $imagePath 画像のパス
     * @return string imgタグのwidth、height属性
     */

    public function getimgsizeAttr($imgpath){
    //アップロードされた画像情報を取り出す
        // $imgpath = comConst::TEMP_FATHER_DIR . "eRH7jQs5.jpg";
        $image_size= getimagesize($imgpath);

        //アップロードされた画像の幅と高さを取り出す
        $width = $image_size[0];
        $height = $image_size[1];

        //サムネイル画像の幅と高さを決める
        $width_s = 220;
        $height_s = round($width_s*$height/$width);

        $imageSizeAttr = 'width:' . $width_s . '; ' . 'height:' . $height_s . ';';

    }


       /**
     * getImageSizeAttr（テスト）
     * ：画像ファイルの高さと幅を取得して、width、height属性を返す
     * @param type $imagePath 画像のパス
     * @return string imgタグのwidth、height属性
     */
    public function getImageSizeAttr($imagePath) {
        $imageInfo = getimagesize($imagePath);
        if ($imageInfo) {
            $imageSizeAttr = 'width=' . '"' . $imageInfo[0] * 0.35 . '" ' . 'height=' . '"' . $imageInfo[1] * 0.35 . '"';
        } else {
            $imageSizeAttr = '';
        }
        return $imageSizeAttr;
    }


/**　　　　　　　　　 本　　番　　環　　境　　　　　　　　　　　　*/

    //現在時刻取得
    public function nowDate(){
        return (date('Y-m-d'));
    }

    //画像クエリー用、ランダムな数字生成
    public function urlquery(){
        $url_query = mt_rand(000000000, 999999999);
        return $url_query;
    }

    //大切な故人をＤＢに格納
    public function deceasedlistarrayinsertAction()
    {

     try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        $userid         = $this->getRequest()->getPost('userid');
        $username       = $this->getRequest()->getPost('username');
        $userbirthday   = $this->getRequest()->getPost('userbirthday');
        $userdeathday   = $this->getRequest()->getPost('userdeathday');
        $userphotopath  = $this->getRequest()->getPost('userphotopath');

        //受け取ったueridと名前（配列）をDBに格納
        $result = $orderpageModel->insertdeceasedlistarray($userid,$username,$userbirthday,$userdeathday,$userphotopath);

        }catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
        }
    }

    //大切な故人データをＤＢより削除
    public function deceasedlistarraydeleteAction()
    {

     try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post値取得
        $userid = $this->getRequest()->getPost('userid');


        //一度データを削除
        $orderpageModel->deletetestarraydata($userid);


        }catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
        }
    }

    //トップぺージに遷移
    public function entryAction(){

        try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        // GET or POST で処理を分ける
        if($_SERVER["REQUEST_METHOD"] == "GET"){
        // フォームからGETによって要求された場合
        $userid = $this->getRequest()->getQuery('userid');
        $this->_session->user_self_id      = $userid;

        $this->_session->customer_id        = $userid;
        $this->_view->customerId            = $this->_session->customer_id;

        $username = $this->getRequest()->getQuery('username');
        $this->_session->self_family_name     = $username;
        $this->_view->selfFamilyName          = $this->_session->self_family_name;

        $userbirthday = $this->getRequest()->getQuery('userbirthday');
        $this->_session->self_birthday        = $userbirthday;
        $this->_view->selfBirthday            = $this->_session->self_birthday;
        // echo "string";

        }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        // フォームからPOSTによって要求された場合
        //useridを取得
        $userid = $this->getRequest()->getPost('userid');
        $this->_session->user_self_id      = $userid;

        $this->_session->customer_id        = $userid;
        $this->_view->customerId            = $this->_session->customer_id;

        $username = $this->getRequest()->getPost('username');
        $this->_session->self_family_name     = $username;
        $this->_view->selfFamilyName          = $this->_session->self_family_name;

        $userbirthday = $this->getRequest()->getPost('userbirthday');
        $this->_session->self_birthday        = $userbirthday;
        $this->_view->selfBirthday            = $this->_session->self_birthday;
        }


        //データを更新する
        // $result                             = $orderpageModel->getselfid($userid);
        $result_father                      = $orderpageModel->getfatherid($userid);
        $result_mather                      = $orderpageModel->getmatherid($userid);
        $result_spouse                      = $orderpageModel->getspouseid($userid);
        $result_brotherone                  = $orderpageModel->getbrotheroneid($userid);
        $result_brothertwo                  = $orderpageModel->getbrothertwoid($userid);
        $result_brotherthree                = $orderpageModel->getbrotherthreeid($userid);
        $result_childone                    = $orderpageModel->getchildoneid($userid);
        $result_childtwo                    = $orderpageModel->getchildtwoid($userid);
        $result_childthree                  = $orderpageModel->getchildthreeid($userid);
        $result_childfour                   = $orderpageModel->getchildfourid($userid);

        $result_grandfatherfather           = $orderpageModel->getgrandfatherfatherid($userid);
        $result_grandfathermather           = $orderpageModel->getgrandfathermatherid($userid);
        $result_grandmatherfather           = $orderpageModel->getgrandmatherfatherid($userid);
        $result_grandmathermather           = $orderpageModel->getgrandmathermatherid($userid);

        $result_childonegrandsonone         = $orderpageModel->getchildonegrandsononeid($userid);
        $result_childonegrandsontwo         = $orderpageModel->getchildonegrandsontwoid($userid);
        $result_childonegrandsonthree       = $orderpageModel->getchildonegrandsonthreeid($userid);
        $result_childtwograndsonone         = $orderpageModel->getchildtwograndsononeid($userid);
        $result_childtwograndsontwo         = $orderpageModel->getchildtwograndsontwoid($userid);
        $result_childtwograndsonthree       = $orderpageModel->getchildtwograndsonthreeid($userid);
        $result_childthreegrandsonone       = $orderpageModel->getchildthreegrandsononeid($userid);
        $result_childthreegrandsontwo       = $orderpageModel->getchildthreegrandsontwoid($userid);
        $result_childthreegrandsonthree     = $orderpageModel->getchildthreegrandsonthreeid($userid);
        $result_childfourgrandsonone        = $orderpageModel->getchildfourgrandsononeid($userid);
        $result_childfourgrandsontwo        = $orderpageModel->getchildfourgrandsontwoid($userid);
        $result_childfourgrandsonthree      = $orderpageModel->getchildfourgrandsonthreeid($userid);

        $result_deceased                    = $orderpageModel->getdeceasedid($userid);


            //自分のデータが空だったら
            if(empty($result)){

                //自分データをインサート
                $orderpageModel->initselfdata($userid,$username,$userbirthday);
                $result= $orderpageModel->getselfid($userid);

            }else{
                $result= $orderpageModel->getselfid($userid);
            }

        	//自分以外すべてのデータが空だったら
        	if(empty($result_father)
                &&empty($result_mather)
                &&empty($result_spouse)
                &&empty($result_brotherone)
                &&empty($result_brothertwo)
                &&empty($result_brotherthree)
                &&empty($result_childone)
                &&empty($result_childtwo)
                &&empty($result_childthree)
                &&empty($result_childfour)
                &&empty($result_grandfatherfather)
                &&empty($result_grandfathermather)
                &&empty($result_grandmatherfather)
                &&empty($result_grandmathermather)
                &&empty($result_childonegrandsonone)
                &&empty($result_childonegrandsontwo)
                &&empty($result_childonegrandsonthree)
                &&empty($result_childtwograndsonone)
                &&empty($result_childtwograndsontwo)
                &&empty($result_childtwograndsonthree)
                &&empty($result_childthreegrandsonone)
                &&empty($result_childthreegrandsontwo)
                &&empty($result_childthreegrandsonthree)
                &&empty($result_childfourgrandsonone)
                &&empty($result_childfourgrandsontwo)
                &&empty($result_childfourgrandsonthree)
                ){

            $self_family_name     = $result['self_family_name'];
            $self_birthday        = $result['self_birthday'];
            $self_deathday        = $result['self_deathday'];
            $self_profession      = $result['self_profession'];
            $self_memo            = $result['self_memo'];

            $this->_view->customerId              = $this->_session->customer_id;

            $this->_session->self_family_name     = $self_family_name;
            $this->_view->selfFamilyName          = $this->_session->self_family_name;

            $this->_session->self_birthday        = $self_birthday;
            $this->_view->selfBirthday            = $this->_session->self_birthday;

            $this->_session->self_deathday        = $self_deathday;
            $this->_view->selfDeathday            = $this->_session->self_deathday;

            $this->_session->self_profession      = $self_profession;
            $this->_view->selfProfession          = $this->_session->self_profession;

            $this->_session->self_memo            = $self_memo;
            $this->_view->selfMemo                = $this->_session->self_memo;

            $url_local_self = $this->readimage($userid);
            $this->_view->urlocalself         = $url_local_self;

            //画像があるか確認
            $fileName = $userid . ".jpg";
            $uploadFile = comConst::TEMP_SELF_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->self_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img          = $this->urlquery();
                $this->_view->urlquery_img_thumb     = $this->urlquery();
            }else{
                $this->_view->self_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            //大切な故人データ用
            $this->_view->deceased_name_list               = $result_deceased;

            //自分のみの画面に遷移
            echo $this->_view->render('family_tree_self.tpl');

        	}else{

            //自分データ
            if(!empty($result)){
            $customer_id        = $result['customer_id'];
            $self_family_name   = $result['self_family_name'];
            $self_birthday      = $result['self_birthday'];
            $self_deathday      = $result['self_deathday'];
            $self_profession    = $result['self_profession'];
            $self_memo          = $result['self_memo'];

            $this->_session->customer_id        = $customer_id;
            $this->_view->customerId            = $this->_session->customer_id;

            $this->_session->self_family_name   = $self_family_name;
            $this->_view->selfFamilyName        = $this->_session->self_family_name;

            $this->_session->self_birthday      = $self_birthday;
            $this->_view->selfBirthday          = $this->_session->self_birthday;

            $this->_session->self_deathday      = $self_deathday;
            $this->_view->selfDeathday          = $this->_session->self_deathday;

            $this->_session->self_profession    = $self_profession;
            $this->_view->selfProfession        = $this->_session->self_profession;

            $this->_session->self_memo          = $self_memo;
            $this->_view->selfMemo              = $this->_session->self_memo;

            //画像リンク生成
            $url_local_self = $this->readimage($customer_id);
            $this->_view->urlocalself           = $url_local_self;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_SELF_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->self_img              = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img          = $this->urlquery();
                $this->_view->urlquery_img_thumb    = $this->urlquery();

            }else{
                $this->_view->self_img              = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //父親データ
            if(!empty($result_father)){
            $father_family_id       = $result_father['customer_id'];
            $father_family_name     = $result_father['father_family_name'];
            $father_birthday        = $result_father['father_birthday'];
            $father_deathday        = $result_father['father_deathday'];
            $father_img_name        = $result_father['father_img_name'];
            $father_profession      = $result_father['father_profession'];
            $father_memo            = $result_father['father_memo'];

            $this->_session->father_family_id       = $father_family_id;
            $this->_view->fatherFamilyId            = $this->_session->father_family_id;

            $this->_session->father_family_name     = $father_family_name;
            $this->_view->fatherFamilyName          = $this->_session->father_family_name;

            $this->_session->father_birthday        = $father_birthday;
            $this->_view->fatherBirthday            = $this->_session->father_birthday;

            $this->_session->father_deathday        = $father_deathday;
            $this->_view->fatherDeathday            = $this->_session->father_deathday;

            $this->_session->father_img_name        = $father_img_name;
            $this->_view->fatherImgName             = $this->_session->father_img_name;

            $this->_session->father_profession      = $father_profession;
            $this->_view->fatherProfession          = $this->_session->father_profession;

            $this->_session->father_memo            = $father_memo;
            $this->_view->fatherMemo                = $this->_session->father_memo;

            $url_local_father = $this->readimagefather($customer_id);
            $this->_view->urlocalfather         = $url_local_father;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_FATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->father_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_father           = $this->urlquery();
                $this->_view->urlquery_img_thumb_father     = $this->urlquery();
            }else{
                if (!empty($father_img_name)) {
                    $this->_view->father_img                = 2;
                }else{
                    $this->_view->father_img                = comConst::IMAGE_EXISTENCE_FLG_NO;
                }
            }

            }

            //母親データ
            if(!empty($result_mather)){
            $mather_family_id     = $result_mather['customer_id'];
            $mather_family_name   = $result_mather['mather_family_name'];
            $mather_birthday      = $result_mather['mather_birthday'];
            $mather_deathday      = $result_mather['mather_deathday'];
            $mather_profession    = $result_mather['mather_profession'];
            $mather_memo          = $result_mather['mather_memo'];

            $this->_session->mather_family_id       = $mather_family_id;
            $this->_view->matherFamilyId            = $this->_session->mather_family_id;

            $this->_session->mather_family_name = $mather_family_name;
            $this->_view->matherFamilyName      = $this->_session->mather_family_name;

            $this->_session->mather_birthday    = $mather_birthday;
            $this->_view->matherBirthday        = $this->_session->mather_birthday;

            $this->_session->mather_deathday    = $mather_deathday;
            $this->_view->matherDeathday        = $this->_session->mather_deathday;

            $this->_session->mather_img_name        = $mather_img_name;
            $this->_view->matherImgName             = $this->_session->mather_img_name;

            $this->_session->mather_profession  = $mather_profession;
            $this->_view->matherProfession      = $this->_session->mather_profession;

            $this->_session->mather_memo        = $mather_memo;
            $this->_view->matherMemo            = $this->_session->mather_memo;

            $url_local_mather = $this->readimagemather($customer_id);
            $this->_view->urlocalmather         = $url_local_mather;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_MATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->mather_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_mather           = $this->urlquery();
                $this->_view->urlquery_img_thumb_mather     = $this->urlquery();
            }else{
                if (!empty($mather_img_name)) {
                    $this->_view->mather_img                = 2;
                }else{
                    $this->_view->mather_img                = comConst::IMAGE_EXISTENCE_FLG_NO;
                }
            }

            }

            //　配偶者データ
            if(!empty($result_spouse)){
            $spouse_family_id     = $result_spouse['customer_id'];
            $spouse_family_name   = $result_spouse['spouse_family_name'];
            $spouse_birthday      = $result_spouse['spouse_birthday'];
            $spouse_deathday      = $result_spouse['spouse_deathday'];
            $spouse_profession    = $result_spouse['spouse_profession'];
            $spouse_memo          = $result_spouse['spouse_memo'];

            $this->_session->spouse_family_id       = $spouse_family_id;
            $this->_view->spouseFamilyId            = $this->_session->spouse_family_id;

            $this->_session->spouse_family_name = $spouse_family_name;
            $this->_view->spouseFamilyName      = $this->_session->spouse_family_name;

            $this->_session->spouse_birthday    = $spouse_birthday;
            $this->_view->spouseBirthday        = $this->_session->spouse_birthday;

            $this->_session->spouse_deathday    = $spouse_deathday;
            $this->_view->spouseDeathday        = $this->_session->spouse_deathday;

            $this->_session->spouse_profession  = $spouse_profession;
            $this->_view->spouseProfession      = $this->_session->spouse_profession;

            $this->_session->spouse_memo        = $spouse_memo;
            $this->_view->spouseMemo            = $this->_session->spouse_memo;

            $url_local_spouse = $this->readimagespouse($customer_id);
            $this->_view->urlocalspouse         = $url_local_spouse;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_SPOUSE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->spouse_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_spouse           = $this->urlquery();
                $this->_view->urlquery_img_thumb_spouse     = $this->urlquery();
            }else{
                $this->_view->spouse_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　兄弟姉妹１データ
            if(!empty($result_brotherone)){
            $brotherone_family_id       = $result_brotherone['customer_id'];
            $brotherone_family_name     = $result_brotherone['brother_one_family_name'];
            $brotherone_sex             = $result_brotherone['brother_one_sex'];
            $brotherone_birthday        = $result_brotherone['brother_one_birthday'];
            $brotherone_deathday        = $result_brotherone['brother_one_deathday'];
            $brotherone_profession      = $result_brotherone['brother_one_profession'];
            $brotherone_memo            = $result_brotherone['brother_one_memo'];

            $this->_session->brotherone_family_id       = $brotherone_family_id;
            $this->_view->brotheroneFamilyId            = $this->_session->brotherone_family_id;

            $this->_session->brotherone_family_name     = $brotherone_family_name;
            $this->_view->brotheroneFamilyName          = $this->_session->brotherone_family_name;

            //性別セレクト設定
            $this->_session->brotherone_sex             = $brotherone_sex;

            if($brotherone_sex == '男性'){
                $this->_view->brotheroneMan = "selected";
            }else{
                $this->_view->brotheroneMan = "";
            }

            if($brotherone_sex == '女性'){
                $this->_view->brotheroneWoman = "selected";
            }else{
                $this->_view->brotheroneWoman = "";
            }

            $this->_session->brotherone_birthday        = $brotherone_birthday;
            $this->_view->brotheroneBirthday            = $this->_session->brotherone_birthday;

            $this->_session->brotherone_deathday        = $brotherone_deathday;
            $this->_view->brotheroneDeathday            = $this->_session->brotherone_deathday;

            $this->_session->brotherone_profession      = $brotherone_profession;
            $this->_view->brotheroneProfession          = $this->_session->brotherone_profession;

            $this->_session->brotherone_memo            = $brotherone_memo;
            $this->_view->brotheroneMemo                = $this->_session->brotherone_memo;

            $url_local_brotherone = $this->readimagebrotherone($customer_id);
            $this->_view->urlocalbrotherone             = $url_local_brotherone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_BROTHERONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->brotherone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_brotherone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_brotherone     = $this->urlquery();
            }else{
                $this->_view->brotherone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　兄弟姉妹２データ
            if(!empty($result_brothertwo)){
            $brothertwo_family_id       = $result_brothertwo['customer_id'];
            $brothertwo_family_name     = $result_brothertwo['brother_two_family_name'];
            $brothertwo_sex             = $result_brothertwo['brother_two_sex'];
            $brothertwo_birthday        = $result_brothertwo['brother_two_birthday'];
            $brothertwo_deathday        = $result_brothertwo['brother_two_deathday'];
            $brothertwo_profession      = $result_brothertwo['brother_two_profession'];
            $brothertwo_memo            = $result_brothertwo['brother_two_memo'];

            $this->_session->brothertwo_family_id       = $brothertwo_family_id;
            $this->_view->brothertwoFamilyId            = $this->_session->brothertwo_family_id;

            $this->_session->brothertwo_family_name     = $brothertwo_family_name;
            $this->_view->brothertwoFamilyName          = $this->_session->brothertwo_family_name;

            //性別セレクト設定
            $this->_session->brothertwo_sex             = $brothertwo_sex;

            if($brothertwo_sex == '男性'){
                $this->_view->brothertwoMan = "selected";
            }else{
                $this->_view->brothertwoMan = "";
            }

            if($brothertwo_sex == '女性'){
                $this->_view->brothertwoWoman = "selected";
            }else{
                $this->_view->brothertwoWoman = "";
            }

            $this->_session->brothertwo_birthday        = $brothertwo_birthday;
            $this->_view->brothertwoBirthday            = $this->_session->brothertwo_birthday;

            $this->_session->brothertwo_deathday        = $brothertwo_deathday;
            $this->_view->brothertwoDeathday            = $this->_session->brothertwo_deathday;

            $this->_session->brothertwo_profession      = $brothertwo_profession;
            $this->_view->brothertwoProfession          = $this->_session->brothertwo_profession;

            $this->_session->brothertwo_memo            = $brothertwo_memo;
            $this->_view->brothertwoMemo                = $this->_session->brothertwo_memo;

            $url_local_brothertwo = $this->readimagebrothertwo($customer_id);
            $this->_view->urlocalbrothertwo             = $url_local_brothertwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_BROTHERTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->brothertwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_brothertwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_brothertwo     = $this->urlquery();
            }else{
                $this->_view->brothertwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　兄弟姉妹３データ
            if(!empty($result_brotherthree)){
            $brotherthree_family_id       = $result_brotherthree['customer_id'];
            $brotherthree_family_name     = $result_brotherthree['brother_three_family_name'];
            $brotherthree_sex             = $result_brotherthree['brother_three_sex'];
            $brotherthree_birthday        = $result_brotherthree['brother_three_birthday'];
            $brotherthree_deathday        = $result_brotherthree['brother_three_deathday'];
            $brotherthree_profession      = $result_brotherthree['brother_three_profession'];
            $brotherthree_memo            = $result_brotherthree['brother_three_memo'];

            $this->_session->brotherthree_family_id       = $brotherthree_family_id;
            $this->_view->brotherthreeFamilyId            = $this->_session->brotherthree_family_id;

            $this->_session->brotherthree_family_name     = $brotherthree_family_name;
            $this->_view->brotherthreeFamilyName          = $this->_session->brotherthree_family_name;

            //性別セレクト設定
            $this->_session->brotherthree_sex             = $brotherthree_sex;

            if($brotherthree_sex == '男性'){
                $this->_view->brotherthreeMan = "selected";
            }else{
                $this->_view->brotherthreeMan = "";
            }

            if($brotherthree_sex == '女性'){
                $this->_view->brotherthreeWoman = "selected";
            }else{
                $this->_view->brotherthreeWoman = "";
            }

            $this->_session->brotherthree_birthday        = $brotherthree_birthday;
            $this->_view->brotherthreeBirthday            = $this->_session->brotherthree_birthday;

            $this->_session->brotherthree_deathday        = $brotherthree_deathday;
            $this->_view->brotherthreeDeathday            = $this->_session->brotherthree_deathday;

            $this->_session->brotherthree_profession      = $brotherthree_profession;
            $this->_view->brotherthreeProfession          = $this->_session->brotherthree_profession;

            $this->_session->brotherthree_memo            = $brotherthree_memo;
            $this->_view->brotherthreeMemo                = $this->_session->brotherthree_memo;

            $url_local_brotherthree = $this->readimagebrotherthree($customer_id);
            $this->_view->urlocalbrotherthree             = $url_local_brotherthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_BROTHERTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->brotherthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_brotherthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_brotherthree     = $this->urlquery();
            }else{
                $this->_view->brotherthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供１データ
            if(!empty($result_childone)){
            $childone_family_id       = $result_childone['customer_id'];
            $childone_family_name     = $result_childone['child_one_family_name'];
            $childone_sex             = $result_childone['child_one_sex'];
            $childone_spouse_name     = $result_childone['child_one_spouse_name'];
            $childone_birthday        = $result_childone['child_one_birthday'];
            $childone_deathday        = $result_childone['child_one_deathday'];
            $childone_profession      = $result_childone['child_one_profession'];
            $childone_memo            = $result_childone['child_one_memo'];

            $this->_session->childone_family_id       = $childone_family_id;
            $this->_view->childoneFamilyId            = $this->_session->childone_family_id;

            $this->_session->childone_family_name     = $childone_family_name;
            $this->_view->childoneFamilyName          = $this->_session->childone_family_name;

            //性別セレクト設定
            $this->_session->childone_sex             = $childone_sex;

            if($childone_sex == '男性'){
                $this->_view->childoneMan = "selected";
            }else{
                $this->_view->childoneMan = "";
            }

            if($childone_sex == '女性'){
                $this->_view->childoneWoman = "selected";
            }else{
                $this->_view->childoneWoman = "";
            }

            $this->_session->childone_spouse_name     = $childone_spouse_name;
            $this->_view->childoneSpouseName          = $this->_session->childone_spouse_name;

            $this->_session->childone_birthday        = $childone_birthday;
            $this->_view->childoneBirthday            = $this->_session->childone_birthday;

            $this->_session->childone_deathday        = $childone_deathday;
            $this->_view->childoneDeathday            = $this->_session->childone_deathday;

            $this->_session->childone_profession      = $childone_profession;
            $this->_view->childoneProfession          = $this->_session->childone_profession;

            $this->_session->childone_memo            = $childone_memo;
            $this->_view->childoneMemo                = $this->_session->childone_memo;

            $url_local_childone = $this->readimagechildone($customer_id);
            $this->_view->urlocalchildone         = $url_local_childone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childone     = $this->urlquery();
            }else{
                $this->_view->childone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供２データ
            if(!empty($result_childtwo)){
            $childtwo_family_id       = $result_childtwo['customer_id'];
            $childtwo_family_name     = $result_childtwo['child_two_family_name'];
            $childtwo_sex             = $result_childtwo['child_two_sex'];
            $childtwo_spouse_name     = $result_childtwo['child_two_spouse_name'];
            $childtwo_birthday        = $result_childtwo['child_two_birthday'];
            $childtwo_deathday        = $result_childtwo['child_two_deathday'];
            $childtwo_profession      = $result_childtwo['child_two_profession'];
            $childtwo_memo            = $result_childtwo['child_two_memo'];

            $this->_session->childtwo_family_id       = $childtwo_family_id;
            $this->_view->childtwoFamilyId            = $this->_session->childtwo_family_id;

            $this->_session->childtwo_family_name     = $childtwo_family_name;
            $this->_view->childtwoFamilyName          = $this->_session->childtwo_family_name;

            //性別セレクト設定
            $this->_session->childtwo_sex             = $childtwo_sex;

            if($childtwo_sex == '男性'){
                $this->_view->childtwoMan = "selected";
            }else{
                $this->_view->childtwoMan = "";
            }

            if($childtwo_sex == '女性'){
                $this->_view->childtwoWoman = "selected";
            }else{
                $this->_view->childtwoWoman = "";
            }

            $this->_session->childtwo_spouse_name     = $childtwo_spouse_name;
            $this->_view->childtwoSpouseName          = $this->_session->childtwo_spouse_name;

            $this->_session->childtwo_birthday        = $childtwo_birthday;
            $this->_view->childtwoBirthday            = $this->_session->childtwo_birthday;

            $this->_session->childtwo_deathday        = $childtwo_deathday;
            $this->_view->childtwoDeathday            = $this->_session->childtwo_deathday;

            $this->_session->childtwo_profession      = $childtwo_profession;
            $this->_view->childtwoProfession          = $this->_session->childtwo_profession;

            $this->_session->childtwo_memo            = $childtwo_memo;
            $this->_view->childtwoMemo                = $this->_session->childtwo_memo;

            $url_local_childtwo = $this->readimagechildtwo($customer_id);
            $this->_view->urlocalchildtwo         = $url_local_childtwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childtwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childtwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childtwo     = $this->urlquery();
            }else{
                $this->_view->childtwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供３データ
            if(!empty($result_childthree)){
            $childthree_family_id       = $result_childthree['customer_id'];
            $childthree_family_name     = $result_childthree['child_three_family_name'];
            $childthree_sex             = $result_childthree['child_three_sex'];
            $childthree_spouse_name     = $result_childthree['child_three_spouse_name'];
            $childthree_birthday        = $result_childthree['child_three_birthday'];
            $childthree_deathday        = $result_childthree['child_three_deathday'];
            $childthree_profession      = $result_childthree['child_three_profession'];
            $childthree_memo            = $result_childthree['child_three_memo'];

            $this->_session->childthree_family_id       = $childthree_family_id;
            $this->_view->childthreeFamilyId            = $this->_session->childthree_family_id;

            $this->_session->childthree_family_name     = $childthree_family_name;
            $this->_view->childthreeFamilyName          = $this->_session->childthree_family_name;

            //性別セレクト設定
            $this->_session->childthree_sex             = $childthree_sex;

            if($childthree_sex == '男性'){
                $this->_view->childthreeMan = "selected";
            }else{
                $this->_view->childthreeMan = "";
            }

            if($childthree_sex == '女性'){
                $this->_view->childthreeWoman = "selected";
            }else{
                $this->_view->childthreeWoman = "";
            }

            $this->_session->childthree_spouse_name     = $childthree_spouse_name;
            $this->_view->childthreeSpouseName          = $this->_session->childthree_spouse_name;

            $this->_session->childthree_birthday        = $childthree_birthday;
            $this->_view->childthreeBirthday            = $this->_session->childthree_birthday;

            $this->_session->childthree_deathday        = $childthree_deathday;
            $this->_view->childthreeDeathday            = $this->_session->childthree_deathday;

            $this->_session->childthree_profession      = $childthree_profession;
            $this->_view->childthreeProfession          = $this->_session->childthree_profession;

            $this->_session->childthree_memo            = $childthree_memo;
            $this->_view->childthreeMemo                = $this->_session->childthree_memo;

            $url_local_childthree = $this->readimagechildthree($customer_id);
            $this->_view->urlocalchildthree         = $url_local_childthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childthree     = $this->urlquery();
            }else{
                $this->_view->childthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供４データ
            if(!empty($result_childfour)){
            $childfour_family_id       = $result_childfour['customer_id'];
            $childfour_family_name     = $result_childfour['child_four_family_name'];
            $childfour_sex             = $result_childfour['child_four_sex'];
            $childfour_spouse_name     = $result_childfour['child_four_spouse_name'];
            $childfour_birthday        = $result_childfour['child_four_birthday'];
            $childfour_deathday        = $result_childfour['child_four_deathday'];
            $childfour_profession      = $result_childfour['child_four_profession'];
            $childfour_memo            = $result_childfour['child_four_memo'];

            $this->_session->childfour_family_id       = $childfour_family_id;
            $this->_view->childfourFamilyId            = $this->_session->childfour_family_id;

            $this->_session->childfour_family_name     = $childfour_family_name;
            $this->_view->childfourFamilyName          = $this->_session->childfour_family_name;

            //性別セレクト設定
            $this->_session->childfour_sex             = $childfour_sex;

            if($childfour_sex == '男性'){
                $this->_view->childfourMan = "selected";
            }else{
                $this->_view->childfourMan = "";
            }

            if($childfour_sex == '女性'){
                $this->_view->childfourWoman = "selected";
            }else{
                $this->_view->childfourWoman = "";
            }

            $this->_session->childfour_spouse_name     = $childfour_spouse_name;
            $this->_view->childfourSpouseName          = $this->_session->childfour_spouse_name;

            $this->_session->childfour_birthday        = $childfour_birthday;
            $this->_view->childfourBirthday            = $this->_session->childfour_birthday;

            $this->_session->childfour_deathday        = $childfour_deathday;
            $this->_view->childfourDeathday            = $this->_session->childfour_deathday;

            $this->_session->childfour_profession      = $childfour_profession;
            $this->_view->childfourProfession          = $this->_session->childfour_profession;

            $this->_session->childfour_memo            = $childfour_memo;
            $this->_view->childfourMemo                = $this->_session->childfour_memo;

            $url_local_childfour = $this->readimagechildfour($customer_id);
            $this->_view->urlocalchildfour         = $url_local_childfour;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDFOUR_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childfour_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childfour           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childfour     = $this->urlquery();
            }else{
                $this->_view->childfour_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }


            //　子供１孫１データ
            if(!empty($result_childonegrandsonone)){
            $childonegrandsonone_family_id       = $result_childonegrandsonone['customer_id'];
            $childonegrandsonone_family_name     = $result_childonegrandsonone['child_one_grandson_one_family_name'];
            $childonegrandsonone_sex             = $result_childonegrandsonone['child_one_grandson_one_sex'];
            $childonegrandsonone_birthday        = $result_childonegrandsonone['child_one_grandson_one_birthday'];
            $childonegrandsonone_deathday        = $result_childonegrandsonone['child_one_grandson_one_deathday'];
            $childonegrandsonone_profession      = $result_childonegrandsonone['child_one_grandson_one_profession'];
            $childonegrandsonone_memo            = $result_childonegrandsonone['child_one_grandson_one_memo'];

            $this->_session->childonegrandsonone_family_id       = $childonegrandsonone_family_id;
            $this->_view->childonegrandsononeFamilyId            = $this->_session->childonegrandsonone_family_id;

            $this->_session->childonegrandsonone_family_name     = $childonegrandsonone_family_name;
            $this->_view->childonegrandsononeFamilyName          = $this->_session->childonegrandsonone_family_name;

            //性別セレクト設定
            $this->_session->childonegrandsonone_sex             = $childonegrandsonone_sex;

            if($childonegrandsonone_sex == '男性'){
                $this->_view->childonegrandsononeMan = "selected";
            }else{
                $this->_view->childonegrandsononeMan = "";
            }

            if($childonegrandsonone_sex == '女性'){
                $this->_view->childonegrandsononeWoman = "selected";
            }else{
                $this->_view->childonegrandsononeWoman = "";
            }

            $this->_session->childonegrandsonone_birthday        = $childonegrandsonone_birthday;
            $this->_view->childonegrandsononeBirthday            = $this->_session->childonegrandsonone_birthday;

            $this->_session->childonegrandsonone_deathday        = $childonegrandsonone_deathday;
            $this->_view->childonegrandsononeDeathday            = $this->_session->childonegrandsonone_deathday;

            $this->_session->childonegrandsonone_profession      = $childonegrandsonone_profession;
            $this->_view->childonegrandsononeProfession          = $this->_session->childonegrandsonone_profession;

            $this->_session->childonegrandsonone_memo            = $childonegrandsonone_memo;
            $this->_view->childonegrandsononeMemo                = $this->_session->childonegrandsonone_memo;

            $url_local_childonegrandsonone = $this->readimagechildonegrandsonone($customer_id);
            $this->_view->urlocalchildonegrandsonone         = $url_local_childonegrandsonone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDONEGRANDSONONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childonegrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childonegrandsonone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childonegrandsonone     = $this->urlquery();
            }else{
                $this->_view->childonegrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供１孫２データ
            if(!empty($result_childonegrandsontwo)){
            $childonegrandsontwo_family_id       = $result_childonegrandsontwo['customer_id'];
            $childonegrandsontwo_family_name     = $result_childonegrandsontwo['child_one_grandson_two_family_name'];
            $childonegrandsontwo_sex             = $result_childonegrandsontwo['child_one_grandson_two_sex'];
            $childonegrandsontwo_birthday        = $result_childonegrandsontwo['child_one_grandson_two_birthday'];
            $childonegrandsontwo_deathday        = $result_childonegrandsontwo['child_one_grandson_two_deathday'];
            $childonegrandsontwo_profession      = $result_childonegrandsontwo['child_one_grandson_two_profession'];
            $childonegrandsontwo_memo            = $result_childonegrandsontwo['child_one_grandson_two_memo'];

            $this->_session->childonegrandsontwo_family_id       = $childonegrandsontwo_family_id;
            $this->_view->childonegrandsontwoFamilyId            = $this->_session->childonegrandsontwo_family_id;

            $this->_session->childonegrandsontwo_family_name     = $childonegrandsontwo_family_name;
            $this->_view->childonegrandsontwoFamilyName          = $this->_session->childonegrandsontwo_family_name;

            //性別セレクト設定
            $this->_session->childonegrandsontwo_sex             = $childonegrandsontwo_sex;

            if($childonegrandsontwo_sex == '男性'){
                $this->_view->childonegrandsontwoMan = "selected";
            }else{
                $this->_view->childonegrandsontwoMan = "";
            }

            if($childonegrandsontwo_sex == '女性'){
                $this->_view->childonegrandsontwoWoman = "selected";
            }else{
                $this->_view->childonegrandsontwoWoman = "";
            }

            $this->_session->childonegrandsontwo_birthday        = $childonegrandsontwo_birthday;
            $this->_view->childonegrandsontwoBirthday            = $this->_session->childonegrandsontwo_birthday;

            $this->_session->childonegrandsontwo_deathday        = $childonegrandsontwo_deathday;
            $this->_view->childonegrandsontwoDeathday            = $this->_session->childonegrandsontwo_deathday;

            $this->_session->childonegrandsontwo_profession      = $childonegrandsontwo_profession;
            $this->_view->childonegrandsontwoProfession          = $this->_session->childonegrandsontwo_profession;

            $this->_session->childonegrandsontwo_memo            = $childonegrandsontwo_memo;
            $this->_view->childonegrandsontwoMemo                = $this->_session->childonegrandsontwo_memo;

            $url_local_childonegrandsontwo = $this->readimagechildonegrandsontwo($customer_id);
            $this->_view->urlocalchildonegrandsontwo         = $url_local_childonegrandsontwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDONEGRANDSONTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childonegrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childonegrandsontwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childonegrandsontwo     = $this->urlquery();
            }else{
                $this->_view->childonegrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供１孫３データ
            if(!empty($result_childonegrandsonthree)){
            $childonegrandsonthree_family_id       = $result_childonegrandsonthree['customer_id'];
            $childonegrandsonthree_family_name     = $result_childonegrandsonthree['child_one_grandson_three_family_name'];
            $childonegrandsonthree_sex             = $result_childonegrandsonthree['child_one_grandson_three_sex'];
            $childonegrandsonthree_birthday        = $result_childonegrandsonthree['child_one_grandson_three_birthday'];
            $childonegrandsonthree_deathday        = $result_childonegrandsonthree['child_one_grandson_three_deathday'];
            $childonegrandsonthree_profession      = $result_childonegrandsonthree['child_one_grandson_three_profession'];
            $childonegrandsonthree_memo            = $result_childonegrandsonthree['child_one_grandson_three_memo'];

            $this->_session->childonegrandsonthree_family_id       = $childonegrandsonthree_family_id;
            $this->_view->childonegrandsonthreeFamilyId            = $this->_session->childonegrandsonthree_family_id;

            $this->_session->childonegrandsonthree_family_name     = $childonegrandsonthree_family_name;
            $this->_view->childonegrandsonthreeFamilyName          = $this->_session->childonegrandsonthree_family_name;

            //性別セレクト設定
            $this->_session->childonegrandsonthree_sex             = $childonegrandsonthree_sex;

            if($childonegrandsonthree_sex == '男性'){
                $this->_view->childonegrandsonthreeMan = "selected";
            }else{
                $this->_view->childonegrandsonthreeMan = "";
            }

            if($childonegrandsonthree_sex == '女性'){
                $this->_view->childonegrandsonthreeWoman = "selected";
            }else{
                $this->_view->childonegrandsonthreeWoman = "";
            }

            $this->_session->childonegrandsonthree_birthday        = $childonegrandsonthree_birthday;
            $this->_view->childonegrandsonthreeBirthday            = $this->_session->childonegrandsonthree_birthday;

            $this->_session->childonegrandsonthree_deathday        = $childonegrandsonthree_deathday;
            $this->_view->childonegrandsonthreeDeathday            = $this->_session->childonegrandsonthree_deathday;

            $this->_session->childonegrandsonthree_profession      = $childonegrandsonthree_profession;
            $this->_view->childonegrandsonthreeProfession          = $this->_session->childonegrandsonthree_profession;

            $this->_session->childonegrandsonthree_memo            = $childonegrandsonthree_memo;
            $this->_view->childonegrandsonthreeMemo                = $this->_session->childonegrandsonthree_memo;

            $url_local_childonegrandsonthree = $this->readimagechildonegrandsonthree($customer_id);
            $this->_view->urlocalchildonegrandsonthree         = $url_local_childonegrandsonthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDONEGRANDSONTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childonegrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childonegrandsonthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childonegrandsonthree     = $this->urlquery();
            }else{
                $this->_view->childonegrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供２孫１データ
            if(!empty($result_childtwograndsonone)){
            $childtwograndsonone_family_id       = $result_childtwograndsonone['customer_id'];
            $childtwograndsonone_family_name     = $result_childtwograndsonone['child_two_grandson_one_family_name'];
            $childtwograndsonone_sex             = $result_childtwograndsonone['child_two_grandson_one_sex'];
            $childtwograndsonone_birthday        = $result_childtwograndsonone['child_two_grandson_one_birthday'];
            $childtwograndsonone_deathday        = $result_childtwograndsonone['child_two_grandson_one_deathday'];
            $childtwograndsonone_profession      = $result_childtwograndsonone['child_two_grandson_one_profession'];
            $childtwograndsonone_memo            = $result_childtwograndsonone['child_two_grandson_one_memo'];

            $this->_session->childtwograndsonone_family_id       = $childtwograndsonone_family_id;
            $this->_view->childtwograndsononeFamilyId            = $this->_session->childtwograndsonone_family_id;

            $this->_session->childtwograndsonone_family_name     = $childtwograndsonone_family_name;
            $this->_view->childtwograndsononeFamilyName          = $this->_session->childtwograndsonone_family_name;

            //性別セレクト設定
            $this->_session->childtwograndsonone_sex             = $childtwograndsonone_sex;

            if($childtwograndsonone_sex == '男性'){
                $this->_view->childtwograndsononeMan = "selected";
            }else{
                $this->_view->childtwograndsononeMan = "";
            }

            if($childtwograndsonone_sex == '女性'){
                $this->_view->childtwograndsononeWoman = "selected";
            }else{
                $this->_view->childtwograndsononeWoman = "";
            }

            $this->_session->childtwograndsonone_birthday        = $childtwograndsonone_birthday;
            $this->_view->childtwograndsononeBirthday            = $this->_session->childtwograndsonone_birthday;

            $this->_session->childtwograndsonone_deathday        = $childtwograndsonone_deathday;
            $this->_view->childtwograndsononeDeathday            = $this->_session->childtwograndsonone_deathday;

            $this->_session->childtwograndsonone_profession      = $childtwograndsonone_profession;
            $this->_view->childtwograndsononeProfession          = $this->_session->childtwograndsonone_profession;

            $this->_session->childtwograndsonone_memo            = $childtwograndsonone_memo;
            $this->_view->childtwograndsononeMemo                = $this->_session->childtwograndsonone_memo;

            $url_local_childtwograndsonone = $this->readimagechildtwograndsonone($customer_id);
            $this->_view->urlocalchildtwograndsonone         = $url_local_childtwograndsonone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTWOGRANDSONONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childtwograndsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childtwograndsonone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childtwograndsonone     = $this->urlquery();
            }else{
                $this->_view->childtwograndsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供２孫２データ
            if(!empty($result_childtwograndsontwo)){
            $childtwograndsontwo_family_id       = $result_childtwograndsontwo['customer_id'];
            $childtwograndsontwo_family_name     = $result_childtwograndsontwo['child_two_grandson_two_family_name'];
            $childtwograndsontwo_sex             = $result_childtwograndsontwo['child_two_grandson_two_sex'];
            $childtwograndsontwo_birthday        = $result_childtwograndsontwo['child_two_grandson_two_birthday'];
            $childtwograndsontwo_deathday        = $result_childtwograndsontwo['child_two_grandson_two_deathday'];
            $childtwograndsontwo_profession      = $result_childtwograndsontwo['child_two_grandson_two_profession'];
            $childtwograndsontwo_memo            = $result_childtwograndsontwo['child_two_grandson_two_memo'];

            $this->_session->childtwograndsontwo_family_id       = $childtwograndsontwo_family_id;
            $this->_view->childtwograndsontwoFamilyId            = $this->_session->childtwograndsontwo_family_id;

            $this->_session->childtwograndsontwo_family_name     = $childtwograndsontwo_family_name;
            $this->_view->childtwograndsontwoFamilyName          = $this->_session->childtwograndsontwo_family_name;

            //性別セレクト設定
            $this->_session->childtwograndsontwo_sex             = $childtwograndsontwo_sex;

            if($childtwograndsontwo_sex == '男性'){
                $this->_view->childtwograndsontwoMan = "selected";
            }else{
                $this->_view->childtwograndsontwoMan = "";
            }

            if($childtwograndsontwo_sex == '女性'){
                $this->_view->childtwograndsontwoWoman = "selected";
            }else{
                $this->_view->childtwograndsontwoWoman = "";
            }

            $this->_session->childtwograndsontwo_birthday        = $childtwograndsontwo_birthday;
            $this->_view->childtwograndsontwoBirthday            = $this->_session->childtwograndsontwo_birthday;

            $this->_session->childtwograndsontwo_deathday        = $childtwograndsontwo_deathday;
            $this->_view->childtwograndsontwoDeathday            = $this->_session->childtwograndsontwo_deathday;

            $this->_session->childtwograndsontwo_profession      = $childtwograndsontwo_profession;
            $this->_view->childtwograndsontwoProfession          = $this->_session->childtwograndsontwo_profession;

            $this->_session->childtwograndsontwo_memo            = $childtwograndsontwo_memo;
            $this->_view->childtwograndsontwoMemo                = $this->_session->childtwograndsontwo_memo;

            $url_local_childtwograndsontwo = $this->readimagechildtwograndsontwo($customer_id);
            $this->_view->urlocalchildtwograndsontwo             = $url_local_childtwograndsontwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childtwograndsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childtwograndsontwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childtwograndsontwo     = $this->urlquery();
            }else{
                $this->_view->childtwograndsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供２孫３データ
            if(!empty($result_childtwograndsonthree)){
            $childtwograndsonthree_family_id       = $result_childtwograndsonthree['customer_id'];
            $childtwograndsonthree_family_name     = $result_childtwograndsonthree['child_two_grandson_three_family_name'];
            $childtwograndsonthree_sex             = $result_childtwograndsonthree['child_two_grandson_three_sex'];
            $childtwograndsonthree_birthday        = $result_childtwograndsonthree['child_two_grandson_three_birthday'];
            $childtwograndsonthree_deathday        = $result_childtwograndsonthree['child_two_grandson_three_deathday'];
            $childtwograndsonthree_profession      = $result_childtwograndsonthree['child_two_grandson_three_profession'];
            $childtwograndsonthree_memo            = $result_childtwograndsonthree['child_two_grandson_three_memo'];

            $this->_session->childtwograndsonthree_family_id       = $childtwograndsonthree_family_id;
            $this->_view->childtwograndsonthreeFamilyId            = $this->_session->childtwograndsonthree_family_id;

            $this->_session->childtwograndsonthree_family_name     = $childtwograndsonthree_family_name;
            $this->_view->childtwograndsonthreeFamilyName          = $this->_session->childtwograndsonthree_family_name;

            //性別セレクト設定
            $this->_session->childtwograndsonthree_sex             = $childtwograndsonthree_sex;

            if($childtwograndsonthree_sex == '男性'){
                $this->_view->childtwograndsonthreeMan = "selected";
            }else{
                $this->_view->childtwograndsonthreeMan = "";
            }

            if($childtwograndsonthree_sex == '女性'){
                $this->_view->childtwograndsonthreeWoman = "selected";
            }else{
                $this->_view->childtwograndsonthreeWoman = "";
            }

            $this->_session->childtwograndsonthree_birthday        = $childtwograndsonthree_birthday;
            $this->_view->childtwograndsonthreeBirthday            = $this->_session->childtwograndsonthree_birthday;

            $this->_session->childtwograndsonthree_deathday        = $childtwograndsonthree_deathday;
            $this->_view->childtwograndsonthreeDeathday            = $this->_session->childtwograndsonthree_deathday;

            $this->_session->childtwograndsonthree_profession      = $childtwograndsonthree_profession;
            $this->_view->childtwograndsonthreeProfession          = $this->_session->childtwograndsonthree_profession;

            $this->_session->childtwograndsonthree_memo            = $childtwograndsonthree_memo;
            $this->_view->childtwograndsonthreeMemo                = $this->_session->childtwograndsonthree_memo;

            $url_local_childtwograndsonthree = $this->readimagechildtwograndsonthree($customer_id);
            $this->_view->urlocalchildtwograndsonthree             = $url_local_childtwograndsonthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childtwograndsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childtwograndsonthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childtwograndsonthree     = $this->urlquery();
            }else{
                $this->_view->childtwograndsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供３孫１データ
            if(!empty($result_childthreegrandsonone)){
            $childthreegrandsonone_family_id       = $result_childthreegrandsonone['customer_id'];
            $childthreegrandsonone_family_name     = $result_childthreegrandsonone['child_three_grandson_one_family_name'];
            $childthreegrandsonone_sex             = $result_childthreegrandsonone['child_three_grandson_one_sex'];
            $childthreegrandsonone_birthday        = $result_childthreegrandsonone['child_three_grandson_one_birthday'];
            $childthreegrandsonone_deathday        = $result_childthreegrandsonone['child_three_grandson_one_deathday'];
            $childthreegrandsonone_profession      = $result_childthreegrandsonone['child_three_grandson_one_profession'];
            $childthreegrandsonone_memo            = $result_childthreegrandsonone['child_three_grandson_one_memo'];

            $this->_session->childthreegrandsonone_family_id       = $childthreegrandsonone_family_id;
            $this->_view->childthreegrandsononeFamilyId            = $this->_session->childthreegrandsonone_family_id;

            $this->_session->childthreegrandsonone_family_name     = $childthreegrandsonone_family_name;
            $this->_view->childthreegrandsononeFamilyName          = $this->_session->childthreegrandsonone_family_name;

            //性別セレクト設定
            $this->_session->childthreegrandsonone_sex             = $childthreegrandsonone_sex;

            if($childthreegrandsonone_sex == '男性'){
                $this->_view->childthreegrandsononeMan = "selected";
            }else{
                $this->_view->childthreegrandsononeMan = "";
            }

            if($childthreegrandsonone_sex == '女性'){
                $this->_view->childthreegrandsononeWoman = "selected";
            }else{
                $this->_view->childthreegrandsononeWoman = "";
            }

            $this->_session->childthreegrandsonone_birthday        = $childthreegrandsonone_birthday;
            $this->_view->childthreegrandsononeBirthday            = $this->_session->childthreegrandsonone_birthday;

            $this->_session->childthreegrandsonone_deathday        = $childthreegrandsonone_deathday;
            $this->_view->childthreegrandsononeDeathday            = $this->_session->childthreegrandsonone_deathday;

            $this->_session->childthreegrandsonone_profession      = $childthreegrandsonone_profession;
            $this->_view->childthreegrandsononeProfession          = $this->_session->childthreegrandsonone_profession;

            $this->_session->childthreegrandsonone_memo            = $childthreegrandsonone_memo;
            $this->_view->childthreegrandsononeMemo                = $this->_session->childthreegrandsonone_memo;

            $url_local_childthreegrandsonone = $this->readimagechildthreegrandsonone($customer_id);
            $this->_view->urlocalchildthreegrandsonone         = $url_local_childthreegrandsonone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childthreegrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childthreegrandsonone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childthreegrandsonone     = $this->urlquery();
            }else{
                $this->_view->childthreegrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供３孫２データ
            if(!empty($result_childthreegrandsontwo)){
            $childthreegrandsontwo_family_id       = $result_childthreegrandsontwo['customer_id'];
            $childthreegrandsontwo_family_name     = $result_childthreegrandsontwo['child_three_grandson_two_family_name'];
            $childthreegrandsontwo_sex             = $result_childthreegrandsontwo['child_three_grandson_two_sex'];
            $childthreegrandsontwo_birthday        = $result_childthreegrandsontwo['child_three_grandson_two_birthday'];
            $childthreegrandsontwo_deathday        = $result_childthreegrandsontwo['child_three_grandson_two_deathday'];
            $childthreegrandsontwo_profession      = $result_childthreegrandsontwo['child_three_grandson_two_profession'];
            $childthreegrandsontwo_memo            = $result_childthreegrandsontwo['child_three_grandson_two_memo'];

            $this->_session->childthreegrandsontwo_family_id       = $childthreegrandsontwo_family_id;
            $this->_view->childthreegrandsontwoFamilyId            = $this->_session->childthreegrandsontwo_family_id;

            $this->_session->childthreegrandsontwo_family_name     = $childthreegrandsontwo_family_name;
            $this->_view->childthreegrandsontwoFamilyName          = $this->_session->childthreegrandsontwo_family_name;

            //性別セレクト設定
            $this->_session->childthreegrandsontwo_sex             = $childthreegrandsontwo_sex;

            if($childthreegrandsontwo_sex == '男性'){
                $this->_view->childthreegrandsontwoMan = "selected";
            }else{
                $this->_view->childthreegrandsontwoMan = "";
            }

            if($childthreegrandsontwo_sex == '女性'){
                $this->_view->childthreegrandsontwoWoman = "selected";
            }else{
                $this->_view->childthreegrandsontwoWoman = "";
            }

            $this->_session->childthreegrandsontwo_birthday        = $childthreegrandsontwo_birthday;
            $this->_view->childthreegrandsontwoBirthday            = $this->_session->childthreegrandsontwo_birthday;

            $this->_session->childthreegrandsontwo_deathday        = $childthreegrandsontwo_deathday;
            $this->_view->childthreegrandsontwoDeathday            = $this->_session->childthreegrandsontwo_deathday;

            $this->_session->childthreegrandsontwo_profession      = $childthreegrandsontwo_profession;
            $this->_view->childthreegrandsontwoProfession          = $this->_session->childthreegrandsontwo_profession;

            $this->_session->childthreegrandsontwo_memo            = $childthreegrandsontwo_memo;
            $this->_view->childthreegrandsontwoMemo                = $this->_session->childthreegrandsontwo_memo;

            $url_local_childthreegrandsontwo = $this->readimagechildthreegrandsontwo($customer_id);
            $this->_view->urlocalchildthreegrandsontwo         = $url_local_childthreegrandsontwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childthreegrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childthreegrandsontwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childthreegrandsontwo     = $this->urlquery();
            }else{
                $this->_view->childthreegrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供３孫３データ
            if(!empty($result_childthreegrandsonthree)){
            $childthreegrandsonthree_family_id       = $result_childthreegrandsonthree['customer_id'];
            $childthreegrandsonthree_family_name     = $result_childthreegrandsonthree['child_three_grandson_three_family_name'];
            $childthreegrandsonthree_sex             = $result_childthreegrandsonthree['child_three_grandson_three_sex'];
            $childthreegrandsonthree_birthday        = $result_childthreegrandsonthree['child_three_grandson_three_birthday'];
            $childthreegrandsonthree_deathday        = $result_childthreegrandsonthree['child_three_grandson_three_deathday'];
            $childthreegrandsonthree_profession      = $result_childthreegrandsonthree['child_three_grandson_three_profession'];
            $childthreegrandsonthree_memo            = $result_childthreegrandsonthree['child_three_grandson_three_memo'];

            $this->_session->childthreegrandsonthree_family_id       = $childthreegrandsonthree_family_id;
            $this->_view->childthreegrandsonthreeFamilyId            = $this->_session->childthreegrandsonthree_family_id;

            $this->_session->childthreegrandsonthree_family_name     = $childthreegrandsonthree_family_name;
            $this->_view->childthreegrandsonthreeFamilyName          = $this->_session->childthreegrandsonthree_family_name;

            //性別セレクト設定
            $this->_session->childthreegrandsonthree_sex             = $childthreegrandsonthree_sex;

            if($childthreegrandsonthree_sex == '男性'){
                $this->_view->childthreegrandsonthreeMan = "selected";
            }else{
                $this->_view->childthreegrandsonthreeMan = "";
            }

            if($childthreegrandsonthree_sex == '女性'){
                $this->_view->childthreegrandsonthreeWoman = "selected";
            }else{
                $this->_view->childthreegrandsonthreeWoman = "";
            }

            $this->_session->childthreegrandsonthree_birthday        = $childthreegrandsonthree_birthday;
            $this->_view->childthreegrandsonthreeBirthday            = $this->_session->childthreegrandsonthree_birthday;

            $this->_session->childthreegrandsonthree_deathday        = $childthreegrandsonthree_deathday;
            $this->_view->childthreegrandsonthreeDeathday            = $this->_session->childthreegrandsonthree_deathday;

            $this->_session->childthreegrandsonthree_profession      = $childthreegrandsonthree_profession;
            $this->_view->childthreegrandsonthreeProfession          = $this->_session->childthreegrandsonthree_profession;

            $this->_session->childthreegrandsonthree_memo            = $childthreegrandsonthree_memo;
            $this->_view->childthreegrandsonthreeMemo                = $this->_session->childthreegrandsonthree_memo;

            $url_local_childthreegrandsonthree = $this->readimagechildthreegrandsonthree($customer_id);
            $this->_view->urlocalchildthreegrandsonthree         = $url_local_childthreegrandsonthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childthreegrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childthreegrandsonthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childthreegrandsonthree     = $this->urlquery();
            }else{
                $this->_view->childthreegrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供４孫１データ
            if(!empty($result_childfourgrandsonone)){
            $childfourgrandsonone_family_id       = $result_childfourgrandsonone['customer_id'];
            $childfourgrandsonone_family_name     = $result_childfourgrandsonone['child_four_grandson_one_family_name'];
            $childfourgrandsonone_sex             = $result_childfourgrandsonone['child_four_grandson_one_sex'];
            $childfourgrandsonone_birthday        = $result_childfourgrandsonone['child_four_grandson_one_birthday'];
            $childfourgrandsonone_deathday        = $result_childfourgrandsonone['child_four_grandson_one_deathday'];
            $childfourgrandsonone_profession      = $result_childfourgrandsonone['child_four_grandson_one_profession'];
            $childfourgrandsonone_memo            = $result_childfourgrandsonone['child_four_grandson_one_memo'];

            $this->_session->childfourgrandsonone_family_id       = $childfourgrandsonone_family_id;
            $this->_view->childfourgrandsononeFamilyId            = $this->_session->childfourgrandsonone_family_id;

            $this->_session->childfourgrandsonone_family_name     = $childfourgrandsonone_family_name;
            $this->_view->childfourgrandsononeFamilyName          = $this->_session->childfourgrandsonone_family_name;

            //性別セレクト設定
            $this->_session->childfourgrandsonone_sex             = $childfourgrandsonone_sex;

            if($childfourgrandsonone_sex == '男性'){
                $this->_view->childfourgrandsononeMan = "selected";
            }else{
                $this->_view->childfourgrandsononeMan = "";
            }

            if($childfourgrandsonone_sex == '女性'){
                $this->_view->childfourgrandsononeWoman = "selected";
            }else{
                $this->_view->childfourgrandsononeWoman = "";
            }

            $this->_session->childfourgrandsonone_birthday        = $childfourgrandsonone_birthday;
            $this->_view->childfourgrandsononeBirthday            = $this->_session->childfourgrandsonone_birthday;

            $this->_session->childfourgrandsonone_deathday        = $childfourgrandsonone_deathday;
            $this->_view->childfourgrandsononeDeathday            = $this->_session->childfourgrandsonone_deathday;

            $this->_session->childfourgrandsonone_profession      = $childfourgrandsonone_profession;
            $this->_view->childfourgrandsononeProfession          = $this->_session->childfourgrandsonone_profession;

            $this->_session->childfourgrandsonone_memo            = $childfourgrandsonone_memo;
            $this->_view->childfourgrandsononeMemo                = $this->_session->childfourgrandsonone_memo;

            $url_local_childfourgrandsonone = $this->readimagechildfourgrandsonone($customer_id);
            $this->_view->urlocalchildfourgrandsonone         = $url_local_childfourgrandsonone;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDFOURGRANDSONONE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childfourgrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childfourgrandsonone           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childfourgrandsonone     = $this->urlquery();
            }else{
                $this->_view->childfourgrandsonone_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供４孫２データ
            if(!empty($result_childfourgrandsontwo)){
            $childfourgrandsontwo_family_id       = $result_childfourgrandsontwo['customer_id'];
            $childfourgrandsontwo_family_name     = $result_childfourgrandsontwo['child_four_grandson_two_family_name'];
            $childfourgrandsontwo_sex             = $result_childfourgrandsontwo['child_four_grandson_two_sex'];
            $childfourgrandsontwo_birthday        = $result_childfourgrandsontwo['child_four_grandson_two_birthday'];
            $childfourgrandsontwo_deathday        = $result_childfourgrandsontwo['child_four_grandson_two_deathday'];
            $childfourgrandsontwo_profession      = $result_childfourgrandsontwo['child_four_grandson_two_profession'];
            $childfourgrandsontwo_memo            = $result_childfourgrandsontwo['child_four_grandson_two_memo'];

            $this->_session->childfourgrandsontwo_family_id       = $childfourgrandsontwo_family_id;
            $this->_view->childfourgrandsontwoFamilyId            = $this->_session->childfourgrandsontwo_family_id;

            $this->_session->childfourgrandsontwo_family_name     = $childfourgrandsontwo_family_name;
            $this->_view->childfourgrandsontwoFamilyName          = $this->_session->childfourgrandsontwo_family_name;

            //性別セレクト設定
            $this->_session->childfourgrandsontwo_sex             = $childfourgrandsontwo_sex;

            if($childfourgrandsontwo_sex == '男性'){
                $this->_view->childfourgrandsontwoMan = "selected";
            }else{
                $this->_view->childfourgrandsontwoMan = "";
            }

            if($childfourgrandsontwo_sex == '女性'){
                $this->_view->childfourgrandsontwoWoman = "selected";
            }else{
                $this->_view->childfourgrandsontwoWoman = "";
            }

            $this->_session->childfourgrandsontwo_birthday        = $childfourgrandsontwo_birthday;
            $this->_view->childfourgrandsontwoBirthday            = $this->_session->childfourgrandsontwo_birthday;

            $this->_session->childfourgrandsontwo_deathday        = $childfourgrandsontwo_deathday;
            $this->_view->childfourgrandsontwoDeathday            = $this->_session->childfourgrandsontwo_deathday;

            $this->_session->childfourgrandsontwo_profession      = $childfourgrandsontwo_profession;
            $this->_view->childfourgrandsontwoProfession          = $this->_session->childfourgrandsontwo_profession;

            $this->_session->childfourgrandsontwo_memo            = $childfourgrandsontwo_memo;
            $this->_view->childfourgrandsontwoMemo                = $this->_session->childfourgrandsontwo_memo;

            $url_local_childfourgrandsontwo = $this->readimagechildfourgrandsontwo($customer_id);
            $this->_view->urlocalchildfourgrandsontwo         = $url_local_childfourgrandsontwo;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTWO_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childfourgrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childfourgrandsontwo           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childfourgrandsontwo     = $this->urlquery();
            }else{
                $this->_view->childfourgrandsontwo_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　子供４孫３データ
            if(!empty($result_childfourgrandsonthree)){
            $childfourgrandsonthree_family_id       = $result_childfourgrandsonthree['customer_id'];
            $childfourgrandsonthree_family_name     = $result_childfourgrandsonthree['child_four_grandson_three_family_name'];
            $childfourgrandsonthree_sex             = $result_childfourgrandsonthree['child_four_grandson_three_sex'];
            $childfourgrandsonthree_birthday        = $result_childfourgrandsonthree['child_four_grandson_three_birthday'];
            $childfourgrandsonthree_deathday        = $result_childfourgrandsonthree['child_four_grandson_three_deathday'];
            $childfourgrandsonthree_profession      = $result_childfourgrandsonthree['child_four_grandson_three_profession'];
            $childfourgrandsonthree_memo            = $result_childfourgrandsonthree['child_four_grandson_three_memo'];

            $this->_session->childfourgrandsonthree_family_id       = $childfourgrandsonthree_family_id;
            $this->_view->childfourgrandsonthreeFamilyId            = $this->_session->childfourgrandsonthree_family_id;

            $this->_session->childfourgrandsonthree_family_name     = $childfourgrandsonthree_family_name;
            $this->_view->childfourgrandsonthreeFamilyName          = $this->_session->childfourgrandsonthree_family_name;

            //性別セレクト設定
            $this->_session->childfourgrandsonthree_sex             = $childfourgrandsonthree_sex;

            if($childfourgrandsonthree_sex == '男性'){
                $this->_view->childfourgrandsonthreeMan = "selected";
            }else{
                $this->_view->childfourgrandsonthreeMan = "";
            }

            if($childfourgrandsonthree_sex == '女性'){
                $this->_view->childfourgrandsonthreeWoman = "selected";
            }else{
                $this->_view->childfourgrandsonthreeWoman = "";
            }

            $this->_session->childfourgrandsonthree_birthday        = $childfourgrandsonthree_birthday;
            $this->_view->childfourgrandsonthreeBirthday            = $this->_session->childfourgrandsonthree_birthday;

            $this->_session->childfourgrandsonthree_deathday        = $childfourgrandsonthree_deathday;
            $this->_view->childfourgrandsonthreeDeathday            = $this->_session->childfourgrandsonthree_deathday;

            $this->_session->childfourgrandsonthree_profession      = $childfourgrandsonthree_profession;
            $this->_view->childfourgrandsonthreeProfession          = $this->_session->childfourgrandsonthree_profession;

            $this->_session->childfourgrandsonthree_memo            = $childfourgrandsonthree_memo;
            $this->_view->childfourgrandsonthreeMemo                = $this->_session->childfourgrandsonthree_memo;

            $url_local_childfourgrandsonthree = $this->readimagechildfourgrandsonthree($customer_id);
            $this->_view->urlocalchildfourgrandsonthree         = $url_local_childfourgrandsonthree;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTHREE_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->childfourgrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_childfourgrandsonthree           = $this->urlquery();
                $this->_view->urlquery_img_thumb_childfourgrandsonthree     = $this->urlquery();
            }else{
                $this->_view->childfourgrandsonthree_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　祖父父方データ
            if(!empty($result_grandfatherfather)){
            $grandfatherfather_family_id       = $result_grandfatherfather['customer_id'];
            $grandfatherfather_family_name     = $result_grandfatherfather['grandfather_father_family_name'];
            $grandfatherfather_birthday        = $result_grandfatherfather['grandfather_father_birthday'];
            $grandfatherfather_deathday        = $result_grandfatherfather['grandfather_father_deathday'];
            $grandfatherfather_profession      = $result_grandfatherfather['grandfather_father_profession'];
            $grandfatherfather_memo            = $result_grandfatherfather['grandfather_father_memo'];

            $this->_session->grandfatherfather_family_id       = $grandfatherfather_family_id;
            $this->_view->grandfatherfatherFamilyId            = $this->_session->grandfatherfather_family_id;

            $this->_session->grandfatherfather_family_name     = $grandfatherfather_family_name;
            $this->_view->grandfatherfatherFamilyName          = $this->_session->grandfatherfather_family_name;

            $this->_session->grandfatherfather_birthday        = $grandfatherfather_birthday;
            $this->_view->grandfatherfatherBirthday            = $this->_session->grandfatherfather_birthday;

            $this->_session->grandfatherfather_deathday        = $grandfatherfather_deathday;
            $this->_view->grandfatherfatherDeathday            = $this->_session->grandfatherfather_deathday;

            $this->_session->grandfatherfather_profession      = $grandfatherfather_profession;
            $this->_view->grandfatherfatherProfession          = $this->_session->grandfatherfather_profession;

            $this->_session->grandfatherfather_memo            = $grandfatherfather_memo;
            $this->_view->grandfatherfatherMemo                = $this->_session->grandfatherfather_memo;

            $url_local_grandfatherfather = $this->readimagegrandfatherfather($customer_id);
            $this->_view->urlocalgrandfatherfather             = $url_local_grandfatherfather;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_GRANDFATHERFATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->grandfatherfather_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_grandfatherfather           = $this->urlquery();
                $this->_view->urlquery_img_thumb_grandfatherfather     = $this->urlquery();
            }else{
                $this->_view->grandfatherfather_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　祖母父方データ
            if(!empty($result_grandfathermather)){
            $grandfathermather_family_id       = $result_grandfathermather['customer_id'];
            $grandfathermather_family_name     = $result_grandfathermather['grandfather_mather_family_name'];
            $grandfathermather_birthday        = $result_grandfathermather['grandfather_mather_birthday'];
            $grandfathermather_deathday        = $result_grandfathermather['grandfather_mather_deathday'];
            $grandfathermather_profession      = $result_grandfathermather['grandfather_mather_profession'];
            $grandfathermather_memo            = $result_grandfathermather['grandfather_mather_memo'];

            $this->_session->grandfathermather_family_id       = $grandfathermather_family_id;
            $this->_view->grandfathermatherFamilyId            = $this->_session->grandfathermather_family_id;

            $this->_session->grandfathermather_family_name     = $grandfathermather_family_name;
            $this->_view->grandfathermatherFamilyName          = $this->_session->grandfathermather_family_name;

            $this->_session->grandfathermather_birthday        = $grandfathermather_birthday;
            $this->_view->grandfathermatherBirthday            = $this->_session->grandfathermather_birthday;

            $this->_session->grandfathermather_deathday        = $grandfathermather_deathday;
            $this->_view->grandfathermatherDeathday            = $this->_session->grandfathermather_deathday;

            $this->_session->grandfathermather_profession      = $grandfathermather_profession;
            $this->_view->grandfathermatherProfession          = $this->_session->grandfathermather_profession;

            $this->_session->grandfathermather_memo            = $grandfathermather_memo;
            $this->_view->grandfathermatherMemo                = $this->_session->grandfathermather_memo;

            $url_local_grandfathermather = $this->readimagegrandfathermather($customer_id);
            $this->_view->urlocalgrandfathermather             = $url_local_grandfathermather;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_GRANDFATHERMATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->grandfathermather_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_grandfathermather           = $this->urlquery();
                $this->_view->urlquery_img_thumb_grandfathermather     = $this->urlquery();
            }else{
                $this->_view->grandfathermather_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　祖父母方データ
            if(!empty($result_grandmatherfather)){
            $grandmatherfather_family_id       = $result_grandmatherfather['customer_id'];
            $grandmatherfather_family_name     = $result_grandmatherfather['grandmather_father_family_name'];
            $grandmatherfather_birthday        = $result_grandmatherfather['grandmather_father_birthday'];
            $grandmatherfather_deathday        = $result_grandmatherfather['grandmather_father_deathday'];
            $grandmatherfather_profession      = $result_grandmatherfather['grandmather_father_profession'];
            $grandmatherfather_memo            = $result_grandmatherfather['grandmather_father_memo'];

            $this->_session->grandmatherfather_family_id       = $grandmatherfather_family_id;
            $this->_view->grandmatherfatherFamilyId            = $this->_session->grandmatherfather_family_id;

            $this->_session->grandmatherfather_family_name     = $grandmatherfather_family_name;
            $this->_view->grandmatherfatherFamilyName          = $this->_session->grandmatherfather_family_name;

            $this->_session->grandmatherfather_birthday        = $grandmatherfather_birthday;
            $this->_view->grandmatherfatherBirthday            = $this->_session->grandmatherfather_birthday;

            $this->_session->grandmatherfather_deathday        = $grandmatherfather_deathday;
            $this->_view->grandmatherfatherDeathday            = $this->_session->grandmatherfather_deathday;

            $this->_session->grandmatherfather_profession      = $grandmatherfather_profession;
            $this->_view->grandmatherfatherProfession          = $this->_session->grandmatherfather_profession;

            $this->_session->grandmatherfather_memo            = $grandmatherfather_memo;
            $this->_view->grandmatherfatherMemo                = $this->_session->grandmatherfather_memo;

            $url_local_grandmatherfather = $this->readimagegrandmatherfather($customer_id);
            $this->_view->urlocalgrandmatherfather             = $url_local_grandmatherfather;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_GRANDMATHERFATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->grandmatherfather_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_grandmatherfather           = $this->urlquery();
                $this->_view->urlquery_img_thumb_grandmatherfather     = $this->urlquery();
            }else{
                $this->_view->grandmatherfather_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //　祖母母方データ
            if(!empty($result_grandmathermather)){
            $grandmathermather_family_id       = $result_grandmathermather['customer_id'];
            $grandmathermather_family_name     = $result_grandmathermather['grandmather_mather_family_name'];
            $grandmathermather_birthday        = $result_grandmathermather['grandmather_mather_birthday'];
            $grandmathermather_deathday        = $result_grandmathermather['grandmather_mather_deathday'];
            $grandmathermather_profession      = $result_grandmathermather['grandmather_mather_profession'];
            $grandmathermather_memo            = $result_grandmathermather['grandmather_mather_memo'];

            $this->_session->grandmathermather_family_id       = $grandmathermather_family_id;
            $this->_view->grandmathermatherFamilyId            = $this->_session->grandmathermather_family_id;

            $this->_session->grandmathermather_family_name     = $grandmathermather_family_name;
            $this->_view->grandmathermatherFamilyName          = $this->_session->grandmathermather_family_name;

            $this->_session->grandmathermather_birthday        = $grandmathermather_birthday;
            $this->_view->grandmathermatherBirthday            = $this->_session->grandmathermather_birthday;

            $this->_session->grandmathermather_deathday        = $grandmathermather_deathday;
            $this->_view->grandmathermatherDeathday            = $this->_session->grandmathermather_deathday;

            $this->_session->grandmathermather_profession      = $grandmathermather_profession;
            $this->_view->grandmathermatherProfession          = $this->_session->grandmathermather_profession;

            $this->_session->grandmathermather_memo            = $grandmathermather_memo;
            $this->_view->grandmathermatherMemo                = $this->_session->grandmathermather_memo;

            $url_local_grandmathermather = $this->readimagegrandmathermather($customer_id);
            $this->_view->urlocalgrandmathermather             = $url_local_grandmathermather;

            //画像があるか確認
            $fileName = $customer_id . ".jpg";
            $uploadFile = comConst::TEMP_GRANDMATHERMATHER_DIR . $fileName;

            if(file_exists($uploadFile)){
                $this->_view->grandmathermather_img                    = comConst::IMAGE_EXISTENCE_FLG_YES;
                //画像クエリー
                $this->_view->urlquery_img_grandmathermather           = $this->urlquery();
                $this->_view->urlquery_img_thumb_grandmathermather     = $this->urlquery();
            }else{
                $this->_view->grandmathermather_img                    = comConst::IMAGE_EXISTENCE_FLG_NO;
            }

            }

            //現在時刻
            $now_Date = $this->nowDate();
            $this->_view->nowDate           = $now_Date;

            //大切な故人データ用
            $this->_view->deceased_name_list               = $result_deceased;

            echo $this->_view->render('family_tree.tpl');

            }

     } catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
     }


    }

/** ===============  　　　画像URL 　　　====================== */

    //自分画像アドレスを返す
    public function readimage($userid){
        $imagePath = '../imges/self/' . $userid . '.jpg';

    return $imagePath;

    }

    //父親画像アドレスを返す
    public function readimagefather($userid){
        $imagePathfathrer = '../imges/father/' . $userid . '.jpg';

    return $imagePathfathrer;

    }

    //母親画像アドレスを返す
    public function readimagemather($userid){
        $imagePathmathrer = '../imges/mather/' . $userid . '.jpg';

    return $imagePathmathrer;

    }

    //配偶者画像アドレスを返す
    public function readimagespouse($userid){
        $imagePathspouse = '../imges/spouse/' . $userid . '.jpg';

    return $imagePathspouse;

    }

    //兄弟姉妹１画像アドレスを返す
    public function readimagebrotherone($userid){
        $imagePathbrotherone = '../imges/brotherone/' . $userid . '.jpg';

    return $imagePathbrotherone;

    }

    //兄弟姉妹２画像アドレスを返す
    public function readimagebrothertwo($userid){
        $imagePathbrothertwo = '../imges/brothertwo/' . $userid . '.jpg';

    return $imagePathbrothertwo;

    }

    //兄弟姉妹３画像アドレスを返す
    public function readimagebrotherthree($userid){
        $imagePathbrotherthree = '../imges/brotherthree/' . $userid . '.jpg';

    return $imagePathbrotherthree;

    }

    //子供１画像アドレスを返す
    public function readimagechildone($userid){
        $imagePathchildone = '../imges/childone/' . $userid . '.jpg';

    return $imagePathchildone;

    }

    //子供２画像アドレスを返す
    public function readimagechildtwo($userid){
        $imagePathchildtwo = '../imges/childtwo/' . $userid . '.jpg';

    return $imagePathchildtwo;

    }

    //子供３画像アドレスを返す
    public function readimagechildthree($userid){
        $imagePathchildthree = '../imges/childthree/' . $userid . '.jpg';

    return $imagePathchildthree;

    }

    //子供４画像アドレスを返す
    public function readimagechildfour($userid){
        $imagePathchildfour = '../imges/childfour/' . $userid . '.jpg';

    return $imagePathchildfour;

    }

    //子供１孫１画像アドレスを返す
    public function readimagechildonegrandsonone($userid){
        $imagePathchildonegrandsonone = '../imges/childonegrandsonone/' . $userid . '.jpg';

    return $imagePathchildonegrandsonone;

    }

    //子供１孫２画像アドレスを返す
    public function readimagechildonegrandsontwo($userid){
        $imagePathchildonegrandsontwo = '../imges/childonegrandsontwo/' . $userid . '.jpg';

    return $imagePathchildonegrandsontwo;

    }

    //子供１孫３画像アドレスを返す
    public function readimagechildonegrandsonthree($userid){
        $imagePathchildonegrandsonthree = '../imges/childonegrandsonthree/' . $userid . '.jpg';

    return $imagePathchildonegrandsonthree;

    }

    //子供２孫１画像アドレスを返す
    public function readimagechildtwograndsonone($userid){
        $imagePathchildtwograndsonone = '../imges/childtwograndsonone/' . $userid . '.jpg';

    return $imagePathchildtwograndsonone;

    }

    //子供２孫２画像アドレスを返す
    public function readimagechildtwograndsontwo($userid){
        $imagePathchildtwograndsontwo = '../imges/childtwograndsontwo/' . $userid . '.jpg';

    return $imagePathchildtwograndsontwo;

    }

    //子供２孫３画像アドレスを返す
    public function readimagechildtwograndsonthree($userid){
        $imagePathchildtwograndsonthree = '../imges/childtwograndsonthree/' . $userid . '.jpg';

    return $imagePathchildtwograndsonthree;

    }

    //子供３孫１画像アドレスを返す
    public function readimagechildthreegrandsonone($userid){
        $imagePathchildthreegrandsonone = '../imges/childthreegrandsonone/' . $userid . '.jpg';

    return $imagePathchildthreegrandsonone;

    }

    //子供３孫２画像アドレスを返す
    public function readimagechildthreegrandsontwo($userid){
        $imagePathchildthreegrandsontwo = '../imges/childthreegrandsontwo/' . $userid . '.jpg';

    return $imagePathchildthreegrandsontwo;

    }

    //子供３孫３画像アドレスを返す
    public function readimagechildthreegrandsonthree($userid){
        $imagePathchildthreegrandsonthree = '../imges/childthreegrandsonthree/' . $userid . '.jpg';

    return $imagePathchildthreegrandsonthree;

    }

    //子供４孫１画像アドレスを返す
    public function readimagechildfourgrandsonone($userid){
        $imagePathchildfourgrandsonone = '../imges/childfourgrandsonone/' . $userid . '.jpg';

    return $imagePathchildfourgrandsonone;

    }

    //子供４孫２画像アドレスを返す
    public function readimagechildfourgrandsontwo($userid){
        $imagePathchildfourgrandsontwo = '../imges/childfourgrandsontwo/' . $userid . '.jpg';

    return $imagePathchildfourgrandsontwo;

    }

    //子供４孫３画像アドレスを返す
    public function readimagechildfourgrandsonthree($userid){
        $imagePathchildfourgrandsonthree = '../imges/childfourgrandsonthree/' . $userid . '.jpg';

    return $imagePathchildfourgrandsonthree;

    }

    //祖父父方画像アドレスを返す
    public function readimagegrandfatherfather($userid){
        $imagePathgrandfatherfather = '../imges/grandfatherfather/' . $userid . '.jpg';

    return $imagePathgrandfatherfather;

    }

    //祖母父方画像アドレスを返す
    public function readimagegrandfathermather($userid){
        $imagePathgrandfathermather = '../imges/grandfathermather/' . $userid . '.jpg';

    return $imagePathgrandfathermather;

    }

    //祖父母方画像アドレスを返す
    public function readimagegrandmatherfather($userid){
        $imagePathgrandmatherfather = '../imges/grandmatherfather/' . $userid . '.jpg';

    return $imagePathgrandmatherfather;

    }

    //祖母母方画像アドレスを返す
    public function readimagegrandmathermather($userid){
        $imagePathgrandmathermather = '../imges/grandmathermather/' . $userid . '.jpg';

    return $imagePathgrandmathermather;

    }

    public function disAction(){
            // ログインしていない場合、閲覧できません画像を表示
            header('Content-type: image/jpeg');
            readfile('../../Family_Tree/CanNotBrowse.png');
    }

/** ===============  データ挿入、修正 ======================== */

//=================自分=============================================================//

    //自分データ挿入
    public function selfdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id      = $this->getRequest()->getPost('customer_id');
        $self_family_name = $this->getRequest()->getPost('self_family_name');
        $self_birthday    = $this->getRequest()->getPost('self_birthday');
        $self_deathday    = $this->getRequest()->getPost('self_deathday');
        $self_profession  = $this->getRequest()->getPost('self_profession');
        $self_memo        = $this->getRequest()->getPost('self_memo');

        //自分データをインサート
        $orderpageModel->insertselfdata($customer_id,
                                        $self_family_name,
                                        $self_birthday,
                                        $self_profession,
                                        $self_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_SELF_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_self = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //自分データ修正
    public function selfdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel   = new orderpageModel();

        //post受信
        $customer_id      = $this->getRequest()->getPost('customer_id');
        $self_family_name = $this->getRequest()->getPost('self_family_name');
        $self_birthday    = $this->getRequest()->getPost('self_birthday');
        $self_deathday    = $this->getRequest()->getPost('self_deathday');
        $self_profession  = $this->getRequest()->getPost('self_profession');
        $self_memo        = $this->getRequest()->getPost('self_memo');

        //自分データを更新する
        $orderpageModel->changeselfdata($customer_id,
                                        $self_family_name,
                                        $self_birthday,
                                        $self_deathday,
                                        $self_profession,
                                        $self_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //選択されている場合、フラグを1にする
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_SELF_DIR . $fileName;
            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
            exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
            chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
            $this->_session->image_path_self = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
     }


    }

//=================父親=============================================================//
    //父親データ挿入（大切な故人より）
    public function fatherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $father_family_name = $this->getRequest()->getPost('father_family_name');                   //お名前
        $father_birthday    = $this->getRequest()->getPost('father_birthday');                      //生年月日
        $father_deathday    = $this->getRequest()->getPost('father_deathday');                      //没年月日
        $father_img_name     = $this->getRequest()->getPost('father_img_name');                     //画像名
        $father_profession  = $this->getRequest()->getPost('father_profession');                    //職業
        $father_memo        = $this->getRequest()->getPost('father_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $father_family_name_r = str_replace(array(" ", "　"), "", $father_family_name);

        //父親データをインサート
        $orderpageModel->insertfatherdeceaseddata(  $customer_id,
                                                    $father_family_name_r,
                                                    $father_birthday,
                                                    $father_deathday,
                                                    $father_img_name,
                                                    $father_profession,
                                                    $father_memo
                                                );


        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_FATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_father = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //父親データ挿入（個人追加より）
    public function fatherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $father_family_name = $this->getRequest()->getPost('father_family_name');                   //お名前
        $father_birthday    = $this->getRequest()->getPost('father_birthday');                      //生年月日
        $father_deathday    = $this->getRequest()->getPost('father_deathday');                      //没年月日
        $father_profession  = $this->getRequest()->getPost('father_profession');                    //職業
        $father_memo        = $this->getRequest()->getPost('father_memo');                          //メモ

        //父親データをインサート
        $orderpageModel->insertfatherdata(  $customer_id,
                                            $father_family_name,
                                            $father_birthday,
                                            $father_deathday,
                                            $father_profession,
                                            $father_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_FATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_father = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //父親データ修正
    public function fatherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $father_family_name = $this->getRequest()->getPost('father_family_name');                   //お名前
        $father_birthday    = $this->getRequest()->getPost('father_birthday');                      //生年月日
        $father_deathday    = $this->getRequest()->getPost('father_deathday');                      //没年月日
        $father_profession  = $this->getRequest()->getPost('father_profession');                    //職業
        $father_memo        = $this->getRequest()->getPost('father_memo');                          //メモ

        //父親データを更新する
        $orderpageModel->changefatherdata(  $customer_id,
                                            $father_family_name,
                                            $father_birthday,
                                            $father_deathday,
                                            $father_profession,
                                            $father_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_FATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_father = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
     }

    }

    //父親データ削除
    public function fatherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');
        $father_family_name = $this->getRequest()->getPost('father_family_name');

        //父親データを削除
        $orderpageModel->deletefatherdata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_FATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function fatherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=================母親=========================================================//

    //母親データ挿入（大切な故人より）
    public function matherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $mather_family_name = $this->getRequest()->getPost('mather_family_name');                   //お名前
        $mather_birthday    = $this->getRequest()->getPost('mather_birthday');                      //生年月日
        $mather_deathday    = $this->getRequest()->getPost('mather_deathday');                      //没年月日
        $mather_img_name    = $this->getRequest()->getPost('mather_img_name');                      //画像名
        $mather_profession  = $this->getRequest()->getPost('mather_profession');                    //職業
        $mather_memo        = $this->getRequest()->getPost('mather_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $mather_family_name_r = str_replace(array(" ", "　"), "", $mather_family_name);

        //母親データをインサート
        $orderpageModel->insertmatherdeceaseddata(  $customer_id,
                                                    $mather_family_name_r,
                                                    $mather_birthday,
                                                    $mather_deathday,
                                                    $mather_img_name,
                                                    $mather_profession,
                                                    $mather_memo
                                                );
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_MATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_father = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

     //母親データ挿入（個人追加より）
    public function matherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel     = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $mather_family_name = $this->getRequest()->getPost('mather_family_name');                   //お名前
        $mather_birthday    = $this->getRequest()->getPost('mather_birthday');                      //生年月日
        $mather_deathday    = $this->getRequest()->getPost('mather_deathday');                      //没年月日
        $mather_profession  = $this->getRequest()->getPost('mather_profession');                    //職業
        $mather_memo        = $this->getRequest()->getPost('mather_memo');                          //メモ

        //母親データをインサート
        $orderpageModel->insertmatherdata(  $customer_id,
                                            $mather_family_name,
                                            $mather_birthday,
                                            $mather_deathday,
                                            $mather_profession,
                                            $mather_memo
                                        );

        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_MATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_father = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //母親データ修正
    public function matherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $mather_family_name = $this->getRequest()->getPost('mather_family_name');                   //お名前
        $mather_birthday    = $this->getRequest()->getPost('mather_birthday');                      //生年月日
        $mather_deathday    = $this->getRequest()->getPost('mather_deathday');                      //没年月日
        $mather_profession  = $this->getRequest()->getPost('mather_profession');                    //職業
        $mather_memo        = $this->getRequest()->getPost('mather_memo');                          //メモ

        //母親データを更新する
        $orderpageModel->changematherdata(  $customer_id,
                                            $mather_family_name,
                                            $mather_birthday,
                                            $mather_deathday,
                                            $mather_profession,
                                            $mather_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_MATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_mather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }

    //母親データ削除
    public function matherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');
        $mather_family_name = $this->getRequest()->getPost('mather_family_name');

        //文字中の半角・全角空白を削除
        $mather_family_name_r = str_replace(array(" ", "　"), "", $mather_family_name);

        //母親データを削除
        $orderpageModel->deletematherdata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$mather_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_MATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function matherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=================配偶者=========================================================//
    //配偶者データ挿入（大切な故人より）
    public function spousedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $spouse_family_name = $this->getRequest()->getPost('spouse_family_name');                   //お名前
        $spouse_birthday    = $this->getRequest()->getPost('spouse_birthday');                      //生年月日
        $spouse_deathday    = $this->getRequest()->getPost('spouse_deathday');                      //没年月日
        $spouse_profession  = $this->getRequest()->getPost('spouse_profession');                    //職業
        $spouse_memo        = $this->getRequest()->getPost('spouse_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $spouse_family_name_r = str_replace(array(" ", "　"), "", $spouse_family_name);

        //母親データをインサート
        $orderpageModel->insertspousedata(  $customer_id,
                                            $spouse_family_name_r,
                                            $spouse_birthday,
                                            $spouse_deathday,
                                            $spouse_profession,
                                            $spouse_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_SPOUSE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_spouse = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //配偶者データ挿入（個人追加より）
    public function spousedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id'); 							//ユーザーID
        $spouse_family_name = $this->getRequest()->getPost('spouse_family_name'); 					//お名前
        $spouse_birthday    = $this->getRequest()->getPost('spouse_birthday');                      //生年月日
        $spouse_deathday    = $this->getRequest()->getPost('spouse_deathday');                      //没年月日
        $spouse_profession  = $this->getRequest()->getPost('spouse_profession');                    //職業
        $spouse_memo        = $this->getRequest()->getPost('spouse_memo');                          //メモ


        //配偶者データをインサート
        $orderpageModel->insertspousedata(  $customer_id,
                                            $spouse_family_name,
                                            $spouse_birthday,
                                            $spouse_deathday,
                                            $spouse_profession,
                                            $spouse_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_SPOUSE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_spouse = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //配偶者データ修正
    public function spousedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $spouse_family_name = $this->getRequest()->getPost('spouse_family_name');                   //お名前
        $spouse_birthday    = $this->getRequest()->getPost('spouse_birthday');                      //生年月日
        $spouse_deathday    = $this->getRequest()->getPost('spouse_deathday');                      //没年月日
        $spouse_profession  = $this->getRequest()->getPost('spouse_profession');                    //職業
        $spouse_memo        = $this->getRequest()->getPost('spouse_memo');                          //メモ

        //配偶者データを更新する
        $orderpageModel->changespousedata(  $customer_id,
                                            $spouse_family_name,
                                            $spouse_birthday,
                                            $spouse_deathday,
                                            $spouse_profession,
                                            $spouse_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_SPOUSE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_spouse = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {
        // 例外発生時
         die($e->getMessage());
     }

    }

    //配偶者データ削除
    public function spousedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');
        $spouse_family_name = $this->getRequest()->getPost('spouse_family_name');

        //文字中の半角・全角空白を削除
        $spouse_family_name_r = str_replace(array(" ", "　"), "", $spouse_family_name);

        //配偶者データを削除
        $orderpageModel->deletespousedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$spouse_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_SPOUSE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function spousedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================兄弟姉妹１==============================//

   //兄弟姉妹１データ挿入（大切な故人より）
    public function brotheronedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $brotherone_family_name = $this->getRequest()->getPost('brotherone_deceased_family_name');                   //お名前
        $brotherone_sex         = $this->getRequest()->getPost('brotherone_deceased_sex');                           //性別
        $brotherone_birthday    = $this->getRequest()->getPost('brotherone_deceased_birthday');                      //生年月日
        $brotherone_deathday    = $this->getRequest()->getPost('brotherone_deceased_deathday');                      //没年月日
        $brotherone_profession  = $this->getRequest()->getPost('brotherone_deceased_profession');                    //職業
        $brotherone_memo        = $this->getRequest()->getPost('brotherone_deceased_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $brotherone_family_name_r = str_replace(array(" ", "　"), "", $brotherone_family_name);

        //兄弟姉妹１データをインサート
        $orderpageModel->insertbrotheronedata(  $customer_id,
                                            $brotherone_family_name_r,
                                            $brotherone_sex,
                                            $brotherone_birthday,
                                            $brotherone_deathday,
                                            $brotherone_profession,
                                            $brotherone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //兄弟姉妹１データ挿入（個人追加より）
    public function brotheronedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $brotherone_family_name = $this->getRequest()->getPost('brotherone_family_name');                   //お名前
        $brotherone_sex         = $this->getRequest()->getPost('brotherone_sex');                           //性別
        $brotherone_birthday    = $this->getRequest()->getPost('brotherone_birthday');                      //生年月日
        $brotherone_deathday    = $this->getRequest()->getPost('brotherone_deathday');                      //没年月日
        $brotherone_profession  = $this->getRequest()->getPost('brotherone_profession');                    //職業
        $brotherone_memo        = $this->getRequest()->getPost('brotherone_memo');                          //メモ

        //兄弟姉妹１データをインサート
        $orderpageModel->insertbrotheronedata(  $customer_id,
                                            $brotherone_family_name,
                                            $brotherone_sex,
                                            $brotherone_birthday,
                                            $brotherone_deathday,
                                            $brotherone_profession,
                                            $brotherone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //兄弟姉妹１データ修正
    public function brotheronedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $brotherone_family_name = $this->getRequest()->getPost('brotherone_family_name');                   //お名前
        $brotherone_sex         = $this->getRequest()->getPost('brotherone_sex');                           //性別
        $brotherone_birthday    = $this->getRequest()->getPost('brotherone_birthday');                      //生年月日
        $brotherone_deathday    = $this->getRequest()->getPost('brotherone_deathday');                      //没年月日
        $brotherone_profession  = $this->getRequest()->getPost('brotherone_profession');                    //職業
        $brotherone_memo        = $this->getRequest()->getPost('brotherone_memo');                          //メモ

        //兄弟姉妹１データを更新する
        $orderpageModel->changebrotheronedata(  $customer_id,
                                            $brotherone_family_name,
                                            $brotherone_sex,
                                            $brotherone_birthday,
                                            $brotherone_deathday,
                                            $brotherone_profession,
                                            $brotherone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //兄弟姉妹１データ削除
    public function brotheronedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $brotherone_family_name_r = str_replace(array(" ", "　"), "", $brotherone_family_name);

        //兄弟姉妹１データを削除
        $orderpageModel->deletebrotheronedata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_BROTHERONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function brotheronedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }


//=======================兄弟姉妹2==============================//
   //兄弟姉妹２データ挿入（大切な故人より）
    public function brothertwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $brothertwo_family_name = $this->getRequest()->getPost('brothertwo_family_name');                   //お名前
        $brothertwo_sex         = $this->getRequest()->getPost('brothertwo_sex');                           //性別
        $brothertwo_birthday    = $this->getRequest()->getPost('brothertwo_birthday');                      //生年月日
        $brothertwo_deathday    = $this->getRequest()->getPost('brothertwo_deathday');                      //没年月日
        $brothertwo_profession  = $this->getRequest()->getPost('brothertwo_profession');                    //職業
        $brothertwo_memo        = $this->getRequest()->getPost('brothertwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $brothertwo_family_name_r = str_replace(array(" ", "　"), "", $brothertwo_family_name);

        //兄弟姉妹２データをインサート
        $orderpageModel->insertbrothertwodata(  $customer_id,
                                            $brothertwo_family_name_r,
                                            $brothertwo_sex,
                                            $brothertwo_birthday,
                                            $brothertwo_deathday,
                                            $brothertwo_profession,
                                            $brothertwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brothertwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //兄弟姉妹２データ挿入（個人追加より）
    public function brothertwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $brothertwo_family_name = $this->getRequest()->getPost('brothertwo_family_name');                   //お名前
        $brothertwo_sex         = $this->getRequest()->getPost('brothertwo_sex');                           //性別
        $brothertwo_birthday    = $this->getRequest()->getPost('brothertwo_birthday');                      //生年月日
        $brothertwo_deathday    = $this->getRequest()->getPost('brothertwo_deathday');                      //没年月日
        $brothertwo_profession  = $this->getRequest()->getPost('brothertwo_profession');                    //職業
        $brothertwo_memo        = $this->getRequest()->getPost('brothertwo_memo');                          //メモ

        //兄弟姉妹２データをインサート
        $orderpageModel->insertbrothertwodata(  $customer_id,
                                            $brothertwo_family_name,
                                            $brothertwo_sex,
                                            $brothertwo_birthday,
                                            $brothertwo_deathday,
                                            $brothertwo_profession,
                                            $brothertwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brothertwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //兄弟姉妹２データ修正
    public function brothertwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $brothertwo_family_name = $this->getRequest()->getPost('brothertwo_family_name');                   //お名前
        $brothertwo_sex         = $this->getRequest()->getPost('brothertwo_sex');                           //性別
        $brothertwo_birthday    = $this->getRequest()->getPost('brothertwo_birthday');                      //生年月日
        $brothertwo_deathday    = $this->getRequest()->getPost('brothertwo_deathday');                      //没年月日
        $brothertwo_profession  = $this->getRequest()->getPost('brothertwo_profession');                    //職業
        $brothertwo_memo        = $this->getRequest()->getPost('brothertwo_memo');                          //メモ

        //兄弟姉妹２データを更新する
        $orderpageModel->changebrothertwodata(  $customer_id,
                                            $brothertwo_family_name,
                                            $brothertwo_sex,
                                            $brothertwo_birthday,
                                            $brothertwo_deathday,
                                            $brothertwo_profession,
                                            $brothertwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brothertwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //兄弟姉妹２データ削除
    public function brothertwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $brothertwo_family_name_r = str_replace(array(" ", "　"), "", $brothertwo_family_name);

        //兄弟姉妹２データを削除
        $orderpageModel->deletebrothertwodata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_BROTHERTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function brothertwodeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================兄弟姉妹３==============================//
   //兄弟姉妹３データ挿入（大切な故人より）
    public function brotherthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $brotherthree_family_name = $this->getRequest()->getPost('brotherthree_family_name');                   //お名前
        $brotherthree_sex         = $this->getRequest()->getPost('brotherthree_sex');                           //性別
        $brotherthree_birthday    = $this->getRequest()->getPost('brotherthree_birthday');                      //生年月日
        $brotherthree_deathday    = $this->getRequest()->getPost('brotherthree_deathday');                      //没年月日
        $brotherthree_profession  = $this->getRequest()->getPost('brotherthree_profession');                    //職業
        $brotherthree_memo        = $this->getRequest()->getPost('brotherthree_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $brotherthree_family_name_r = str_replace(array(" ", "　"), "", $brotherthree_family_name);

        //兄弟姉妹３データをインサート
        $orderpageModel->insertbrotherthreedata(  $customer_id,
                                            $brotherthree_family_name_r,
                                            $brotherthree_sex,
                                            $brotherthree_birthday,
                                            $brotherthree_deathday,
                                            $brotherthree_profession,
                                            $brotherthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //兄弟姉妹３データ挿入（個人追加より）
    public function brotherthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $brotherthree_family_name = $this->getRequest()->getPost('brotherthree_family_name');                   //お名前
        $brotherthree_sex         = $this->getRequest()->getPost('brotherthree_sex');                           //性別
        $brotherthree_birthday    = $this->getRequest()->getPost('brotherthree_birthday');                      //生年月日
        $brotherthree_deathday    = $this->getRequest()->getPost('brotherthree_deathday');                      //没年月日
        $brotherthree_profession  = $this->getRequest()->getPost('brotherthree_profession');                    //職業
        $brotherthree_memo        = $this->getRequest()->getPost('brotherthree_memo');                          //メモ

        //兄弟姉妹３データをインサート
        $orderpageModel->insertbrotherthreedata(  $customer_id,
                                            $brotherthree_family_name,
                                            $brotherthree_sex,
                                            $brotherthree_birthday,
                                            $brotherthree_deathday,
                                            $brotherthree_profession,
                                            $brotherthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //兄弟姉妹３データ修正
    public function brotherthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $brotherthree_family_name = $this->getRequest()->getPost('brotherthree_family_name');                   //お名前
        $brotherthree_sex         = $this->getRequest()->getPost('brotherthree_sex');                           //性別
        $brotherthree_birthday    = $this->getRequest()->getPost('brotherthree_birthday');                      //生年月日
        $brotherthree_deathday    = $this->getRequest()->getPost('brotherthree_deathday');                      //没年月日
        $brotherthree_profession  = $this->getRequest()->getPost('brotherthree_profession');                    //職業
        $brotherthree_memo        = $this->getRequest()->getPost('brotherthree_memo');                          //メモ

        //兄弟姉妹３データを更新する
        $orderpageModel->changebrotherthreedata(  $customer_id,
                                            $brotherthree_family_name,
                                            $brotherthree_sex,
                                            $brotherthree_birthday,
                                            $brotherthree_deathday,
                                            $brotherthree_profession,
                                            $brotherthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_BROTHERTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_brotherthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //兄弟姉妹３データ削除
    public function brotherthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $brotherthree_family_name_r = str_replace(array(" ", "　"), "", $brotherthree_family_name);

        //兄弟姉妹３データを削除
        $orderpageModel->deletebrotherthreedata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_BROTHERTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function brotherthreedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================子供１==============================//

    //子供１データ挿入（大切な故人より）
    public function childonedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childone_family_name = $this->getRequest()->getPost('childone_family_name');                   //お名前
        $childone_sex         = $this->getRequest()->getPost('childone_sex');                           //性別
        $childone_spouse_name = $this->getRequest()->getPost('childone_spouse_name');                   //配偶者名
        $childone_birthday    = $this->getRequest()->getPost('childone_birthday');                      //生年月日
        $childone_deathday    = $this->getRequest()->getPost('childone_deathday');                      //没年月日
        $childone_profession  = $this->getRequest()->getPost('childone_profession');                    //職業
        $childone_memo        = $this->getRequest()->getPost('childone_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childone_family_name_r = str_replace(array(" ", "　"), "", $childone_family_name);

        //子供１データをインサート
        $orderpageModel->insertchildonedata(  $customer_id,
                                            $childone_family_name_r,
                                            $childone_sex,
                                            $childone_spouse_name,
                                            $childone_birthday,
                                            $childone_deathday,
                                            $childone_profession,
                                            $childone_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childone_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供１データ挿入（個人追加より）
    public function childonedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childone_family_name = $this->getRequest()->getPost('childone_family_name');                   //お名前
        $childone_sex         = $this->getRequest()->getPost('childone_sex');                           //性別
        $childone_spouse_name = $this->getRequest()->getPost('childone_spouse_name');                   //配偶者名
        $childone_birthday    = $this->getRequest()->getPost('childone_birthday');                      //生年月日
        $childone_deathday    = $this->getRequest()->getPost('childone_deathday');                      //没年月日
        $childone_profession  = $this->getRequest()->getPost('childone_profession');                    //職業
        $childone_memo        = $this->getRequest()->getPost('childone_memo');                          //メモ

        //子供１データをインサート
        $orderpageModel->insertchildonedata(  $customer_id,
                                            $childone_family_name,
                                            $childone_sex,
                                            $childone_spouse_name,
                                            $childone_birthday,
                                            $childone_deathday,
                                            $childone_profession,
                                            $childone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }




    //子供１データ修正
    public function childonedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childone_family_name = $this->getRequest()->getPost('childone_family_name');                   //お名前
        $childone_sex         = $this->getRequest()->getPost('childone_sex');                           //性別
        $childone_spouse_name = $this->getRequest()->getPost('childone_spouse_name');                   //配偶者名
        $childone_birthday    = $this->getRequest()->getPost('childone_birthday');                      //生年月日
        $childone_deathday    = $this->getRequest()->getPost('childone_deathday');                      //没年月日
        $childone_profession  = $this->getRequest()->getPost('childone_profession');                    //職業
        $childone_memo        = $this->getRequest()->getPost('childone_memo');                          //メモ

        //子供１データを更新する
        $orderpageModel->changechildonedata(  $customer_id,
                                            $childone_family_name,
                                            $childone_sex,
                                            $childone_spouse_name,
                                            $childone_birthday,
                                            $childone_deathday,
                                            $childone_profession,
                                            $childone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供１データ削除
    public function childonedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childone_family_name_r = str_replace(array(" ", "　"), "", $childone_family_name);

        //子供１データを削除
        $orderpageModel->deletechildonedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childone_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function childonedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================子供２==============================//
    //子供２データ挿入（大切な故人より）
    public function childtwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childtwo_family_name = $this->getRequest()->getPost('childtwo_family_name');                   //お名前
        $childtwo_sex         = $this->getRequest()->getPost('childtwo_sex');                           //性別
        $childtwo_spouse_name = $this->getRequest()->getPost('childtwo_spouse_name');                   //配偶者名
        $childtwo_birthday    = $this->getRequest()->getPost('childtwo_birthday');                      //生年月日
        $childtwo_deathday    = $this->getRequest()->getPost('childtwo_deathday');                      //没年月日
        $childtwo_profession  = $this->getRequest()->getPost('childtwo_profession');                    //職業
        $childtwo_memo        = $this->getRequest()->getPost('childtwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childtwo_family_name_r = str_replace(array(" ", "　"), "", $childtwo_family_name);

        //子供２データをインサート
        $orderpageModel->insertchildtwodata(  $customer_id,
                                            $childtwo_family_name_r,
                                            $childtwo_sex,
                                            $childtwo_spouse_name,
                                            $childtwo_birthday,
                                            $childtwo_deathday,
                                            $childtwo_profession,
                                            $childtwo_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childtwo_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供２データ挿入（個人追加より）
    public function childtwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childtwo_family_name = $this->getRequest()->getPost('childtwo_family_name');                   //お名前
        $childtwo_sex         = $this->getRequest()->getPost('childtwo_sex');                           //性別
        $childtwo_spouse_name = $this->getRequest()->getPost('childtwo_spouse_name');                   //配偶者名
        $childtwo_birthday    = $this->getRequest()->getPost('childtwo_birthday');                      //生年月日
        $childtwo_deathday    = $this->getRequest()->getPost('childtwo_deathday');                      //没年月日
        $childtwo_profession  = $this->getRequest()->getPost('childtwo_profession');                    //職業
        $childtwo_memo        = $this->getRequest()->getPost('childtwo_memo');                          //メモ

        //子供２データをインサート
        $orderpageModel->insertchildtwodata(  $customer_id,
                                            $childtwo_family_name,
                                            $childtwo_sex,
                                            $childtwo_spouse_name,
                                            $childtwo_birthday,
                                            $childtwo_deathday,
                                            $childtwo_profession,
                                            $childtwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_CHILDTWO = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供２データ修正
    public function childtwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childtwo_family_name = $this->getRequest()->getPost('childtwo_family_name');                   //お名前
        $childtwo_sex         = $this->getRequest()->getPost('childtwo_sex');                           //性別
        $childtwo_spouse_name = $this->getRequest()->getPost('childtwo_spouse_name');                   //配偶者名
        $childtwo_birthday    = $this->getRequest()->getPost('childtwo_birthday');                      //生年月日
        $childtwo_deathday    = $this->getRequest()->getPost('childtwo_deathday');                      //没年月日
        $childtwo_profession  = $this->getRequest()->getPost('childtwo_profession');                    //職業
        $childtwo_memo        = $this->getRequest()->getPost('childtwo_memo');                          //メモ

        //子供２データを更新する
        $orderpageModel->changechildtwodata(  $customer_id,
                                            $childtwo_family_name,
                                            $childtwo_sex,
                                            $childtwo_spouse_name,
                                            $childtwo_birthday,
                                            $childtwo_deathday,
                                            $childtwo_profession,
                                            $childtwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供２データ削除
    public function childtwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

        //文字中の半角・全角空白を削除
        $childtwo_family_name_r = str_replace(array(" ", "　"), "", $childtwo_family_name);

        //子供２データを削除
        $orderpageModel->deletechildtwodata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childtwo_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function childtwodeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================子供３==============================//
    //子供３データ挿入（大切な故人より）
    public function childthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                                  //ユーザーID
        $childthree_family_name = $this->getRequest()->getPost('childthree_family_name');                   //お名前
        $childthree_sex         = $this->getRequest()->getPost('childthree_sex');                           //性別
        $childthree_spouse_name = $this->getRequest()->getPost('childthree_spouse_name');                   //配偶者名
        $childthree_birthday    = $this->getRequest()->getPost('childthree_birthday');                      //生年月日
        $childthree_deathday    = $this->getRequest()->getPost('childthree_deathday');                      //没年月日
        $childthree_profession  = $this->getRequest()->getPost('childthree_profession');                    //職業
        $childthree_memo        = $this->getRequest()->getPost('childthree_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childthree_family_name_r = str_replace(array(" ", "　"), "", $childthree_family_name);

        //子供３データをインサート
        $orderpageModel->insertchildthreedata(  $customer_id,
                                            $childthree_family_name_r,
                                            $childthree_sex,
                                            $childthree_spouse_name,
                                            $childthree_birthday,
                                            $childthree_deathday,
                                            $childthree_profession,
                                            $childthree_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childthree_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供３データ挿入（個人追加より）
    public function childthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                                //ユーザーID
        $childthree_family_name = $this->getRequest()->getPost('childthree_family_name');                   //お名前
        $childthree_sex         = $this->getRequest()->getPost('childthree_sex');                           //性別
        $childthree_spouse_name = $this->getRequest()->getPost('childthree_spouse_name');                   //配偶者名
        $childthree_birthday    = $this->getRequest()->getPost('childthree_birthday');                      //生年月日
        $childthree_deathday    = $this->getRequest()->getPost('childthree_deathday');                      //没年月日
        $childthree_profession  = $this->getRequest()->getPost('childthree_profession');                    //職業
        $childthree_memo        = $this->getRequest()->getPost('childthree_memo');                          //メモ

        //子供３データをインサート
        $orderpageModel->insertchildthreedata(  $customer_id,
                                            $childthree_family_name,
                                            $childthree_sex,
                                            $childthree_spouse_name,
                                            $childthree_birthday,
                                            $childthree_deathday,
                                            $childthree_profession,
                                            $childthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }




    //子供３データ修正
    public function childthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                                //ユーザーID
        $childthree_family_name = $this->getRequest()->getPost('childthree_family_name');                   //お名前
        $childthree_sex         = $this->getRequest()->getPost('childthree_sex');                           //性別
        $childthree_spouse_name = $this->getRequest()->getPost('childthree_spouse_name');                   //配偶者名
        $childthree_birthday    = $this->getRequest()->getPost('childthree_birthday');                      //生年月日
        $childthree_deathday    = $this->getRequest()->getPost('childthree_deathday');                      //没年月日
        $childthree_profession  = $this->getRequest()->getPost('childthree_profession');                    //職業
        $childthree_memo        = $this->getRequest()->getPost('childthree_memo');                          //メモ

        //子供３データを更新する
        $orderpageModel->changechildthreedata(  $customer_id,
                                            $childthree_family_name,
                                            $childthree_sex,
                                            $childthree_spouse_name,
                                            $childthree_birthday,
                                            $childthree_deathday,
                                            $childthree_profession,
                                            $childthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供３データ削除
    public function childthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childthree_family_name_r = str_replace(array(" ", "　"), "", $childthree_family_name);

        //子供３データを削除
        $orderpageModel->deletechildthreedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childthree_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childthreedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }


//=======================子供４==============================//
    //子供４データ挿入（大切な故人より）
    public function childfourdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                                  //ユーザーID
        $childfour_family_name = $this->getRequest()->getPost('childfour_family_name');                   //お名前
        $childfour_sex         = $this->getRequest()->getPost('childfour_sex');                           //性別
        $childfour_spouse_name = $this->getRequest()->getPost('childfour_spouse_name');                   //配偶者名
        $childfour_birthday    = $this->getRequest()->getPost('childfour_birthday');                      //生年月日
        $childfour_deathday    = $this->getRequest()->getPost('childfour_deathday');                      //没年月日
        $childfour_profession  = $this->getRequest()->getPost('childfour_profession');                    //職業
        $childfour_memo        = $this->getRequest()->getPost('childfour_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childfour_family_name_r = str_replace(array(" ", "　"), "", $childfour_family_name);

        //子供４データをインサート
        $orderpageModel->insertchildfourdata(  $customer_id,
                                            $childfour_family_name_r,
                                            $childfour_sex,
                                            $childfour_spouse_name,
                                            $childfour_birthday,
                                            $childfour_deathday,
                                            $childfour_profession,
                                            $childfour_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childfour_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOUR_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfour = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供４データ挿入（個人追加より）
    public function childfourdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                                //ユーザーID
        $childfour_family_name = $this->getRequest()->getPost('childfour_family_name');                   //お名前
        $childfour_sex         = $this->getRequest()->getPost('childfour_sex');                           //性別
        $childfour_spouse_name = $this->getRequest()->getPost('childfour_spouse_name');                   //配偶者名
        $childfour_birthday    = $this->getRequest()->getPost('childfour_birthday');                      //生年月日
        $childfour_deathday    = $this->getRequest()->getPost('childfour_deathday');                      //没年月日
        $childfour_profession  = $this->getRequest()->getPost('childfour_profession');                    //職業
        $childfour_memo        = $this->getRequest()->getPost('childfour_memo');                          //メモ

        //子供４データをインサート
        $orderpageModel->insertchildfourdata(  $customer_id,
                                            $childfour_family_name,
                                            $childfour_sex,
                                            $childfour_spouse_name,
                                            $childfour_birthday,
                                            $childfour_deathday,
                                            $childfour_profession,
                                            $childfour_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOUR_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfour = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //子供４データ修正
    public function childfourdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                                //ユーザーID
        $childfour_family_name = $this->getRequest()->getPost('childfour_family_name');                   //お名前
        $childfour_sex         = $this->getRequest()->getPost('childfour_sex');                           //性別
        $childfour_spouse_name = $this->getRequest()->getPost('childfour_spouse_name');                   //配偶者名
        $childfour_birthday    = $this->getRequest()->getPost('childfour_birthday');                      //生年月日
        $childfour_deathday    = $this->getRequest()->getPost('childfour_deathday');                      //没年月日
        $childfour_profession  = $this->getRequest()->getPost('childfour_profession');                    //職業
        $childfour_memo        = $this->getRequest()->getPost('childfour_memo');                          //メモ

        //子供４データを更新する
        $orderpageModel->changechildfourdata(  $customer_id,
                                            $childfour_family_name,
                                            $childfour_sex,
                                            $childfour_spouse_name,
                                            $childfour_birthday,
                                            $childfour_deathday,
                                            $childfour_profession,
                                            $childfour_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOUR_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfour = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供４データ削除
    public function childfourdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childfour_family_name_r = str_replace(array(" ", "　"), "", $childfour_family_name);

        //子供４データを削除
        $orderpageModel->deletechildfourdata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childfour_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDFOUR_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childfourdeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//=======================子供１孫１==============================//
    //子供１孫１データ挿入（大切な故人より）
    public function childonegrandsononedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childonegrandsonone_family_name = $this->getRequest()->getPost('childonegrandsonone_family_name');                   //お名前
        $childonegrandsonone_sex         = $this->getRequest()->getPost('childonegrandsonone_sex');                           //性別
        $childonegrandsonone_birthday    = $this->getRequest()->getPost('childonegrandsonone_birthday');                      //生年月日
        $childonegrandsonone_deathday    = $this->getRequest()->getPost('childonegrandsonone_deathday');                      //没年月日
        $childonegrandsonone_profession  = $this->getRequest()->getPost('childonegrandsonone_profession');                    //職業
        $childonegrandsonone_memo        = $this->getRequest()->getPost('childonegrandsonone_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childonegrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsonone_family_name);

        //子供１孫１データをインサート
        $orderpageModel->insertchildonegrandsononedata(  $customer_id,
                                            $childonegrandsonone_family_name_r,
                                            $childonegrandsonone_sex,
                                            $childonegrandsonone_birthday,
                                            $childonegrandsonone_deathday,
                                            $childonegrandsonone_profession,
                                            $childonegrandsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供１孫１データ挿入（個人追加より）
    public function childonegrandsononedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childonegrandsonone_family_name = $this->getRequest()->getPost('childonegrandsonone_family_name');                   //お名前
        $childonegrandsonone_sex         = $this->getRequest()->getPost('childonegrandsonone_sex');                           //性別
        $childonegrandsonone_birthday    = $this->getRequest()->getPost('childonegrandsonone_birthday');                      //生年月日
        $childonegrandsonone_deathday    = $this->getRequest()->getPost('childonegrandsonone_deathday');                      //没年月日
        $childonegrandsonone_profession  = $this->getRequest()->getPost('childonegrandsonone_profession');                    //職業
        $childonegrandsonone_memo        = $this->getRequest()->getPost('childonegrandsonone_memo');                          //メモ

        //子供１孫１データをインサート
        $orderpageModel->insertchildonegrandsononedata(  $customer_id,
                                            $childonegrandsonone_family_name,
                                            $childonegrandsonone_sex,
                                            $childonegrandsonone_birthday,
                                            $childonegrandsonone_deathday,
                                            $childonegrandsonone_profession,
                                            $childonegrandsonone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_CHILDONEGRANDSONONE = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供１孫１データ修正
    public function childonegrandsononedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childonegrandsonone_family_name = $this->getRequest()->getPost('childonegrandsonone_family_name');                   //お名前
        $childonegrandsonone_sex         = $this->getRequest()->getPost('childonegrandsonone_sex');                           //性別
        $childonegrandsonone_birthday    = $this->getRequest()->getPost('childonegrandsonone_birthday');                      //生年月日
        $childonegrandsonone_deathday    = $this->getRequest()->getPost('childonegrandsonone_deathday');                      //没年月日
        $childonegrandsonone_profession  = $this->getRequest()->getPost('childonegrandsonone_profession');                    //職業
        $childonegrandsonone_memo        = $this->getRequest()->getPost('childonegrandsonone_memo');                          //メモ

        //子供１孫１データを更新する
        $orderpageModel->changechildonegrandsononedata(  $customer_id,
                                            $childonegrandsonone_family_name,
                                            $childonegrandsonone_sex,
                                            $childonegrandsonone_birthday,
                                            $childonegrandsonone_deathday,
                                            $childonegrandsonone_profession,
                                            $childonegrandsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供１孫１データ削除
    public function childonegrandsononedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childonegrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsonone_family_name);

        //子供１孫１データを削除
        $orderpageModel->deletechildonegrandsononedata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDONEGRANDSONONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function childonegrandsononedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================子供１孫2==============================//
    //子供１孫２データ挿入（大切な故人より）
    public function childonegrandsontwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childonegrandsontwo_family_name = $this->getRequest()->getPost('childonegrandsontwo_family_name');                   //お名前
        $childonegrandsontwo_sex         = $this->getRequest()->getPost('childonegrandsontwo_sex');                           //性別
        $childonegrandsontwo_birthday    = $this->getRequest()->getPost('childonegrandsontwo_birthday');                      //生年月日
        $childonegrandsontwo_deathday    = $this->getRequest()->getPost('childonegrandsontwo_deathday');                      //没年月日
        $childonegrandsontwo_profession  = $this->getRequest()->getPost('childonegrandsontwo_profession');                    //職業
        $childonegrandsontwo_memo        = $this->getRequest()->getPost('childonegrandsontwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childonegrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsontwo_family_name);

        //子供１孫２データをインサート
        $orderpageModel->insertchildonegrandsontwodata(  $customer_id,
                                            $childonegrandsontwo_family_name_r,
                                            $childonegrandsontwo_sex,
                                            $childonegrandsontwo_birthday,
                                            $childonegrandsontwo_deathday,
                                            $childonegrandsontwo_profession,
                                            $childonegrandsontwo_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childonegrandsontwo_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供１孫２データ挿入（個人追加より）
    public function childonegrandsontwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childonegrandsontwo_family_name = $this->getRequest()->getPost('childonegrandsontwo_family_name');                   //お名前
        $childonegrandsontwo_sex         = $this->getRequest()->getPost('childonegrandsontwo_sex');                           //性別
        $childonegrandsontwo_birthday    = $this->getRequest()->getPost('childonegrandsontwo_birthday');                      //生年月日
        $childonegrandsontwo_deathday    = $this->getRequest()->getPost('childonegrandsontwo_deathday');                      //没年月日
        $childonegrandsontwo_profession  = $this->getRequest()->getPost('childonegrandsontwo_profession');                    //職業
        $childonegrandsontwo_memo        = $this->getRequest()->getPost('childonegrandsontwo_memo');                          //メモ

        //子供１孫２データをインサート
        $orderpageModel->insertchildonegrandsontwodata(  $customer_id,
                                            $childonegrandsontwo_family_name,
                                            $childonegrandsontwo_sex,
                                            $childonegrandsontwo_birthday,
                                            $childonegrandsontwo_deathday,
                                            $childonegrandsontwo_profession,
                                            $childonegrandsontwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_CHILDONEgrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供１孫２データ修正
    public function childonegrandsontwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childonegrandsontwo_family_name = $this->getRequest()->getPost('childonegrandsontwo_family_name');                   //お名前
        $childonegrandsontwo_sex         = $this->getRequest()->getPost('childonegrandsontwo_sex');                           //性別
        $childonegrandsontwo_birthday    = $this->getRequest()->getPost('childonegrandsontwo_birthday');                      //生年月日
        $childonegrandsontwo_deathday    = $this->getRequest()->getPost('childonegrandsontwo_deathday');                      //没年月日
        $childonegrandsontwo_profession  = $this->getRequest()->getPost('childonegrandsontwo_profession');                    //職業
        $childonegrandsontwo_memo        = $this->getRequest()->getPost('childonegrandsontwo_memo');                          //メモ

        //子供１孫２データを更新する
        $orderpageModel->changechildonegrandsontwodata(  $customer_id,
                                            $childonegrandsontwo_family_name,
                                            $childonegrandsontwo_sex,
                                            $childonegrandsontwo_birthday,
                                            $childonegrandsontwo_deathday,
                                            $childonegrandsontwo_profession,
                                            $childonegrandsontwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供１孫２データ削除
    public function childonegrandsontwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childonegrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsontwo_family_name);

        //子供１孫２データを削除
        $orderpageModel->deletechildonegrandsontwodata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childonegrandsontwo_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDONEGRANDSONTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function childonegrandsontwodeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//=======================子供１孫３==============================//
    //子供１孫３データ挿入（大切な故人より）
    public function childonegrandsonthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childonegrandsonthree_family_name = $this->getRequest()->getPost('childonegrandsonthree_family_name');                   //お名前
        $childonegrandsonthree_sex         = $this->getRequest()->getPost('childonegrandsonthree_sex');                           //性別
        $childonegrandsonthree_birthday    = $this->getRequest()->getPost('childonegrandsonthree_birthday');                      //生年月日
        $childonegrandsonthree_deathday    = $this->getRequest()->getPost('childonegrandsonthree_deathday');                      //没年月日
        $childonegrandsonthree_profession  = $this->getRequest()->getPost('childonegrandsonthree_profession');                    //職業
        $childonegrandsonthree_memo        = $this->getRequest()->getPost('childonegrandsonthree_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childonegrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsonthree_family_name);

        //子供１孫３データをインサート
        $orderpageModel->insertchildonegrandsonthreedata(  $customer_id,
                                            $childonegrandsonthree_family_name_r,
                                            $childonegrandsonthree_sex,
                                            $childonegrandsonthree_birthday,
                                            $childonegrandsonthree_deathday,
                                            $childonegrandsonthree_profession,
                                            $childonegrandsonthree_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childonegrandsonthree_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供１孫３データ挿入（個人追加より）
    public function childonegrandsonthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childonegrandsonthree_family_name = $this->getRequest()->getPost('childonegrandsonthree_family_name');                   //お名前
        $childonegrandsonthree_sex         = $this->getRequest()->getPost('childonegrandsonthree_sex');                           //性別
        $childonegrandsonthree_birthday    = $this->getRequest()->getPost('childonegrandsonthree_birthday');                      //生年月日
        $childonegrandsonthree_deathday    = $this->getRequest()->getPost('childonegrandsonthree_deathday');                      //没年月日
        $childonegrandsonthree_profession  = $this->getRequest()->getPost('childonegrandsonthree_profession');                    //職業
        $childonegrandsonthree_memo        = $this->getRequest()->getPost('childonegrandsonthree_memo');                          //メモ

        //子供１孫３データをインサート
        $orderpageModel->insertchildonegrandsonthreedata(  $customer_id,
                                            $childonegrandsonthree_family_name,
                                            $childonegrandsonthree_sex,
                                            $childonegrandsonthree_birthday,
                                            $childonegrandsonthree_deathday,
                                            $childonegrandsonthree_profession,
                                            $childonegrandsonthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供１孫３データ修正
    public function childonegrandsonthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childonegrandsonthree_family_name = $this->getRequest()->getPost('childonegrandsonthree_family_name');                   //お名前
        $childonegrandsonthree_sex         = $this->getRequest()->getPost('childonegrandsonthree_sex');                           //性別
        $childonegrandsonthree_birthday    = $this->getRequest()->getPost('childonegrandsonthree_birthday');                      //生年月日
        $childonegrandsonthree_deathday    = $this->getRequest()->getPost('childonegrandsonthree_deathday');                      //没年月日
        $childonegrandsonthree_profession  = $this->getRequest()->getPost('childonegrandsonthree_profession');                    //職業
        $childonegrandsonthree_memo        = $this->getRequest()->getPost('childonegrandsonthree_memo');                          //メモ

        //子供１孫３データを更新する
        $orderpageModel->changechildonegrandsonthreedata(  $customer_id,
                                            $childonegrandsonthree_family_name,
                                            $childonegrandsonthree_sex,
                                            $childonegrandsonthree_birthday,
                                            $childonegrandsonthree_deathday,
                                            $childonegrandsonthree_profession,
                                            $childonegrandsonthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDONEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childonegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供１孫３データ削除
    public function childonegrandsonthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childonegrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childonegrandsonthree_family_name);

        //子供１孫３データを削除
        $orderpageModel->deletechildonegrandsonthreedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childonegrandsonthree_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDONEGRANDSONTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function childonegrandsonthreedeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }


//=======================子供２孫１==============================//
    //子供２孫１データ挿入（大切な故人より）
    public function childtwograndsononedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childtwograndsonone_family_name = $this->getRequest()->getPost('childtwograndsonone_family_name');                   //お名前
        $childtwograndsonone_sex         = $this->getRequest()->getPost('childtwograndsonone_sex');                           //性別
        $childtwograndsonone_birthday    = $this->getRequest()->getPost('childtwograndsonone_birthday');                      //生年月日
        $childtwograndsonone_deathday    = $this->getRequest()->getPost('childtwograndsonone_deathday');                      //没年月日
        $childtwograndsonone_profession  = $this->getRequest()->getPost('childtwograndsonone_profession');                    //職業
        $childtwograndsonone_memo        = $this->getRequest()->getPost('childtwograndsonone_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childtwograndsonone_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsonone_family_name);

        //子供２孫１データをインサート
        $orderpageModel->insertchildtwograndsononedata(  $customer_id,
                                            $childtwograndsonone_family_name_r,
                                            $childtwograndsonone_sex,
                                            $childtwograndsonone_birthday,
                                            $childtwograndsonone_deathday,
                                            $childtwograndsonone_profession,
                                            $childtwograndsonone_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childtwograndsonone_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供２孫１データ挿入（個人追加より）
    public function childtwograndsononedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childtwograndsonone_family_name = $this->getRequest()->getPost('childtwograndsonone_family_name');                   //お名前
        $childtwograndsonone_sex         = $this->getRequest()->getPost('childtwograndsonone_sex');                           //性別
        $childtwograndsonone_birthday    = $this->getRequest()->getPost('childtwograndsonone_birthday');                      //生年月日
        $childtwograndsonone_deathday    = $this->getRequest()->getPost('childtwograndsonone_deathday');                      //没年月日
        $childtwograndsonone_profession  = $this->getRequest()->getPost('childtwograndsonone_profession');                    //職業
        $childtwograndsonone_memo        = $this->getRequest()->getPost('childtwograndsonone_memo');                          //メモ

        //子供２孫１データをインサート
        $orderpageModel->insertchildtwograndsononedata(  $customer_id,
                                            $childtwograndsonone_family_name,
                                            $childtwograndsonone_sex,
                                            $childtwograndsonone_birthday,
                                            $childtwograndsonone_deathday,
                                            $childtwograndsonone_profession,
                                            $childtwograndsonone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供２孫１データ修正
    public function childtwograndsononedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childtwograndsonone_family_name = $this->getRequest()->getPost('childtwograndsonone_family_name');                   //お名前
        $childtwograndsonone_sex         = $this->getRequest()->getPost('childtwograndsonone_sex');                           //性別
        $childtwograndsonone_birthday    = $this->getRequest()->getPost('childtwograndsonone_birthday');                      //生年月日
        $childtwograndsonone_deathday    = $this->getRequest()->getPost('childtwograndsonone_deathday');                      //没年月日
        $childtwograndsonone_profession  = $this->getRequest()->getPost('childtwograndsonone_profession');                    //職業
        $childtwograndsonone_memo        = $this->getRequest()->getPost('childtwograndsonone_memo');                          //メモ

        //子供２孫１データを更新する
        $orderpageModel->changechildtwograndsononedata(  $customer_id,
                                            $childtwograndsonone_family_name,
                                            $childtwograndsonone_sex,
                                            $childtwograndsonone_birthday,
                                            $childtwograndsonone_deathday,
                                            $childtwograndsonone_profession,
                                            $childtwograndsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供２孫１データ削除
    public function childtwograndsononedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childtwograndsonone_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsonone_family_name);

        //子供２孫１データを削除
        $orderpageModel->deletechildtwograndsononedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childtwograndsonone_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTWOGRANDSONONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childtwograndsononedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//=======================子供２孫２==============================//
    //子供２孫２データ挿入（大切な故人より）
    public function childtwograndsontwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childtwograndsontwo_family_name = $this->getRequest()->getPost('childtwograndsontwo_family_name');                   //お名前
        $childtwograndsontwo_sex         = $this->getRequest()->getPost('childtwograndsontwo_sex');                           //性別
        $childtwograndsontwo_birthday    = $this->getRequest()->getPost('childtwograndsontwo_birthday');                      //生年月日
        $childtwograndsontwo_deathday    = $this->getRequest()->getPost('childtwograndsontwo_deathday');                      //没年月日
        $childtwograndsontwo_profession  = $this->getRequest()->getPost('childtwograndsontwo_profession');                    //職業
        $childtwograndsontwo_memo        = $this->getRequest()->getPost('childtwograndsontwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childtwograndsontwo_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsontwo_family_name);

        //子供２孫２データをインサート
        $orderpageModel->insertchildtwograndsontwodata(  $customer_id,
                                            $childtwograndsontwo_family_name_r,
                                            $childtwograndsontwo_sex,
                                            $childtwograndsontwo_birthday,
                                            $childtwograndsontwo_deathday,
                                            $childtwograndsontwo_profession,
                                            $childtwograndsontwo_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childtwograndsontwo_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供２孫２データ挿入（個人追加より）
    public function childtwograndsontwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childtwograndsontwo_family_name = $this->getRequest()->getPost('childtwograndsontwo_family_name');                   //お名前
        $childtwograndsontwo_sex         = $this->getRequest()->getPost('childtwograndsontwo_sex');                           //性別
        $childtwograndsontwo_birthday    = $this->getRequest()->getPost('childtwograndsontwo_birthday');                      //生年月日
        $childtwograndsontwo_deathday    = $this->getRequest()->getPost('childtwograndsontwo_deathday');                      //没年月日
        $childtwograndsontwo_profession  = $this->getRequest()->getPost('childtwograndsontwo_profession');                    //職業
        $childtwograndsontwo_memo        = $this->getRequest()->getPost('childtwograndsontwo_memo');                          //メモ

        //子供２孫２データをインサート
        $orderpageModel->insertchildtwograndsontwodata(  $customer_id,
                                            $childtwograndsontwo_family_name,
                                            $childtwograndsontwo_sex,
                                            $childtwograndsontwo_birthday,
                                            $childtwograndsontwo_deathday,
                                            $childtwograndsontwo_profession,
                                            $childtwograndsontwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供２孫２データ修正
    public function childtwograndsontwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childtwograndsontwo_family_name = $this->getRequest()->getPost('childtwograndsontwo_family_name');                   //お名前
        $childtwograndsontwo_sex         = $this->getRequest()->getPost('childtwograndsontwo_sex');                           //性別
        $childtwograndsontwo_birthday    = $this->getRequest()->getPost('childtwograndsontwo_birthday');                      //生年月日
        $childtwograndsontwo_deathday    = $this->getRequest()->getPost('childtwograndsontwo_deathday');                      //没年月日
        $childtwograndsontwo_profession  = $this->getRequest()->getPost('childtwograndsontwo_profession');                    //職業
        $childtwograndsontwo_memo        = $this->getRequest()->getPost('childtwograndsontwo_memo');                          //メモ

        //子供２孫２データを更新する
        $orderpageModel->changechildtwograndsontwodata(  $customer_id,
                                            $childtwograndsontwo_family_name,
                                            $childtwograndsontwo_sex,
                                            $childtwograndsontwo_birthday,
                                            $childtwograndsontwo_deathday,
                                            $childtwograndsontwo_profession,
                                            $childtwograndsontwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供２孫２データ削除
    public function childtwograndsontwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childtwograndsontwo_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsontwo_family_name);

        //子供２孫２データを削除
        $orderpageModel->deletechildtwograndsontwodata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childtwograndsontwo_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childtwograndsontwodeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//=======================子供２孫３==============================//
    //子供２孫３データ挿入（大切な故人より）
    public function childtwograndsonthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childtwograndsonthree_family_name  = $this->getRequest()->getPost('childtwograndsonthree_family_name');                   //お名前
        $childtwograndsonthree_sex          = $this->getRequest()->getPost('childtwograndsonthree_sex');                           //性別
        $childtwograndsonthree_birthday     = $this->getRequest()->getPost('childtwograndsonthree_birthday');                      //生年月日
        $childtwograndsonthree_deathday     = $this->getRequest()->getPost('childtwograndsonthree_deathday');                      //没年月日
        $childtwograndsonthree_profession   = $this->getRequest()->getPost('childtwograndsonthree_profession');                    //職業
        $childtwograndsonthree_memo         = $this->getRequest()->getPost('childtwograndsonthree_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childtwograndsonthree_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsonthree_family_name);

        //子供２孫３データをインサート
        $orderpageModel->insertchildtwograndsonthreedata(  $customer_id,
                                            $childtwograndsonthree_family_name_r,
                                            $childtwograndsonthree_sex,
                                            $childtwograndsonthree_birthday,
                                            $childtwograndsonthree_deathday,
                                            $childtwograndsonthree_profession,
                                            $childtwograndsonthree_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childtwograndsonthree_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供２孫３データ挿入（個人追加より）
    public function childtwograndsonthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                        = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childtwograndsonthree_family_name  = $this->getRequest()->getPost('childtwograndsonthree_family_name');                   //お名前
        $childtwograndsonthree_sex          = $this->getRequest()->getPost('childtwograndsonthree_sex');                           //性別
        $childtwograndsonthree_birthday     = $this->getRequest()->getPost('childtwograndsonthree_birthday');                      //生年月日
        $childtwograndsonthree_deathday     = $this->getRequest()->getPost('childtwograndsonthree_deathday');                      //没年月日
        $childtwograndsonthree_profession   = $this->getRequest()->getPost('childtwograndsonthree_profession');                    //職業
        $childtwograndsonthree_memo         = $this->getRequest()->getPost('childtwograndsonthree_memo');                          //メモ

        //子供２孫３データをインサート
        $orderpageModel->insertchildtwograndsonthreedata(  $customer_id,
                                            $childtwograndsonthree_family_name,
                                            $childtwograndsonthree_sex,
                                            $childtwograndsonthree_birthday,
                                            $childtwograndsonthree_deathday,
                                            $childtwograndsonthree_profession,
                                            $childtwograndsonthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供２孫３データ修正
    public function childtwograndsonthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                        = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childtwograndsonthree_family_name  = $this->getRequest()->getPost('childtwograndsonthree_family_name');                   //お名前
        $childtwograndsonthree_sex          = $this->getRequest()->getPost('childtwograndsonthree_sex');                           //性別
        $childtwograndsonthree_birthday     = $this->getRequest()->getPost('childtwograndsonthree_birthday');                      //生年月日
        $childtwograndsonthree_deathday     = $this->getRequest()->getPost('childtwograndsonthree_deathday');                      //没年月日
        $childtwograndsonthree_profession   = $this->getRequest()->getPost('childtwograndsonthree_profession');                    //職業
        $childtwograndsonthree_memo         = $this->getRequest()->getPost('childtwograndsonthree_memo');                          //メモ

        //子供２孫３データを更新する
        $orderpageModel->changechildtwograndsonthreedata(  $customer_id,
                                            $childtwograndsonthree_family_name,
                                            $childtwograndsonthree_sex,
                                            $childtwograndsonthree_birthday,
                                            $childtwograndsonthree_deathday,
                                            $childtwograndsonthree_profession,
                                            $childtwograndsonthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childtwograndsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供２孫３データ削除
    public function childtwograndsonthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childtwograndsonthree_family_name_r = str_replace(array(" ", "　"), "", $childtwograndsonthree_family_name);

        //子供２孫３データを削除
        $orderpageModel->deletechildtwograndsonthreedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childtwograndsonthree_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTWOGRANDSONTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childtwograndsonthreedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//=======================子供３孫１==============================//
    //子供３孫１データ挿入（大切な故人より）
    public function childthreegrandsononedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childthreegrandsonone_family_name = $this->getRequest()->getPost('childthreegrandsonone_family_name');                   //お名前
        $childthreegrandsonone_sex         = $this->getRequest()->getPost('childthreegrandsonone_sex');                           //性別
        $childthreegrandsonone_birthday    = $this->getRequest()->getPost('childthreegrandsonone_birthday');                      //生年月日
        $childthreegrandsonone_deathday    = $this->getRequest()->getPost('childthreegrandsonone_deathday');                      //没年月日
        $childthreegrandsonone_profession  = $this->getRequest()->getPost('childthreegrandsonone_profession');                    //職業
        $childthreegrandsonone_memo        = $this->getRequest()->getPost('childthreegrandsonone_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childthreegrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsonone_family_name);

        //子供３孫１データをインサート
        $orderpageModel->insertchildthreegrandsononedata(  $customer_id,
                                            $childthreegrandsonone_family_name_r,
                                            $childthreegrandsonone_sex,
                                            $childthreegrandsonone_birthday,
                                            $childthreegrandsonone_deathday,
                                            $childthreegrandsonone_profession,
                                            $childthreegrandsonone_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childthreegrandsonone_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供３孫１データ挿入（個人追加より）
    public function childthreegrandsononedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childthreegrandsonone_family_name = $this->getRequest()->getPost('childthreegrandsonone_family_name');                   //お名前
        $childthreegrandsonone_sex         = $this->getRequest()->getPost('childthreegrandsonone_sex');                           //性別
        $childthreegrandsonone_birthday    = $this->getRequest()->getPost('childthreegrandsonone_birthday');                      //生年月日
        $childthreegrandsonone_deathday    = $this->getRequest()->getPost('childthreegrandsonone_deathday');                      //没年月日
        $childthreegrandsonone_profession  = $this->getRequest()->getPost('childthreegrandsonone_profession');                    //職業
        $childthreegrandsonone_memo        = $this->getRequest()->getPost('childthreegrandsonone_memo');                          //メモ

        //子供３孫１データをインサート
        $orderpageModel->insertchildthreegrandsononedata(  $customer_id,
                                            $childthreegrandsonone_family_name,
                                            $childthreegrandsonone_sex,
                                            $childthreegrandsonone_birthday,
                                            $childthreegrandsonone_deathday,
                                            $childthreegrandsonone_profession,
                                            $childthreegrandsonone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供３孫１データ修正
    public function childthreegrandsononedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                        = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $childthreegrandsonone_family_name  = $this->getRequest()->getPost('childthreegrandsonone_family_name');                    //お名前
        $childthreegrandsonone_sex          = $this->getRequest()->getPost('childthreegrandsonone_sex');                            //性別
        $childthreegrandsonone_birthday     = $this->getRequest()->getPost('childthreegrandsonone_birthday');                       //生年月日
        $childthreegrandsonone_deathday     = $this->getRequest()->getPost('childthreegrandsonone_deathday');                       //没年月日
        $childthreegrandsonone_profession   = $this->getRequest()->getPost('childthreegrandsonone_profession');                     //職業
        $childthreegrandsonone_memo         = $this->getRequest()->getPost('childthreegrandsonone_memo');                           //メモ

        //子供３孫１データを更新する
        $orderpageModel->changechildthreegrandsononedata(  $customer_id,
                                            $childthreegrandsonone_family_name,
                                            $childthreegrandsonone_sex,
                                            $childthreegrandsonone_birthday,
                                            $childthreegrandsonone_deathday,
                                            $childthreegrandsonone_profession,
                                            $childthreegrandsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供３孫１データ削除
    public function childthreegrandsononedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childthreegrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsonone_family_name);

        //子供３孫１データを削除
        $orderpageModel->deletechildthreegrandsononedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childthreegrandsonone_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childthreegrandsononedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }


//=======================子供３孫２==============================//
   //子供３孫２データ挿入（大切な故人より）
    public function childthreegrandsontwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childthreegrandsontwo_family_name = $this->getRequest()->getPost('childthreegrandsontwo_family_name');                   //お名前
        $childthreegrandsontwo_sex         = $this->getRequest()->getPost('childthreegrandsontwo_sex');                           //性別
        $childthreegrandsontwo_birthday    = $this->getRequest()->getPost('childthreegrandsontwo_birthday');                      //生年月日
        $childthreegrandsontwo_deathday    = $this->getRequest()->getPost('childthreegrandsontwo_deathday');                      //没年月日
        $childthreegrandsontwo_profession  = $this->getRequest()->getPost('childthreegrandsontwo_profession');                    //職業
        $childthreegrandsontwo_memo        = $this->getRequest()->getPost('childthreegrandsontwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childthreegrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsontwo_family_name);

        //子供３孫２データをインサート
        $orderpageModel->insertchildthreegrandsontwodata(  $customer_id,
                                            $childthreegrandsontwo_family_name_r,
                                            $childthreegrandsontwo_sex,
                                            $childthreegrandsontwo_birthday,
                                            $childthreegrandsontwo_deathday,
                                            $childthreegrandsontwo_profession,
                                            $childthreegrandsontwo_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childthreegrandsontwo_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //子供３孫２データ挿入（個人追加より）
    public function childthreegrandsontwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childthreegrandsontwo_family_name = $this->getRequest()->getPost('childthreegrandsontwo_family_name');                   //お名前
        $childthreegrandsontwo_sex         = $this->getRequest()->getPost('childthreegrandsontwo_sex');                           //性別
        $childthreegrandsontwo_birthday    = $this->getRequest()->getPost('childthreegrandsontwo_birthday');                      //生年月日
        $childthreegrandsontwo_deathday    = $this->getRequest()->getPost('childthreegrandsontwo_deathday');                      //没年月日
        $childthreegrandsontwo_profession  = $this->getRequest()->getPost('childthreegrandsontwo_profession');                    //職業
        $childthreegrandsontwo_memo        = $this->getRequest()->getPost('childthreegrandsontwo_memo');                          //メモ

        //子供３孫２データをインサート
        $orderpageModel->insertchildthreegrandsontwodata(  $customer_id,
                                            $childthreegrandsontwo_family_name,
                                            $childthreegrandsontwo_sex,
                                            $childthreegrandsontwo_birthday,
                                            $childthreegrandsontwo_deathday,
                                            $childthreegrandsontwo_profession,
                                            $childthreegrandsontwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供３孫２データ修正
    public function childthreegrandsontwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childthreegrandsontwo_family_name = $this->getRequest()->getPost('childthreegrandsontwo_family_name');                   //お名前
        $childthreegrandsontwo_sex         = $this->getRequest()->getPost('childthreegrandsontwo_sex');                           //性別
        $childthreegrandsontwo_birthday    = $this->getRequest()->getPost('childthreegrandsontwo_birthday');                      //生年月日
        $childthreegrandsontwo_deathday    = $this->getRequest()->getPost('childthreegrandsontwo_deathday');                      //没年月日
        $childthreegrandsontwo_profession  = $this->getRequest()->getPost('childthreegrandsontwo_profession');                    //職業
        $childthreegrandsontwo_memo        = $this->getRequest()->getPost('childthreegrandsontwo_memo');                          //メモ

        //子供３孫２データを更新する
        $orderpageModel->changechildthreegrandsontwodata(  $customer_id,
                                            $childthreegrandsontwo_family_name,
                                            $childthreegrandsontwo_sex,
                                            $childthreegrandsontwo_birthday,
                                            $childthreegrandsontwo_deathday,
                                            $childthreegrandsontwo_profession,
                                            $childthreegrandsontwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供３孫２データ削除
    public function childthreegrandsontwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childthreegrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsontwo_family_name);

        //子供３孫２データを削除
        $orderpageModel->deletechildthreegrandsontwodata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childthreegrandsontwo_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childthreegrandsontwodeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }


//=======================子供３孫３==============================//

   //子供３孫３データ挿入（大切な故人より）
    public function childthreegrandsonthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $childthreegrandsonthree_family_name    = $this->getRequest()->getPost('childthreegrandsonthree_family_name');                  //お名前
        $childthreegrandsonthree_sex            = $this->getRequest()->getPost('childthreegrandsonthree_sex');                          //性別
        $childthreegrandsonthree_birthday       = $this->getRequest()->getPost('childthreegrandsonthree_birthday');                     //生年月日
        $childthreegrandsonthree_deathday       = $this->getRequest()->getPost('childthreegrandsonthree_deathday');                     //没年月日
        $childthreegrandsonthree_profession     = $this->getRequest()->getPost('childthreegrandsonthree_profession');                   //職業
        $childthreegrandsonthree_memo           = $this->getRequest()->getPost('childthreegrandsonthree_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $childthreegrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsonthree_family_name);

        //子供３孫３データをインサート
        $orderpageModel->insertchildthreegrandsonthreedata(  $customer_id,
                                            $childthreegrandsonthree_family_name_r,
                                            $childthreegrandsonthree_sex,
                                            $childthreegrandsonthree_birthday,
                                            $childthreegrandsonthree_deathday,
                                            $childthreegrandsonthree_profession,
                                            $childthreegrandsonthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //子供３孫３データ挿入（個人追加より）
    public function childthreegrandsonthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $childthreegrandsonthree_family_name    = $this->getRequest()->getPost('childthreegrandsonthree_family_name');                  //お名前
        $childthreegrandsonthree_sex            = $this->getRequest()->getPost('childthreegrandsonthree_sex');                          //性別
        $childthreegrandsonthree_birthday       = $this->getRequest()->getPost('childthreegrandsonthree_birthday');                     //生年月日
        $childthreegrandsonthree_deathday       = $this->getRequest()->getPost('childthreegrandsonthree_deathday');                     //没年月日
        $childthreegrandsonthree_profession     = $this->getRequest()->getPost('childthreegrandsonthree_profession');                   //職業
        $childthreegrandsonthree_memo           = $this->getRequest()->getPost('childthreegrandsonthree_memo');                         //メモ

        //子供３孫３データをインサート
        $orderpageModel->insertchildthreegrandsonthreedata(  $customer_id,
                                            $childthreegrandsonthree_family_name,
                                            $childthreegrandsonthree_sex,
                                            $childthreegrandsonthree_birthday,
                                            $childthreegrandsonthree_deathday,
                                            $childthreegrandsonthree_profession,
                                            $childthreegrandsonthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供３孫３データ修正
    public function childthreegrandsonthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childthreegrandsonthree_family_name = $this->getRequest()->getPost('childthreegrandsonthree_family_name');                   //お名前
        $childthreegrandsonthree_sex         = $this->getRequest()->getPost('childthreegrandsonthree_sex');                           //性別
        $childthreegrandsonthree_birthday    = $this->getRequest()->getPost('childthreegrandsonthree_birthday');                      //生年月日
        $childthreegrandsonthree_deathday    = $this->getRequest()->getPost('childthreegrandsonthree_deathday');                      //没年月日
        $childthreegrandsonthree_profession  = $this->getRequest()->getPost('childthreegrandsonthree_profession');                    //職業
        $childthreegrandsonthree_memo        = $this->getRequest()->getPost('childthreegrandsonthree_memo');                          //メモ

        //子供３孫３データを更新する
        $orderpageModel->changechildthreegrandsonthreedata(  $customer_id,
                                            $childthreegrandsonthree_family_name,
                                            $childthreegrandsonthree_sex,
                                            $childthreegrandsonthree_birthday,
                                            $childthreegrandsonthree_deathday,
                                            $childthreegrandsonthree_profession,
                                            $childthreegrandsonthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childthreegrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供３孫３データ削除
    public function childthreegrandsonthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childthreegrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childthreegrandsonthree_family_name);

        //子供３孫３データを削除
        $orderpageModel->deletechildthreegrandsonthreedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childthreegrandsonthree_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDTHREEGRANDSONTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childthreegrandsonthreedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }


//=======================子供４孫１==============================//
    //子供４孫１データ挿入（大切な故人より）
    public function childfourgrandsononedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childfourgrandsonone_family_name = $this->getRequest()->getPost('childfourgrandsonone_family_name');                   //お名前
        $childfourgrandsonone_sex         = $this->getRequest()->getPost('childfourgrandsonone_sex');                           //性別
        $childfourgrandsonone_birthday    = $this->getRequest()->getPost('childfourgrandsonone_birthday');                      //生年月日
        $childfourgrandsonone_deathday    = $this->getRequest()->getPost('childfourgrandsonone_deathday');                      //没年月日
        $childfourgrandsonone_profession  = $this->getRequest()->getPost('childfourgrandsonone_profession');                    //職業
        $childfourgrandsonone_memo        = $this->getRequest()->getPost('childfourgrandsonone_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childfourgrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsonone_family_name);

        //子供４孫１データをインサート
        $orderpageModel->insertchildfourgrandsononedata(  $customer_id,
                                            $childfourgrandsonone_family_name_r,
                                            $childfourgrandsonone_sex,
                                            $childfourgrandsonone_birthday,
                                            $childfourgrandsonone_deathday,
                                            $childfourgrandsonone_profession,
                                            $childfourgrandsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供４孫１データ挿入（個人追加より）
    public function childfourgrandsononedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childfourgrandsonone_family_name = $this->getRequest()->getPost('childfourgrandsonone_family_name');                   //お名前
        $childfourgrandsonone_sex         = $this->getRequest()->getPost('childfourgrandsonone_sex');                           //性別
        $childfourgrandsonone_birthday    = $this->getRequest()->getPost('childfourgrandsonone_birthday');                      //生年月日
        $childfourgrandsonone_deathday    = $this->getRequest()->getPost('childfourgrandsonone_deathday');                      //没年月日
        $childfourgrandsonone_profession  = $this->getRequest()->getPost('childfourgrandsonone_profession');                    //職業
        $childfourgrandsonone_memo        = $this->getRequest()->getPost('childfourgrandsonone_memo');                          //メモ

        //子供４孫１データをインサート
        $orderpageModel->insertchildfourgrandsononedata(  $customer_id,
                                            $childfourgrandsonone_family_name,
                                            $childfourgrandsonone_sex,
                                            $childfourgrandsonone_birthday,
                                            $childfourgrandsonone_deathday,
                                            $childfourgrandsonone_profession,
                                            $childfourgrandsonone_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供４孫１データ修正
    public function childfourgrandsononedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childfourgrandsonone_family_name = $this->getRequest()->getPost('childfourgrandsonone_family_name');                   //お名前
        $childfourgrandsonone_sex         = $this->getRequest()->getPost('childfourgrandsonone_sex');                           //性別
        $childfourgrandsonone_birthday    = $this->getRequest()->getPost('childfourgrandsonone_birthday');                      //生年月日
        $childfourgrandsonone_deathday    = $this->getRequest()->getPost('childfourgrandsonone_deathday');                      //没年月日
        $childfourgrandsonone_profession  = $this->getRequest()->getPost('childfourgrandsonone_profession');                    //職業
        $childfourgrandsonone_memo        = $this->getRequest()->getPost('childfourgrandsonone_memo');                          //メモ

        //子供４孫１データを更新する
        $orderpageModel->changechildfourgrandsononedata(  $customer_id,
                                            $childfourgrandsonone_family_name,
                                            $childfourgrandsonone_sex,
                                            $childfourgrandsonone_birthday,
                                            $childfourgrandsonone_deathday,
                                            $childfourgrandsonone_profession,
                                            $childfourgrandsonone_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONONE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonone = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供４孫１データ削除
    public function childfourgrandsononedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childfourgrandsonone_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsonone_family_name);

        //子供４孫１データを削除
        $orderpageModel->deletechildfourgrandsononedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childfourgrandsonone_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDFOURGRANDSONONE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childfourgrandsononedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }


//=======================子供４孫２==============================//
    //子供４孫２データ挿入（大切な故人より）
    public function childfourgrandsontwodeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');                          //ユーザーID
        $childfourgrandsontwo_family_name = $this->getRequest()->getPost('childfourgrandsontwo_family_name');                   //お名前
        $childfourgrandsontwo_sex         = $this->getRequest()->getPost('childfourgrandsontwo_sex');                           //性別
        $childfourgrandsontwo_birthday    = $this->getRequest()->getPost('childfourgrandsontwo_birthday');                      //生年月日
        $childfourgrandsontwo_deathday    = $this->getRequest()->getPost('childfourgrandsontwo_deathday');                      //没年月日
        $childfourgrandsontwo_profession  = $this->getRequest()->getPost('childfourgrandsontwo_profession');                    //職業
        $childfourgrandsontwo_memo        = $this->getRequest()->getPost('childfourgrandsontwo_memo');                          //メモ

        //文字中の半角・全角空白を削除
        $childfourgrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsontwo_family_name);

        //子供４孫２データをインサート
        $orderpageModel->insertchildfourgrandsontwodata(  $customer_id,
                                            $childfourgrandsontwo_family_name_r,
                                            $childfourgrandsontwo_sex,
                                            $childfourgrandsontwo_birthday,
                                            $childfourgrandsontwo_deathday,
                                            $childfourgrandsontwo_profession,
                                            $childfourgrandsontwo_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childfourgrandsontwo_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }



    //子供４孫２データ挿入（個人追加より）
    public function childfourgrandsontwodatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                            //ユーザーID
        $childfourgrandsontwo_family_name = $this->getRequest()->getPost('childfourgrandsontwo_family_name');                   //お名前
        $childfourgrandsontwo_sex         = $this->getRequest()->getPost('childfourgrandsontwo_sex');                           //性別
        $childfourgrandsontwo_birthday    = $this->getRequest()->getPost('childfourgrandsontwo_birthday');                      //生年月日
        $childfourgrandsontwo_deathday    = $this->getRequest()->getPost('childfourgrandsontwo_deathday');                      //没年月日
        $childfourgrandsontwo_profession  = $this->getRequest()->getPost('childfourgrandsontwo_profession');                    //職業
        $childfourgrandsontwo_memo        = $this->getRequest()->getPost('childfourgrandsontwo_memo');                          //メモ

        //子供４孫２データをインサート
        $orderpageModel->insertchildfourgrandsontwodata(  $customer_id,
                                            $childfourgrandsontwo_family_name,
                                            $childfourgrandsontwo_sex,
                                            $childfourgrandsontwo_birthday,
                                            $childfourgrandsontwo_deathday,
                                            $childfourgrandsontwo_profession,
                                            $childfourgrandsontwo_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供４孫２データ修正
    public function childfourgrandsontwodatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childfourgrandsontwo_family_name = $this->getRequest()->getPost('childfourgrandsontwo_family_name');                   //お名前
        $childfourgrandsontwo_sex         = $this->getRequest()->getPost('childfourgrandsontwo_sex');                           //性別
        $childfourgrandsontwo_birthday    = $this->getRequest()->getPost('childfourgrandsontwo_birthday');                      //生年月日
        $childfourgrandsontwo_deathday    = $this->getRequest()->getPost('childfourgrandsontwo_deathday');                      //没年月日
        $childfourgrandsontwo_profession  = $this->getRequest()->getPost('childfourgrandsontwo_profession');                    //職業
        $childfourgrandsontwo_memo        = $this->getRequest()->getPost('childfourgrandsontwo_memo');                          //メモ

        //子供４孫２データを更新する
        $orderpageModel->changechildfourgrandsontwodata(  $customer_id,
                                            $childfourgrandsontwo_family_name,
                                            $childfourgrandsontwo_sex,
                                            $childfourgrandsontwo_birthday,
                                            $childfourgrandsontwo_deathday,
                                            $childfourgrandsontwo_profession,
                                            $childfourgrandsontwo_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTWO_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsontwo = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }

    //子供４孫2データ削除
    public function childfourgrandsontwodatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childfourgrandsontwo_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsontwo_family_name);

        //子供４孫2データを削除
        $orderpageModel->deletechildfourgrandsontwodata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childfourgrandsontwo_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTWO_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childfourgrandsontwodeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//=======================子供４孫３==============================//
   //子供４孫３データ挿入（大切な故人より）
    public function childfourgrandsonthreedeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $childfourgrandsonthree_family_name    = $this->getRequest()->getPost('childfourgrandsonthree_family_name');                  //お名前
        $childfourgrandsonthree_sex            = $this->getRequest()->getPost('childfourgrandsonthree_sex');                          //性別
        $childfourgrandsonthree_birthday       = $this->getRequest()->getPost('childfourgrandsonthree_birthday');                     //生年月日
        $childfourgrandsonthree_deathday       = $this->getRequest()->getPost('childfourgrandsonthree_deathday');                     //没年月日
        $childfourgrandsonthree_profession     = $this->getRequest()->getPost('childfourgrandsonthree_profession');                   //職業
        $childfourgrandsonthree_memo           = $this->getRequest()->getPost('childfourgrandsonthree_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $childfourgrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsonthree_family_name);

        //子供４孫３データをインサート
        $orderpageModel->insertchildfourgrandsonthreedata(  $customer_id,
                                            $childfourgrandsonthree_family_name_r,
                                            $childfourgrandsonthree_sex,
                                            $childfourgrandsonthree_birthday,
                                            $childfourgrandsonthree_deathday,
                                            $childfourgrandsonthree_profession,
                                            $childfourgrandsonthree_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$childfourgrandsonthree_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //子供４孫３データ挿入（個人追加より）
    public function childfourgrandsonthreedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $childfourgrandsonthree_family_name    = $this->getRequest()->getPost('childfourgrandsonthree_family_name');                  //お名前
        $childfourgrandsonthree_sex            = $this->getRequest()->getPost('childfourgrandsonthree_sex');                          //性別
        $childfourgrandsonthree_birthday       = $this->getRequest()->getPost('childfourgrandsonthree_birthday');                     //生年月日
        $childfourgrandsonthree_deathday       = $this->getRequest()->getPost('childfourgrandsonthree_deathday');                     //没年月日
        $childfourgrandsonthree_profession     = $this->getRequest()->getPost('childfourgrandsonthree_profession');                   //職業
        $childfourgrandsonthree_memo           = $this->getRequest()->getPost('childfourgrandsonthree_memo');                         //メモ

        //子供４孫３データをインサート
        $orderpageModel->insertchildfourgrandsonthreedata(  $customer_id,
                                            $childfourgrandsonthree_family_name,
                                            $childfourgrandsonthree_sex,
                                            $childfourgrandsonthree_birthday,
                                            $childfourgrandsonthree_deathday,
                                            $childfourgrandsonthree_profession,
                                            $childfourgrandsonthree_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //子供４孫３データ修正
    public function childfourgrandsonthreedatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $childfourgrandsonthree_family_name = $this->getRequest()->getPost('childfourgrandsonthree_family_name');                   //お名前
        $childfourgrandsonthree_sex         = $this->getRequest()->getPost('childfourgrandsonthree_sex');                           //性別
        $childfourgrandsonthree_birthday    = $this->getRequest()->getPost('childfourgrandsonthree_birthday');                      //生年月日
        $childfourgrandsonthree_deathday    = $this->getRequest()->getPost('childfourgrandsonthree_deathday');                      //没年月日
        $childfourgrandsonthree_profession  = $this->getRequest()->getPost('childfourgrandsonthree_profession');                    //職業
        $childfourgrandsonthree_memo        = $this->getRequest()->getPost('childfourgrandsonthree_memo');                          //メモ

        //子供４孫３データを更新する
        $orderpageModel->changechildfourgrandsonthreedata(  $customer_id,
                                            $childfourgrandsonthree_family_name,
                                            $childfourgrandsonthree_sex,
                                            $childfourgrandsonthree_birthday,
                                            $childfourgrandsonthree_deathday,
                                            $childfourgrandsonthree_profession,
                                            $childfourgrandsonthree_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTHREE_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_childfourgrandsonthree = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //子供４孫３データ削除
    public function childfourgrandsonthreedatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $childfourgrandsonthree_family_name_r = str_replace(array(" ", "　"), "", $childfourgrandsonthree_family_name);

        //子供４孫３データを削除
        $orderpageModel->deletechildfourgrandsonthreedata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$childfourgrandsonthree_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_CHILDFOURGRANDSONTHREE_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
        public function childfourgrandsonthreedeceasedlistselectAction(){
            try{
                // orderpageModelモデルインスタンス生成
                $orderpageModel = new orderpageModel();

                //post受信
                $mid            = $this->getRequest()->getPost('id');
                $selectname     = $this->getRequest()->getPost('selectname');

                // //選択した名前の生年月日、没年月日を取得する
                 $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

                //javascriptに受け渡すため配列をJSON形式に変換
                $datas = json_encode($selectdata);
                echo $datas; //JQUERYに渡す

            }catch(Zend_Exception $e){

            }

        }

//============================祖父父方=================================//
   //祖父父方データ挿入（大切な故人より）
    public function grandfatherfatherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandfatherfather_family_name    = $this->getRequest()->getPost('grandfatherfather_family_name');                  //お名前
        $grandfatherfather_birthday       = $this->getRequest()->getPost('grandfatherfather_birthday');                     //生年月日
        $grandfatherfather_deathday       = $this->getRequest()->getPost('grandfatherfather_deathday');                     //没年月日
        $grandfatherfather_profession     = $this->getRequest()->getPost('grandfatherfather_profession');                   //職業
        $grandfatherfather_memo           = $this->getRequest()->getPost('grandfatherfather_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $grandfatherfather_family_name_r = str_replace(array(" ", "　"), "", $grandfatherfather_family_name);

        //祖父父方データをインサート
        $orderpageModel->insertgrandfatherfatherdata(  $customer_id,
                                            $grandfatherfather_family_name_r,
                                            $grandfatherfather_birthday,
                                            $grandfatherfather_deathday,
                                            $grandfatherfather_profession,
                                            $grandfatherfather_memo
                                        );

         $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖父父方データ挿入（個人追加より）
    public function grandfatherfatherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandfatherfather_family_name    = $this->getRequest()->getPost('grandfatherfather_family_name');                  //お名前
        $grandfatherfather_birthday       = $this->getRequest()->getPost('grandfatherfather_birthday');                     //生年月日
        $grandfatherfather_deathday       = $this->getRequest()->getPost('grandfatherfather_deathday');                     //没年月日
        $grandfatherfather_profession     = $this->getRequest()->getPost('grandfatherfather_profession');                   //職業
        $grandfatherfather_memo           = $this->getRequest()->getPost('grandfatherfather_memo');                         //メモ

        //祖父父方データをインサート
        $orderpageModel->insertgrandfatherfatherdata(  $customer_id,
                                            $grandfatherfather_family_name,
                                            $grandfatherfather_birthday,
                                            $grandfatherfather_deathday,
                                            $grandfatherfather_profession,
                                            $grandfatherfather_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖父父方データ修正
    public function grandfatherfatherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $grandfatherfather_family_name = $this->getRequest()->getPost('grandfatherfather_family_name');                   //お名前
        $grandfatherfather_birthday    = $this->getRequest()->getPost('grandfatherfather_birthday');                      //生年月日
        $grandfatherfather_deathday    = $this->getRequest()->getPost('grandfatherfather_deathday');                      //没年月日
        $grandfatherfather_profession  = $this->getRequest()->getPost('grandfatherfather_profession');                    //職業
        $grandfatherfather_memo        = $this->getRequest()->getPost('grandfatherfather_memo');                          //メモ

        //祖父父方データを更新する
        $orderpageModel->changegrandfatherfatherdata(  $customer_id,
                                            $grandfatherfather_family_name,
                                            $grandfatherfather_birthday,
                                            $grandfatherfather_deathday,
                                            $grandfatherfather_profession,
                                            $grandfatherfather_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //祖父父方データ削除
    public function grandfatherfatherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $grandfatherfather_family_name_r = str_replace(array(" ", "　"), "", $grandfatherfather_family_name);

        //祖父父方データを削除
        $orderpageModel->deletegrandfatherfatherdata($customer_id);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_GRANDFATHERFATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function grandfatherfatherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//============================祖母父方=================================//

   //祖母父方方データ挿入（大切な故人より）
    public function grandfathermatherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                      = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandfathermather_family_name    = $this->getRequest()->getPost('grandfathermather_family_name');                  //お名前
        $grandfathermather_birthday       = $this->getRequest()->getPost('grandfathermather_birthday');                     //生年月日
        $grandfathermather_deathday       = $this->getRequest()->getPost('grandfathermather_deathday');                     //没年月日
        $grandfathermather_profession     = $this->getRequest()->getPost('grandfathermather_profession');                   //職業
        $grandfathermather_memo           = $this->getRequest()->getPost('grandfathermather_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $grandfathermather_family_name_r = str_replace(array(" ", "　"), "", $grandfathermather_family_name);

        //祖父母方データをインサート
        $orderpageModel->insertgrandfathermatherdata(  $customer_id,
                                            $grandfathermather_family_name_r,
                                            $grandfathermather_birthday,
                                            $grandfathermather_deathday,
                                            $grandfathermather_profession,
                                            $grandfathermather_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$grandfathermather_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖母父方データ挿入（個人追加より）
    public function grandfathermatherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                      = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandfathermather_family_name    = $this->getRequest()->getPost('grandfathermather_family_name');                  //お名前
        $grandfathermather_birthday       = $this->getRequest()->getPost('grandfathermather_birthday');                     //生年月日
        $grandfathermather_deathday       = $this->getRequest()->getPost('grandfathermather_deathday');                     //没年月日
        $grandfathermather_profession     = $this->getRequest()->getPost('grandfathermather_profession');                   //職業
        $grandfathermather_memo           = $this->getRequest()->getPost('grandfathermather_memo');                         //メモ

        //祖母父方データをインサート
        $orderpageModel->insertgrandfathermatherdata(  $customer_id,
                                            $grandfathermather_family_name,
                                            $grandfathermather_birthday,
                                            $grandfathermather_deathday,
                                            $grandfathermather_profession,
                                            $grandfathermather_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //祖母父方データ修正
    public function grandfathermatherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $grandfathermather_family_name = $this->getRequest()->getPost('grandfathermather_family_name');                   //お名前
        $grandfathermather_birthday    = $this->getRequest()->getPost('grandfathermather_birthday');                      //生年月日
        $grandfathermather_deathday    = $this->getRequest()->getPost('grandfathermather_deathday');                      //没年月日
        $grandfathermather_profession  = $this->getRequest()->getPost('grandfathermather_profession');                    //職業
        $grandfathermather_memo        = $this->getRequest()->getPost('grandfathermather_memo');                          //メモ

        //祖父母方データを更新する
        $orderpageModel->changegrandfathermatherdata(  $customer_id,
                                            $grandfathermather_family_name,
                                            $grandfathermather_birthday,
                                            $grandfathermather_deathday,
                                            $grandfathermather_profession,
                                            $grandfathermather_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDFATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandfathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //祖母父方データ削除
    public function grandfathermatherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $grandfathermather_family_name_r = str_replace(array(" ", "　"), "", $grandfathermather_family_name);

        //祖父母方データを削除
        $orderpageModel->deletegrandfathermatherdata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$grandfathermather_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_GRANDFATHERMATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //大切な故人＿名前選択時
    public function grandfathermatherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }


//============================祖父母方=================================//

       //祖父母方データ挿入（大切な故人より）
    public function grandmatherfatherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandmatherfather_family_name    = $this->getRequest()->getPost('grandmatherfather_family_name');                  //お名前
        $grandmatherfather_birthday       = $this->getRequest()->getPost('grandmatherfather_birthday');                     //生年月日
        $grandmatherfather_deathday       = $this->getRequest()->getPost('grandmatherfather_deathday');                     //没年月日
        $grandmatherfather_profession     = $this->getRequest()->getPost('grandmatherfather_profession');                   //職業
        $grandmatherfather_memo           = $this->getRequest()->getPost('grandmatherfather_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $grandmatherfather_family_name_r = str_replace(array(" ", "　"), "", $grandmatherfather_family_name);

        //祖父母方データをインサート
        $orderpageModel->insertgrandmatherfatherdata(  $customer_id,
                                            $grandmatherfather_family_name_r,
                                            $grandmatherfather_birthday,
                                            $grandmatherfather_deathday,
                                            $grandmatherfather_profession,
                                            $grandmatherfather_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$grandmatherfather_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖父母方データ挿入（個人追加より）
    public function grandmatherfatherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandmatherfather_family_name    = $this->getRequest()->getPost('grandmatherfather_family_name');                  //お名前
        $grandmatherfather_birthday       = $this->getRequest()->getPost('grandmatherfather_birthday');                     //生年月日
        $grandmatherfather_deathday       = $this->getRequest()->getPost('grandmatherfather_deathday');                     //没年月日
        $grandmatherfather_profession     = $this->getRequest()->getPost('grandmatherfather_profession');                   //職業
        $grandmatherfather_memo           = $this->getRequest()->getPost('grandmatherfather_memo');                         //メモ

        //祖父母方データをインサート
        $orderpageModel->insertgrandmatherfatherdata(  $customer_id,
                                            $grandmatherfather_family_name,
                                            $grandmatherfather_birthday,
                                            $grandmatherfather_deathday,
                                            $grandmatherfather_profession,
                                            $grandmatherfather_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }


    //祖父母方データ修正
    public function grandmatherfatherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $grandmatherfather_family_name = $this->getRequest()->getPost('grandmatherfather_family_name');                   //お名前
        $grandmatherfather_birthday    = $this->getRequest()->getPost('grandmatherfather_birthday');                      //生年月日
        $grandmatherfather_deathday    = $this->getRequest()->getPost('grandmatherfather_deathday');                      //没年月日
        $grandmatherfather_profession  = $this->getRequest()->getPost('grandmatherfather_profession');                    //職業
        $grandmatherfather_memo        = $this->getRequest()->getPost('grandmatherfather_memo');                          //メモ

        //祖父母方データを更新する
        $orderpageModel->changegrandmatherfatherdata(  $customer_id,
                                            $grandmatherfather_family_name,
                                            $grandmatherfather_birthday,
                                            $grandmatherfather_deathday,
                                            $grandmatherfather_profession,
                                            $grandmatherfather_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERFATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmatherfather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }


    //祖父母方データ削除
    public function grandmatherfatherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $grandmatherfather_family_name_r = str_replace(array(" ", "　"), "", $grandmatherfather_family_name);

        //祖父母方データを削除
        $orderpageModel->deletegrandmatherfatherdata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$grandmatherfather_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_GRANDMATHERFATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function grandmatherfatherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

//============================祖母母方=================================//

       //祖母母方データ挿入（大切な故人より）
    public function grandmathermatherdeceasedatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandmathermather_family_name    = $this->getRequest()->getPost('grandmathermather_family_name');                  //お名前
        $grandmathermather_birthday       = $this->getRequest()->getPost('grandmathermather_birthday');                     //生年月日
        $grandmathermather_deathday       = $this->getRequest()->getPost('grandmathermather_deathday');                     //没年月日
        $grandmathermather_profession     = $this->getRequest()->getPost('grandmathermather_profession');                   //職業
        $grandmathermather_memo           = $this->getRequest()->getPost('grandmathermather_memo');                         //メモ

        //文字中の半角・全角空白を削除
        $grandmathermather_family_name_r = str_replace(array(" ", "　"), "", $grandmathermather_family_name);

        //祖母母方データをインサート
        $orderpageModel->insertgrandmathermatherdata(  $customer_id,
                                            $grandmathermather_family_name_r,
                                            $grandmathermather_birthday,
                                            $grandmathermather_deathday,
                                            $grandmathermather_profession,
                                            $grandmathermather_memo
                                        );

        //フラグを１にする
        // $orderpageModel->updateflag($customer_id,$grandmathermather_family_name);

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖母母方データ挿入（個人追加より）
    public function grandmathermatherdatainsertAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id                            = $this->getRequest()->getPost('customer_id');                                          //ユーザーID
        $grandmathermather_family_name    = $this->getRequest()->getPost('grandmathermather_family_name');                  //お名前
        $grandmathermather_birthday       = $this->getRequest()->getPost('grandmathermather_birthday');                     //生年月日
        $grandmathermather_deathday       = $this->getRequest()->getPost('grandmathermather_deathday');                     //没年月日
        $grandmathermather_profession     = $this->getRequest()->getPost('grandmathermather_profession');                   //職業
        $grandmathermather_memo           = $this->getRequest()->getPost('grandmathermather_memo');                         //メモ

        //祖母母方データをインサート
        $orderpageModel->insertgrandmathermatherdata(  $customer_id,
                                            $grandmathermather_family_name,
                                            $grandmathermather_birthday,
                                            $grandmathermather_deathday,
                                            $grandmathermather_profession,
                                            $grandmathermather_memo
                                        );
        //IDをビューにセット
        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //祖母母方データ修正
    public function grandmathermatherdatachangeAction(){

    try {
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id          = $this->getRequest()->getPost('customer_id');                              //ユーザーID
        $grandmathermather_family_name = $this->getRequest()->getPost('grandmathermather_family_name');                   //お名前
        $grandmathermather_birthday    = $this->getRequest()->getPost('grandmathermather_birthday');                      //生年月日
        $grandmathermather_deathday    = $this->getRequest()->getPost('grandmathermather_deathday');                      //没年月日
        $grandmathermather_profession  = $this->getRequest()->getPost('grandmathermather_profession');                    //職業
        $grandmathermather_memo        = $this->getRequest()->getPost('grandmathermather_memo');                          //メモ

        //祖母母方データを更新する
        $orderpageModel->changegrandmathermatherdata(  $customer_id,
                                            $grandmathermather_family_name,
                                            $grandmathermather_birthday,
                                            $grandmathermather_deathday,
                                            $grandmathermather_profession,
                                            $grandmathermather_memo
                                        );

        $this->_view->customerId = $customer_id;

        //画像が選択されている場合、一時フォルダに保存
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            //一時保存用ファイル名を生成
                $fileName = $customer_id . ".jpg";
                $uploadFile = comConst::TEMP_GRANDMATHERMATHER_DIR . $fileName;

            //一時フォルダに保存
            //800×800に収まるように画像を作成
            //サーバ版
                exec('/usr/bin/convert -define jpeg:size=800x800 -resize 800x800 ' . $_FILES['image']['tmp_name'] . ' ' .  $uploadFile);
            //パーミッションを変更
                chmod($uploadFile, 0644);
            //ファイルパスをセッションに設定
                $this->_session->image_path_grandmathermather = $uploadFile;
        }

        echo $this->_view->render('family_tree_insert_result.tpl');

     } catch (Zend_Exception $e) {

        // 例外発生時
         die($e->getMessage());
     }

    }

    //祖母母方データ削除
    public function grandmathermatherdatadeleteAction(){

      try{
        // orderpageModelモデルインスタンス生成
        $orderpageModel = new orderpageModel();

        //post受信
        $customer_id        = $this->getRequest()->getPost('customer_id');

       //文字中の半角・全角空白を削除
        $grandmathermather_family_name_r = str_replace(array(" ", "　"), "", $grandmathermather_family_name);

        //祖母母方データを削除
        $orderpageModel->deletegrandmathermatherdata($customer_id);

        //大切な故人から選択している場合フラグを０にする
        // $orderpageModel->deleteflag($customer_id,$grandmathermather_family_name);

        //画像があるか確認（画像があれば削除）
        $fileName = $customer_id . ".jpg";
        $uploadFile = comConst::TEMP_GRANDMATHERMATHER_DIR . $fileName;
        if(file_exists($uploadFile)){
            unlink($uploadFile);
        }

        $this->_view->customerId = $customer_id;

        echo $this->_view->render('family_tree_delete_result.tpl');

      } catch(Zend_Exception $e){

      }

    }

    //大切な故人＿名前選択時
    public function grandmathermatherdeceasedlistselectAction(){
        try{
            // orderpageModelモデルインスタンス生成
            $orderpageModel = new orderpageModel();

            //post受信
            $mid            = $this->getRequest()->getPost('id');
            $selectname     = $this->getRequest()->getPost('selectname');

            // //選択した名前の生年月日、没年月日を取得する
             $selectdata = $orderpageModel->selectdeceasedlistdata($mid,$selectname);

            //javascriptに受け渡すため配列をJSON形式に変換
            $datas = json_encode($selectdata);
            echo $datas; //JQUERYに渡す

        }catch(Zend_Exception $e){

        }

    }

}
