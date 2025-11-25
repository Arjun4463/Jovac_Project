<?php
// safe/guestbook.php - Stored XSS mitigated
require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = trim($_POST['author'] ?? 'Anonymous');
    $message = trim($_POST['message'] ?? '');

    // Basic input cleaning:
    // 1) limit length
    $author = substr($author, 0, 100);
    $message = substr($message, 0, 1000);

    // 2) Option A: strip all tags (safe)
    $clean_message = strip_tags($message);

    // 3) Option B: If you want limited allowed tags, use a whitelist instead.
    // $clean_message = strip_tags($message, '<b><i><u><em><strong>');

    // Store cleaned content
    if ($clean_message !== '') {
        $stmt = $pdo->prepare("INSERT INTO comments (author, message) VALUES (?, ?)");
        $stmt->execute([$author, $clean_message]);
    }

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

$comments = $pdo->query("SELECT * FROM comments ORDER BY id DESC LIMIT 50")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Safe Guestbook — Stored XSS mitigated</title>
  <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
  <main class="container" style="grid-template-columns:1fr;max-width:800px;">
    <section class="card">
      <h2>Safe Guestbook</h2>

      <form method="post">
        <div class="form-row">
          <label>Your name</label>
          <input name="author" maxlength="100" placeholder="Your name">
        </div>
        <div class="form-row">
          <label>Message</label>
          <textarea name="message" maxlength="1000" placeholder="Write something..."></textarea>
        </div>
        <button class="btn" type="submit">Post safely</button>
      </form>

      <hr>
      <h3>Messages</h3>
      <ul class="comments">
        <?php foreach ($comments as $c): ?>
          <li>
            <div><strong><?php echo htmlspecialchars($c['author'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></strong> <span class="small-muted"><?php echo $c['created_at']; ?></span></div>
            <div>
              <?php echo nl2br(htmlspecialchars($c['message'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')); ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="small muted">Tip: strip_tags on input and htmlspecialchars on output prevents stored XSS.</p>
      <p><a href="../index.php">← Back</a></p>
    </section>
  </main>
</body>
</html>
