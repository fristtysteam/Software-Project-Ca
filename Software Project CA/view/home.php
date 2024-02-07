<?php
require_once '../model/databaseConnection.php';
require_once '../model/language.php';
include "../view/nav.php";
include "../styles/homeStyles.php";

$currentLanguage = getLanguage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DKIT Art Gallery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>



<section class="hero">
    <div class="container">
        <h1>
            <?php
            if ($currentLanguage == 'english') {
                echo "Welcome to the DKIT Art Gallery";
            } elseif ($currentLanguage == 'irish') {
                echo "Failte go dtí Dkit Áiléar Ealaíne";
            }
            ?>
        </h1>
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Immerse yourself in the world of creativity and expression.";
            } elseif ($currentLanguage == 'irish') {
                echo "Tóg saol amach duit féin i ndomhan na cruthaitheachta agus an luaithréalachta.";
            }
            ?>
        </p>
        <a href="?action=login" class="btn btn-primary">Login</a>
        <a href="?action=register" class="btn btn-secondary">Register</a>
    </div>
</section>

<section class="gallery">
    <div class="container">
        <h2>
            <?php
            if ($currentLanguage == 'english') {
                echo "Current Exhibitions";
            } elseif ($currentLanguage == 'irish') {
                echo "Taispeántais Reatha";
            }
            ?>
        </h2>
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Explore our diverse collection of contemporary artworks.";
            } elseif ($currentLanguage == 'irish') {
                echo "Scaip do chuid ealaíon comhaimseartha éagsúil.";
            }
            ?>
        </p>
        <ul>
            <li>
                <?php
                if ($currentLanguage == 'english') {
                    echo "Abstract Expressionism";
                } elseif ($currentLanguage == 'irish') {
                    echo "Measúnú Réamhspleách";
                }
                ?>
            </li>
        </ul>

        <div class="gallery-links">
            <a href="?action=gallery&type=abstract">
                <?php
                if ($currentLanguage == 'english') {
                    echo "Abstract Art";
                } elseif ($currentLanguage == 'irish') {
                    echo "Ealaín Réamhspleách";
                }
                ?>
            </a>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <h2>
            <?php
            if ($currentLanguage == 'english') {
                echo "About DKIT Art Gallery";
            } elseif ($currentLanguage == 'irish') {
                echo "Faoin Dkit Áiléar Ealaíne";
            }
            ?>
        </h2>
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Discover the history and mission of our art gallery, dedicated to promoting creativity and artistic expression.";
            } elseif ($currentLanguage == 'irish') {
                echo "Aithris ar stair agus misean ár n-áiléir ealaíne, atá tiomanta do chur chun cinn cruthaitheachta agus léiriú ealaíontóireachta.";
            }
            ?>
        </p>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <h2>
            <?php
            if ($currentLanguage == 'english') {
                echo "Sign Up for Newsletters";
            } elseif ($currentLanguage == 'irish') {
                echo "Cláraigh le híomhánna nuachta";
            }
            ?>
        </h2>
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Stay updated with the latest exhibitions, events, and news. Subscribe to our newsletter.";
            } elseif ($currentLanguage == 'irish') {
                echo "Fanaigh suas leis na taispeántais is déanaí, imeachtaí, agus scéalta. Cláraigh leis ár nuachtlitir.";
            }
            ?>
        </p>
        <form class="newsletter-form" action="#" method="post">
            <input type="email" name="email" class="newsletter-input" placeholder="Enter your email" required>
            <button type="submit" class="newsletter-submit">
                <?php
                if ($currentLanguage == 'english') {
                    echo "Subscribe";
                } elseif ($currentLanguage == 'irish') {
                    echo "Scrios";
                }
                ?>
            </button>
        </form>
    </div>
</section>

<section class="events">
    <div class="container">
        <h2>
            <?php
            if ($currentLanguage == 'english') {
                echo "Upcoming Events";
            } elseif ($currentLanguage == 'irish') {
                echo "Imeachtaí atá ag teacht";
            }
            ?>
        </h2>
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Attend our upcoming events and engage with the vibrant art community.";
            } elseif ($currentLanguage == 'irish') {
                echo "Freastail ar árimeachtaí atá romhainn agus bí i dteagmháil le pobal ealaíne bríomhar.";
            }
            ?>
        </p>
        <ul>
            <li>
                <?php
                if ($currentLanguage == 'english') {
                    echo "Artists' Talk: Innovation in Art - Date";
                } elseif ($currentLanguage == 'irish') {
                    echo "Comhrá Ealaíontóirí: Nuálaíocht san Ealaín - Dáta";
                }
                ?>
            </li>
        </ul>
    </div>
</section>

<section class="language-switch">
    <div class="container">
        <p>
            <?php
            if ($currentLanguage == 'english') {
                echo "Language: English";
            } elseif ($currentLanguage == 'irish') {
                echo "Teanga: Gaeilge";
            }
            ?>
        </p>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>


<script>
    function setLanguage(lang) {
        alert('Language set to: ' + lang);

        $.ajax({
            type: 'POST',
            url: '../model/language.php',
            data: { action: 'set_language', language: lang },
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.error('Error setting language:', error);
            }
        });
    }
</script>
</html>
<?php include'../view/footer.php' ?>

