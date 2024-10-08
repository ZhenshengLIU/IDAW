<?php
require_once('template_header.php');
?>
    <!-- menu begin -->
    <?php
        require_once('template_menu.php');
        renderMenuToHTML('index');
    ?>
    <!-- menu end -->
    <body class="index-body">
    <!-- content begin -->
    <h1 class="index-p">Qui suis-je?</h1>
    <em style="font-size:20px;color:red;">A smart cat</em>
    <p class="index-p" style="text-align:center">Feed me a question and i will give u an answer</p>
    <div class="search-container">
        <form action="https://www.google.com/search" method="GET">
            <input type="text" id="query" name="q" required>
            <button type="submit" id="search-button">Feed</button>
        </form>
    </div>
    
    <!-- content end -->
</body>

<script>
    const button=document.getElementById('search-button');
    const container=document.querySelector('.search-container');
    button.addEventListener('mouseenter', () => {
        container.style.backgroundImage = "url('images/mouthclose.jpg')";
    });

    button.addEventListener('mouseleave', () => {
        container.style.backgroundImage = "url('images/mouthopen.jpg')";
    });
</script>

<!--footer begin-->
<footer class="footer">
    <hr>
    <p class="footnote">@ZhenshengLIU</p>
</footer>
<!--footer end-->
</html>
