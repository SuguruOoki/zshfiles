<?php
require_once dirname(__FILE__) . '/../TestCaseAbstract.php';
require_once dirname(__FILE__) . '/../../dataProviders/template_DataProvider.php';
require_once dirname(__FILE__) . '/../../mockObjects/template_Mock.php';

class ne_all_in_one_wisecartCnvTest extends TestCaseAbstract
{
    const TAX_INCLUDE = '0';
    const TAX_EXCLUDE = '1';
    const TENPO_CODE  = '1';
    const USER_SCHEMA = '';
    
    public function setUp()
    {
        parent::setUp();
        $this->template_Mock = new template_Mock();
    }

    /**
     * @dataProvider NeAllInOneWisecartCnvDataProvider::mallFileCnvIfTmpRowArrayIsEmpty
     */
    public function test_MallFileCnv_tmpRow_arrayが空配列である場合にnullが返されること($params, $expected)
    {
        $this->NeAllInOneWisecartCnvMock->setTmpRowArray($params);
        $this->assertSame($expected, $this->NeAllInOneWisecartCnvMock->mallFileCnv());
    }
    
    /**
     * @dataProvider NeAllInOneWisecartCnvDataProvider::mallFileCnvIfTaxInclude
     */
    public function test_MallFileCnv_税区分が税込の場合に独自処理の変換が正常に行われること($params, $expected)
    {
        $TaxIncludeNeAllInOneWisecartCnvMock = $this->getMock('NeAllInOneWisecartCnvMock', array('getZeiKbn'));
        $TaxIncludeNeAllInOneWisecartCnvMock->setTmpRowArray($params);
        $TaxIncludeNeAllInOneWisecartCnvMock->expects($this->once())->method('getZeiKbn')->will($this->returnValue(self::TAX_INCLUDE));
        $TaxIncludeNeAllInOneWisecartCnvMock->mallFileCnv();
        $result = $TaxIncludeNeAllInOneWisecartCnvMock->getResultArray();
        $this->assertSame($expected, $TaxIncludeNeAllInOneWisecartCnvMock->getResultArray());
    }
    
    /**
     * @dataProvider NeAllInOneWisecartCnvDataProvider::mallFileCnvIfTaxExclude
     */
    public function test_MallFileCnv_税区分が税抜の場合に独自処理の変換が正常に行われること($params, $expected)
    {
        $TaxExcludeNeAllInOneWisecartCnvMock = $this->getMock('NeAllInOneWisecartCnvMock', array('getZeiKbn'));
        $TaxExcludeNeAllInOneWisecartCnvMock->setTmpRowArray($params);
        $TaxExcludeNeAllInOneWisecartCnvMock->expects($this->at(0))->method('getZeiKbn')->will($this->returnValue(self::TAX_EXCLUDE));
        $TaxExcludeNeAllInOneWisecartCnvMock->mallFileCnv();
        $result = $TaxExcludeNeAllInOneWisecartCnvMock->getResultArray();
        $this->assertSame($expected, $TaxExcludeNeAllInOneWisecartCnvMock->getResultArray());
    }

    /**
     * @dataProvider NeAllInOneWisecartCnvDataProvider::concatStrInArray
     */
    public function test_concatStrInArray_文字連結が正常に行われること($params, $expected)
    {
        $result = '';
        $result = $this->NeAllInOneWisecartCnvMock->concatStrInArray($params);
        $this->assertSame($expected, $result);
    }
    
    /* ======================== getCardInfoByPaymentInfo ============================= */
    
    /**
     * カード情報が文字列の中から正常に取り出されることをテストする。
     *
     * @dataProvider NeAllInOneWisecartCnvDataProvider::getCardInfoByPaymentInfo
     */
    public function test_getCardInfoByPaymentInfo_カード情報が正常に取得されること($params, $expected)
    {
        $result = '';
        $result = $this->NeAllInOneWisecartCnvMock->getCardInfoByPaymentInfo($params['delimiter'], $params['target_str']);
        $this->assertSame($expected, $result);
    }
    
    /* ======================== setCreditCardInfo ============================= */
    
    /**
     * カード情報が正常にセットされることをテストする。
     *
     * @dataProvider NeAllInOneWisecartCnvDataProvider::setCreditCardInfo
     */
    public function test_setCreditCardInfo_カード情報が正常にセットされること($params, $expected)
    {
        $this->NeAllInOneWisecartCnvMock->setCreditCardInfo($params);
        $this->assertSame($expected, $params);
    }
    
    /* ======================== setTelIfFirstColumnIsEmpty ============================= */
    
    /**
     * 電話番号の情報が正常にセットされることをテストする。
     *
     * @dataProvider NeAllInOneWisecartCnvDataProvider::setTelIfFirstColumnIsEmpty
     */
    public function test_setTelIfFirstColumnIsEmpty_電話番号の情報が取得されること($params, $expected)
    {
        $this->NeAllInOneWisecartCnvMock->setTelIfFirstColumnIsEmpty($params);
        $this->assertSame($expected, $params);
    }
    
    /* ======================== convertDesiredDeliveryDayToNe ============================= */
    
    /**
     * 商品に関する支払い情報が正常にセットされるかをテストする。
     *
     * @dataProvider NeAllInOneWisecartCnvDataProvider::convertDesiredDeliveryDayToNe
     */
    public function test_convertDesiredDeliveryDayToNe_日付に関する文字列が正常に変換されること($params, $expected)
    {
        $result = $this->NeAllInOneWisecartCnvMock->convertDesiredDeliveryDayToNe($params);
        $this->assertSame($expected, $result);
    }
    
    /* ======================== setFees ============================= */
    
    /**
     * 商品に関する支払い情報が正常にセットされるかをテストする。
     *
     * @dataProvider NeAllInOneWisecartCnvDataProvider::setFees
     */
    public function test_setFees_支払いに関する情報が正常にセットされること($params, $expected)
    {
        $this->NeAllInOneWisecartCnvMock->setFees($params['row'], $params['tax_exluding_flg']);
        $this->assertSame($expected, $params['row']);
    }
    
    public function tearDown()
    {
        parent::tearDown();
        unset($this->NeAllInOneWisecartCnvMock);
    }

}
