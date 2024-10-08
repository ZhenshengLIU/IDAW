<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        // idPage titre
        'index' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets')
        );
        
        echo'<nav class="menu">';
        echo'<ul>';
        foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
            if ($pageId=$currentPageId){
                echo'<a class="currentpage" href="'.$pageId.'.php">Accueil</a>';
            } else {
                echo'<a href="'.$pageId.'.php"></a>';
            }
            echo'<li>';

            }
           
        
        echo '</ul>';
        echo '</nav>';

}

?>

       
        // ...



