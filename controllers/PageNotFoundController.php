<?php

class PageNotFoundController
{
    public function actionError($string)
    {

        require(ROOT.'/views/errors/404.php');
        return true;
    }

}