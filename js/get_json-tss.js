/**
 * Created by admin on 27/01/15.
 */


jQuery(function($){

    $("#json-tss-one-title").change(function() {

        var $dropdown = $(this);

        $.getJSON("../wp-content/plugins/brozzme-social-share/jsondata/data-hover.json", function(data) {

            var key = $dropdown.val();
            var vals = [];
            var container = [];
            var prefix = data.prefix;
            var $jsontwo = $("#json-tss-two-title");

            $jsontwo.empty();
            switch(key) {

                case 'transition':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='transition') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'background':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='background') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'border':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='border') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'shadow-glow':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='shadow-glow') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'speech-bubbles':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='speech-bubbles') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'icons':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='icons') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'curls':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='curls') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'base':
                    vals = ['Please choose from above'];
            }
        });
    });
});

jQuery(function($){

    $("#json-tss-one-effect").change(function() {

        var $dropdown = $(this);

        $.getJSON("../wp-content/plugins/brozzme-social-share/jsondata/data-hover.json", function(data) {

            var key = $dropdown.val();
            var vals = [];
            var container = [];
            var prefix = data.prefix;
            var $jsontwo = $("#json-tss-two-effect");

            $jsontwo.empty();
            switch(key) {

                case 'transition':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='transition') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'background':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='background') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'border':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='border') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'shadow-glow':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='shadow-glow') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'speech-bubbles':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='speech-bubbles') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'icons':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='icons') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'curls':
                    container = data.hoverclass;
                    $.each(container, function(i, object) {
                        if(i =='curls') {
                            $.each(object, function (index, value) {
                                $jsontwo.append("<option value='" + prefix + index + "'>" + value + "</option>");
                            });
                        }
                    });
                    break;

                case 'base':
                    vals = ['Please choose from above'];
            }
        });
    });
});
jQuery(function($){
    // change the div effect without loading
    $("#tss_effect").change(function() {
        var $dropdown = $(this);
        var key = $dropdown.val();
        var prefix1 = 'hvr-';
        var lastClass = $('.test').attr('class').split(' ').pop();
        $(".test").removeClass( lastClass ).addClass( key );


    });
});
// change the div effect without loading
jQuery(function($){

    $("#json-tss-two-title").change(function() {
        var $dropdown = $(this);
        var key = $dropdown.val();
        var prefix1 = 'hvr-';
        var lastClass = $('.test-title').attr('class').split(' ').pop();
        $(".test-title").removeClass( lastClass ).addClass( key );


    });
});

jQuery(function($){

    $("#json-tss-two-effect").change(function() {
        var $dropdown = $(this);
        var key = $dropdown.val();
        var prefix1 = 'hvr-';
        var lastClass = $('.test-effect').attr('class').split(' ').pop();
        $(".test-effect").removeClass( lastClass ).addClass( key );


    });
});