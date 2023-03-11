$(document).ready(function() {

    $('#completeYear').validate({
        rules: {
            name: "required",
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
        submitHandler: function() {
            submitFrom();
        }
    })


});

function submitFrom() {
    $('#completeYear').on('submit', function(e) {
        e.preventDefault();
        var formData = $('#completeYear').serializeArray();
        console.log(formData);
        $.ajax({
            url: base_url+'/ex-student-info-submit', // URL of the route
            type: 'POST', // Type of request
            data: formData, // Data to be sent
            success: function(data) {
                // Do something with the returned data
                $('#exampleModal').modal('hide');
                $('#completeYear').trigger("reset");
                if(data.status) {
                    Swal.fire(
                        'Good job!',
                        data.message,
                        'success'
                    )
                }
            }
        });
    });
}





