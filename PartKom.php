<?php
/**
*   
*/
class PartKom extends CComponent
{
    
    /**
     * Логин пользователя в системе «ПартКом».
     * @var string
     */
    public $login;

    /**
     * Пароль пользователя в системе «ПартКом».
     * @var string
     */
    public $password;
    

    public function init()
    {
        return parent::init();
    }

    /**
     * Осуществляет поиск предложений по указанной детали в базе данных «ПартКом».
     * Принимает на вход набор фильтров поиска.
     * Возвращает коллекцию объектов DetailItem, содержащих информацию о предложении.
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function findDetail($value='')
    {
        # code...
    }
}
?>