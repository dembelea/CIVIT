<?php

// if (!function_exists('vite')) {
//     function vite(string $entry): string
//     {
//         $manifestPath = FCPATH . 'build/manifest.json';

//         if (!file_exists($manifestPath)) {
//             return "<!-- vite manifest not found: $manifestPath -->";
//         }

//         $manifest = json_decode(file_get_contents($manifestPath), true);

//         if (!isset($manifest[$entry])) {
//             return "<!-- vite entry '$entry' not found in manifest -->";
//         }

//         $tags = '';

//         // Fichiers CSS
//         if (!empty($manifest[$entry]['css'])) {
//             foreach ($manifest[$entry]['css'] as $cssFile) {
//                 $tags .= '<link rel="stylesheet" href="/build/' . $cssFile . '">' . PHP_EOL;
//             }
//         }

//         // Fichiers JS dynamiques (imports)
//         if (!empty($manifest[$entry]['imports'])) {
//             foreach ($manifest[$entry]['imports'] as $import) {
//                 if (!empty($manifest[$import]['file'])) {
//                     $tags .= '<script type="module" src="/build/' . $manifest[$import]['file'] . '"></script>' . PHP_EOL;
//                 }
//             }
//         }

//         // JS principal
//         $jsFile = $manifest[$entry]['file'] ?? null;

//         if ($jsFile) {
//             $tags .= '<script type="module" src="/build/' . $jsFile . '"></script>' . PHP_EOL;
//         }

//         return $tags;
//     }
// }

if (!function_exists('vite')) {
    function vite(string $entry): string
    {
        // $manifestPath = FCPATH . 'build/manifest.json';
        $manifestPath = FCPATH . 'build/.vite/manifest.json';

        if (!file_exists($manifestPath)) {
            return "<!-- vite manifest not found: $manifestPath -->";
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Recherche exacte
        if (isset($manifest[$entry])) {
            $entryKey = $entry;
        } else {
            // Recherche avec src/ préfixé
            $srcEntry = 'src/' . ltrim($entry, '/');
            if (isset($manifest[$srcEntry])) {
                $entryKey = $srcEntry;
            } else {
                return "<!-- vite entry '$entry' not found in manifest -->";
            }
        }

        $tags = [];

        // CSS inclus ?
        if (!empty($manifest[$entryKey]['css'])) {
            foreach ($manifest[$entryKey]['css'] as $css) {
                $tags[] = '<link rel="stylesheet" href="/build/' . $css . '">';
            }
        }

        // JS principal
        $file = $manifest[$entryKey]['file'] ?? null;
        if ($file) {
            $tags[] = '<script type="module" src="/build/' . $file . '"></script>';
        }

        return implode("\n", $tags);
    }

}
