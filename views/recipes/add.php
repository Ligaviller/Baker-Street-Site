<?php include (ROOT."/template/parts/header.php");
?>
<form action="" method="post">
<div class="item">
    <div class="itemHeader">
        <h1>
            <input type="text" name="rec_name" placeholder="Название">
        </h1>
    </div>
    <hr>
    <div class="itemMid">

        <input type="text" name="rec_photo" placeholder="Фото" class="inp_photo">

        <div class="itemTags">
            <h3>Теги</h3>
            <hr>
            <ul>
                <li><img src="/template/images/four-black-squares.svg" alt=""><span class="i">Категория </span>
                    <span class="tagEnd">
                        <select name="rec_cat">
                        <?php
                            foreach ($categoryList as $categoryItem)
                            {
                                echo '<option value="'.$categoryItem["id"].'">'.$categoryItem["cat_name"].'</option>';
                            }
                        ?>
                        </select>
                    </span>
                </li>
                <li><img src="/template/images/flag.svg" alt=""><span class="i">Кухня </span><span class="tagEnd">
                        <select name="rec_kit">
                        <?php
                        foreach ($kitchenList as $kitchenItem)
                        {
                            echo '<option value="'.$kitchenItem["id"].'">'.$kitchenItem["kit_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>
                <li><img src="/template/images/pot.svg" alt=""><span class="i">Метод </span><span class="tagEnd">
                           <select name="rec_met">
                        <?php
                        foreach ($methodList as $methodItem)
                        {
                            echo '<option value="'.$methodItem["id"].'">'.$methodItem["met_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>
                <li><img src="/template/images/floating-balloons.svg" alt=""><span class="i">Повод </span><span class="tagEnd">
                           <select name="rec_occ">
                        <?php
                        foreach ($occasionList as $occasionItem)
                        {
                            echo '<option value="'.$occasionItem["id"].'">'.$occasionItem["occ_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>
                <li><img src="/template/images/dinner.svg" alt=""><span class="i">Порции </span><span class="tagEnd">
                        <select name="rec_ser" class="chosen-select">
                        <?php
                        foreach ($servingList as $servingItem)
                        {
                            echo '<option value="'.$servingItem["id"].'">'.$servingItem["ser_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>
                <li><img src="/template/images/clock.svg" alt=""><span class="i">Время </span><span class="tagEnd">
                     <select name="rec_tim">
                        <?php
                        foreach ($timeList as $timeItem)
                        {
                            echo '<option value="'.$timeItem["id"].'">'.$timeItem["tim_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>
                <li><img src="/template/images/cookbook.svg" alt=""><span class="i">Сложность </span><span class="tagEnd">
                         <select name="rec_com">
                        <?php
                        foreach ($complexityList as $complexityItem)
                        {
                            echo '<option value="'.$complexityItem["id"].'">'.$complexityItem["com_name"].'</option>';
                        }
                        ?>
                        </select>
                    </span></li>

            </ul>
        </div>
    </div>
    <div class="recipeIng">
        <h3>Ингредиенты</h3>
        <hr>
        <div class="tableIng">
            <div class="tableIngIng add" id="addIngForm">
                <input type="button" value="Добавить ингредиент" class="add" id="addIng" />
            </div>
            <div class="tableIngCount">
                <ul>

                </ul>
            </div>
        </div>
    </div>
    <div class="recipeSteps">
        <h3>Способ приготовления</h3>

            <hr>
            <div class="recipeStepItem" id="addStepForm">
                <input type="button" value="Добавить шаг" class="add" id="addStep" />

            </div>





    </div>
    <input type="submit" value="Сохранить" />
</div>
</form>
<?php
echo '<script>';
?>
$(document).ready(function() {
var stepCount = 0;
$("#addIng").click(function() {

var lastField = $("#addIngForm div:last");
var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
var fieldWrapper = $("<div class=\"addIngForm\" id=\"ing" + intId + "\"/>");
fieldWrapper.data("idx", intId);
var fType = $("<select name=\"ingNameC[" + intId + "]\" class=\"selectIng\"><?php
    foreach ($ingredientList as $ingredientItem)
        echo '<option value=\"'.$ingredientItem["id"].'\">'.$ingredientItem["ing_name"].'</option>';
    ?></select>");
var fName = $("<input name=\"ingCountC[" + intId + "]\" type=\"text\" class=\"fieldCount\" />");
var count = $("<select name=\"ingMesC[" + intId + "]\" ><?php
    foreach ($countList as $countItem)
        echo '<option value=\"'.$countItem["id"].'\">'.$countItem["count_name"].'</option>';
    ?></select>");
var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
removeButton.click(function() {
$(this).parent().remove();
});
fieldWrapper.append(fType);
fieldWrapper.append(fName);
fieldWrapper.append(count);
fieldWrapper.append(removeButton);

$("#addIngForm").append(fieldWrapper);
$(".selectIng").select2();
});

$("#addStep").click(function() {
stepCount++;
var lastField = $("#addStepForm div:last");
var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
var fieldWrapper = $("<div class=\"addStepForm\" id=\"field" + intId + "\"/>");
fieldWrapper.data("idx", intId);
var fCount = $("<input name=\"stepNumC[" + intId + "]\" type=\"text\" class=\"stepNum\" />");
var fPhoto = $("<input name=\"stepPhotoC[" + intId + "]\" type=\"text\" class=\"stepPhoto\" />");
var fName = $("<input name=\"stepTextC[" + intId + "]\" type=\"text\" class=\"stepText\" />");

var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
removeButton.click(function() {
$(this).parent().remove();
stepCount--;
});
fieldWrapper.append(fCount);
fieldWrapper.append(fPhoto);
fieldWrapper.append(fName);
fieldWrapper.append(removeButton);

$("#addStepForm").append(fieldWrapper);
});



});
<?php
echo '</script>';
?>
<?php include (ROOT."/template/parts/footer.php");
?>

