<?php
// safe/search.php - Reflected XSS mitigated
$q = $_GET['q'] ?? '';
// Escape for output
$escaped_q = htmlspecialchars($q, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Safe Search — Reflected XSS mitigated</title>
  <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
  <main class="container" style="grid-template-columns:1fr;max-width:700px;">
    <section class="card">
      <h2>Safe Reflected Search</h2>
      <form method="get" action="">
        <div class="form-row">
          <label>Search</label>
          <input type="text" name="q" value="<?php echo $escaped_q; ?>" placeholder="Try: <script>alert(1)</script>">
        </div>
        <button class="btn" type="submit">Search</button>
      </form>

      <hr>
      <h3>Results</h3>
      <p>
        Results for: <?php echo $escaped_q; ?>
      </p>
      <p class="small muted">Tip: htmlspecialchars escapes special chars so the browser displays the code instead of executing it.</p>
      <p><a href="../index.php">← Back</a></p>
    </section>
  </main>
</body>
</html>
