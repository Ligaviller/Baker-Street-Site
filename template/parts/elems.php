<?php
function getUrl() {
    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
    $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
    if($rest = substr($url, -1)=="/") {
        $url = substr($url, 0, -1);
    }
    return $url;
}
function AddRecipeItem($recId, $recName, $recPhoto, $catName, $kitName, $metName, $occName, $serName, $timName, $comName){
    echo ' <div class="elem">';
    echo ' <img src="'.$recPhoto.'" alt="Фото">';
    echo ' <a href="/recipes/'.$recId.'"><h3>'.$recName.'</h3></a>';
    echo ' <div class="tag cat">'.$catName.'</div>';
    echo ' <div class="tag kit">'.$kitName.'</div>';
    echo ' <div class="tag met">'.$metName.'</div>';
    echo ' <div class="tag occ">'.$occName.'</div>';
    echo ' <div class="tag ser">'.$serName.'</div>';
    echo ' <div class="tag tim">'.$timName.'</div>';
    echo ' <div class="tag com">'.$comName.'</div>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}

function AddIngredientItem($ingId, $ingName, $ingPhoto, $ingCaloricity, $ingCost, $ingRare){
    echo ' <div class="elem">';
    echo ' <img src="'.$ingPhoto.'" alt="Фото">';
    echo ' <a href="/ingredients/'.$ingId.'"><h3>'.$ingName.'</h3></a>';
    echo ' <div class="tag cat">Калл: '.$ingCaloricity.'</div>';
    echo ' <div class="tag met">Цена: '.$ingCost.'</div>';
    echo ' <div class="tag occ">Редкость: '.$ingRare.'</div>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}

function AddCategoryItem($catId, $catName, $catPhoto){
    echo ' <div class="elem">';
    echo ' <img src="'.$catPhoto.'" alt="Фото">';
    echo ' <a href="/categories/'.$catId.'"><h3>'.$catName.'</h3></a>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}

function AddKitchenItem($kitId, $kitName, $kitPhoto){
    echo ' <div class="elem">';
    echo ' <img src="'.$kitPhoto.'" alt="Фото">';
    echo ' <a href="/kitchens/'.$kitId.'"><h3>'.$kitName.'</h3></a>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}
function AddMethodItem($metId, $metName, $metPhoto){
    echo ' <div class="elem">';
    echo ' <img src="'.$metPhoto.'" alt="Фото">';
    echo ' <a href="/methods/'.$metId.'"><h3>'.$metName.'</h3></a>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}
function AddOccasionItem($occId, $occName, $occPhoto){
    echo ' <div class="elem">';
    echo ' <img src="'.$occPhoto.'" alt="Фото">';
    echo ' <a href="/occasions/'.$occId.'"><h3>'.$occName.'</h3></a>';
    echo ' <div class="btn close"></div>';
    echo ' <div class="btn edit"></div>';
    echo '</div>';
}
function AddErr($errText){
    echo'<div class="elem err event">';
    echo' <h3>Ошибка</h3>';
    echo'  <div class="err-text">';
    echo'    <p>'.$errText.'</p>';
    echo'  </div>';
    echo' <div class="btn close"></div>';
    echo'</div>';
}
function AddLog($logText){
    echo' <a class="log-a" href="'.getUrl()."/add";
    echo' ">';
    echo'  <div class="elem log event"> ';
    echo'    <div class="log-text">';
    echo' <img class="plus" src="/template/images/plus-button.svg" alt="">';
    echo'      <p>'.$logText.'</p>';
    echo'    </div>';
    echo'  </div>';
    echo' </a>';
}
?>
