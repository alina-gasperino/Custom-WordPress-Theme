<?php $featuredCats = get_field('featured_cat_posts'); ?>
<!-- Display first 4 articles -->
<section class="sec-padding">
    <div class="container-lrg">
        <div class="all-posts d-md-flex flex-wrap row justify-content-lg-between">
            @php
                $args = [
                    'meta_key' => 'layouts',
                    'meta_value' => 'product', // Search ACF for products that were manually entered
                    'meta_compare' => 'LIKE',
                    'posts_per_page' => 4,
                ];
                $allPosts = new wp_query($args);
            @endphp

            @while ($allPosts->have_posts())
                @php($allPosts->the_post())
                @include('partials.content')
            @endwhile
            @php(wp_reset_query())
        </div>
    </div>

    <!-- Newsletter Opt-in -->
    @include('partials.home.newsletter')

    <!-- Show next two articles -->
    <div class="container-lrg pad-top--64">
        <div class="all-posts d-md-flex flex-wrap row justify-content-between">
            <?php
            $args = [
                'meta_key' => 'layouts',
                'meta_value' => 'product',
                'meta_compare' => 'LIKE',
                'posts_per_page' => 2,
                'offset' => 4,
            ];
            $allPosts = new wp_query($args);
            ?>

            @while ($allPosts->have_posts())
                @php($allPosts->the_post())
                @include('partials.content')
            @endwhile
            @php(wp_reset_query())
        </div>
    </div>

    <!-- Featured Collection -->
    @include('partials.home.featured-collection-shopify2')

    <!-- Advertise Banner -->
    @include('partials.home.advertise2')

    <!-- Display next two articles -->
    <?php
    $args = [
        'meta_key' => 'layouts',
        'meta_value' => 'product',
        'meta_compare' => 'LIKE',
        'posts_per_page' => 2,
        'offset' => 6,
    ];
    $allPosts = new wp_query($args);
    ?>
    @if ($allPosts->have_posts())
        <div class="container-lrg pad-top--64">
            <div class="all-posts d-md-flex flex-wrap row justify-content-between">

                @while ($allPosts->have_posts())
                    @php($allPosts->the_post())
                    @include('partials.content')
                @endwhile
                @php(wp_reset_query())
            </div>
        </div>

    @endif
    <!-- Instagram Feed -->
    @include('partials.social')

    <!-- Display next two articles -->
    <?php
    $args = [
        'meta_key' => 'layouts',
        'meta_value' => 'product',
        'meta_compare' => 'LIKE',
        'posts_per_page' => 2,
        'offset' => 8,
    ];
    $allPosts = new wp_query($args);
    ?>
    @if ($allPosts->have_posts())
        <div class="container-lrg pad-top--64">
            <div class="all-posts d-md-flex flex-wrap row justify-content-between">

                @while ($allPosts->have_posts())
                    @php($allPosts->the_post())
                    @include('partials.content')
                @endwhile
                @php(wp_reset_query())
            </div>
        </div>
    @endif
    <!-- Advertise Banner -->
    @include('partials.home.advertise3')
    <!-- Shop Featured Collection -->
    @include('partials.home.featured-collection-shopify3')
    <!-- Display next two articles -->
    <?php
    $args = [
        'meta_key' => 'layouts',
        'meta_value' => 'product',
        'meta_compare' => 'LIKE',
        'posts_per_page' => 2,
        'offset' => 10,
    ];
    $allPosts = new wp_query($args);
    ?>
    @if ($allPosts->have_posts())
        <div class="container-lrg pad-top--64">
            <div class="all-posts d-md-flex flex-wrap row justify-content-between">

                @while ($allPosts->have_posts())
                    @php($allPosts->the_post())
                    @include('partials.content')
                @endwhile
                @php(wp_reset_query())
            </div>
        </div>

        <div class="col-6 all-posts--right">
            <!-- populated with jquery -->
        </div>

    @endif

    <!-- Shop Now -->
    @include('partials.home.shop-now-alt')

    <!-- Display next two articles -->
    <?php
    $args = [
        'meta_key' => 'layouts',
        'meta_value' => 'product',
        'meta_compare' => 'LIKE',
        'posts_per_page' => 2,
        'offset' => 12,
    ];
    $allPosts = new wp_query($args);
    ?>
    @if ($allPosts->have_posts())
        <div class="container-lrg pad-top--64">
            <div class="all-posts d-md-flex flex-wrap row justify-content-between">

                @while ($allPosts->have_posts())
                    @php($allPosts->the_post())
                    @include('partials.content')
                @endwhile
                @php(wp_reset_query())
            </div>
        </div>

        <div class="col-6 all-posts--right">
            <!-- populated with jquery -->
        </div>

    @endif
    <!-- Trio -->
    @include('partials.home.shop-best-sellers-trio')

</section>
