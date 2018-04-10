<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>
<div class="main">

    <?php
    AddLog("Добавить категорию");
    foreach ($categoryList as $categoryItem){
        AddCategoryItem($categoryItem['id'], $categoryItem["cat_name"], $categoryItem["photo"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
