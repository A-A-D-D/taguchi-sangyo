( function() {

  var app = {
    initAnchorScroll: function() {
      jQuery('a').click(function(e){
        var anchorLink = jQuery(this).attr('href');
        var headerHeight = jQuery('.header, .scrollHeader, .mobileHeader, .copyrightingHeader').height();

        if(anchorLink.lastIndexOf('#') === 0) {
          e.preventDefault();

          if(anchorLink != '#') {
            jQuery('html, body').animate({
              //scrollTop: jQuery(anchorLink).offset().top
              scrollTop: jQuery(anchorLink).offset().top - headerHeight - 100
            }, 500);
          } else if(jQuery(this).hasClass('scroll')) {
            jQuery('html, body').animate({
              scrollTop: 0
            }, 500);
          }
        } else if(anchorLink.lastIndexOf('#') > 0) {
          var target = jQuery(anchorLink.substr(anchorLink.lastIndexOf('#')));
          if(target.length) {
            jQuery('html, body').animate({
              //scrollTop: jQuery(anchorLink.substr(anchorLink.lastIndexOf('#'))).offset().top
              scrollTop: jQuery(anchorLink.substr(anchorLink.lastIndexOf('#'))).offset().top - headerHeight -100
            }, 500);
          }
        }
      });
    },

    initLoginPlaceholder: function() {
      jQuery('#wpmem_login_form #log').attr('placeholder', 'IDまたはメールアドレス');
      jQuery('#wpmem_login_form #pwd').attr('placeholder', 'パスワード');
    },

    initProductTab: function() {
      jQuery('.single-product input[name=tab_switch]').on('change', function(e) {
        tab = jQuery(this).attr('id');
        jQuery('.tab__content').hide();
        jQuery('#' + tab + '__content').show();
      });
    },

    initMenuTrigger: function(){
      jQuery('.burgerMenu').on('click', function() {
        if(!jQuery('.mypageSidebar').hasClass('open')) {
          jQuery('.mypageSidebar').addClass('open');
          jQuery('.burgerMenu').addClass('open');
          //jQuery('.header__menu').fadeIn();
          //jQuery('body').css({'overflow':'hidden'});
        } else {
          jQuery('.mypageSidebar').removeClass('open');
          jQuery('.burgerMenu').removeClass('open');
          //jQuery('.header__menu').fadeOut();
          //jQuery('body').css({'overflow':'auto'});
        }
      });
    },

    initSiteAddRestriction: function() {
      jQuery('input[name="vehicle_restrictions"]').on('change', function() {
        if(jQuery(this).val() === '有り') {
          jQuery('.input-field.restriction_type').show();
        } else {
          jQuery('.input-field.restriction_type').hide();
        }
      });

      jQuery('input[name="restriction_type"]').on('change', function() {
        if(jQuery(this).val() === 'その他') {
          jQuery('.input-field.other_text').show();
        } else {
          jQuery('.input-field.other_text').hide();
        }
      });
    },

    initFetchAddress: function() {
      jQuery('#fetch_address').on('click', function() {
        var zip = jQuery('#postcode').val().replace('-', '').trim();

        if(zip.length === 7) {
          jQuery.ajax({
            url: 'https://zipcloud.ibsnet.co.jp/api/search',
            type: 'GET',
            dataType: 'jsonp',
            data: { zipcode: zip },
            success: function(response) {
              if (response.results) {
                var result = response.results[0];
                jQuery('#address_1').val(result.address1 + result.address2 + result.address3);
              } else {
                alert('住所が見つかりませんでした。');
              }
            },
            error: function() {
              alert('通信エラーが発生しました。');
            }
          });
        } else {
          alert('7桁の郵便番号を入力してください');
        }
      });
    },

    initOrderSiteAddressDisplay: function() {
      jQuery('#site_select').on('change', function() {
        var postId = jQuery(this).val();
        if (postId) {
          jQuery.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
              action: 'get_site_address',
              post_id: postId
            },
            success: function(response) {
              jQuery('#site_address').val(response);
            },
            error: function() {
              jQuery('#site_address').val('住所が取得できませんでした');
            }
          });
        } else {
          jQuery('#site_address').val('');
        }
      });
    },





















    initFixedHeader: function() {
      var iCurScrollPos = jQuery(window).scrollTop();
      var changePos = 0;
      if(jQuery('.topMV').length) {
        changePos = jQuery('.topMV').height();
      } else {
        changePos = 280;
      }
      if( iCurScrollPos >= changePos) {
        jQuery('.header').addClass('fh');
        jQuery('.scrollHeader').addClass('fh');
      } else {
        jQuery('.header').removeClass('fh');
        jQuery('.scrollHeader').removeClass('fh');
      }
    },

    

    initTopFAQ: function() {
      jQuery('.topFaq .item').on('click', function() {
        if(jQuery(this).hasClass('open')) {
          jQuery(this).removeClass('open');
        } else {
          jQuery(this).addClass('open');
        }
        jQuery(this).find('.answer').slideToggle();
      });
    },

    initTab: function() {
      jQuery('.tab .tab__btn').on('click', function() {
        if(!jQuery(this).hasClass('current') && !jQuery(this).hasClass('tel')) {
          jQuery('.tab .tab__btn').removeClass('current');
          jQuery(this).addClass('current');
  
          jQuery('.tab__cont').removeClass('show');
          jQuery('.tab__cont').hide();
          if(jQuery(this).hasClass('tab__btn--01')) {
            jQuery('.tab__cont--01').addClass('show');
            jQuery('.tab__cont--01').fadeIn();
          } else if(jQuery(this).hasClass('tab__btn--02')) {
            jQuery('.tab__cont--02').addClass('show');
            jQuery('.tab__cont--02').fadeIn();
          }
        }
      });
    },

    initContactAgree: function() {
      jQuery('#privacyPolicy .mwform-checkbox-field-text').html('<a href="/privacy-policy/" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意します');
    },

    initContactDelivery: function() {
      var $target = jQuery('.contactForm .delivery .input-field > div:nth-of-type(1)');
      if($target.find('.error').length) {
        jQuery('.contactForm .delivery .input-field > div:nth-of-type(1)').append('<span class="error custom-error">未入力です。</span>');
      }
    },

    initiContactSubmitPaging: function() {
      var $mwWpForm = jQuery('.contactForm .tab__cont--02 .mw_wp_form');
      if($mwWpForm.find('.error').length || $mwWpForm.hasClass('mw_wp_form_confirm') || $mwWpForm.hasClass('mw_wp_form_complete')) {
        tabChange();
      }

      function tabChange() {
        jQuery('.tab .tab__btn').removeClass('current');
        jQuery('.tab .tab__btn--02').addClass('current');

        jQuery('.tab__cont').hide();
        jQuery('.tab__cont--02').show();
      }
    },

    













    


    //↓↓↓ old


    initTopArticleSlider: function() {
      var carousel = jQuery('.article__slider');
      carousel.slick({
        autoplay: false,
        autoplaySpeed: 0,
        arrows: true,
        prevArrow: '<div class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
        nextArrow: '<div class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
        pauseOnHover: false,
        slidesToShow: 4,
        speed: 1000,
        swipe: true,
        touchMove: false,
        centerMode: false,
        variableWidth: true,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
            },
          },
        ],
      });
    },








    

    initVoice: function() {
      //var pageNumber = 1;
      var voice_filter = function (pageNumber) {
        pageNumber = pageNumber === undefined ? "1" : pageNumber;

        jQuery.ajax({
          type: 'POST',
          url: ajaxurl,
          dataType: 'html',
          data: {
            action: 'get_voice_posts',
            base: '/',
            pageNumber: pageNumber,
            postsPerPage: 3,
          },
          beforeSend: function(){
            jQuery('.voice .loading').addClass('active');
          },
        }).done(function (res) {
          jQuery('.voice .loading').removeClass('active');
          jQuery('.voice ul').remove();
          //jQuery('.topCooperator .pagination').remove();
          jQuery('.voice .list__wrap').prepend(res);
          /* jQuery('html, body').animate({
            scrollTop: jQuery('.topCooperator').offset().top - 110
          }, 500); */
        });
      };

      jQuery('.voice .arrow').on('click', function (e) {
        var pageNumber = 1;

        if (jQuery(this).hasClass('next')) {
          pageNumber = parseInt(jQuery('.voice .list').data('page')) + 1;
        } else if (jQuery(this).hasClass('prev')) {
          pageNumber = parseInt(jQuery('.voice .list').data('page')) - 1;
        }

        voice_filter(pageNumber);
      });

      if(jQuery('.voice').length > 0 && window.location.href.indexOf('?') > 0) {
        window.history.replaceState({}, '', window.location.href.slice(0, window.location.href.indexOf('?')));
      }
    },

    


  }

  // Get actual Viewport Width (without scrollbar)
  var getVW = function () {
    jQuery('body').css('overflow', 'hidden');
    var width = jQuery(window).width();
    jQuery('body').css('overflow', '');

    return width;
  };

  var urlParams = function () {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  };

  jQuery(document).ready( function() {
    app.initAnchorScroll();
    app.initLoginPlaceholder();
    app.initProductTab();
    app.initMenuTrigger();
    app.initSiteAddRestriction();
    app.initFetchAddress();
    app.initOrderSiteAddressDisplay();
    
    
    
    
    
    
    
    //↓↓↓ old
    app.initFixedHeader();

    //top faq
    app.initTopFAQ();

    //tab
    app.initTab();

    //contact
    app.initContactAgree();
    app.initContactDelivery();
    app.initiContactSubmitPaging()

    //anchor scroll












    //top article slider
    app.initTopArticleSlider();

    //voice ajax
    app.initVoice();








    AOS.init({
      //disable: window.innerWidth < 992,
      duration: 800,
      once: true,
    });
  });

  jQuery(window).on('scroll', function() {
    //header
    app.initFixedHeader();
  });

  jQuery(window).on('load', function() {
  });

  jQuery(window).on('resize', function() {
    //aos
    AOS.refresh();
  });

})();