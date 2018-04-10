<?php
/**
 * Created by PhpStorm.
 * User: Влад
 * Date: 10.04.2018
 * Time: 22:39
 */

class Complexity
{
    public static function getComplexityById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM complexity WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $complexityItem = $result->fetch();
            return $complexityItem;
        }
        return false;
    }
    public static function getComplexityList()
    {
        $db = Db::getConnection();
        $complexityList = array();
        $result = $db->query('SELECT * FROM Complexity
                                        ORDER BY com_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $complexityList[$i]['id'] = $row['id'];
            $complexityList[$i]['com_name'] = $row['com_name'];
            $i++;
        }
        return $complexityList;
    }
}