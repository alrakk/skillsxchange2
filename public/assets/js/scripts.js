
/* Portfolio */
$(window).load(function() {
    var $cont = $('.portfolio-group');
    
    $cont.isotope({
        itemSelector: '.portfolio-group .portfolio-item',
        masonry: {columnWidth: $('.isotope-item:first').width(), gutterWidth: -20, isFitWidth: true},
        filter: '*',
    });

    $('.portfolio-filter-container a').click(function() {
        $cont.isotope({
            filter: this.getAttribute('data-filter')
        });

        return false;
    });

    var lastClickFilter = null;
    $('.portfolio-filter a').click(function() {

        //first clicked we don't know which element is selected last time
        if (lastClickFilter === null) {
            $('.portfolio-filter a').removeClass('portfolio-selected');
        }
        else {
            $(lastClickFilter).removeClass('portfolio-selected');
        }

        lastClickFilter = this;
        $(this).addClass('portfolio-selected');
    });

});

/* Image Hover  - Add hover class on hover */
$(document).ready(function(){
    if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".image-hover figure").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
            }
        });
        // handle the closing of the overlay
        $(".close-overlay").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            if ($(this).closest(".image-hover figure").hasClass("hover")) {
                $(this).closest(".image-hover figure").removeClass("hover");
            }
        });
    } else {
        // handle the mouseenter functionality
        $(".image-hover figure").mouseenter(function(){
            $(this).addClass("hover");
        })
        // handle the mouseleave functionality
        .mouseleave(function(){
            $(this).removeClass("hover");
        });
    }
});

// thumbs animations
$(function () {
    
    $(".thumbs-gallery i").animate({
             opacity: 0
    
          }, {
             duration: 300,
             queue: false
          });

   $(".thumbs-gallery").parent().hover(
       function () {},
       function () {
          $(".thumbs-gallery i").animate({
             opacity: 0
          }, {
             duration: 300,
             queue: false
          });
   });
 
   $(".thumbs-gallery i").hover(
      function () {
          $(this).animate({
             opacity: 0
    
          }, {
             duration: 300,
             queue: false
          });

          $(".thumbs-gallery i").not( $(this) ).animate({
             opacity: 0.4         }, {
             duration: 300,
             queue: false
          });
      }, function () {
      }
   );

});

// Mobile Menu
$(function(){
    $('#hornavmenu').slicknav();
    $( "div.slicknav_menu" ).addClass( "hidden-lg" );
});

// Stellar Parallax
$(function(){
  if (Modernizr.touch) {
      } else {
          $(window).stellar({
      horizontalScrolling: false
    });
  }
});

//Select Categories

$('#category_list').select2({
    placeholder:'Skills Xchange',
    tags:true
});

$('#category_list_seeking').select2({
    placeholder:'Skills Xchange',
    tags:true
});

$(function(){

  $('[data-editable]').each(function(i,el){

    var url =$(el).data('url');
    var options = {
      type:'textarea',
      submit:'Update',
      cssclass:'editable',
      submitdata:{
        _method:'PUT',
        _token:$('#token').text(),
        column:$(el).data('editable')
      }
    };
    $(el).editable(url,options);
  });


  //Wysiwyg

  tinymce.init({ selector:'textarea.wyz' });
});

