<?php
// vuln/guestbook.php - Stored XSS (vulnerable)
require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = $_POST['author'] ?? 'Anonymous';
    $message = $_POST['message'] ?? '';
    // VULNERABLE: store raw input (no sanitization)
    $stmt = $pdo->prepare("INSERT INTO comments (author, message) VALUES (?, ?)");
    $stmt->execute([$author, $message]);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

$comments = $pdo->query("SELECT * FROM comments ORDER BY id DESC LIMIT 50")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vuln Guestbook — Stored XSS</title>
  <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
  <main class="container" style="grid-template-columns:1fr;max-width:800px;">
    <section class="card">
      <h2>Vulnerable Guestbook</h2>

      <form method="post">
        <div class="form-row">
          <label>Your name</label>
          <input name="author" placeholder="Your name">
        </div>
        <div class="form-row">
          <label>Message</label>
          <textarea name="message" placeholder="Write something..."></textarea>
        </div>
        <button class="btn" type="submit">Post</button>
      </form>

      <hr>
      <h3>Messages</h3>
      <ul class="comments">
        <?php foreach ($comments as $c): ?>
          <li>
            <div><strong><?php echo $c['author']; ?></strong> <span class="small-muted"><?php echo $c['created_at']; ?></span></div>
            <div>
              <!-- VULNERABLE: message printed raw — stored XSS executes here -->
              <?php echo $c['message']; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="small muted">Tip: Data is stored *as-is* in DB and re-rendered without escaping — so stored XSS executes for any visitor.</p>
      <p><a href="../index.php">← Back</a></p>
    </section>
  </main>
</body>
</html>
