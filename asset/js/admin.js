jQuery(document).ready(function($){
  /*===========================================================
   * FUNCTIONS
  ===========================================================*/
  /* = Run Function If Element Exist
   * ========================================================*/
  function if_exist(elm, callback){
    if ($(elm).length) {
      return callback();
    }
  }

  /* = Wordpress Media Upload Function
   * ========================================================*/
  function media_upload_action(args) {
    var mediaUploader;
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose ' + args.title,
      button: {
        text: 'Choose ' + args.title
      },
      multiple: args.multiple
    });

    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      
      var container         = '.admin-' + args.prefix + '-container';
      var img               = $('.admin-' + args.prefix);
      var id                = $('#' + args.id);
      var description_class = '#' + args.id.replace(/-/g,"_") + '_description'; 
      console.log(description_class);

      $(id).val(attachment.url);

      if (img.length) {
        img.attr('src', attachment.url);
      } else {
        var new_img = '<img src="' + attachment.url + '" class="admin-' + args.prefix +' admin-img">';
        $(container).prepend(new_img);
      }
      $(description_class).html('');

      
    });

    mediaUploader.open();
  }

  /* = Wordpress Media Remove Function
   * ========================================================*/
  function media_remove_action(args) {
    var confirmed = confirm('Are you sure?');
    if (confirmed) {
      $('#' + args.id).val('');
      $('#' + args.formID).submit();
    }
  }



  /*===========================================================
   * TASKS
  ===========================================================*/
  /* = Admin Site Logo Upload
   * ========================================================*/
  var site_logo_args = {
    prefix: "site-logo",
    id: "admin_site_logo",
    formID: 'admin_general_info_form',
    title: 'Logo',
    multiple: false
  };

  $('#admin_site_logo_btn').on('click', function(e){
    e.preventDefault();
    media_upload_action(site_logo_args);
  });

  $('#admin_remove_site_logo_btn').on('click', function(e){
    e.preventDefault();
    media_remove_action(site_logo_args);
  });

  /* = Admin Map Icon Upload
   * ========================================================*/
  var map_icon_args = {
    prefix: "map-icon",
    id: "admin_map_icon",
    formID: 'admin_map_form',
    title: 'Icon',
    multiple: false
  };

  $('#admin_map_icon_btn').on('click', function(e){
    e.preventDefault();
    media_upload_action(map_icon_args);
  });

  $('#admin_remove_map_icon_btn').on('click', function(e){
    e.preventDefault();
    media_remove_action(map_icon_args);
  });

});
