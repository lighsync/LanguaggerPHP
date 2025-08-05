# LanguaggerPHP

LanguaggerPHP — это простой PHP-класс для локализации и мультиязычной поддержки ваших проектов.

## Структура проекта

```
language.php
locales/
    en_US.json
    ru_RU.json
```

- `language.php` — основной класс для работы с языками.
- `locales/` — папка с языковыми файлами в формате JSON.

## Быстрый старт

1. **Добавьте языковые файлы**  
   В папке `locales` создайте файлы вида `xx_XX.json` (например, `en_US.json`, `ru_RU.json`).  
   Пример содержимого:
   ```json
   {
       "test": "Your translation here"
   }
   ```

2. **Подключите класс в вашем проекте**
   ```php
   require_once 'language.php';
   ```

3. **Загрузите нужный язык**
   ```php
   Language::loadLanguage('ru_RU'); // или 'en_US', либо null для автоопределения
   ```

4. **Получайте переводы**
   ```php
   echo Language::getText('test');
   ```

## Автоматическое определение языка

Если не передавать параметр в `loadLanguage()`, язык будет определён автоматически по заголовку `HTTP_ACCEPT_LANGUAGE` пользователя.  
Если язык не найден — будет использован английский (`en_US`).

## API

- `Language::loadLanguage($preferred = null)`  
  Загружает переводы для выбранного языка. Если язык не найден — используется английский.

- `Language::getText($key)`  
  Возвращает перевод по ключу. Если ключ не найден — возвращает сам ключ.

- `Language::getCurrentLanguage()`  
  Возвращает текущий язык (`ru_RU`, `en_US` и т.д.).

## Пример

```php
require_once 'language.php';

Language::loadLanguage(); // автоопределение

echo Language::getText('test'); // Выведет перевод из текущего языкового файла
```

## Лицензия

Проект распространяется под лицензией Apache 2.0. Подробнее см. [LICENSE](LICENSE)