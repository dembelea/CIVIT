<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>RHA0 Job Center</title>

  <?php if (ENVIRONMENT === 'development'): ?>
    <!-- Appel au script Vite dev -->
    <script type="module" src="http://localhost:5173/src/main.js"></script>
  <?php else: ?>
    <?= vite('src/main.js') ?>
  <?php endif; ?>
</head>
<body>
  <div id="app" data-page='<?= $page; ?>'></div>
</body>
</html>
