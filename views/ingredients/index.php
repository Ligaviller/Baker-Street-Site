<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>
<div class="main">

    <?php

    foreach ($ingredientList as $ingredientItem){
        AddIngredientItem($ingredientItem['id'], $ingredientItem["ing_name"], $ingredientItem["photo"], $ingredientItem["caloricity"], $ingredientItem["cost"],
            $ingredientItem["rare"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
