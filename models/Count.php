<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 05.06.2018
 * Time: 22:03
 */

class Count
{
    public static function getCountById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();
            $result = $db->prepare('SELECT * FROM count WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $countItem = $result->fetch();
            return $countItem;
        }
        return false;
    }
    public static function getCountList()
    {
        $db = Db::getConnection();
        $countList = array();
        $result = $db->query('SELECT * FROM count
                                        ORDER BY count_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $countList[$i]['id'] = $row['id'];
            $countList[$i]['count_name'] = $row['count_name'];
            $i++;
        }
        return $countList;
    }
}