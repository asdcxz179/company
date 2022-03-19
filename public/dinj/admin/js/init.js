/**
* Theme: Uplon Admin Template
* Author: Coderthemes
* Form wizard page
*/



!function($) {
    "use strict";

    var FormWizard = function() {};
    //creates vertical form
    FormWizard.prototype.createVertical = function($form_container) {
        $form_container.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            stepsOrientation: "vertical",
            // startIndex: 1,
            onStepChanging: function (event, currentIndex, newIndex) {
                if(currentIndex < newIndex) {
                    $form_container.validate().settings.ignore = ":disabled,:hidden";
                    return $form_container.valid();    
                }
                return true;
            },
            onFinished: function() {
                $form_container.validate().settings.ignore = ":disabled,:hidden";
                if($form_container.valid()) {
                    sendApi("/DinjApi/v1/Init","POST",$("form[name=init]").serialize(),function(data){
                        toastr.options = {
                            "showDuration": 500,
                            "hideDuration": 300,
                            "onHidden": function() {
                                if(demo) {
                                    localStorage.setItem('init', 1);
                                    localStorage.setItem('system', JSON.stringify($("form[name=init]").serializeArray()));
                                }
                                location.href="/Admin";
                            }
                        };
                        toastr.success(data.message);
                    });
                }
            },
            labels: {
                previous: "上一步",
                next: "下一步",
                finish: "完成",
            }
        });
        return $form_container;
    },
    FormWizard.prototype.init = function() {
        //vertical form
        this.createVertical($("#wizard-vertical"));
    },
    //init
    $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    var init = localStorage.getItem('init');
    if(demo) {
        if(init) {
            location.href="/Admin";
        } 
        $(document).ready(function(){
            $('form[name=init] input[name="admin[username]"]').val("demo@gmail.com");
            $('form[name=init] input[name="admin[email]"]').val("demo@gmail.com");
            $('form[name=init] input[name="admin[password]"]').val("testdemo");
            $('form[name=init] input[name="admin[password_confirmation]"]').val("testdemo");
            $('form[name=init] input[name="admin[name]"]').val("demo");
            $('form[name=init] input[name="system[title]"]').val("鼎聚網路");
            $('form[name=init] input[name="system[address]"]').val("台中市北屯區");
            $('form[name=init] input[name="system[service_time]"]').val("AM 09:00 ~ PM 06:00");
            $('form[name=init] input[name="system[fax]"]').val("04-12345678");
            $('form[name=init] input[name="system[phone]"]').val("04-87654321");
            $('form[name=init] input[name="system[email]"]').val("demo@gmail.com");
            $('.bootstrap-tagsinput input').val("鼎聚網路,網路公司");
            $('.bootstrap-tagsinput input').focus();
            $('.bootstrap-tagsinput input').blur();
            $('form[name=init] textarea[name="system[description]').text("鼎聚網路");
        });
    }
    
    $.FormWizard.init();
}(window.jQuery);