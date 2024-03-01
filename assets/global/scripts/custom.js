var dataTable;
$('.select2me').select2();

$('.date-picker').datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});

// Load the Google Transliteration API
google.load("elements", "1", {
  packages: "transliteration"
});

function onLoad() {
  var options = {
    sourceLanguage: 'en',
    destinationLanguage: ['gu'],
    shortcutKey: 'ctrl+m',
    transliterationEnabled: true
  }

  // Create an instance on TransliterationControl with the required options.
  var control = new google.elements.transliteration.TransliterationControl(options);

  // Enable transliteration in the textfields with the given ids.
  var ids = ["translator"];
  control.makeTransliteratable(ids);
}

google.setOnLoadCallback(onLoad);

function copy_text() {
  var copyText = document.getElementById("translator");
  copyText.select();
  document.execCommand("copy");
}

function capitalizeFirstLetter(str) {
  if (str && str.length >= 1) {
    var firstChar = str.charAt(0);
    var remainingStr = str.slice(1);
    str = firstChar.toUpperCase() + remainingStr;

  }
  document.getElementById('eng_name').value = str;
}

function change_theme(theme_name) {
  $.ajax({
    type: "POST",
    url: base_url + "common/change_theme",
    data: {
      theme: theme_name
    },
    success: function (data) {
      if (data)
        location.reload();
      else
        location.reload();
    },
    error: function (xhr, desc, err) {
      console.log('error');
    }
  });
}

function change_language(lang_name) {
  $.ajax({
    type: "POST",
    url: base_url + "common/change_lang",
    data: {
      lang: lang_name
    },
    success: function (data) {
      if (data)
        location.reload();
      else
        location.reload();
    },
    error: function (xhr, desc, err) {
      console.log('error');
    }
  });
}

function toggleFullScreen() {
  if (!document.fullscreenElement && // alternative standard method
    !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) { // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

function save_data(url, form_name, button_id) {
  $('#' + button_id).text('Saving...'); //change button text
  $('#' + button_id).attr('disabled', true); //set button disable 

  $.ajax({
    url: url,
    type: "POST",
    data: $('#' + form_name).serialize(),
    dataType: "JSON",
    success: function (data) {
      
      $('#' + button_id).text('Submit');
      $('#' + button_id).attr('disabled', false); //set button enable       
      
      $('form').on('reset', function() {
        $("input[type='hidden']", $(this)).val('');
      });
      document.getElementById(form_name).reset();

      if (data.insert_status == true) {
        success_toast();
        dataTable.ajax.reload();
      } 
      else if (data.duplicate_status == true) {
        warning_toast();
        dataTable.ajax.reload();
      } 
      else if (data.update_status == true) {
        update_toast();
        dataTable.ajax.reload();
      } 
      else {
        fail_toast();
        dataTable.ajax.reload();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Error! Something Went Wrong');
    }
  });
}

function save_data_modal(url, form_name, button_id) {
  $('#' + button_id).text('Saving...'); //change button text
  $('#' + button_id).attr('disabled', true); //set button disable 

  $.ajax({
    url: url,
    type: "POST",
    data: $('#' + form_name).serialize(),
    dataType: "JSON",
    success: function (data) {
      
      $('#' + button_id).text('Submit');
      $('#' + button_id).attr('disabled', false); //set button enable       
      
      $('form').on('reset', function() {
        $("input[type='hidden']", $(this)).val('');
      });
      document.getElementById(form_name).reset();

      if (data.insert_status == true) 
        success_modal();
      else if (data.duplicate_status == true)
        warning_modal();
      else if (data.update_status == true)
        update_modal();
      else 
        fail_modal();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Error! Something Went Wrong');
    }
  });
}

function get_villages_list() {
  $.ajax({
    type: "POST",
    url: base_url + "Common/villages_list",
    success: function (data) {

      $('#village_id').html("");
      $('#village_id').find("option:eq(0)").html("Select Party");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.village_id).text(this.eng_name);
        $('#village_id').append(option);
      });

      $("#village_id").select2("val", "All");
    }
  });
}

function get_relation_list()
{   
  $.ajax({
    type: "POST",
    url: base_url + "Common/relation_list",
    success: function (data) {

      $('#relation_id').html("");
      $('#relation_id').find("option:eq(0)").html("Select Relation");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.relation_id).text(this.relation_name_guj);
        $('#relation_id').append(option);
      });

      $("#relation_id").select2("val", "All");
    }
  });
}

function get_business_cate_list()
{
   $.ajax({
            type: "POST",
            url: base_url+"Common/businesscat_list",
            success: function (data) {
           
               $('#bc_id').html("");  
               $('#bc_id').find("option:eq(0)").html("Select");

              var obj=jQuery.parseJSON(data);
              $(obj).each(function()
              {
               var option = $('<option />');
               
               option.attr('value', this.bc_id).text(this.bc_eng_name+" - "+this.bc_guj_name);                      
               $('#bc_id').append(option);
              });    

              $("#bc_id").select2("val", "All");
             }
          });
}

function get_gujvillage_list() {
  $.ajax({
    type: "POST",
    url: base_url + "Common/villagesguj_list",
    success: function (data) {

      $('#village_id').html("");
      $('#village_id').find("option:eq(0)").html("Select Village");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.village_id).text(this.guj_name);
        $('#village_id').append(option);
      });

      $("#village_id").select2("val", "All");
    }
  });
}

function get_album_list() {
  $.ajax({
    type: "POST",
    url: base_url + "Common/view_album",
    success: function (data) {

      $('#albums_id').html("");
      $('#albums_id').find("option:eq(0)").html("Select Album");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');
        option.attr('value', this.album_id).text(this.album_name);
        $('#albums_id').append(option);
      });

      $("#albums_id").select2("val", "All");
    }
  });
}

function get_organization_list() {
  $.ajax({
    type: "POST",
    url: base_url + "Common/organization_list",
    success: function (data) {

      $('#org_id').html("");
      $('#org_id').find("option:eq(0)").html("Select Organization");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.org_id).text(this.org_name);
        $('#org_id').append(option);
      });

      $("#org_id").select2("val", "All");
    }
  });
}

function get_carrer_cat_list()
{
  $.ajax({
    type: "POST",
    url: base_url + "Common/carrer_cat_list",
    success: function (data) {

      $('#cps_id').html("");
      $('#cps_id').find("option:eq(0)").html("Select Category");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.cp_id).text(this.carrer_cat);
        $('#cps_id').append(option);
      });

      $("#cps_id").select2("val", "All");
    }
  });
}

function get_proud_cat_list()
{
  $.ajax({
    type: "POST",
    url: base_url + "Common/proud_cat_list",
    success: function (data) {

      $('#sprc_id').html("");
      $('#sprc_id').find("option:eq(0)").html("Select Category");

      var obj = jQuery.parseJSON(data);
      $(obj).each(function () {
        var option = $('<option />');

        option.attr('value', this.prc_id).text(this.prc_name);
        $('#sprc_id').append(option);
      });

      $("#sprc_id").select2("val", "All");
    }
  });
}

function get_countries_list(flag) {
  $.ajax({
    type: "POST",
    url: base_url + "Common/countries_list",
    success: function (data) {

      $('#country_id').html("");
      $('#country_id').find("option:eq(0)").html("Select Party");

      var obj = jQuery.parseJSON(data);
      if(flag)
      {
        $(obj).each(function () {
        var option = $('<option />');
          option.attr('value', this.country_id).text(this.country_std+" - "+this.country_name);  
        $('#country_id').append(option);
        });
      }
      else
      {
        $(obj).each(function () {
        var option = $('<option />');
          option.attr('value', this.country_id).text(this.country_name);

        $('#country_id').append(option);
        });
      }

      $("#country_id").select2("val", "All");
    }
  });
}

function js_date(my_date) {
  var a = my_date.split("-");
  var y = a[0];
  var m = a[1];
  var d = a[2];
  var full_date = d + "/" + m + "/" + y;
  return full_date;
}

function customjs_date(my_date) {
  var a = my_date.split("-");
  var y = a[0];
  var m = a[1];
  var d = a[2];
  var full_date = d + "-" + m + "-" + y;
  return full_date;
}

function custom_date(datetime)
{
 var dateTimeParts = datetime.split(/[- :]/);
 var csdate = dateTimeParts.toString();
 var a = csdate.split(",");
  var y = a[0];
  var m = a[1];
  var d = a[2];
  var full_date = d + "-" + m + "-" + y;
  return full_date;
}

function jsRedirect() {
  location.reload();
}

function success_toast() {
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
  toastr["success"]('Data Saved Successfully', "Success");
}

function success_modal() {
  swal({
    title: "Success",
    text: "Data Saved Successfully",
    type: "success"
  }, function () {
    jsRedirect();
  });
}

function update_toast() {
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
  toastr["info"]('Data Updated Successfully', "Success");
}

function update_modal(url) {
  swal({
    title: "Success",
    text: "Data Updated Successfully",
    type: "success"
  }, function () {
    jsRedirect();
  });
}

function fail_toast() {
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
  toastr["error"]('Data Not Saved Successfully', "Fail");
}

function fail_modal() {
  swal({
    title: "Fail",
    text: "Data Not Saved Successfully",
    type: "warning"
  }, function () {
    jsRedirect();
  });
}

function fail_update_toast() {
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
  toastr["error"]('Data Not Updated Successfully', "Fail");
}

function fail_update_modal() {
  swal({
    title: "Fail",
    text: "Data Not Updated Successfully",
    type: "warning"
  }, function () {
    jsRedirect();
  });
}

function warning_toast() {
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
  toastr["warning"]('Already Data is Exist', "Warning");
}

function delete_modal() {
  swal({
    title: "Success",
    text: "Data Deleted Successfully",
    type: "success"
  }, function () {
    jsRedirect();
  });
}

function reject_fail_modal()
{
  swal({
      title: "Fail",
      text: "Account is not rejected",
      type: "warning"
  }, function() {
     location.reload();
  });
}

function reject_modal()
{
  swal({
      title: "Success",
      text: "Rejected successfully",
      type: "success"
  }, function() {
     location.reload();
  });
}

function approve_modal()
{
  swal({
      title: "Success",
      text: "Approved successfully",
      type: "success"
  }, function() {
     location.reload();
  });
}

function approve_fail_modal()
{
  swal({
      title: "Fail",
      text: "Sorry! Approved not successfully done",
      type: "warning"
  }, function() {
     location.reload();
  });
}

function fail_delete_modal() {
  swal({
    title: "Fail",
    text: "Sorry! Data could not be delete",
    type: "warning"
  }, function () {
    jsRedirect();
  });
}



function warning_modal() {
  swal({
    title: "Fail",
    text: "Already Data is Exist",
    type: "warning"
  }, function () {
    jsRedirect();
  });
}


function translate_handler(value, id) {

  if (translate_api_id == "1") {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: translate_api_url,
      data: {
        'q': value,
        'target': 'gu',
        'source': 'en',
        'key': translate_api_key
      },
      success: function (response) {
        if (response.data) {
          var translated_text = response.data.translations[0].translatedText;
          $('#' + id).val(translated_text);
        } else {
          alert("Error:" + response.error.message)
        }
      }
    });
  } else if (translate_api_id == "2") {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: translate_api_url,
      data: {
        'q': value,
        'langpair': 'en|gu',
        'de': translate_api_mail
      },
      success: function (response) {

        if (response.responseData) {
          var translated_text = response.responseData.translatedText;
          $('#' + id).val(translated_text);
        } else {
          alert("Error:" + response.responseDetails);
        }
      }
    });
  }
}

function readImgURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#img_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function back_tab_view(href, form_name) {
  $('#' + form_name)[0].reset();
  $(':input').val('');
  $('.select2me').val(null).trigger("change")
  $('#tab_1_2_nav').hide();
  $('#nav a[href="#' + href + '"]').tab('show');
}