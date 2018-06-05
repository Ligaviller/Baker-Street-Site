<?php

class Ingredient
{
    public static function getIngredientById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT * FROM ingredient WHERE id=:paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $ingredientItem = $result->fetch();
            return $ingredientItem;
        }
        return false;
    }
    public static function getIngredientList()
    {
        $db = Db::getConnection();
        $ingredientList = array();
        $result = $db->query('SELECT * FROM ingredient
                                        ORDER BY ing_name ASC LIMIT 50');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch())
        {
            $ingredientList[$i]['id'] = $row['id'];
            $ingredientList[$i]['ing_name'] = $row['ing_name'];
            $ingredientList[$i]['caloricity'] = $row['caloricity'];
            $ingredientList[$i]['cost'] = $row['cost'];
            $ingredientList[$i]['rare'] = $row['rare'];
            $ingredientList[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $ingredientList;
    }
    public  static function getIngredientListByRecipeId($id)
    {
        $id = intval($id);
        if($id) {

            $db = Db::getConnection();
            $IngredientListByRecipeId = array();
            $result = $db->prepare('select ri.id, r.rec_name, i.ing_name, c.count_name, ri.amount from `recipe-ingredient` ri
                                            LEFT JOIN ingredient i ON ri.id_ingredient = i.id
                                            LEFT JOIN recipe r ON ri.id_recipe = r.id
                                            LEFT JOIN count c ON ri.id_count = c.id
                                            WHERE r.id=:paramId
                                            ORDER BY ri.amount DESC');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($row = $result->fetch())
            {
                $IngredientListByRecipeId[$i]['id'] = $row['id'];
                $IngredientListByRecipeId[$i]['ing_name'] = $row['ing_name'];
                $IngredientListByRecipeId[$i]['count_name'] = $row['count_name'];
                $IngredientListByRecipeId[$i]['amount'] = $row['amount'];
                $i++;
            }
            return $IngredientListByRecipeId;

        }
        return false;
    }



}


