<section class="press-wrapper margin-top--100 pad-btm--50">
  <div class="container-lrg">
    <?php
    $args = [
      'post_type' => 'press_article',
      'posts_per_page' => -1
    ];

    $press = new WP_Query($args);
    ?>
    <div class="d-lg-flex row-30 flex-wrap">
    @while($press->have_posts()) @php($press->the_post())
      <article class="col-lg-3 gap-30 blog-list-item">
        <?php
        $image = get_field('image');
        $image = get_acf_image_by_id($image, 'slider');
        ?>
        <a href="{{ get_field('press_link') }}" target="_blank">
          <div class="">
            <img src="{{ $image }}" alt="{!! get_the_title() !!}" class="w-100" />
          </div>
          <div class="align-center pad-top--20 title-header-sm">
            <div class="sm-headline">
              {{ get_primary_category(get_the_ID()) }}
            </div>
            <h2 class="headline-3 font-cadiz-light margin-top--10">{!! get_the_title() !!}</h2>
          </div>
        </a>
      </article>
    @endwhile
    @php(wp_reset_query())
    </div>
  </div>
</section>
