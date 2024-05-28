<section class="is-dropdown category-menu bg-tan">
  <div class="cat-wrapper">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'items_wrap' => '%3$s', 'container' => 'div', 'menu_class' => 'nav', 'walker' => new Roots_Sub_Walker_Custom]) !!}
    @endif
  </div>

</section>
