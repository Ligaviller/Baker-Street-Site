<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:12
 */

class MethodController
{
    public function actionView($id)
    {
        if($id)
        {
            $methodItem = Method::getMethodById($id);

            require(ROOT . '/views/methods/item.php');

        }
        return true;
    }
    public function actionList()
    {
        $methodList = array();
        $methodList = Method::getMethodList();
        require(ROOT."/views/methods/index.php");
        return true;
    }
}