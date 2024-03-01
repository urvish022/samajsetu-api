 var error1 = $('#alert-empty');

        $(".business-form").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                full_name_eng : {
                    required: "માલિક નું પૂરું નામ ફરજીયાત છે",
                },
                country_id : {
                  required: "દેશ સિલેક્ટ કરવું ફરજીયાત છે",
                },
                bc_id: {
                  required: "બિઝનેસ કેટેગરી સિલેક્ટ કરવું ફરજીયાત છે",
                },
                mobile_no : {
                  required: "કંપની નો ફોન નંબર ફરજીયાત છે",
                },
                company_name_eng : {
                  required: "તમારી કંપની નું નામ ફરજીયાત છે",
                },
                timing_start:{
                  required: "તમારી ઓફિસ નો ઓપનિંગ ટાઈમ ફરજીયાત છે",
                },
                timing_end : {
                  required: "તમારી ઓફિસ નો કલોસિંગ ટાઈમ ફરજીયાત છે",
                },
                area : {
                  required: "તમારા સર્વિસ નો એરિયા/શહેર નું નામ ફરજીયાત છે",
                },
                address : {
                  required: "તમારા બિઝનેસ નું સરનામું ફરજીયાત છે",
                }

            },
            rules: {
                full_name_eng: {
                    required: true
                },
                country_id: {
                    required: true
                },
                bc_id: {
                    required: true
                },
                mobile_no: {
                    required: true
                },
                company_name_eng:{
                  required: true
                },
                timing_start: {
                    required: true
                },
                timing_end: {
                    required: true
                },
                area: {
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