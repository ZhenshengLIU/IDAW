<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
        'index' => array( 'Accueil' ),
        'cv' => array( 'CV' ),
        'projets' => array('Mes Projets')
        );
        
        echo'<nav class="menu">';
        echo'<ul>';
        foreach($mymenu as $pageId => $pageParameters) {
        echo '<li>';
            if ($pageId==$currentPageId){
                echo'<a class="currentpage" href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
            } else {
                echo'<a href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
            }
            echo'<li>';

            }
           
        
        echo '</ul>';
        echo '</nav>';

}

?>



