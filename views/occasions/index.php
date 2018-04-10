<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>
<div class="main">

    <?php
    AddLog("Добавить повод");
    foreach ($occasionList as $occasionItem){
        AddOccasionItem($occasionItem['id'], $occasionItem["occ_name"], $occasionItem["photo"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
