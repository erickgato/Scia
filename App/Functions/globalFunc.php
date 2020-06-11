<?php 

function openview($name = null){
    return PATHVIEW . "/View/{$name}";  
}
function openPublic($arch = null){
    return PATHVIEW . "/{$arch}";
}

function openResource($arch = null){
    return PATHVIEW . "/Resources/{$arch}";
}