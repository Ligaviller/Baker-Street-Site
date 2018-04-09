<?php

class IngredientListController
{
    public function actionList()
    {
        $ingredientList = array();
        $ingredientList = Ingredient::getIngredientList();
        echo "<pre>";
        print_r($ingredientList);
        return true;
    }
}