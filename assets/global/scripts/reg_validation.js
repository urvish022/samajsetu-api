 var error1 = $('#alert-empty');

        $(".members-form").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                full_name_eng : {
                    required: "મુખ્ય સભ્ય નું પૂરું નામ ફરજીયાત છે",
                },
                village_id : {
                  required: "તમારું મૂળ વતન સિલેક્ટ કરવું ફરજીયાત છે",
                },
                mobile_no : {
                  required: "તમારો મોબાઈલ નંબર ફરજીયાત છે",
                },
                birth_date : {
                  required: "તમારી જન્મ તારીખ ફરજીયાત છે",
                },
                gender:{
                  required: "તમારી જાતિ સિલેક્ટ કરવી ફરજીયાત છે",
                },
                country_id : {
                  required: "તમારો દેશ સિલેક્ટ કરવો ફરજીયાત છે",
                },
                city_name : {
                  required: "તમારા શહેર નું નામ ફરજીયાત છે",
                },
                address : {
                  required: "તમારા ઘર નું સરનામું ફરજીયાત છે",
                }

            },
            rules: {
                full_name_eng: {
                    required: true
                },
                village_id: {
                    required: true
                },
                mobile_no: {
                    required: true
                },
                gender:{
                  required: true
                },
                birth_date: {
                    required: true
                },
                country_id: {
                    required: true
                },
                city_name: {
                    required: true
                },
                address: {
                    required: true
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit              
                error1.show();
                App.scrollTo(error1, -200);
            },

            errorPlacement: function(error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                error1.hide();
            }
            
            });