<?php

class IngredientListController
{
    public function actionList()
    {
        $ingredientList = array();
        $ingredientList = Ingredient::getIngredientList();
        require(ROOT."/views/ingredients/index.php");
        return true;
    }
}