<?php

class RecipeController
{
    public function actionView($id)
    {
        if($id){
            $recipeItem = Recipe::getRecipeItemById($id);
            $recipeSteps = Recipe::getRecipeStepsById($id);
            $ingredientList = Ingredient::getIngredientListByRecipeId($id);


            require(ROOT . '/views/recipes/recipeItem.php');
        }
        return true;
    }
}