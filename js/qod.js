(function($) {
  // DocumentReady
  $(function() {
    // Variables

    let lastPage = '';
    const $mainButton = $('#new-quote-button');

    //Add history API popstate for forward and back buttons in the browser
    $(window).on('popstate', function() {
      window.location.replace(lastPage);
    });

    // 1: Get Request for wp/v2/posts
    $mainButton.on('click', function(event) {
      event.preventDefault();
      // History API update page variable to be the current url before getting data from wp-json
      lastPage = document.URL;

      $.ajax({
        // Get Post
        method: 'get',
        url:
          qod_api.rest_url +
          'wp/v2/posts/?filter[orderby]=rand&filter[posts_per_page]=1'
      })

        // If Successfull
        .done(function(data) {
          // Variable: Post data from wp-json
          const post = data[0];
          console.log(post);

          const content = $('.entry-content');
          const contentRendered = post.content.rendered;

          const author = $('.entry-author');
          const authorRendered = post.title.rendered;

          const source = $('.source');
          const sourceRendered = post._qod_quote_source;

          // const sourceUrl = $('.source-url');
          const sourceUrlRendered = post._qod_quote_source_url;

          if (post._qod_quote_source && post._qod_quote_source_url) {
            content.html(contentRendered);
            author.html('&mdash; ' + authorRendered);
            source.html(
              '<span class= "source"> , ' +
                '<a href="' +
                sourceUrlRendered +
                '" >' +
                sourceRendered +
                '</a>' +
                '</span>'
            );
          } else if (post._qod_quote_source && !post._qod_quote_source_url) {
            source.html("<span class='source'>, " + sourceRendered + '</span>');
          } else {
            source.html('');
          }

          /* Update Browser History */

          // History API get the url slug
          const slug = post.slug;
          // Add URL with home_url and slug
          const url = qod_api.home_url + '/' + slug + '/';
          // Update the browser URL with history.pushState()
          history.pushState(null, null, url);
        })

        // If Unsuccessfull
        .fail(function(err) {
          console.log(err);
        });
    });

    // 2: Post Request for wp/v2/posts

    $('#quote-submission-form').on('submit', function(event) {
      event.preventDefault();

      const $data = {
        title:
          $('#quote-author')
            .val()
            .trim().length < 1
            ? null
            : $('#quote-author').val(),
        content:
          $('#quote-content')
            .val()
            .trim().length < 1
            ? null
            : $('#quote-content').val(),
        _qod_quote_source:
          $('#quote-source')
            .val()
            .trim().length < 1
            ? null
            : $('#quote-source').val(),
        _qod_quote_source_url:
          $('#quote-source-url')
            .val()
            .trim().length < 1
            ? null
            : $('#quote-source-url').val()
        // excerpt: {
        //   replace: '<p>' + $('#quote-content').val(),
        //   protected: false
        // }
      };

      $.ajax({
        type: 'post',
        url: qod_api.rest_url + 'wp/v2/posts/',
        data: $data,
        // success: function(response) {
        //   console.log(response);
        // },
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', qod_api.wpapi_nonce);
        }
      })
        .done(function() {
          $('#quote-submission-form').slideUp(600, function() {
            $('#quote-submission-form').html('Quote Added!');
          });
        })
        .fail(function() {
          alert('Error, Please try again!');
        });
    });
  }); // END of DOCUMENT READY
})(jQuery); // The END
