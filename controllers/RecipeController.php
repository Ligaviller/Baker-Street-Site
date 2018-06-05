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
        $countList = Count::getCountList();

        if(!isset($_POST['submit'])){
            $rec_name = $_POST['rec_name'];
            $rec_photo = $_POST['rec_photo'];
            $rec_kit = $_POST['rec_kit'];
            $rec_cat = $_POST['rec_cat'];
            $rec_met = $_POST['rec_met'];
            $rec_occ = $_POST['rec_occ'];
            $rec_ser = $_POST['rec_ser'];
            $rec_tim = $_POST['rec_tim'];
            $rec_com = $_POST['rec_com'];
            $ing_name = $_POST['ingNameC'];
            $ing_count = $_POST['ingCountC'];
            $ing_mes = $_POST['ingMesC'];
            $step_text = $_POST['stepTextC'];
            $step_count = $_POST['stepNumC'];
            $step_photo = $_POST['stepPhotoC'];

            $rec_id = Recipe::insertRecipe($rec_name, $rec_photo, $rec_cat, $rec_kit,
                $rec_met, $rec_occ, $rec_ser, $rec_tim, $rec_com);

            for ($i = 1;$i<=count($ing_name);$i++)
            {
                Recipe::insertIngredientOfRecipe($rec_id, $ing_name[$i], $ing_count[$i], $ing_mes[$i]);
            }

            for($j = 1;$j<=count($step_text);$j++)
            {
                Recipe::insertStep($rec_id, $step_count[$j], $step_text[$j], $step_photo[$j]);

            }

        }

        require(ROOT . '/views/recipes/add.php');
        return true;

    }

}