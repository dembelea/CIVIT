# Civit —  CodeIgniter 4  + Vue 3 + Inertia + Tailwind  (Stater)

> Starter web avec une seule page Vue 3 complète via Inertia.js (Home.vue) intégrée à CodeIgniter 4 + Tailwind CSS + Vite.

Ce projet sert de base pour construire une application légère ou un module unique en utilisant Vue 3 (Composition API), Inertia.js, et CodeIgniter 4. Idéal pour un site web, un tableau de bord ou une interface d’administration simple.

---

# Stack technique

- **Backend** : CodeIgniter 4 (PHP 8+)
- **Frontend** : Vue 3 (Composition API)
- **Pont SPA** : Inertia.js (client & server)
- **Builder / Dev Server** : Vite
- **CSS** : Tailwind CSS

---

# Fonctionnalités

- Page `Home.vue` stylisée avec Tailwind
- Données dynamiques injectées depuis le backend
- Mode développement (auto-reload) via Vite
- Prêt pour la mise en production (`vite build`)
- Code clair, composants Vue séparés

---
# Voir Demo

https://dembelea.github.io/CIVIT/

# Installation

1. Cloner le projet

```bash
git clone https://github.com/dembelea/Civit.git
cd Civit
```

2. Installer les dépendances PHP

```bash
composer install
cp env .env
php spark key:generate
```

3. Installer les dépendances frontend

```bash
npm install
```

---

# Lancer en développement

Dans un terminal :

```bash
php spark serve
```

Dans un autre terminal :

```bash
npm run dev
```

Puis accédez à :  http://localhost:8080/

---

# Structure du projet (mono-page)

```
Civit/
├── app/
│   ├── Controllers/Home.php         # Renvoie la page Inertia "Dashboard"
│   ├── Libraries/Inertia.php        # Render Inertia côté serveur
│   └── Views/index.php              # Vue HTML de base avec data-page
├── src/
│   ├── main.js                      # Entrée Vue 3 + Inertia
│   └── Pages/Dashboard.vue         # Unique page Vue avec props dynamiques
├── public/
│   └── build/                       # Fichiers générés par Vite (prod)
├── vite.config.js                   # Configuration Vite + alias + CORS
└── package.json                     # Scripts npm + dépendances
```

---

# Déploiement

En production, lance :

```bash
npm run build
```

Cela génère les fichiers dans `public/build`, et ils seront automatiquement chargés grâce au helper `vite('main.js')`.

---

# Licence

MIT © [@dembelea](https://github.com/dembelea)

---

# Besoin d’aide ?

Ouvre une issue sur GitHub ou contacte [@dembelea](https://github.com/dembelea).
