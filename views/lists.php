<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 08.06.2018
 * Time: 18:54
 */

switch($method){
    case "getRecipeList":
        echo json_encode($recipeList);
        break;
    case "getCategoryList":
        echo json_encode($categoryList);
        break;
    case "getKitchenList":
        echo json_encode($kitchenList);
        break;
    case "getMethodList":
        echo json_encode($methodList);
        break;
    case "getOccasionList":
        echo json_encode($occasionList);
        break;
    case "getServingList":
        echo json_encode($servingList);
        break;
    case "getTimeList":
        echo json_encode($timeList);
        break;
    case "getComplexityList":
        echo json_encode($complexityList);
        break;
    case "getIngredientList":
        echo json_encode($ingredientList);
        break;
    case "getCountList":
        echo json_encode($countList);
        break;

    default:
        echo null;
}