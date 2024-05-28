@php
$title = get_the_title();
@endphp

<a href="{{ get_image_size_src('featured_image') }}" data-image="{{ get_image_size_src('featured_image') }}" data-desc="{{ get_field('excerpt') }}" class="linkPinIt" target="_blank">
  <img src="@asset('images/icons/pinterest.svg')" alt="pinterest" class="social--img">
</a>
<a href="//www.facebook.com/share.php?u=<?php echo get_permalink() ?>&picture=<?php echo get_image_size_src('featured_image') ?>&t=<?php echo $title; ?>" onclick="event.preventDefault(); window.open('http://www.facebook.com/share.php?u=<?php echo get_permalink() ?>&t=<?php echo $title; ?>&picture=<?php echo get_image_size_src('featured_image') ?>', 'popupwindow', 'scrollbars=no,width=640,height=320'); return true" target="_blank">
  <img src="@asset('images/icons/facebook.svg')" alt="facebook" class="social--img">
</a>
<a href="//twitter.com/intent/tweet?original_referer=<?php echo get_permalink() ?>&source=tweetbutton&text=<?php echo $title; ?>&url=<?php echo get_permalink() ?>&via=kourtneykardash" onclick="event.preventDefault(); window.open('https://twitter.com/intent/tweet?original_referer=<?php echo get_permalink() ?>&source=tweetbutton&text=<?php echo $title; ?>&url=<?php echo get_permalink() ?>&via=', 'popupwindow', 'scrollbars=no,width=575,height=258'); return true">
  <img src="@asset('images/icons/twitter.svg')" alt="twitter" class="social--img">
</a>
<a href="mailto:?subject=<?php echo $title; ?>&amp;body=<?php echo get_permalink() ?>">
  <img src="@asset('images/icons/email.svg')" alt="email" class="social--img">
</a>
