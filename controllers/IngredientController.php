<?php

class IngredientController
{
    public function actionView($id)
    {
        if($id)
        {
            $ingredientItem = Ingredient::getIngredientById($id);
            echo "<pre>";
            print_r($ingredientItem);
        }
        return true;
    }
}