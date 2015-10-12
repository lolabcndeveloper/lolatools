$('document').ready(function() {
  
  /******************
    Tablet rotation
  ******************/
  
  var isiPad = navigator.userAgent.match(/iPad/i) != null;
  
  if(isiPad) {
    $('body').prepend('<div id="rotatedevice"><h1>Por favor rota tu iPad 90 grados.</div>');
  }
  
  /********
    Login
  ********/
  
  $('#login_entry > a').click(function() {    
    $(this).fadeOut(200, function() {
      $('#login_form').fadeIn();
    });

    return false;
  });

  

  
  /****************
    Notifications
  ****************/
  if (typeof $.fn.livequery == "function") {
    $('#notifications ul li').livequery(function() {
      $('#notifications').fadeIn();
    });
  }


  
  function init() {
    

        
    
    /************************
      Combined input fields
    ************************/
    
    $('p.combined input:last-child').addClass('last-child');
  
    /**********
      Sliders
    **********/
  
    $(".slider").each(function() {
      var options = $(this).metadata();
      $(this).slider(options, {
        animate: true
      });
    });
  
    $(".slider-vertical").each(function() {
      var options = $(this).metadata();
      $(this).slider(options, {
        animate: true
      });
    });
    
    /*******
      Tags
    *******/
    if (typeof $.fn.tagsInput == "function") {
      $('.taginput').tagsInput({
        'width':'auto'
      });
    }
    /****************
      Progress bars
    ****************/
  
    $(".progressbar").each(function() {
      var options = $(this).metadata();
      $(this).progressbar(options);
    });
  
    
    
    /***********************
      Secondary navigation
    ***********************/
    
    $('nav#secondary > ul > li > a').click(function() {
      $('nav#secondary li').removeClass('active');
      $(this).parent().addClass('active');
    });
  

    // Activamos los placeholders en navegadores antiguos
    if (typeof $.fn.placeholder == "function"){
      $('input[placeholder], textarea[placeholder]').placeholder();
    }

    // Activamos la posibilidad de cerrar las notificaciones.
     if (typeof $.fn.alert == "function"){
      $(".alert").alert();
    }
    
    /***********
      Tooltips
    ***********/
    if (typeof $.fn.tipsy == "function") {
      $('.tooltip').tipsy();
    }


    /******************
      Form Validation
    ******************/
    if (typeof $.fn.livequery == "function") {
    $('form').validate({
      wrapper: 'span class="error"',
      meta: 'validate',
      highlight: function(element, errorClass, validClass) {
        if (element.type === 'radio') {
          this.findByName(element.name).addClass(errorClass).removeClass(validClass);
        } else {
          $(element).addClass(errorClass).removeClass(validClass);
        }
      
        // Show icon in parent element
        var error = $(element).parent().find('span.error');
      
        error.siblings('.icon').hide(0, function() {
          error.show();
        });
      },
      unhighlight: function(element, errorClass, validClass) {
        if (element.type === 'radio') {
          this.findByName(element.name).removeClass(errorClass).addClass(validClass);
        } else {
          $(element).removeClass(errorClass).addClass(validClass);
        }
      
        // Hide icon in parent element
        $(element).parent().find('span.error').hide(0, function() {
          $(element).parent().find('span.valid').fadeIn(200);
        });
      }
    });
  
    // Add valid icons to validatable fields
    $('form p > *').each(function() {
      var element = $(this);
      if (typeof element.metadata == "function") {
      if(element.metadata().validate) {
        element.parent().append('<span class="icon tick valid"></span>');
      }
    }
    });
  }
  }
  init();

});
