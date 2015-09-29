
  //  scrollspy fixed searchbar
    $(document).ready(function(){
        var nav = $('.header-top-bar');

        $(window).scroll(function () {
          if ($(this).scrollTop() > 60) {
              nav.addClass("sticky").fadeIn(2000);
              nav.removeClass("scroll-btn");
          } else {
              nav.removeClass("sticky");
              nav.addClass("scroll-btn");
          }

        });
    });


  // header login register scripts
  //-------------------------------------------
    $(document).ready(function($) {
      var $headerLoginRegister = $('#header .header-login, #header .header-register, .company-profile .social-link');

      $headerLoginRegister.each(function () {
        var $this = $(this);

        $this.children('a').on('click', function (event) {
          event.preventDefault();
          $this.toggleClass('active');
        });

        $this.on('clickoutside touchendoutside', function () {
          if ($this.hasClass('active')) { $this.removeClass('active'); }
        });
      });

      var $headerNavbar = $('#header .header-nav-bar .primary-nav > li');

      $headerNavbar.each(function () {
        var $this = $(this);

        $this.children('a').on('click', function (event) {
          $this.toggleClass('active');
        });

        $this.on('clickoutside touchendoutside', function () {
          if ($this.hasClass('active')) { $this.removeClass('active'); }
        });
      });
    });
    
  
  // our-partners slider customize
  //-----------------------------------------
    $(document).ready(function() {
      $("#partners-slider").owlCarousel({
        autoPlay: 3000,
        items : 6,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [600,2]
      });

      // featured businesses slider customize
      //-----------------------------------------
      $("#businesses-slider").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [600,2],
        paginationNumbers: true,
        paginationSpeed : 400
      });

      // featured businesses slider customize
      //-----------------------------------------
      $("#categories-slider").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3],
        itemsTablet: [600,2],
        paginationNumbers: true,
        paginationSpeed : 400
      });
    });

  // Accordion
  // ---------------------------------------------------------
    $('.accordion').each(function () {

      $(this).find('ul > li > a').on('click', function (event) {
        event.preventDefault();

        var $this = $(this),
          $li = $this.parent('li'),
          $div = $this.siblings('div'),
          $siblings = $li.siblings('li').children('div');

        if (!$li.hasClass('active')) {
          $siblings.slideUp(250, function () {
            $(this).parent('li').removeClass('active');
          });

          $div.slideDown(250, function () {
            $li.addClass('active');
          });
        } else {
          $div.slideUp(250, function () {
            $li.removeClass('active');
          });
        }
      });

    });

  // Category toggle
  //-------------------------------------------------

    $('.category-toggle button').on('click',function(){
      $('.category-toggle').toggleClass('active');
    });

    var $CategoryTtoggle = $('.category-toggle');

    $CategoryTtoggle.each(function () {
      var $this = $(this);

      $this.on('clickoutside touchendoutside', function () {
        if ($this.hasClass('active')) { $this.removeClass('active'); }
      });
    });

  // navbar toggle
  //------------------------------------------------
    $('.header-nav-bar button').on('click',function(){
      $('.header-nav-bar').toggleClass('active');
    });

    var $headerNavBar = $('#header .header-nav-bar, .header-nav-bar button');

    $headerNavBar.each(function () {
      var $this = $(this);

      $this.on('clickoutside touchendoutside', function () {
        if ($this.hasClass('active')) { $this.removeClass('active'); }
      });
    });

  
   
