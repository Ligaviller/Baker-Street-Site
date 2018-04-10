<?php

include (ROOT."/template/parts/header.php");
require_once(ROOT."/template/parts/elems.php");
?>
<div class="main">

    <?php
    AddLog("Добавить метод");
    foreach ($methodList as $methodItem){
        AddMethodItem($methodItem['id'], $methodItem["met_name"], $methodItem["photo"]);
        echo "</a>";
    }

    ?>
</div>
<?php include (ROOT."/template/parts/footer.php");
?>
