(function($) {
  // DocumentReady
  $(function() {
    // History API page variable

    let lastPage = document.URL;

    const $mainButton = $('#new-quote-button');

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
          // Post data from wp-json
          const post = data[0];
          ///$('entry-content)'.html(var.content.rendered)
          // author.html('-' + var.title.rendered)
          //if var._qod_quote_source && URL _qod_quote_source_url
          // Source dom.html
          <div> source url</div>;

          // History API get the url slug
          const slug = post.slug;
          console.log(slug);
          // Add URL with home_url and slug
          const url = qod_api.home_url + '/' + slug + '/';
          console.log(url);

          // Update the browser URL with history.pushState()
          history.pushState(null, null, url);
        })
        // If Unsuccessfull
        .fail(function(err) {
          console.log(err);
        });
    });

    //Add history API popstate for forward and back buttons in the browser
    $(window).on('popstate', function() {
      window.location.replace(lastPage);
    });
    // 2: Post Request for wp/v2/posts
  }); // END of DOCUMENT READY
})(jQuery); // The END
