<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" />
  <title>About Me</title>
</head>

<body>
<a href="index.php?action=blog"><img src="src\files\me.png" alt="Lewis"></a> <div>click me to access my blog!</div>
  <div class="about-section">
    <h1>Le premier site de Lewis Kidd!</h1>
    <p>Bonjour! Je m'appelle Lewis et je suis un développeur junior chez Direct Optic en apprentissage chez OpenClassrooms. <br>
      Vous trouverez ici mon premier site web, conçu par mes soins avec l'aide de mon mentor Thomas Shiapanya. <br>
      Merci à OpenClassrooms pour cette oportunité et merci à Direct Optic pour l'aide qu'ils m'apportent.
    </p>
  </div>

  <h2 style="text-align:center">A propos</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <div class="container">
          <p class="title">développeur junior</p>
          <p>lewis.kidd56@gmail.com</p>
          <p><a href="src\files\CV_Lewis_Kidd.pdf" download="CV_Lewis_Kidd">Download my resume!</a></p>
        </div>
      </div>
    </div>


    
      <h2>Contact me!</h2>
      <button class="button" id="contact_form_button">Contact</button>
      <div name='contact_div' id="contact_div" style='display: none'>
      <form action="index.php?action=send_form" method="post" id="contact_form">
        <div>
          <label for="tender">Your e-mail</label><br />
          <input type="text" id="e-mail" name="e-mail" placeholder="Entrer votre e-mail" />
        </div>
        <div>
          <label for="text">Saissisez votre message</label><br />
          <textarea id="contact_content" name="contact_content" placeholder="Bonjour Lewis, ..." class="contact-me-form"></textarea>
        </div>
        <div>
          <input type="submit"  />
        </div>
      </form>
    </div>

    <script>
      document.getElementById('contact_form_button').onclick = function(){
        document.getElementById('contact_div').style.display = 'block';
      }
    </script>
</body>

</html>