<?php

class PartKom extends CApplicationComponent
{
    
    /**
     * Логин пользователя в системе «ПартКом».
     * @var string
     */
    protected $login;

    /**
     * Пароль пользователя в системе «ПартКом».
     * @var string
     */
    protected $password;

    /**
     * WSDL веб-сервиса поиска детали
     * @var string
     */
    public $WSDLsearch;

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function init()
    {
        return parent::init();
    }

    public function getSoapClientSearch()
    {
        return new SoapClient($this->WSDLsearch);
    }

    /**
     * Осуществляет поиск предложений по указанной детали в базе данных «ПартКом».
     * Принимает на вход набор фильтров поиска.
     * @param  string  $number           Номер искомой детали
     * @param  integer $makerId         Уникальный идентификатор производителя в системе «ПартКом». Может быть получен из справочника производителей MakersDict.
     * @param  boolean $findSubstitutes Флаг для поиска с заменами и аналогами или без них.
     * @param  boolean $store           Флаг для поиска только в наличии склада «ПартКом».
     * @param  boolean $reCross         Флаг для включения в результаты кроссов к найденным заменам и аналогам.
     * @return array                    Возвращает коллекцию объектов DetailItem, содержащих информацию о предложении.
     */
    public function findDetail($number, $makerId, $findSubstitutes=true, $store=true, $reCross=false)
    {
        return $this->soapClientSearch->findDetail($this->login, $this->password,$number,$makerId,$findSubstitutes,$store,$reCross);
    }

    /**
     * Предоставляет доступ к справочнику производителей в системе «ПартКом».
     * @return array Возвращает коллекцию объектов Maker, содержащих информацию о производителе.
     */
    public function getMakersDict()
    {
        return $this->soapClientSearch->getMakersDict($this->login, $this->password);
    }

    /**
     * Возвращает производителей по указанному номеру.
     * @param  string $number Номер детали
     * @return array  Коллекция, содержащая информацию о производителях
     */
    public function getMakersByNumber($number)
    {
        return $this->soapClientSearch->getMakersByNumber($this->login, $this->password, $number);
    }
}
?>