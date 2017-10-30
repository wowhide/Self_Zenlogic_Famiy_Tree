<?php

class comConst {
    /* ========== サーバアドレス ========== */
    const BASE_URL = 'http://h-yamato.xsrv.jp/Family_Tree/';

    /* ========== セッション定数 ========== */
    const SESSION = 'orderdata';     // セッション名
    const SESSION_TIME = 3600;       // 有効時間[sec] -> 1Hr

    /* ========== Smarty設定 ========== */
    const SMARTY_TEMP_PATH = '../../Family_Tree/application/smarty/';

    /* ========== 画像保存ディレクトリ ========== */
    const TEMP_SELF_DIR                         = '../../default/Family_Tree/imges/self/';                          // 一時保存パス（自分）
    const TEMP_FATHER_DIR                       = '../../default/Family_Tree/imges/father/';                        // 一時保存パス（父親）
    const TEMP_MATHER_DIR                       = '../../default/Family_Tree/imges/mather/';                        // 一時保存パス（母親）
    const TEMP_SPOUSE_DIR                       = '../../default/Family_Tree/imges/spouse/';                        // 一時保存パス（妻）

    const TEMP_BROTHERONE_DIR                   = '../../default/Family_Tree/imges/brotherone/';                    // 一時保存パス（兄弟姉妹１）
    const TEMP_BROTHERTWO_DIR                   = '../../default/Family_Tree/imges/brothertwo/';                    // 一時保存パス（兄弟姉妹２）
    const TEMP_BROTHERTHREE_DIR                 = '../../default/Family_Tree/imges/brotherthree/';                  // 一時保存パス（兄弟姉妹３）

    const TEMP_CHILDONE_DIR                     = '../../default/Family_Tree/imges/childone/';                      // 一時保存パス（子供１）
    const TEMP_CHILDTWO_DIR                     = '../../default/Family_Tree/imges/childtwo/';                      // 一時保存パス（子供２）
    const TEMP_CHILDTHREE_DIR                   = '../../default/Family_Tree/imges/childthree/';                    // 一時保存パス（子供３）
    const TEMP_CHILDFOUR_DIR                    = '../../default/Family_Tree/imges/childfour/';                     // 一時保存パス（子供４）
    const TEMP_CHILDONEGRANDSONONE_DIR          = '../../default/Family_Tree/imges/childonegrandsonone/';           // 一時保存パス（子供１孫１）
    const TEMP_CHILDONEGRANDSONTWO_DIR          = '../../default/Family_Tree/imges/childonegrandsontwo/';           // 一時保存パス（子供１孫２）
    const TEMP_CHILDONEGRANDSONTHREE_DIR        = '../../default/Family_Tree/imges/childonegrandsonthree/';         // 一時保存パス（子供１孫３）
    const TEMP_CHILDTWOGRANDSONONE_DIR          = '../../default/Family_Tree/imges/childtwograndsonone/';           // 一時保存パス（子供２孫１）
    const TEMP_CHILDTWOGRANDSONTWO_DIR          = '../../default/Family_Tree/imges/childtwograndsontwo/';           // 一時保存パス（子供２孫２）
    const TEMP_CHILDTWOGRANDSONTHREE_DIR        = '../../default/Family_Tree/imges/childtwograndsonthree/';         // 一時保存パス（子供２孫３）
    const TEMP_CHILDTHREEGRANDSONONE_DIR        = '../../default/Family_Tree/imges/childthreegrandsonone/';         // 一時保存パス（子供３孫１）
    const TEMP_CHILDTHREEGRANDSONTWO_DIR        = '../../default/Family_Tree/imges/childthreegrandsontwo/';         // 一時保存パス（子供３孫２）
    const TEMP_CHILDTHREEGRANDSONTHREE_DIR      = '../../default/Family_Tree/imges/childthreegrandsonthree/';       // 一時保存パス（子供３孫３）
    const TEMP_CHILDFOURGRANDSONONE_DIR         = '../../default/Family_Tree/imges/childfourgrandsonone/';          // 一時保存パス（子供４孫１）
    const TEMP_CHILDFOURGRANDSONTWO_DIR         = '../../default/Family_Tree/imges/childfourgrandsontwo/';          // 一時保存パス（子供４孫２）
    const TEMP_CHILDFOURGRANDSONTHREE_DIR       = '../../default/Family_Tree/imges/childfourgrandsonthree/';        // 一時保存パス（子供４孫３）

    const TEMP_GRANDFATHERFATHER_DIR            = '../../default/Family_Tree/imges/grandfatherfather/';             //　一時保存パス（祖父父方）
    const TEMP_GRANDFATHERMATHER_DIR            = '../../default/Family_Tree/imges/grandfathermather/';             // 一時保存パス（祖母父方）
    const TEMP_GRANDMATHERFATHER_DIR            = '../../default/Family_Tree/imges/grandmatherfather/';             // 一時保存パス（祖父母方）
    const TEMP_GRANDMATHERMATHER_DIR            = '../../default/Family_Tree/imges/grandmathermather/';             // 一時保存パス（祖父母方）

    /* ========== 画像フラグ ========== */
    const IMAGE_EXISTENCE_FLG_YES       = 1;                          // 画像有
    const IMAGE_EXISTENCE_FLG_NO        = 0;                          // 画像無

}
