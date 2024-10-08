<?php
require_once('template_header.php');
?>
    <!-- menu begin -->
    <?php
        require_once('template_menu.php');
        renderMenuToHTML('projets');
    ?>
    <!-- menu end -->
    <div class="contenu">
    <h1 style="text-align:center">Projets</h1>

    <!-- content begin -->
    <div class="flex-container">
        <div class="box box1">
            <h2> Projet 1</h2>
            <p>As a programmer,create blablablabla</p>
        </div>
        <div class="box box2">
            <h2> Projet 2</h2>
            <p> Why there is a null part under this yellow block, because the blue one and this one r in the same row so the height of this row equal to the height of the blue blocks</p>
        </div>
        <div class="box box3">
            <h2>Projet 3</h2>
            <p> So how can i make the red one on the left side go up a little to fill the null part.</p>
        </div>

        <div class="box box4"></div>
        <!-- <div class="box box5"></div> -->
        <div class="box box6"></div>
        <div class="box box7"></div>
        <div class="box box8"></div>
    </div>
</div>
    <!-- content end -->
</body>
<!--footer begin-->
<footer class="footer">
    <hr>
    <p class="footnote">@ZhenshengLIU</p>
</footer>
<!--footer end-->
</html>
