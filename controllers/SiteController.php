<?php

class SiteController
{
    public function actionIndex()
    {
           header("Location: recipes");
           return true;
    }
}