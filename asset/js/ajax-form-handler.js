  var $ = jQuery;
  /*===========================================================
   * Ajax Form
  ===========================================================*/
  
  $('.shield-form .form-control').focusin(function(){
    var id = $(this).attr('id');
    $('label[for='+id+']').slideDown();
  });

  $('.shield-form .form-control').focusout(function(){
    var id = $(this).attr('id');
    $('label[for='+id+']').slideUp();
  });

  function ajax_form_handler(args) {
    var form_data             = json_form_data(args.form),
        submit_button         = $(args.form).find('.submit-btn'),
        form_action           = args.formAction,
        submit_button_default = args.submitButton.default,
        submit_button_loading = args.submitButton.loading,
        submission_feedback   = args.submissionFeedback;

    if (submit_button.hasClass('disabled')) { return; }
    start_loading_btn(submit_button, submit_button_loading);
    close_alert_feedback('.form-submition-status');

    $.ajax({
      url: form_data.url,
      type: 'post',
      data: {
        fields: form_data.fields,
        action: form_action
      },
      error: function (response){
        console.log(response);
        end_loading_btn(submit_button, submit_button_default);
        show_alert_feedback('.form-submition-status', 'error', 'Sorry, server error, please try again.');
      },
      success: function (response){
        end_loading_btn(submit_button, submit_button_default);
        var response = JSON.parse(response);
        error_msg_handler(response);
        ajax_form_success_callback(response, submission_feedback);
      }
    });
  }

  // ajax_form_success_callback
  function ajax_form_success_callback(response, feedback)
  {
    if (response.submition_status) {
      show_alert_feedback('.form-submition-status', 'success', feedback.success);
    } 

    if (response.validation_status == true && response.submition_status == false) {
      show_alert_feedback('.form-submition-status', 'error', feedback.error);
    }

  }


  // Prepearing form data for AJAX
  function json_form_data(form) {
    var that  = $(form),
    ajax_url  = that.data('url'),
    type      = that.attr('method'),
    fields    = {},
    form_data = {};

    that.find('[name]').each(function() {
      var that     = $(this),
      name         = that.attr('name'),
      value        = that.val();
      fields[name] = value;
    });

    form_data.url    = ajax_url;
    form_data.type   = type;
    form_data.fields = fields;
    return form_data;
  }

  // Ajax Form Error Message Handler 
  function error_msg_handler(response) {
    var validated_data = response.data;

    for (var i = 0; i < validated_data.length; i++) {
      var field_name      = validated_data[i].name;
      var field_value     = validated_data[i].value;
      var field_has_error = validated_data[i].error.status;
      var field_error_msg = validated_data[i].error.message;
      var field           = $('#' + field_name);

      field.val(field_value);
      
      // var err_messages           = '';
      // var separator              = '<br>';
      
      if (field_has_error) {
        // for (var err_msg = 0; err_msg < field_error_msg.length; err_msg++) {
        //   if (err_msg  == (field_error_msg.length-1) ) {separator = ''}
        //     err_messages = err_messages + field_error_msg[err_msg] + separator;
        // }
        
        show_input_feedback(field_name, 'error', field_error_msg[0]);
      } else {
        close_input_feedback(field_name, 'error');
        show_input_feedback(field_name, 'success');
      }
    }
  }

  // Show Input Feedback
  function show_input_feedback(target, feedback_type, msg='') {

    var feedback    = '<span class="help-block">' + msg + '</span>';
    var err_field   = '.' + target + '-err';
    var input_field = '#' + target;

    $(input_field).addClass('form-control-' + feedback_type);
    $(err_field).parent().addClass('has-' + feedback_type);

    if (msg.length > 0) {
      $(err_field).html(feedback);
      $(err_field).slideDown();
    }
  }

  // Close Input Feedback
  function close_input_feedback(target, feedback_type) {
    var err_field   = '.' + target + '-err';
    var input_field = '#' + target;

    $(input_field).removeClass('form-control-' + feedback_type);
    $(err_field).parent().removeClass('has-' + feedback_type);
    $(err_field).slideUp();
    $(err_field).html('');
  }


  // Show Alert Feedback
  function show_alert_feedback(target, feedback_type, msg) {
    var feedback = '<div class="alert alert-' + feedback_type + '" role="alert">'+ msg +'</div>';
    
    $(target).html(feedback);
    $(target).slideDown();
  }

  // Close Alert Feedback
  function close_alert_feedback(target) {
    $(target).html('');
    $(target).slideUp();
  }

  // Loading Button | Start Loading
  function start_loading_btn(btn, btn_txt) {
    var loading = btn_txt + ' <i class="fa fa-spinner fa-pulse fa-fw"></i>';
    $(btn).addClass('disabled');
    $(btn).html(loading);
  }

  // Loading Button | End Loading
  function end_loading_btn(btn, btn_txt) {
    $(btn).removeClass('disabled');
    $(btn).html(btn_txt);
  }