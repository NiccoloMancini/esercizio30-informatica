<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <ul>
  <?php
        $curva = 30;
        $tribunaCentrale = 80;
        $tribunaOnore = 120;
        $totale = 0;
        $sconto = $_POST['codiceSconto'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $cf = $_POST['cf'];
        $data = date("d-m-Y");
        $singolo = $_POST['pagamento'];
        $settore = $_POST['settore'];
        $numBiglietti = 1;
        $cfAggiuntivi = array();
        if ($singolo == "piuPersone") {
          $numBiglietti = $_POST['personeAggiuntive'];
          for ($i = 1; $i <= $numBiglietti; $i++) {
            $id = "cf" . $i;
            array_push($cfAggiuntivi, $_POST[$id]);
          }
          $numBiglietti +=1;
        }
  ?>
  <h1 class="bg-primary w-50 py-3 text-white text-center mx-auto rounded-3 mt-3">DATI ACQUISTO</h1>
  <div class="mx-auto w-50 bg-light rounded-3 mt-3 px-4">
      <p><span class="fw-bold">Nome:</span> <?php echo $nome;?></p>
      <p><span class="fw-bold">Cognome:</span> <?php echo $cognome;?></p>
      <p><span class="fw-bold">Codice Fiscale:</span> <?php echo $cf;?></p>
      <p><span class="fw-bold">Data:</span> <?php echo $data;?></p>
      <p><span class="fw-bold">Numero Biglietti:</span> <?php echo $numBiglietti;?></p>
      <?php
        if ($singolo == "piuPersone") {
          echo "<p class='fw-bold mb-1'>Persone aggiuntive:</p>";
          echo "<ul>";
          foreach ($cfAggiuntivi as $cf) {
            echo "<li class='my-2'><span class='fw-bold'>Codice Fiscale Aggiuntivo:</span> $cf</li>";
          }
          echo "</ul>";
        }
        switch($settore){
          case "curva":
            $totale = $curva*$numBiglietti;
            break;
          case "centrale":
            $totale = $tribunaCentrale*$numBiglietti;
            break;
          case "onore":
            $totale = $tribunaOnore*$numBiglietti;
            break;
        }
        if ($sconto == ""){
          echo "<p><span class='fw-bold'>Totale: </span>" . $totale . "€</p>";
        } else if($sconto == "FIRENZE5") {
          echo "<p class='fw-bold text-success'>Sconto 5% applicato!</p>";
          echo "<p><span class='fw-bold'>Totale: </span>" . $totale . "€</p>";
          $totale -= ($totale * 0.05);
          echo "<p><span class='fw-bold'>Totale scontato: </span>" . $totale . "€</p>";
        }else{
          echo "<p class='fw-bold text-danger'>Codice sconto insesistente!</p>";
          echo "<p><span class='fw-bold'>Totale: </span>" . $totale . "€</p>";
        }
        
      ?>
  </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>