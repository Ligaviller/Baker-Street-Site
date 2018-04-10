<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:34
 */

class Serving
{
    public static function getServingById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM servings WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $servingItem = $result->fetch();
            return $servingItem;
        }
        return false;
    }
    public static function getServingList()
    {
        $db = Db::getConnection();
        $servingList = array();
        $result = $db->query('SELECT * FROM servings
                                        ORDER BY ser_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $servingList[$i]['id'] = $row['id'];
            $servingList[$i]['ser_name'] = $row['ser_name'];
            $i++;
        }
        return $servingList;
    }
}