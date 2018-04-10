<?php

class CategoryListController
{
    public function actionList()
    {
        $categoryList = array();
        $categoryList = Category::getCategoryList();
        require(ROOT."/views/categories/index.php");
        return true;
    }
}