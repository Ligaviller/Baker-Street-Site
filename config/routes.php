<?php

return array(

    'recipes/([0-9]+)' => 'recipe/view/$1',
    '(^recipes$)' => 'recipeList/list',
    'ingredients/([0-9]+)' => 'ingredient/view/$1',
    '(^ingredients$)' => 'ingredientList/list',
    'categories/([0-9]+)' => 'category/view/$1',
    '(^categories$)' => 'categoryList/list',
    '(.*)' => 'pageNotFound/error/$1',

);