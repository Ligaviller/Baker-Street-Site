<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>
<div class="main">

    <?php
    AddLog("Добавить кухню");
    foreach ($kitchenList as $kitchenItem){
        AddKitchenItem($kitchenItem['id'], $kitchenItem["kit_name"], $kitchenItem["photo"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
