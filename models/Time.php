<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:37
 */

class Time
{
    public static function getTimeById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM time WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $timeItem = $result->fetch();
            return $timeItem;
        }
        return false;
    }
    public static function getTimeList()
    {
        $db = Db::getConnection();
        $timeList = array();
        $result = $db->query('SELECT * FROM time
                                        ORDER BY tim_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $timeList[$i]['id'] = $row['id'];
            $timeList[$i]['tim_name'] = $row['tim_name'];
            $i++;
        }
        return $timeList;
    }
}