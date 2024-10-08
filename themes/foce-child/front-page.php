<?php

get_header();
?>

<main id="primary" class="site-main">
    <section class="banner">
        <video class="banner__video" src="<?php echo get_stylesheet_directory_uri() . '/assets/videos/banner.mp4'; ?>"
            autoplay loop muted></video>
        <img class="banner__logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>"
            alt="logo Fleurs d'oranger & chats errants">
    </section>
    <section id="#story" class="story">
        <h2>
            <span class="sectionTitle">L'histoire</span>
        </h2>
        <article id="" class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>
        <?php get_template_part('parts/characters'); ?>
        <article id="place">
            <div id="placeBigCloud"></div>
            <div id="placeLittleCloud"></div>
            <div>
                <h3>Le Lieu</h3>
                <p><?php echo get_theme_mod('place'); ?></p>
            </div>

        </article>
    </section>


    <section id="studio">
        <h2>
            <span class="sectionTitle">Studio Koukaki</span>
        </h2>
        <div>
            <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue
                des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections
                en activité : le long métrage et le court métrage. Nous développons des films fantastiques,
                principalement autour de la culture de notre pays natal, le Japon.</p>
            <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et
                commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable
                dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise
                sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats
                errants”.</p>
        </div>
    </section>

    <?php get_template_part('parts/oscar'); ?>
</main><!-- #main -->

<script>
    scrollyt = new Scrollyt()
    scrollyt.scrollAnimate('sectionTitle', 'bottom', -100)
    bigCloudAnimation = scrollyt.defineAnimation('placeBigCloud', 'translate3d', '0px,0,0', '-300px,0,0')
    littleCloudAnimation = scrollyt.defineAnimation('placeLittleCloud', 'translate3d', '0px,0,0', '-300px,0,0')
    scrollyt.twoPointsTransform(bigCloudAnimation, 'place', 'top-bottom--100', 'top-top-100')
    scrollyt.twoPointsTransform(littleCloudAnimation, 'place', 'top-bottom--283', 'top-top-80')
    document.addEventListener('scroll', () => {
        const scroll = window.scrollY
        const banner = document.getElementsByClassName('banner')[0]
        const logo = document.getElementsByClassName('banner__logo')[0]

        const bannerHeight = banner.offsetHeight
        const logoHeight = logo.offsetHeight

        if (scroll <= ((bannerHeight - logoHeight) / 2) + (bannerHeight / 10)) logo.style.top = `${scroll}px`
    })
</script>

<?php
get_footer();
