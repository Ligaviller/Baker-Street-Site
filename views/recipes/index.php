<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>

<div class="main">

    <?php

    foreach ($recipeList as $recipeItem){
        AddRecipeItem($recipeItem['id'], $recipeItem["rec_name"], $recipeItem["photo"], $recipeItem["cat_name"], $recipeItem["kit_name"],
            $recipeItem["met_name"], $recipeItem["occ_name"], $recipeItem["ser_name"], $recipeItem["tim_name"], $recipeItem["com_name"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
