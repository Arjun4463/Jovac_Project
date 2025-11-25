<?php
// vuln/search.php - Reflected XSS (vulnerable)
$q = $_GET['q'] ?? '';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vuln Search — Reflected XSS</title>
  <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
  <main class="container" style="grid-template-columns:1fr;max-width:700px;">
    <section class="card">
      <h2>Vulnerable Reflected Search</h2>
      <form method="get" action="">
        <div class="form-row">
          <label>Search</label>
          <!-- VULNERABLE: value echoed raw -->
          <input type="text" name="q" value="<?php echo $q; ?>" placeholder="Try: <script>alert(1)</script>">
        </div>
        <button class="btn" type="submit">Search</button>
      </form>

      <hr>
      <h3>Results</h3>
      <p>
        <!-- VULNERABLE: directly echoing user input causes XSS -->
        Results for: <?php echo $q; ?>
      </p>
      <p class="small muted">Tip: This page does not escape user input — that's why injected scripts will run.</p>
      <p><a href="../index.php">← Back</a></p>
    </section>
  </main>
</body>
</html>
