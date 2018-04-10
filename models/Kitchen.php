<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:00
 */

class Kitchen
{
    public static function getKitchenById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM kitchen WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $kitchenItem = $result->fetch();
            return $kitchenItem;
        }
        return false;
    }
    public static function getKitchenList()
    {
        $db = Db::getConnection();
        $kitchenList = array();
        $result = $db->query('SELECT * FROM kitchen
                                        ORDER BY kit_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $kitchenList[$i]['id'] = $row['id'];
            $kitchenList[$i]['kit_name'] = $row['kit_name'];
            $kitchenList[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $kitchenList;
    }
}