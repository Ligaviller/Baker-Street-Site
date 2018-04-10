<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:22
 */

class Method
{
    public static function getMethodById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM method WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $methodItem = $result->fetch();
            return $methodItem;
        }
        return false;
    }
    public static function getMethodList()
    {
        $db = Db::getConnection();
        $methodList = array();
        $result = $db->query('SELECT * FROM method
                                        ORDER BY met_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $methodList[$i]['id'] = $row['id'];
            $methodList[$i]['met_name'] = $row['met_name'];
            $methodList[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $methodList;
    }
}