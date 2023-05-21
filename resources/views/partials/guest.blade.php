@guest
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Não autorizado</title>
  <style>

    /* Estilos CSS */
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: "Poppins", sans-serif;
    }

    h1 {
      margin-bottom: 0;
      text-align: center;
    }

    p {
      font-size: 1.5rem;
      margin-top: 0;
      color: #444;
      text-align: center;
    }

    a {
        color: #0073ff;
    }

    a:hover {
        text-decoration: underline;
    }

    .icone {
        width: 50px;
    }

    @media screen and (max-width: 768px) {
      /* Estilos para dispositivos móveis */
      p {
        font-size: 1.2rem;
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
    <img class="icone" src="{{asset('images/logo-64.png')}}">
    <h1>Não Autorizado!!</h1>
    <p><a href="/">Entre com sua conta</a> para acessar a página corresponente.</p>
</body>
</html>
@endguest