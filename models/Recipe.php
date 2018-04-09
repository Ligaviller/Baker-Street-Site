<?php

class Recipe
{
    public static function getRecipeItemById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT r.id, r.rec_name, r.photo, c.cat_name, k.kit_name, m.met_name,
                                        o.occ_name, s.ser_name, t.tim_name, c2.com_name, r.date, u.user_name  FROM recipe r 
                                        LEFT JOIN category c ON r.id_category = c.id
                                        LEFT JOIN kitchen k ON r.id_kitchen = k.id
                                        LEFT JOIN method m ON r.id_method = m.id
                                        LEFT JOIN occasion o ON r.id_occasion = o.id
                                        LEFT JOIN servings s ON r.id_servings = s.id
                                        LEFT JOIN time t ON r.id_time = t.id
                                        LEFT JOIN complexity c2 ON r.id_complexity = c2.id
                                        LEFT JOIN user u ON r.id_user = u.id                                   
                                        WHERE r.id= :paramId');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $recipeItem = $result->fetch();
            return $recipeItem;
        }
        return false;
    }

    public static function getRecipeList()
    {
        $db = Db::getConnection();

        $recipeList = array();

        $result = $db->query('SELECT r.id, r.rec_name, r.photo, c.cat_name, k.kit_name, m.met_name, o.occ_name, s.ser_name, t.tim_name, c2.com_name FROM recipe r 
                                        LEFT JOIN category c ON r.id_category = c.id
                                        LEFT JOIN kitchen k ON r.id_kitchen = k.id
                                        LEFT JOIN method m ON r.id_method = m.id
                                        LEFT JOIN occasion o ON r.id_occasion = o.id
                                        LEFT JOIN servings s ON r.id_servings = s.id
                                        LEFT JOIN time t ON r.id_time = t.id
                                        LEFT JOIN complexity c2 ON r.id_complexity = c2.id                                     
                                        ORDER BY date DESC LIMIT 10');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i=0;
        while($row = $result->fetch()){
            $recipeList[$i]['id'] = $row['id'];
            $recipeList[$i]['rec_name'] = $row['rec_name'];
            $recipeList[$i]['photo'] = $row['photo'];
            $recipeList[$i]['cat_name'] = $row['cat_name'];
            $recipeList[$i]['kit_name'] = $row['kit_name'];
            $recipeList[$i]['met_name'] = $row['met_name'];
            $recipeList[$i]['occ_name'] = $row['occ_name'];
            $recipeList[$i]['ser_name'] = $row['ser_name'];
            $recipeList[$i]['tim_name'] = $row['tim_name'];
            $recipeList[$i]['com_name'] = $row['com_name'];
            $i++;

        }
        return $recipeList;
    }
    public static function getRecipeStepsById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();
            $recipeSteps = array();
            $result = $db->prepare('SELECT * FROM step WHERE id_recipe = :paramId ORDER BY number ASC;');
            $result->bindParam(':paramId',$id);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            while($row = $result->fetch()){
                $recipeSteps[$i]['id'] = $row['id'];
                $recipeSteps[$i]['id_recipe'] = $row['id_recipe'];
                $recipeSteps[$i]['description'] = $row['description'];
                $recipeSteps[$i]['photo'] = $row['photo'];
                $recipeSteps[$i]['number'] = $row['number'];
                $i++;

            }
            return $recipeSteps;
        }
        return false;
    }
}