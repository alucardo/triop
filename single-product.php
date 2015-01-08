<div class="product-header">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</div>
<div class="container single-product">
  <div class="col-sm-8">
    <?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
  </div>
  <div class="col-sm-4 sidebar">
    <h2 class="entry-title">Szczegóły produktu:</h2>

    <p><?php echo  get_post_meta(get_the_ID(), 'podszewka', true); ?></p>
    <p class="product-label">podszewka</p>

    <p><?php echo  get_post_meta(get_the_ID(), 'podszewka_wewnetrzna', true); ?></p>
    <p class="product-label">podszewka wewnętrzna</p>

    <p><?php echo  get_post_meta(get_the_ID(), 'podeszwa', true); ?></p>
    <p class="product-label">Podeszwa</p>

    <p><?php echo  get_post_meta(get_the_ID(), 'waga', true); ?></p>
    <p class="product-label">Waga</p>

  <br>
  <br>

    <a href="<?php echo  get_post_meta(get_the_ID(), 'link', true); ?>" class="link">Sprawdź w sklepie</a>
  </div>
</div>