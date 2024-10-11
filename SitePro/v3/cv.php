<?php
require_once('template_header.php');
?>    
    <!-- menu begin -->
    <?php
        require_once('template_menu.php');
        renderMenuToHTML('cv');
    ?>
    <!-- menu end -->
    <body class="cv-body">
    <h1 style="text-align:center">CV</h1>
    <!-- content begin -->
        <div class="cv-container">
            <!-- left column -->
            <div class="leftsidebar">
                <img src="images/cat.jpg" alt="Crying Cat" class="selfie">
                <h1>Crying Cat</h1>
             
                <p class="contact-info"> Maison des chats<br>59000 lille</p>
                <p class="contact-info">Tél: 123456789</p>
                <p class="contact-info">Email: cat.cat@email.com</p>
                
                <h2>Compétences</h2>
                <ul>
                    <li>Manger</li>
                    <li>Depenser l'argent</li>
                    <li>Rendre les gens heureux</li>
                </ul>
                
                <h2>Langues</h2>
                <ul>
                    <li>Miao</li>
                    <li>Meow</li>
                    <li>Miaou</li>
                </ul>
    
                <h2>intérêt</h2>
                <ul>
                    <li>Cuisine</li>
                    <li>Détruire</li>
                    <li>Calligraphie</li>
                </ul>
            </div>
    
            <!-- right column -->
            <div class="rightside">
                <h3>Profil</h3>
                <p class="profil">
                    Meow Meow <br> Meow Meow <br> Meow Meow
                </p>
                
                <h3>Formations</h3>
                <ul>
                    <li><strong>Doctor</strong> (10/2002 - 11/2003)<br> Best Cat University</li>
                    <li><strong>Master</strong> (09/2001 - 07/2002)<br>Better Cat University</li>
                    <li><strong>Bachelor</strong> (09/2000 - 06/2001)<br>Good Cat High School</li>
                </ul>
    
                <h3>Experiences</h3>
                <ul>
                    <li><strong>Détruire le verre d'eau</strong> (12/2010 - présent)<br>Chez Emmanuel Macaron</li>
                    <li><strong>Détruire le canapé</strong> (12/2003 - 08/2010)<br>Chez Charles de Gaulle</li>
                </ul>
            </div>
        </div>
    </body>
    </html>
       
    
    <!-- content end -->
</body>
<!--footer begin-->
<footer class="footer">
    <hr>
    <p class="footnote">@ZhenshengLIU</p>
</footer>
<!--footer end-->
</html>
