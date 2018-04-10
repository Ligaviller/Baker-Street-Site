<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:28
 */

class Occasion
{
    public static function getOccasionById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM occasion WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $occasionItem = $result->fetch();
            return $occasionItem;
        }
        return false;
    }
    public static function getOccasionList()
    {
        $db = Db::getConnection();
        $occasionList = array();
        $result = $db->query('SELECT * FROM occasion
                                        ORDER BY occ_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $occasionList[$i]['id'] = $row['id'];
            $occasionList[$i]['occ_name'] = $row['occ_name'];
            $occasionList[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $occasionList;
    }
}