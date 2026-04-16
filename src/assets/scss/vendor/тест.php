<?php
/*
Template name: Страница Отзывы
Template post type: page
*/
get_header();
?>

<section class="reviews-page section-offset-bottom tabs-container">
    <div class="container">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><a href="/about/">О клинике</a></li>
                <li>Отзывы</li>
            </ul>
            <h1 class="reviews-page__title page-title">Отзывы наших <span>пациентов</span></h1>
        </div>

        <?php
        $services = get_posts([
            'post_type'      => 'services',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ]);

        $all_reviews = [];
        $categories = [];

        foreach ($services as $service) {
            $cat_terms = get_field('cat_usl', $service->ID);
            $reviews_raw = get_field('reviews', $service->ID);

            if (!$reviews_raw || empty($cat_terms)) continue;
            $terms = get_terms([
                'taxonomy' => 'category',
                'include'  => $cat_terms,
                'hide_empty' => false,
            ]);

            $reviews = explodeField($reviews_raw, ['name', 'date', 'text', 'usl']);

            foreach ($reviews as $r) {
                $cat_name = trim(mb_strtolower($r['usl']));
                if (!isset($all_reviews[$cat_name])) {
                    $all_reviews[$cat_name] = [];
                }
                $all_reviews[$cat_name][] = $r;
            }

            foreach ($terms as $term) {
                $categories[$term->term_id] = $term;
            }
        }

        if (empty($categories)) {
            echo '<p>Ошибка подтяжки отзывов</p>';
        } else {
            usort($categories, function ($a, $b) {
                return strcmp($a->name, $b->name);
            });
        }
        ?>

        <?php if (!empty($categories)): ?>
            <div class="reviews-page__main-inner">
                <div class="reviews-page_tabs tabs tabs-mobile one-line-tabs">
                    <button class="tabs__active reviews-page_tabs__active standart-btn">
                        <p class="tabs__active-text"><?= esc_html($categories[0]->name); ?></p>
                    </button>
                    <div class="reviews-page_tabs__container tabs__container">
                        <div class="reviews-page_tabs__content tabs__content">
                            <div class="tabs__wrapper reviews-page__tabs__wrapper">
                                <button class="tabs__close">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="#B0BBCE" stroke-width="1.5"></path>
                                        <path d="M17 17L1 1" stroke="#B0BBCE" stroke-width="1.5"></path>
                                    </svg>
                                </button>
                                <?php foreach ($categories as $i => $cat): ?>
                                    <button class="reviews-page__tab tab <?= $i == 0 ? 'active' : '' ?>">
                                        <?= esc_html($cat->name); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reviews-page__wrapper">
                    <?php foreach ($categories as $i => $cat):
                        $cat_key = trim(mb_strtolower($cat->name)); ?>
                        <div class="tab-content reviews-page__content show-more-inner <?= $i == 0 ? 'active' : '' ?>">
                            <div class="reviews-page__inner">
                                <?php if (!empty($all_reviews[$cat_key])): ?>
                                    <?php foreach ($all_reviews[$cat_key] as $item): ?>
                                        <?php
                                            $rating = random_int(4, 5);
                                            $star_active = get_stylesheet_directory_uri() . '/assets/img/icons/star-active.svg';
                                            $star_unactive = get_stylesheet_directory_uri() . '/assets/img/icons/star-unactive.svg';
                                        ?>
                                        <div class="reviews-page__item reviews__item show-more-item">
                                            <div class="reviews__header">
                                                <div class="reviews__header-wrapper">
                                                    <div class="reviews__header-top">
                                                        <p><?= esc_html($item['name']); ?></p>
                                                        <div class="reviews__rating" aria-label="<?= esc_attr($rating); ?> из 5">
                                                            <span class="reviews__rating-icons" aria-hidden="true">
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <img
                                                                        src="<?= esc_url($i <= $rating ? $star_active : $star_unactive); ?>"
                                                                        width="16"
                                                                        height="16"
                                                                        alt=""
                                                                        loading="lazy"
                                                                    >
                                                                <?php endfor; ?>
                                                            </span>
                                                        </div>
                                                        <?/*<span>г. <?= get_bloginfo('name'); ?></span>*/ ?>
                                                    </div>
                                                    <div class="reviews__header-bottom">
                                                        <span>Дата отзыва: <?= esc_html($item['date']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reviews__text reviews-page__text">
                                                <?= wp_kses_post($item['text']); ?>
                                            </div>
                                            <?/*<p class="review-category"><strong>Вид услуги:</strong> <?= esc_html($cat->name); ?></p>*/ ?>
                                            <button class="reviews__btn popup-btn" data-path="popup-review">Читать далее</button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <button class="show-more-btn reviews-page__btn standart-btn primary-btn">Смотреть еще</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include_once(TEMPLATEPATH . '/inc/contact.php'); ?>
<?php get_footer(); ?>