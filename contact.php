<?php
session_start();

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<?php include 'header.php'; ?>
<div class="container contact-page">
  <h1>Contact Us</h1>

  <?php if (!empty($_SESSION['form_success'])): ?>
    <div class="alert success">✅ Thank you! We’ll get back to you soon.</div>
    <?php unset($_SESSION['form_success']); ?>
  <?php endif; ?>

  <?php if (!empty($_SESSION['form_error'])): ?>
    <div class="alert error">❌ <?= htmlspecialchars($_SESSION['form_error']); ?></div>
    <?php unset($_SESSION['form_error']); ?>
  <?php endif; ?>

  <form action="process_contact.php" method="post" id="contactForm" class="contact-form" novalidate>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" required minlength="2">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="message">Message:</label>
      <textarea name="message" id="message" class="form-control" required minlength="10"></textarea>
    </div>

    <button type="submit" class="btn-primary">Send</button>
  </form>
</div>
<?php include 'footer.php'; ?>
