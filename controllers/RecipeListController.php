<?php

class RecipeListController
{

    public function actionList()
    {
        $recipeList = array();
        $recipeList = Recipe::getRecipeList();
        require(ROOT."/views/recipes/index.php");
        return true;
    }


}