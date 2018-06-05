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

    public static function insertRecipe($rec_name, $rec_photo, $rec_cat, $rec_kit, $rec_met, $rec_occ, $rec_ser, $rec_tim, $rec_com)
    {
        if(!empty($rec_name)&&!empty($rec_photo))
        {
            $db = Db::getConnection();
            $sql = 'INSERT INTO recipe (rec_name, photo, id_category, id_kitchen,'
                .' id_method, id_occasion, id_servings, id_time, id_complexity, date, id_user, rate, votes) '
                .'VALUES (:rec_name, :rec_photo, :rec_cat, :rec_kit, :rec_met, :rec_occ, :rec_ser, :rec_tim, :rec_com, DEFAULT, :user_id, NULL, NULL)';
            $result = $db->prepare($sql);
            $result->bindParam(':rec_name', $rec_name, PDO::PARAM_STR);
            $result->bindParam(':rec_photo', $rec_photo, PDO::PARAM_STR);
            $result->bindParam(':rec_cat', $rec_cat, PDO::PARAM_INT);
            $result->bindParam(':rec_kit', $rec_kit, PDO::PARAM_INT);
            $result->bindParam(':rec_met', $rec_met, PDO::PARAM_INT);
            $result->bindParam(':rec_occ', $rec_occ, PDO::PARAM_INT);
            $result->bindParam(':rec_ser', $rec_ser, PDO::PARAM_INT);
            $result->bindParam(':rec_tim', $rec_tim, PDO::PARAM_INT);
            $result->bindParam(':rec_com', $rec_com, PDO::PARAM_INT);
            $result->bindParam(':user_id',$user_id=1,PDO::PARAM_INT);

            $result->execute();
            return $db->lastInsertId();

        }
        return null;
    }

    public static function insertIngredientOfRecipe($rec_id, $ing_id, $ing_count, $count_id)
    {
        if(!empty($rec_id)&&!empty($ing_id)&&!empty($ing_count)&&!empty($count_id))
        {
            $db = Db::getConnection();
            $sql = 'INSERT INTO `recipe-ingredient` (id_recipe, id_ingredient, id_count, amount)  '
                .'VALUES (:rec_id, :ing_id, :count_id, :ing_count)';
            $result = $db->prepare($sql);
            $result->bindParam(':rec_id', $rec_id, PDO::PARAM_INT);
            $result->bindParam(':ing_id', $ing_id, PDO::PARAM_INT);
            $result->bindParam(':count_id', $count_id, PDO::PARAM_INT);
            $result->bindParam(':ing_count', $ing_count, PDO::PARAM_INT);

            return $result->execute();

        }

        return null;
    }

    public static function insertStep($rec_id, $count, $text, $photo)
    {
        if(!empty($rec_id)&&!empty($count)&&!empty($text)&&!empty($photo))
        {
            $db = Db::getConnection();
            $sql = 'INSERT INTO step (id_recipe, description, photo, step.number) '
                .'VALUES (:rec_id, :step_text, :photo, :step_count)';
            $result = $db->prepare($sql);
            $result->bindParam(':rec_id', $rec_id, PDO::PARAM_INT);
            $result->bindParam(':step_count', $count, PDO::PARAM_INT);
            $result->bindParam(':step_text', $text, PDO::PARAM_STR);
            $result->bindParam(':photo', $photo, PDO::PARAM_STR);

            return $result->execute();
        }
        return null;
    }
}