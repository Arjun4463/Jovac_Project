<?php
// index.php - homepage
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>XSS Demo (PHP + MySQL)</title>
<link rel="stylesheet" href="public/styles.css" />
</head>
<body>
  <header class="site-header">
    <h1>XSS Demo <span class="muted"> (PHP + MySQL)</span></h1>
  </header>

  <main class="container">
    <section class="card">
      <h2>Quick links</h2>
      <div class="links">
        <a class="btn" href="vuln/search.php">Vuln Search</a>
        <a class="btn" href="vuln/guestbook.php">Vuln Guestbook</a>
        <a class="btn outline" href="safe/search.php">Safe Search</a>
        <a class="btn outline" href="safe/guestbook.php">Safe Guestbook</a>
      </div>
      <p class="note">Compare vulnerable vs safe versions of reflected and stored XSS.</p>
    </section>

    <aside class="card tips">
      <h3>Tips for demo</h3>
      <ol>
        <li>Show <strong>Vuln Search</strong>: paste <code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code> into the box. You should see an alert popup.</li>
        <li>Then show <strong>Safe Search</strong> with the same input — it should display as text, not run.</li>
        <li>For Stored XSS (Guestbook): post a message containing <code>&lt;img src=x onerror=alert('Stored')&gt;</code> on the vulnerable guestbook, reload and the alert will show.</li>
        <li>Show the safe guestbook to demonstrate mitigation (input is sanitized/encoded).</li>
      </ol>
      <p class="small muted">Do not upload these pages to public servers. Use locally for learning only.</p>
    </aside>
  </main>

  <footer class="site-footer">
    <p>Prepared for demo • XSS learning platform</p>
  </footer>
</body>
</html>
