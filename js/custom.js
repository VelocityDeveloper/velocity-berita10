jQuery(function($) {
    $('.velocity-post-carousel').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 580,
          settings: {
            slidesToShow: 1
          }
        }
        ]
    });
    });