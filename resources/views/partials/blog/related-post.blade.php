

<section class="related-post-feature margin-top--40">
      <div class="bg-tan-light single-related">
        <?php $postID = get_sub_field('post')[0]; ?>
        <?php
        $image = get_field('featured_image', $postID);
        $sliderImg = get_acf_image_by_id($image, 'slider');
        ?>
        <a href="{{ get_the_permalink($postID) }}">
          <div class="related-title caps md-headline show-mobile align-center">
            Related Article:
          </div>
          <div class="row">
            <div class="d-flex align-items-center">
              <div class="img-related col-lg-5">
                <img src="{{ $sliderImg }}" alt="">
              </div>
              <div class="details col-lg-6 offset-lg-1 align-center">
                <div class="related-title caps md-headline hide-mobile">
                  Related Article:
                </div>
                @if(get_primary_category($postID))
                <div class="sm-headline caps">
                  {{ get_primary_category($postID) }}
                </div>
                @endif
                <h3 class="headline-3 margin-top--5">
                  @if(get_field('alternative_title', $postID))
                  {!! the_field('alternative_title', $postID, false, false) !!}
                  @else
                    {!! the_title($postID) !!}
                  @endif
                </h3>

                <div class="margin-top--30">
                  <div class="sm-headline caps">Read More</div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
</section>
