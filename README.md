# АлкоНаркология - Медицинская клиника

![GitHub Pages](https://github.com/InnaGlebova/alko-narkologia/actions/workflows/deploy.yml/badge.svg)
![GitHub last commit](https://img.shields.io/github/last-commit/InnaGlebova/alko-narkologia)
![GitHub repo size](https://img.shields.io/github/repo-size/InnaGlebova/alko-narkologia)

Многостраничный адаптивный сайт медицинской клиники "АлкоНаркология", специализирующейся на лечении алкоголизма и наркомании в Москве.

## 🏥 О проекте

Профессиональный медицинский сайт с современным дизайном и интуитивной навигацией. Сайт предоставляет полную информацию о медицинских услугах, специалистах, ценах и методах лечения зависимостей.

## ⚡ Интерактивные функции

- 🎯 **Динамические попапы** с автоматическим заполнением заголовков из соответствующих блоков
- 📞 **Формы обратной связи** с валидацией и масками ввода телефонов
- 🎨 **Плавные анимации** появления элементов при скролле
- 🔄 **Слайдеры и галереи** с интуитивным управлением
- 📱 **Адаптивное меню** с плавными переходами
- ✨ **Hover эффекты** для всех интерактивных элементов
- 🖼️ **Lightbox галерея** для просмотра изображений
- 📋 **FAQ секция** с раскрывающимися ответами

## 🚀 Demo

Проект развернут на GitHub Pages: [Посмотреть сайт](https://innaglebova.github.io/alko-narkologia/)

## 📋 Структура сайта

- [Главная страница](https://innaglebova.github.io/alko-narkologia/index.html)
- [Услуги](https://innaglebova.github.io/alko-narkologia/service.html)
- [Услуги распределительная](https://innaglebova.github.io/alko-narkologia/services.html)
- [Статьи](https://innaglebova.github.io/alko-narkologia/articles.html)
- [Контакты](https://innaglebova.github.io/alko-narkologia/contacts.html)
- [Врач детальный](https://innaglebova.github.io/alko-narkologia/doctor.html)
- [Врачи](https://innaglebova.github.io/alko-narkologia/doctors.html)
- [FAQ](https://innaglebova.github.io/alko-narkologia/faq.html)
- [Галерея](https://innaglebova.github.io/alko-narkologia/gallery.html)
- [Карта сайта](https://innaglebova.github.io/alko-narkologia/karta-sayta.html)
- [Лицензии](https://innaglebova.github.io/alko-narkologia/licenses.html)
- [Ошибка 404](https://innaglebova.github.io/alko-narkologia/notfound.html)
- [Прайс](https://innaglebova.github.io/alko-narkologia/price.html)
- [Политика конфединциальности](https://innaglebova.github.io/alko-narkologia/policy.html)
- [Отзывы](https://innaglebova.github.io/alko-narkologia/reviews.html)

## 🛠 Технологии

- **HTML5** - семантическая разметка
- **SCSS** - препроцессор CSS с модульной архитектурой
- **JavaScript (ES6+)** - интерактивность и анимации
- **Gulp** - автоматизация сборки
- **Panini** - шаблонизатор HTML
- **Swiper.js** - современные слайдеры
- **Fancybox** - галерея изображений
- **PostCSS** - автопрефиксы и оптимизация CSS

## 📦 Установка и запуск

### Предварительные требования

- Node.js (версия 14 или выше)
- npm или yarn

### Установка зависимостей

```bash
npm install
```

### Команды для разработки

```bash
# Запуск сервера разработки с hot reload
npm run dev

# Сборка проекта для продакшена
npm run build

# Очистка папки dist
npm run clean

# Деплой на GitHub Pages
npm run deploy
```

### Структура проекта

```
├── src/                    # Исходные файлы
│   ├── assets/            # Ресурсы
│   │   ├── scss/         # SCSS стили
│   │   │   ├── vendor/   # Модули стилей по блокам
│   │   │   └── style.scss # Главный файл стилей
│   │   ├── js/           # JavaScript файлы
│   │   ├── img/          # Изображения
│   │   └── fonts/        # Шрифты Manrope
│   ├── tpl/              # Шаблоны
│   │   ├── layouts/      # Основные лейауты
│   │   └── partials/     # Части страниц (header, footer, popups)
│   └── *.html           # HTML страницы
├── dist/                 # Собранный проект
├── gulpfile.js          # Конфигурация Gulp
└── package.json         # Зависимости и скрипты
```

## 🎨 Особенности дизайна

### Адаптивность

- Минимальное разрешение: 320px
- Оптимизация для всех устройств

## 📱 Браузерная поддержка

- Chrome (последние 2 версии)
- Firefox (последние 2 версии)
- Safari (последние 2 версии)
- Edge Chromium (последние 2 версии)
- Мобильные браузеры iOS/Android

## 🔧 Оптимизация

- Минификация CSS/JS
- Оптимизация изображений (JPEG, PNG)
- Конвертация в WebP формат
- Автопрефиксы для CSS
- Lazy loading изображений
- Сжатие шрифтов (WOFF2, WOFF)

## 📊 Производительность

- Быстрая загрузка страниц
- Оптимизированные изображения
- Минимальный размер CSS/JS
- Кэширование ресурсов
- SEO-оптимизация

## 🚀 Деплой на GitHub Pages

### Автоматический деплой

1. Push код в репозиторий
2. GitHub Actions автоматически соберет проект
3. Результат развернется на GitHub Pages

### Ручной деплой

```bash
npm run deploy
```

## 👨‍💻 Автор

[telegram](https://t.me/innasaur)

Создано с использованием современных технологий frontend разработки для медицинской сферы.
