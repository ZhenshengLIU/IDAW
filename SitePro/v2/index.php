<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <!-- menu begin -->
    <nav class="menu">
        <ul>
            <li><a class="currentpage" href="index.html">Accueil</a></li>
            <li><a href="cv.html">CV</a></li>
            <li><a href="projets.html">Projets</a></li>
        </ul>
    </nav>
    <!-- menu end -->
    <div class="contenu">
    <!-- content begin -->
    <h1>Qui suis-je?</h1>
    <em style="font-size:20px;color:red;">A smart cat</em>
    <p style="text-align:center">Feed me a question and i will give u an answer</p>
    <div class="search-container">
        <form action="https://www.google.com/search" method="GET">
            <input type="text" id="query" name="q" required>
            <button type="submit" id="search-button">Feed</button>
        </form>
    </div>
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
