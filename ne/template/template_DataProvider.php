<?php
class NeAllInOneWisecartCnvDataProvider
{
    const TAX_INCLUDED = '0';
    const TAX_EXCLUDED = '1';
    
    public $tmpRow_array = array(
        array(
            'tenpo_denpyo_no'                    => '20181109-01461',
            'jyuchu_name'                        => '山田 太郎',
            'jyuchu_kana'                        => 'やまだ たろう',
            'jyuchu_denwa'                       => '0123-45-6789',
            '_jyuchu_denwa2'                     => '080-1234-5678',
            'jyuchu_yubin_bango'                 => '2500011',
            '_buyer_address_prefecture'          => '神奈川県',
            'jyuchu_mail_adr'                    => 'sys.dev@hamee.co.jp',
            'hasou_kbn'                          => '配送方式 1',
            'jyuchu_bi'                          => '2018/11/09 18:59:56',
            'zei_kin'                            => '77',
            'hasou_kin'                          => '0',
            'tesuryo_kin'                        => '0',
            'sonota_kin'                         => '0',
            'point'                              => '0',
            '_product_total_price_tax_included'  => '1080',
            'goukei_kin'                         => '1080',
            '_status'                            => '注文',
            'siharai_kbn'                        => 'クレジットカード',
            '_payment_information'               => 'カード会社 : MasterCard',
            '_payment_information2'              => 'カード番号 : 5555555555554444',
            '_payment_information3'              => 'カード有効期限 : 2099/02',
            '_payment_information4'              => 'カード名義人 : YAMADA TARO',
            '_payment_information5'              => '支払回数 : 3',
            'hasou_name'                         => '山田 太郎2',
            'hasou_kana'                         => 'ヤマダ タロウ2',
            'hasou_denwa'                        => '9876-54-3210',
            '_hasou_denwa2'                      => '090-1234-4567',
            'hasou_yubin_bango'                  => '2500011',
            '_shipping_address_prefecture'       => '神奈川県',
            'hasou_mail_adr'                     => 'sys.dev.main@hamee.co.jp',
            '_product_number'                    => 'sample',
            'syohin_name'                        => 'サンプル',
            'syohin_option'                      => '-RED',
            'jyuchu_su'                          => '1',
            '_product_unit_price_tax_included'   => '1080',
            '_product_unit_price_tax_excluded'   => '1000',
            '_additional_information_pare_items' => 'お店へのご連絡おみせへのれんらくさんぷる',
            '_buyer_address_city'                => '小田原市',
            'jyuchu_jyusyo2'                     => '栄町2-10-12',
            '_product_total_price_tax_excluded'  => '1000',
            '_shipping_address_city'             => '小田原市',
            'hasou_jyusyo2'                      => '栄町2-10-12 Square O2',
            '_product_option_number'             => '-RED',
            '_desired_delivery_day'              => '2018年 11月 14日 (水)',
            '_delivery_time_zone_specification'  => '12:00~14:00'
        )
    );
    
    public $expected_tax_included = array(
        array(
            'tenpo_denpyo_no'      => '20181109-01461',
            'jyuchu_name'          => '山田 太郎',
            'jyuchu_kana'          => 'やまだ たろう',
            'jyuchu_denwa'         => '0123-45-6789',
            'jyuchu_yubin_bango'   => '2500011',
            'jyuchu_mail_adr'      => 'sys.dev@hamee.co.jp',
            'hasou_kbn'            => '配送方式 1',
            'jyuchu_bi'            => '2018/11/09 18:59:56',
            'zei_kin'              => '77',
            'hasou_kin'            => '0',
            'tesuryo_kin'          => '0',
            'sonota_kin'           => '0',
            'point'                => '0',
            'goukei_kin'           => '1080',
            'siharai_kbn'          => 'クレジットカード',
            'hasou_name'           => '山田 太郎2',
            'hasou_kana'           => 'ヤマダ タロウ2',
            'hasou_denwa'          => '9876-54-3210',
            'hasou_yubin_bango'    => '2500011',
            'hasou_mail_adr'       => 'sys.dev.main@hamee.co.jp',
            'syohin_name'          => 'サンプル',
            'syohin_option'        => '-RED',
            'jyuchu_su'            => '1',
            'jyuchu_jyusyo2'       => '栄町2-10-12',
            'hasou_jyusyo2'        => '栄町2-10-12 Square O2',
            'credit_kbn'           => 'MasterCard',
            'credit_card_no'       => '5555555555554444',
            'credit_yukou_kigen'   => '2099/02',
            'credit_meigi_nin'     => 'YAMADA TARO',
            'credit_siharai_kaisu' => '3',
            'syohin_kin'           => '1080',
            'syohin_tnk'           => '1080',
            'syokei_kin'           => '1080',
            'haisou_bi'            => '2018-11-14',
            'jyuchu_jyusyo1'       => '神奈川県小田原市',
            'hasou_jyusyo1'        => '神奈川県小田原市',
            'bikou'                => 'お店へのご連絡おみせへのれんらくさんぷる 12:00~14:00 '
        )
    );
    
    public $expected_tax_excluded = array(
        array(
            'tenpo_denpyo_no'      => '20181109-01461',
            'jyuchu_name'          => '山田 太郎',
            'jyuchu_kana'          => 'やまだ たろう',
            'jyuchu_denwa'         => '0123-45-6789',
            'jyuchu_yubin_bango'   => '2500011',
            'jyuchu_mail_adr'      => 'sys.dev@hamee.co.jp',
            'hasou_kbn'            => '配送方式 1',
            'jyuchu_bi'            => '2018/11/09 18:59:56',
            'zei_kin'              => '77',
            'hasou_kin'            => '0',
            'tesuryo_kin'          => '0',
            'sonota_kin'           => '0',
            'point'                => '0',
            'goukei_kin'           => '1080',
            'siharai_kbn'          => 'クレジットカード',
            'hasou_name'           => '山田 太郎2',
            'hasou_kana'           => 'ヤマダ タロウ2',
            'hasou_denwa'          => '9876-54-3210',
            'hasou_yubin_bango'    => '2500011',
            'hasou_mail_adr'       => 'sys.dev.main@hamee.co.jp',
            'syohin_name'          => 'サンプル',
            'syohin_option'        => '-RED',
            'jyuchu_su'            => '1',
            'jyuchu_jyusyo2'       => '栄町2-10-12',
            'hasou_jyusyo2'        => '栄町2-10-12 Square O2',
            'credit_kbn'           => 'MasterCard',
            'credit_card_no'       => '5555555555554444',
            'credit_yukou_kigen'   => '2099/02',
            'credit_meigi_nin'     => 'YAMADA TARO',
            'credit_siharai_kaisu' => '3',
            'syohin_kin'           => '1000',
            'syohin_tnk'           => '1000',
            'syokei_kin'           => '1000',
            'haisou_bi'            => '2018-11-14',
            'jyuchu_jyusyo1'       => '神奈川県小田原市',
            'hasou_jyusyo1'        => '神奈川県小田原市',
            'bikou'                => 'お店へのご連絡おみせへのれんらくさんぷる 12:00~14:00 '
        ) 
    );
    
    public function mallFileCnvIfTmpRowArrayIsEmpty()
    {
        return array(
            'tmpRow_arrayが空であるとき、nullを返すこと' => array(
                // params
                array(),
                // expected
                null
            )
        );
    }
    
    public function mallFileCnvIfTaxExclude()
    {
        return array(
            '店舗設定の税区分が税抜でtmpRow_arrayが空でないとき、独自処理が行われること' => array(
                // params
                $this->tmpRow_array,
                // expected
                $this->expected_tax_excluded
            )
        );
    }
    
    public function mallFileCnvIfTaxInclude()
    {
        return array(
            '店舗設定の税区分が税込でtmpRow_arrayが空でないとき、独自処理が行われること' => array(
                // params
                $this->tmpRow_array,
                // expected
                $this->expected_tax_included
            )
        );
    }
    
    public function concatStrInArray()
    {
        return array(
            '引数が空配列である場合、空文字を返すこと' => array(
                // params
                array(),
                // expected
                ''
            ),
            '引数の配列が持つ要素にnullがあった場合、nullが空文字列扱いされて連結されること' => array(
                // params
                array(
                    null,
                    'sample'
                ),
                // expected
                'sample'
            ),
            '引数の配列が持つ要素に全て通常の文字列であった場合、配列の要素順に文字列が連結されること' => array(
                // params
                array(
                    'sample',
                    'secondsample'
                ),
                // expected
                'samplesecondsample'
            ),
        );
    }
    
    public function getCardInfoByPaymentInfo()
    {
        return array(
            '引数delimiterが文字列でtarget_strがから文字列である場合、空文字が返されること' => array(
                // params
                array (
                    'delimiter'  => 'sa',
                    'target_str' => ''
                ),
                // expected
                ''
            ),
            '引数delimiterとtarget_strがどちらも文字列がある場合、分割された2番目の文字列が返されること' => array(
                // params
                array (
                    'delimiter'  => ',',
                    'target_str' => 'sample,sample2'
                ),
                // expected
                'sample2'
            ),
            '引数delimiterとtarget_strがどちらも文字列があり、delimiterの文字列がtarget_strに複数含まれる場合、分割された２番目の値が返されること' => array(
                // params
                array (
                    'delimiter'  => ',',
                    'target_str' => 'sample,sample2,sample3'
                ),
                // expected
                'sample2'
            ),
        );
    }
    
    public function setCreditCardInfo()
    {
        return array(
            '引数rowのsiharai_kbnがクレジットカードでなかった場合、siharai_kbn, credit_kbn, credit_card_no, credit_siharai_kaisuにnullが代入された連想配列に上書きされること' => array(
                // params
                array(
                    'siharai_kbn'  => '代金引換'
                ),
                // expected
                array(
                    'siharai_kbn'          => '代金引換',
                    'credit_kbn'           => '0',
                    'credit_yukou_kigen'   => null,
                    'credit_card_no'       => null,
                    'credit_meigi_nin'     => null,
                    'credit_siharai_kaisu' => null
                )
            ),
            '引数rowのsiharai_kbnがクレジットカードであった場合、クレジットカードの情報が取得されること' => array(
                // params
                array(
                    'siharai_kbn'           => 'クレジットカード',
                    '_payment_information'  => 'カード会社 : MasterCard',
                    '_payment_information2' => 'カード番号 : 5555555555554444',
                    '_payment_information3' => 'カード有効期限 : 2099/02',
                    '_payment_information4' => 'カード名義人 : YAMADA TARO',
                    '_payment_information5' => '支払回数 : 3'
                ),
                // expected
                array(
                    'siharai_kbn'           => 'クレジットカード',
                    '_payment_information'  => 'カード会社 : MasterCard',
                    '_payment_information2' => 'カード番号 : 5555555555554444',
                    '_payment_information3' => 'カード有効期限 : 2099/02',
                    '_payment_information4' => 'カード名義人 : YAMADA TARO',
                    '_payment_information5' => '支払回数 : 3',
                    'credit_kbn'            => 'MasterCard',
                    'credit_card_no'        => '5555555555554444',
                    'credit_yukou_kigen'    => '2099/02',
                    'credit_meigi_nin'      => 'YAMADA TARO',
                    'credit_siharai_kaisu'  => '3'
                )
            ),
        );
    }
    
    public function setTelIfFirstColumnIsEmpty()
    {
        return array(
            '引数rowのjyuchu_denwa, hasou_denwa, _jyuchu_denwa2, _hasou_denwa2が空が全て空文字である場合、そのままの値となっていること' => array(
                // params
                array(
                    'jyuchu_denwa'   => '',
                    'hasou_denwa'    => '',
                    '_jyuchu_denwa2' => '',
                    '_hasou_denwa2'  => ''
                ),
                // expected
                array(
                    'jyuchu_denwa'   => '',
                    'hasou_denwa'    => '',
                    '_jyuchu_denwa2' => '',
                    '_hasou_denwa2'  => ''
                )
            ),
            '引数rowのjyuchu_denwa, hasou_denwaが空文字で _jyuchu_denwa2, _hasou_denwa2が空でない場合、jyuchu_denwa, hasou_denwaの値が_jyuchu_denwa2, _hasou_denwa2の値で上書きされること' => array(
                // params
                array(
                    'jyuchu_denwa'   => '',
                    'hasou_denwa'    => '',
                    '_jyuchu_denwa2' => '0123-45-6789',
                    '_hasou_denwa2'  => '08012345678'
                ),
                // expected
                array(
                    'jyuchu_denwa'   => '0123-45-6789',
                    'hasou_denwa'    => '08012345678',
                    '_jyuchu_denwa2' => '0123-45-6789',
                    '_hasou_denwa2'  => '08012345678'
                )
            ),
            '引数rowの_jyuchu_denwa2, _hasou_denwa2が空文字で jyuchu_denwa, hasou_denwaが空でない場合、そのままの値となっていること' => array(
                // params
                array(
                    'jyuchu_denwa'   => '0123-45-6789',
                    'hasou_denwa'    => '08012345678',
                    '_jyuchu_denwa2' => '',
                    '_hasou_denwa2'  => ''
                ),
                // expected
                array(
                    'jyuchu_denwa'   => '0123-45-6789',
                    'hasou_denwa'    => '08012345678',
                    '_jyuchu_denwa2' => '',
                    '_hasou_denwa2'  => ''
                )
            ),
        );
    }
    
    public function convertDesiredDeliveryDayToNe()
    {
        return array(
            '引数desired_delivery_dayが空文字であるとき、空文字が返されること' => array(
                // params
                '',
                // expected
                ''
            ),
            '引数desired_delivery_dayが半角スペースであるとき、空文字が返されること' => array(
                // params
                ' ',
                // expected
                ''
            ),
            '引数desired_delivery_dayがwisecartの配送希望日の日付形式(形式:2018年 11月 14日 (水))であるとき、半角スペースを削除した状態で日付がNEのDBに保存する形式(形式:2018-11-09)に変換されていること' => array(
                // params
                '2018年 11月 14日 (水)', // 実際の形式に合わせてある
                // expected
                '2018-11-14'
            ),
            '引数desired_delivery_dayがwisecartの配送希望日ではない日付形式(形式:2018/11/14)であるとき、半角スペースを削除した状態で日付がNEのDBに保存する形式(形式:2018-11-14)に変換されていること' => array(
                // params
                '2018/11/14 ',
                // expected
                '2018-11-14'
            ),
            '引数desired_delivery_dayがwisecartの配送希望日ではない日付形式(形式:2018－11－14)(ハイフンが異なる)であるとき、半角スペースを削除した状態で日付がNEのDBに保存する形式(形式:2018-11-14)に変換されていること' => array(
                // params
                '2018－11－14 ',
                // expected
                '2018-11-14'
            ),
        );
    }
    
    public function setFees()
    {
        return array(
            '税込の場合、税込のカラムからsyohin_kin, syohin_tnkがセットされ、syokei_kinが計算されること' => array(
                // params
                array(
                    'row' => array(
                        '_product_total_price_tax_included' => '324',
                        '_product_unit_price_tax_included'  => '108',
                        'jyuchu_su' => '2'
                    ),
                    'tax_exluding_flg' => self::TAX_INCLUDED
                ),
                // expected
                array(
                    '_product_total_price_tax_included' => '324',
                    '_product_unit_price_tax_included'  => '108',
                    'jyuchu_su' => '2',
                    'syohin_kin' => '324',
                    'syohin_tnk' => '108',
                    'syokei_kin' => '216'
                )
            ),
            '税抜の場合、税抜のカラムからsyohin_kin, syohin_tnkがセットされ、syokei_kinが計算されること' => array(
                // params
                array(
                    'row' => array(
                        '_product_total_price_tax_excluded' => '300',
                        '_product_unit_price_tax_excluded'  => '100',
                        'jyuchu_su' => '2'
                    ),
                    'tax_exluding_flg' => self::TAX_EXCLUDED
                ),
                // expected
                array(
                    '_product_total_price_tax_excluded' => '300',
                    '_product_unit_price_tax_excluded'  => '100',
                    'jyuchu_su' => '2',
                    'syohin_kin' => '300',
                    'syohin_tnk' => '100',
                    'syokei_kin' => '200'
                )
            ),

        );
    }
}
