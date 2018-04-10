<?php

class RecipeController
{
    public function actionView($id)
    {
        if($id){
            $recipeItem = Recipe::getRecipeItemById($id);
            $recipeSteps = Recipe::getRecipeStepsById($id);
            $ingredientList = Ingredient::getIngredientListByRecipeId($id);

            require(ROOT . '/views/recipes/item.php');
        }
        return true;
    }
    public function actionList()
    {
        $recipeList = array();
        $recipeList = Recipe::getRecipeList();
        require(ROOT."/views/recipes/index.php");
        return true;
    }

    public function actionAdd()
    {
        $categoryList = Category::getCategoryList();
        $kitchenList = Kitchen::getKitchenList();
        $methodList = Method::getMethodList();
        $occasionList = Occasion::getOccasionList();
        $servingList = Serving::getServingList();
        $timeList = Time::getTimeList();
        $complexityList = Complexity::getComplexityList();
        $ingredientList = Ingredient::getIngredientList();

        require(ROOT . '/views/recipes/add.php');
        return true;

    }

}