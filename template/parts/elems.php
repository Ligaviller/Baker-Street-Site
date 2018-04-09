<?php

function AddElem($recId, $recName, $recPhoto, $catName, $kitName, $metName, $occName, $serName, $timName, $comName){
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
    echo'  <div class="elem log event"> ';
    echo'    <h3>Событие</h3>';
    echo'    <div class="log-text">';
    echo'      <p>'.$logText.'</p>';
    echo'    </div>';
    echo'   <div class="btn close"></div>';
    echo'  </div>';
}
?>
