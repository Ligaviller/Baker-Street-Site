<?php

class IngredientController
{
    public function actionView($id)
    {
        if($id)
        {
            $ingredientItem = Ingredient::getIngredientById($id);

            require(ROOT . '/views/ingredients/item.php');

        }
        return true;
    }
    public function actionList()
    {
        $ingredientList = array();
        $ingredientList = Ingredient::getIngredientList();
        require(ROOT."/views/ingredients/index.php");
        return true;
    }
}