"use strict";
$(function () {
    //Horizontal form basic
    $("#wizard_horizontal").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
    });

    //Vertical form basic
    $("#wizard_vertical").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
    });

    //Advanced form with validation
    var form = $("#wizard_with_validation").show();
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onInit: function (event, currentIndex) {
            //Set tab width
            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
            var tabCount = $tab.length;
            $tab.css("width", 100 / tabCount + "%");

            //set button waves effect
            setButtonWavesEffect(event);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex > newIndex) {
                return true;
            }

            if (currentIndex < newIndex) {
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass(
                    "error"
                );
            }

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            event.preventDefault();
            $('a[href="#finish"]').text('Please wait...').css('pointer-events', 'none');

            var myform = $("#wizard_with_validation")[0];
            var formData = new FormData(myform);
            formData.append(
                "main_image",
                $('input[name="main_image"]')[0].files[0]
            );
            formData.append(
                "floor_image",
                $('input[name="floor_image"]')[0].files[0]
            );
            formData.append("_token", token);

            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue();
            } else {
                $.ajax({
                    type: "POST",
                    url: addUrl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        window.location = propertyUrl;
                    },
                    error: function (response) {
                        window.location = propertyUrl;
                    },
                });
            }
        },
    });

    form.validate({
        highlight: function (input) {
            $(input).parents(".form-line").addClass("error");
        },
        unhighlight: function (input) {
            $(input).parents(".form-line").removeClass("error");
        },
        errorPlacement: function (error, element) {
            $(element).parents(".form-group").append(error);
        },
        rules: {
            confirm: {
                equalTo: "#password",
            },
        },
    });

    //Select2
    $(".select2").select2();

    //Upload Preview
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null, // Default: null
    });

    $.uploadPreview({
        input_field: "#image-upload-floor", // Default: .image-upload
        preview_box: "#image-preview-floor", // Default: .image-preview
        label_field: "#image-label-floor", // Default: .image-label
        label_default: "Choose Floor Image", // Default: Choose File
        label_selected: "Change Floor Image", // Default: Change File
        no_label: false, // Default: false
        success_callback: null, // Default: null
    });

    // DropzoneJS
    var myDropzone = new Dropzone("#mydropzone", {
        url: addUrl,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 20,
        paramName: "attachments",
        maxFiles: 20,
        addRemoveLinks: true,
        maxFilesize: 250,
        dictDefaultMessage: "Drop your files here!",
    });

    myDropzone.on("sendingmultiple", function (file, xhr, formData) {
        formData.append("_token", token);
        formData.append(
            "main_image",
            $('input[name="main_image"]')[0].files[0]
        );
        formData.append(
            "floor_image",
            $('input[name="floor_image"]')[0].files[0]
        );

        var formValues = $("#wizard_with_validation").serializeArray();
        $(formValues).each(function (key, obj) {
            formData.append(obj.name, obj.value);
        });
    });

    myDropzone.on("successmultiple", function (response) {
        window.location = propertyUrl;
    });

    myDropzone.on("errormultiple", function (file, errorMessage, xhr) {
        var arr = [];
        $.each(errorMessage, function (key, value) {
            arr += value + "\n";
        });
    });

    var floorDropzone = new Dropzone("#floordropzone", {
        url: addUrl,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 20,
        paramName: "floors",
        maxFiles: 20,
        addRemoveLinks: true,
        maxFilesize: 250,
        dictDefaultMessage: "Drop your files here!",
    });

    floorDropzone.on("sendingmultiple", function (file, xhr, formData) {
        formData.append("_token", token);
        formData.append(
            "main_image",
            $('input[name="main_image"]')[0].files[0]
        );

        var formValues = $("#wizard_with_validation").serializeArray();
        $(formValues).each(function (key, obj) {
            formData.append(obj.name, obj.value);
        });
    });

    floorDropzone.on("successmultiple", function (response) {
        window.location = propertyUrl;
    });

    floorDropzone.on("errormultiple", function (file, errorMessage, xhr) {
        var arr = [];
        $.each(errorMessage, function (key, value) {
            arr += value + "\n";
        });
    });
});

function setButtonWavesEffect(event) {
    $(event.currentTarget)
        .find('[role="menu"] li a')
        .removeClass("waves-effect");
    $(event.currentTarget)
        .find('[role="menu"] li:not(.disabled) a')
        .addClass("waves-effect");
}
