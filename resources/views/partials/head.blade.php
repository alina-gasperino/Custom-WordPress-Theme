<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='@asset('images/favicon.png')' rel='apple-touch-icon' sizes='180x180'>
  <link href='@asset('images/favicon.png')' rel='icon' sizes='32x32' type='image/png'>
  <link href='@asset('images/favicon.png')' rel='icon' sizes='16x16' type='image/png'>
  <script>
    let ajax_url = "{{ admin_url( 'admin-ajax.php' ) }}"
  </script>
  @php wp_head() @endphp
</head>
