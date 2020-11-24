<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página</title>
</head>
<body>

    <h1>Enviar Email</h1>
    <button id="btn">Enviar</button>
</body>
<script>
    let btnEnviar  = document.getElementById("btn").addEventListener("click", send);
    
    function send(){
        window.location.href = 'mailer.php';
    }

</script>
</html>