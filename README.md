# Civit —  CodeIgniter 4  + Vue 3 + Inertia + Tailwind  (Starter)

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
│   └── Views/app.php                # Vue HTML de base avec data-page
├── src/
│   ├── main.js                      # Entrée Vue 3 + Inertia
│   └── Pages/Home.vue               # Unique page Vue avec props dynamiques
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

# Modifications CI4

1 - App/Config
	
	App {
		- ajout de la fonction set_base_url
		- definition {
			$baseURL = ''
			$indexPage = ''
			$defaultLocale = 'fr'
			$supportedLocales = [];
			$csrf_protection = true;
		}
	} 

2 - Filters

	$aliases {
		ajouter{
			'auth'     => \App\Filters\AuthFilter::class,
        	'role'     => \App\Filters\RoleFilter::class,
		}
	}
	$globals 'after' {
		activer 'secureheaders', // chercher à savoir pourquoi
	}
3 - Logger 
 	
 	$threshold = (ENVIRONMENT === 'production') ? 0 : 9;

4 - Security

	$tokenName = 'nglpcr_csrf_token';
	$cookieName = 'nglpcr_csrf_cookie';
	$regenerate = false;


5 - Session
	
	$driver = 'CodeIgniter\Session\Handlers\DatabaseHandler';
	$savePath = 'ci_sessions';

---

# Licence

MIT © [@dembelea](https://github.com/dembelea)

---

# Besoin d’aide ?

Ouvre une issue sur GitHub ou contacte [@dembelea](https://github.com/dembelea).
