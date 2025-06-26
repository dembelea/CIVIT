<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>CI4 + Inertia</title>

  <?php if (ENVIRONMENT === 'development'): ?>
    <!-- Appel au script Vite dev -->
    <script type="module" src="http://localhost:5173/src/main.js"></script>
  <?php else: ?>
    <?= vite('main.js') ?>
  <?php endif; ?>
</head>
<body>
  <div id="app" data-page='<?= json_encode($page ?? []) ?>'></div>
</body>
</html>
