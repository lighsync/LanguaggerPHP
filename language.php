<?php
class Language {
    private static $translations = [];
    private static $currentLanguage = 'ru_RU';

    public static function loadLanguage($preferred = null) {
        $locale = $preferred ?? self::detectLocale();
        self::$currentLanguage = $locale;
        $langPath = __DIR__ . "/locales/{$locale}.json";

        if (!file_exists($langPath)) {
            $langPath = __DIR__ . "/locales/en_US.json";
            self::$currentLanguage = 'en_US';
        }

        $json = file_get_contents($langPath);
        self::$translations = json_decode($json, true);
    }

    private static function detectLocale() {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            return $lang === 'ru' ? 'ru_RU' : 'en_US';
        }
        return 'en_US';
    }

    public static function getText($key) {
        return self::$translations[$key] ?? $key;
    }

    public static function getCurrentLanguage() {
        return self::$currentLanguage;
    }
}
?>
