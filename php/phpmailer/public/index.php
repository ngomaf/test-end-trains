<?php

use src\controllers\HomeController;

require "../config.php";

if ($_POST['email']) {

    $home = new HomeController;

    $reuslt = $home->send($_POST);

    $msg = ($reuslt) ? "<p style='color: green;'>Mensagem enviada com sucesso!</p>": 
    "<p style='color: red;'>Houve um erro ao enviar a mensagem!</p>";
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    label{padding-top: 5px; color: #666; display: block; font-size: 11pt;} 
    form{display: flex; gap: 20px;}

    </style>
    <title>PHPMailer train</title>
</head>
<body>

    <main>
        <h1>PHPMailer train</h1>

        <?php echo $msg ?? null ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="ngomatec@gmail.com" id="email" placeholder="Destino"><br>
    
                <label for="subject">Assunto</label>
                <input type="text" name="subject" value="Assunto de test" id="subject" placeholder="Assunto"><br>
    
                <label for="file">Anexo</label>
                <input type="file" name="file" id="file"><br><br><br><br>

                <button type="submit">Enviar »</button>
            </div>
            <div>
                <label for="message">Mensagem</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Mensagem">Mesnagem de test</textarea>
            </div>


        </form>
    </main>
    
</body>
</html>

