<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 20:02
 */

class Category
{
    public static function getCategoryById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM category WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $categoryItem = $result->fetch();
            return $categoryItem;
        }
        return false;
    }
    public static function getCategoryList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT * FROM category
                                        ORDER BY cat_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['cat_name'] = $row['cat_name'];
            $categoryList[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $categoryList;
    }
}