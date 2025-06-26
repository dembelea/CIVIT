<?php

if (!function_exists('vite')) {

    function vite(string $entry): string
    {
        // Point vers public/build/manifest.json
        $manifestPath = FCPATH . 'build/manifest.json';

        if (!file_exists($manifestPath)) {
            return "<!-- vite manifest not found: $manifestPath -->";
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (!isset($manifest[$entry])) {
            return "<!-- vite entry '$entry' not found in manifest -->";
        }

        $file = $manifest[$entry]['file'] ?? null;

        if (!$file) {
            return "<!-- vite entry '$entry' has no 'file' key -->";
        }

        // Chemin vers le fichier compilé
        return '<script type="module" src="/build/' . $file . '"></script>';
    }
}
