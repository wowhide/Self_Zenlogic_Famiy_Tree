<?php
/**
 * 共通関数を定義
 * 
 * LICENSE: 
 * 
 * @copyright   2014 Digtalspace WOW CO.,Ltd
 * @license     
 * @version     1.0.0
 * @link        
 * @since       File availabel since Release 1.0.0
 */

class common
{
    /**
     * getImageSizeAttr
     * ：画像ファイルの高さと幅を取得して、width、height属性を返す
     * @param type $imagePath 画像のパス
     * @return string imgタグのwidth、height属性
     */
    public static function getImageSizeAttr($imagePath) {
        $imageInfo = getimagesize($imagePath);
        if ($imageInfo) {
            $imageSizeAttr = 'width=' . '"' . $imageInfo[0] * 0.35 . '" ' . 'height=' . '"' . $imageInfo[1] * 0.35 . '"';
        } else {
            $imageSizeAttr = '';
        }
        return $imageSizeAttr;
    }
    
    public static function getArea() {
        $arrayArea = array("北海道","青森県","岩手県","宮城県","秋田県","山形県",
                           "福島県","茨城県","栃木県","群馬県","埼玉県","千葉県",
                           "東京都","神奈川県","新潟県","富山県","石川県","福井県",
                           "山梨県","長野県","岐阜県","静岡県","愛知県","三重県",
                           "滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県",
                           "鳥取県","島根県","岡山県","広島県","山口県","徳島県",
                           "香川県","愛媛県","高知県","福岡県","佐賀県","長崎県",
                           "熊本県","大分県","宮崎県","鹿児島県","沖縄県");
        return $arrayArea;
    }
}