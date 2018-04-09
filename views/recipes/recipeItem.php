<?php include (ROOT."/template/parts/header.php");
?>

<div class="recipe">
    <div class="recipeHeader">
        <h1><?php echo $recipeItem['rec_name']; ?></h1>
        <div class="recipeHeaderRow">
            <div>Добавил <?php echo $recipeItem['user_name']; ?></div>
            <div class="date"><?php echo $recipeItem['date']; ?></div>
        </div>
    </div>
    <hr>
    <div class="recipeMid">

        <img src="<?php echo $recipeItem['photo']; ?>">
        <div class="recipeTags">
            <h3>Теги</h3>
            <hr>
            <ul>
                <li><img src="/template/images/four-black-squares.svg" alt=""><span class="i">Категория </span><span class="tagEnd"><?php echo $recipeItem['cat_name']; ?></span></li>
                <li><img src="/template/images/flag.svg" alt=""><span class="i">Кухня </span><span class="tagEnd"><?php echo $recipeItem['kit_name']; ?></span></li>
                <li><img src="/template/images/pot.svg" alt=""><span class="i">Метод </span><span class="tagEnd"><?php echo $recipeItem['met_name']; ?></span></li>
                <li><img src="/template/images/floating-balloons.svg" alt=""><span class="i">Повод </span><span class="tagEnd"><?php echo $recipeItem['occ_name']; ?></span></li>
                <li><img src="/template/images/dinner.svg" alt=""><span class="i">Порции </span><span class="tagEnd"><?php echo $recipeItem['ser_name']; ?></span></li>
                <li><img src="/template/images/clock.svg" alt=""><span class="i">Время </span><span class="tagEnd"><?php echo $recipeItem['tim_name']; ?></span></li>
                <li><img src="/template/images/cookbook.svg" alt=""><span class="i">Сложность </span><span class="tagEnd"><?php echo $recipeItem['com_name']; ?></span></li>

            </ul>
        </div>
    </div>
    <div class="recipeIng">
        <h3>Ингредиенты</h3>
        <hr>
        <div class="tableIng">
            <div class="tableIngIng">
                <ul>
                    <?php
                    foreach ($ingredientList as $item) {
                        echo "<li>";
                        echo $item["ing_name"];
                        echo "</li>";
                    }
                    ?>
                </ul>

            </div>
            <div class="tableIngCount">
                <ul>
                    <?php
                    foreach ($ingredientList as $item) {
                        echo "<li>";
                        echo $item["amount"]." ".$item['count_name'];
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="recipeSteps">
        <h3>Способ приготовления</h3>
        <?php
        foreach ($recipeSteps as $item){
            ?>
            <hr>
            <div class="recipeStepItem">
                <img src="<?php echo $item['photo']; ?>" alt="">
                <div>
                    <h4>Шаг <?php echo $item['number']; ?>.</h4>
                    <p><?php echo $item['description']; ?></p>
                </div>
            </div>

        <?php
        }
        ?>

    </div>

</div>

<?php include (ROOT."/template/parts/footer.php");
?>

