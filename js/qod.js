(function($) {
  $(function() {
    $body = $('body');

    $body.append('test');

    //your ajax and other JS code

    $('#close-comments').on('click', function(event) {
      event.preventDefault();
      $.ajax({
        // Post
        method: 'post',
        url: qod_api.rest_url + 'wp/v2/posts/' + qod_api.post_id,
        data: {
          comment_status: 'closed'
        },

        // Security Nonce
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', qod_api.wpapi_nonce);
        }

        // If Successfull
      }).done(function(response) {
        alert('Success! Comments are closed for this post.');
      });
    });

    // 1: Get Request for wp/v2/posts

    // 2: Post Request for wp/v2/posts
  });
})(jQuery);
