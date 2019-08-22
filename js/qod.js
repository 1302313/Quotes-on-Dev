(function($) {
  // DocumentReady
  $(function() {
    const $mainButton = $('#new-quote-button');

    // 1: Get Request for wp/v2/posts
    $mainButton.on('click', function(event) {
      event.preventDefault();
      $.ajax({
        // Get Post
        method: 'get',
        url:
          qod_api.rest_url +
          'wp/v2/posts/?filter[orderby]=rand&filter[posts_per_page]=1',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', qod - api.wpapi_nonce);
        }
      })

        // If Successfull
        .done(function(data) {})

        .fail(function(err) {});
    });

    // 2: Post Request for wp/v2/posts
  });
})(jQuery);
