<?php include('layouts/header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'] ?? null;
$signos = simplexml_load_file("signos.xml");

if ($data_nascimento) {
  $data_formatada = DateTime::createFromFormat('Y-m-d', $data_nascimento);
  $dia_mes = $data_formatada->format('d/m');
  $data_nasc_sem_ano = DateTime::createFromFormat('d/m/Y', $dia_mes . '/2000');

  $signo_encontrado = null;

  foreach ($signos->signo as $signo) {
    $inicio = DateTime::createFromFormat('d/m/Y', $signo->dataInicio . '/2000');
    $fim = DateTime::createFromFormat('d/m/Y', $signo->dataFim . '/2000');

    if ($fim < $inicio && $data_nasc_sem_ano >= $inicio || $data_nasc_sem_ano <= $fim) {
      $signo_encontrado = $signo;
      break;
    }

    if ($data_nasc_sem_ano >= $inicio && $data_nasc_sem_ano <= $fim) {
      $signo_encontrado = $signo;
      break;
    }
  }

  if ($signo_encontrado): ?>
    <div class="text-center mt-5">
      <h1 class="display-4"><?= $signo_encontrado->signoNome ?></h1>
      <p class="lead"><?= $signo_encontrado->descricao ?></p>
      <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
    </div>
  <?php else: ?>
    <p class="text-danger text-center">Signo não encontrado.</p>
  <?php endif;
} else {
  echo "<p class='text-danger text-center'>Data inválida.</p>";
}
?>