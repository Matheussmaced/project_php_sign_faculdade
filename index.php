<?php include('layouts/header.php'); ?>
<div class="card mx-auto shadow p-4" style="max-width: 500px;">
  <h2 class="text-center mb-4">Descubra seu signo:</h2>
  <form method="POST" action="show_zodiac_sign.php">
    <div class="mb-3">
      <label for="data_nascimento" class="form-label">Data de nascimento</label>
      <input type="date" name="data_nascimento" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Descobrir</button>
  </form>
</div>
</body>

</html>