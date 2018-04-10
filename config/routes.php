<?php

return array(

    'recipes/([0-9]+)' => 'recipe/view/$1',
    'recipes/add'=> 'recipe/add',
    '(^recipes$)' => 'recipe/list',
    'ingredients/([0-9]+)' => 'ingredient/view/$1',
    '(^ingredients$)' => 'ingredient/list',
    'categories/([0-9]+)' => 'category/view/$1',
    '(^categories$)' => 'category/list',
    'kitchens/([0-9]+)' => 'kitchen/view/$1',
    '(^kitchens$)' => 'kitchen/list',
    'methods/([0-9]+)' => 'method/view/$1',
    '(^methods$)' => 'method/list',
    'occasions/([0-9]+)' => 'occasion/view/$1',
    '(^occasions$)' => 'occasion/list',
    '(.*)' => 'pageNotFound/error/$1'

);