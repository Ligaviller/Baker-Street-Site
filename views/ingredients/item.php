<?php include (ROOT."/template/parts/header.php");
?>

<div class="item">
    <div class="itemHeader">
        <h1><?php echo $ingredientItem['ing_name']; ?></h1>
    </div>
    <hr>
    <div class="itemMid">

        <img src="<?php echo $ingredientItem['photo']; ?>">
        <div class="itemTags">
            <h3>Теги</h3>
            <hr>
            <ul>
                <li><img src="/template/images/dinner.svg" alt=""><span class="i">Калорийность </span><span class="tagEnd"><?php echo $ingredientItem['caloricity']; ?></span></li>
                <li><img src="/template/images/four-black-squares.svg" alt=""><span class="i">Цена </span><span class="tagEnd"><?php echo $ingredientItem['cost']; ?></span></li>
                <li><img src="/template/images/cookbook.svg" alt=""><span class="i">Редкость </span><span class="tagEnd"><?php echo $ingredientItem['rare']; ?></span></li>

            </ul>
        </div>
    </div>


</div>

<?php include (ROOT."/template/parts/footer.php");
?>


