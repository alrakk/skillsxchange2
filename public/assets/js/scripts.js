
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

  $('.send').on('click',function(){
    $(this).parent().prev().find('form').submit();
  });

  $('#flash-overlay-modal').modal();
    
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


  //


  // Disable auto discover for all elements:
  Dropzone.autoDiscover = false;

  Dropzone.options.imageUpload = {
    paramName: "photo", // The name that will be used to transfer the file
    maxFilesize: 200, // MB
    parallelUploads: 1,
    uploadMultiple: false,
    acceptedFiles: ".jpg",
    accept: function(file, done) {
      //front end validation
      done();
    },
    sending: function(file, xhr, formData) {
      // Will send the filesize along with the file as POST data.
      formData.append("_token", $('#token').text());

      formData.append("post_id", $('[name=post_id]').val());
    },
    init: function() {
      this.on("complete", function(file) {
        // do whatever on complete
      });

      this.on("success", function(file, response) {
        console.log(response);
        $("img#photo").attr('src', $('#public').text() + '/images/' + response);
      });
    }
  };

  //Dropzone
  var myDropzone = new Dropzone("#image-upload", {
    url: $('#public').text() + "/photos"
  });


});


$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  // var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)

})



