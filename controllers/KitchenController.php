<?php

class KitchenController
{
    public function actionView($id)
    {
        if($id)
        {
            $kitchenItem = Kitchen::getKitchenById($id);

            require(ROOT . '/views/kitchens/item.php');

        }
        return true;
    }
    public function actionList()
    {
        $kitchenList = array();
        $kitchenList = Kitchen::getKitchenList();
        require(ROOT."/views/kitchens/index.php");
        return true;
    }
}