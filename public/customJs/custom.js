$(document).ready(function() {

    $('#completeYear').validate({
        rules: {
            name: 'required',
            phone: {
                required: true,
                number: true
            },
            address: "required",
            passing_year: "required",
            present_profession: "required",
        },
        messages: {
            name: "Please Enter Your Name",

            phone: {
                required: "Please Enter YOur Phone Number",
                number: "Please Enter Valide Number"
            },
            address: "Address Fild is Requird",
            passing_year: "Passing Year Fild is Requird",
            present_profession: "Present Profession Fild is Requird",
        },
        // submitHandler: function() {
        //
        // }
    })

    $("#completeYear").on('submit', function(e) {
        e.preventDefault();

        let form_data = $('#completeYear').serializeArray();
        console.log(form_data);

        $.ajax({
            url: "complete-year-form-store",
            type: "POST",
            data: form_data,
            dataType: "json",
            beforeSend: function() {
                $(".save_btn").addClass("disabled").text("Loding...");
            },
            success: function(res) {

                // $(".ajax-res").text("Your form Submit successfully");
                $(".save_btn").removeClass("disabled").text("Submit");
                // $("#admissionForm")[0].reset();
                // alert("Your form Submit successfully");
                $('#success').text('Your form Submit successfully');
            },
        });
    });
});




$('#completeYear').on('submit', function(e) {
    e.preventDefault();

    var form_data = $('#completeYear').serializeArray();
    console.log(form_data);
});
