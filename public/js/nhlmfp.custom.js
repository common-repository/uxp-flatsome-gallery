jQuery(function($){
    $('a.open-video')
        .removeClass('open-video').addClass('ux-video');
    $('.img > a.image-lightbox').addClass('ux-image');
    $('.row a.image-lightbox')
        .removeClass('image-lightbox lightbox-gallery')
        .addClass('uxp-lightbox');
    $('.row a.uxp-lightbox, a.ux-video')
        .closest('.row:not(".row-main")')
        .addClass('uxplb-multi-gallery');

    $('.uxplb-multi-gallery a:not(".ux-image")').on('click', function(e){
        e.preventDefault();
        var rowParent = $(this).closest('.row'),
            galleryImgs = rowParent.find('a'),
            gallery = [];
        galleryImgs.each(function (i, gItem) {
            if ($(this).hasClass('ux-video')) {
                gallery.push({
                    src: $(this).attr('href'),
                    type: 'iframe'
                });
            } else {
                gallery.push({
                    src: gItem.href,
                    type: 'image',
                })
            }
        });
        var title = $(this).attr('title'),
            eq = $(this).closest('.col').index();
        $.loadMagnificPopup().then(function () {
            $.magnificPopup.open({
                items: gallery,
                gallery: {
                    enabled: true,
                    arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="icon-angle-%dir%"></i></button>',
                },
                callbacks: {
                    change: function () {
                        $(this.content)
                            .find('.mfp-bottom-bar .mfp-title')
                            .html(title);
                    }
                },
            });
            var magnificPopup = $.magnificPopup.instance;
            magnificPopup.goTo(eq);
        });
    });
    $('.img > a.ux-image').on('click', function(e){
        e.preventDefault();

        var title = $(this).attr('title'),
            href = $(this).attr('href');
        $.loadMagnificPopup().then(function () {
            $.magnificPopup.open({
                items: {
                    src: href,
                },
                type: 'image',
                callbacks: {
                    change: function () {
                        $(this.content)
                            .find('.mfp-bottom-bar .mfp-title')
                            .html(title);
                    }
                },
            })
        });
    });
});