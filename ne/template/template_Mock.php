<?php
require_once 'MyClass/ne_all_in_one_wisecartCnv.php';

/**
 * TODO: リフレクションを使用できないための暫定措置。利用できるようになった場合には
 * そちらを利用するように書き換えた方が良い。
 */
class NeAllInOneWisecartCnvMock extends ne_all_in_one_wisecartCnv
{
    public function setTmpRowArray($tmpRow_array)
    {
        $this->tmpRow_array = $tmpRow_array;
    }
    
    public function getTmpRowArray()
    {
        return $this->tmpRow_array;
    }
    
    public function getResultArray()
    {
        return $this->result_array;
    }
    
    public function concatStrInArray(array $part_of_row)
    {
        return parent::concatStrInArray($part_of_row);
    }
    
    public function getCardInfoByPaymentInfo($delimiter, $target_str)
    {
        return parent::getCardInfoByPaymentInfo($delimiter, $target_str);
    }
    
    public function setCreditCardInfo(array &$row)
    {
        return parent::setCreditCardInfo($row);
    }
    
    public function setTelIfFirstColumnIsEmpty(array &$row)
    {
        return parent::setTelIfFirstColumnIsEmpty($row);
    }
    
    public function convertDesiredDeliveryDayToNe($desired_delivery_day)
    {
        return parent::convertDesiredDeliveryDayToNe($desired_delivery_day);
    }
    
    public function setFees(array &$row, $tax_exluding_flg)
    {
        return parent::setFees($row, $tax_exluding_flg);
    }
    
    public function getZeiKbn($tenpo_code, $db, $user_schema)
    {
        return parent::getZeiKbn($tenpo_code, $db, $user_schema);
    }
}
