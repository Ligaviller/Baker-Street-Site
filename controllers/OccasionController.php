<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:29
 */

class OccasionController
{
    public function actionView($id)
    {
        if($id)
        {
            $occasionItem = Occasion::getOccasionById($id);

            require(ROOT . '/views/occasions/item.php');

        }
        return true;
    }
    public function actionList()
    {
        $occasionList = array();
        $occasionList = Occasion::getOccasionList();
        require(ROOT."/views/occasions/index.php");
        return true;
    }
}