<?php

class CategoryController
{
    public function actionView($id)
    {
        if($id)
        {
            $categoryItem = Category::getCategoryById($id);

            require(ROOT . '/views/categories/item.php');

        }
        return true;
    }
    public function actionList()
    {
        $categoryList = array();
        $categoryList = Category::getCategoryList();
        require(ROOT."/views/categories/index.php");
        return true;
    }
}