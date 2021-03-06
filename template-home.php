<?php
/*
Template Name: Home Template
*/
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php
      $args=array(
        'post_type' => 'baners',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'caller_get_posts'=> 1
      );
      $my_query = null;
      $my_query = new WP_Query($args);
      if( $my_query->have_posts() ) {
        $it = 0;
        while ($my_query->have_posts()) : $my_query->the_post(); ?>    
          <div class="item <?php if($it == 0){ echo "active"; } ?>">
            <?php the_content(); ?>
            <div class="carousel-caption"></div>
          </div>    
          <?php
          $it++;
        endwhile;
      }
      wp_reset_query();  
    ?>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Poprzedni</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Następny</span>
  </a>
</div>

<div class="container t-wrapper" id="produkty">
  <h2>Produkty</h2>
  <ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
  <li data-option-value="*" class="active"><a href="#">Wszystkie</a></li>  
  <li data-option-value=".poczatkujacy"><a href="#">Dla początkujących</a></li>
  <li data-option-value=".srednio"><a href="#">Dla średnio zaawansowanych</a></li>
  <li data-option-value=".zaawansowany"><a href="#">Dla zaawansowanych</a></li>
  <li data-option-value=".drytooling"><a href="#">Drytooling</a></li>
  </ul>
  <hr>
    <div class="row">
    <ul class="portfolio-list sort-destination isotope" data-sort-id="portfolio" style="position: relative; overflow: hidden; height: 1185px;">
      <?php
        $args=array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'caller_get_posts'=> 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
          $it = 0;
          while ($my_query->have_posts()) : $my_query->the_post(); ?>  
            <?php 
              $typ_array = get_post_meta(get_the_ID(), 'typ', true); 
              $typ_a = [];                           
              for ($i=0; $i < count($typ_array); $i++) { 
                $v = split(":", $typ_array[$i]);
                array_push($typ_a, $v[0]);
              }
              // echo implode(" ", $typ_a);
              // echo $typ_string;
            ?>  
           <li class="col-md-4 isotope-item <?php echo implode(" ", $typ_a); ?>" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
              <div class="portfolio-item img-thumbnail">
                <a href="<?php echo get_permalink( ); ?>" class="thumb-info">                  
                  <?php 
                    $default_attr = array(                      
                      'class' => "img-responsive"
                    );
                    echo wp_get_attachment_image( get_post_meta(get_the_ID(), 'miniatura', true), array(285,262), 0, $default_attr );
                  ?>
                  <span class="thumb-info-title">
                    <span class="thumb-info-inner"><?php the_title(); ?></span>
                  </span>
                </a>
              </div>
            </li> 
            <?php
            $it++;
          endwhile;
        }
        wp_reset_query();  
      ?>      
    </ul>
  </div>
</div>

<div class="about" id="onas">
  <div class="container">
    <div class="heading2" style="text-align:left">
      <h2 class="title">O Nas</h2>
    </div>
  </div>
  <div class="">
    <?php
        $args=array(
          'post_type' => 'about',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'caller_get_posts'=> 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
          $it = 0;
          while ($my_query->have_posts()) : $my_query->the_post(); ?>            
              <div class="column-sm-4">
                <?php 
                    $default_attr = array(                      
                      'class' => "img-responsive"
                    );
                    echo wp_get_attachment_image( get_post_meta(get_the_ID(), 'foto', true), array(640,427), 0, $default_attr );
                  ?>
                <div class="res">
                  <h3><?php the_title(); ?></h3>
                  <?php the_content(); ?>
                  <a href="<?php echo get_post_meta(get_the_ID(), 'link', true) ?>">więcej ...</a>
                </div>
              </div>
            <?php
            $it++;
          endwhile;
        }
        wp_reset_query();  
      ?>     
  </div>
   <div class="container" id="team">
    <div class="heading2" style="text-align:left">
      <h2 class="title">Team</h2>
    </div>
    <div id="carousel-team" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
     <ol class="carousel-indicators">
      <?php
        $args=array(
          'post_type' => 'teams',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'caller_get_posts'=> 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
          $it = 0;
          while ($my_query->have_posts()) : $my_query->the_post(); ?>                
              <li data-target="#carousel-team" data-slide-to="<?php echo $it; ?>" class="<?php if($it == 0){ echo 'active'; }?>"><?php the_title(); ?></li>
            <?php
            $it++;
          endwhile;
        }
        wp_reset_query();  
      ?>  
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php
        $args=array(
          'post_type' => 'teams',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'caller_get_posts'=> 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
          $it = 0;
          while ($my_query->have_posts()) : $my_query->the_post(); ?> 
              <div class="item <?php if($it == 0){ echo 'active'; }?>" id="<?php echo $it; ?>">  
                <div class="foto">
                  <?php 
                    $default_attr = array(                      
                      'class' => ""
                    );
                    echo wp_get_attachment_image( get_post_meta(get_the_ID(), 'foto', true), array(447,447), 0, $default_attr );
                  ?>
                </div>
                <div class="person-info">
                  <h4 class="member-title">O <?php echo get_post_meta(get_the_ID(), 'name', true); ?></h4>
                  <div class="member-content">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            <?php
            $it++;
          endwhile;
        }
        wp_reset_query();  
      ?> 
      </div>
    </div>
</div>
</div>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>