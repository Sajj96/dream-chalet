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
            myform.submit();
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

    // DropzoneJS
    $("#file-1").fileinput({
        theme: 'fas',
        uploadUrl: "#",
        showRemove: true,
        showUpload: false,
        dropZoneTitle: '<p>Please upload your property\'s other photos below. Accepted image file formats are <b>JPG</b>, <b>GIF</b> and <b>PNG</b></p> <b>Drag & drop file here...</b>',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 5120,
        maxFilesNum: 30,
        // autoReplace: true
        // browseLabel: "",
        // browseIcon: "<i class='fa fa-plus'></i>",
        initialPreviewAsData: true,
        fileActionSettings: {
            showUpload: false,
        }
    })

    $("#file-2").fileinput({
        theme: 'fas',
        uploadUrl: "#",
        showRemove: true,
        showUpload: false,
        dropZoneTitle: '<p>Please upload your floor plans photos here.</p> <b>Drag & drop file here...</b>',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 5120,
        maxFilesNum: 10,
        initialPreviewAsData: true,
        fileActionSettings: {
            showUpload: false,
        }
    })
});

function setButtonWavesEffect(event) {
    $(event.currentTarget)
        .find('[role="menu"] li a')
        .removeClass("waves-effect");
    $(event.currentTarget)
        .find('[role="menu"] li:not(.disabled) a')
        .addClass("waves-effect");
}
