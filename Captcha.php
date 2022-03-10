<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel = "stylesheet" type = "text/css" href = "Captcha.css">
        <meta charset="utf-8">
        <title>Captcha</title>
        <script type = "text/javascript" src="Captcha.js"></script>
        <link rel="stylesheet" href="bootstrap.css">
    </head>
    <body>
      <h2>Vérifions d'abord que vous n'êtes pas un robot.</h2>
        <?php
            $i = 1;
            $ans = rand(1, 4);
            $j = 0;
            echo '<h1>Trouvez ' . $ans . "</h1>";
            for($i = 0; $i < 9; $i++){
                $j = rand(1, 4);
                echo '<img src="images/' . $j . '.png" height = 150 width = 150 class = captcha onclick = "captchaClick(this)" data-target=' . $i . '/>';
                echo '<input type=checkbox class=hidden name=' . $i . '/>';
                if(($i+1)%3 == 0){
                    echo '<br>';
                }
                if($j == $ans){
                    echo '<script>upRAns(' . $i . ')</script>';
                }
            }
        ?>
        <div>
            <input type="hidden" id="captchacheck" name="captcha" value="nope">
            <button type = "button" class = "btn btn-primary" onclick = "ansCheck()">Submit Captcha</button>
            <p id = "messagecaptcha">Entrez la réponse au Captcha ci-dessus avant de valider.</p>
        </div>
    </body>
</html>
