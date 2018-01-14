// //
// $(document).ready(function(){
//
//
//     //---------------------------------------------------------------------------------------------
//     // initialise jQuery validation plugin: https://jqueryvalidation.org/
//     // - define additional validation rule for integers
//     // - define additional validation rule for alphanumberic only
//     // - define rules and messages for modal form for books, and function to place error messages
//     //---------------------------------------------------------------------------------------------
//     $.validator.addMethod("integer", function(value, element) {
//         return this.optional(element) || /^-?[0-9]+$/i.test(value);
//     }, "Whole numbers only please");
//
//
//     $('form').validate({
//         rules: {
//             title: {
//                 required: true,
//                 maxlength: 191
//             },
//             author: {
//                 required: true,
//                 maxlength: 191
//             },
//             publisher: {
//                 required: true,
//                 maxlength: 191
//             },
//             year: {
//                 required: true,
//                 integer: true,
//                 min: 1900
//             },
//             isbn: {
//                 required: true,
//                 alpha_numeric: true,
//                 minlength: 13,
//                 maxlength: 13
//             },
//             price: {
//                 required: true,
//                 number: true,
//                 min: 0
//             }
//         },
//         messages: {
//             title: {
//                 required: "The title field is required.",
//                 maxlength: "The title field must be less than 191 chars."
//             },
//             author: {
//                 required: "The author field is required.",
//                 maxlength: "The author field must be less than 191 chars."
//             },
//             publisher: {
//                 required: "The publisher field is required.",
//                 maxlength: "The publisher field must be less than 191 chars."
//             },
//             year: {
//                 required: "The year field is required.",
//                 integer: "The year must be an integer." ,
//                 min: "The year field cannot be less than 1900."
//             },
//             isbn: {
//                 required: "The ISBN field is required",
//                 alpha_numeric: "The ISBN field can only contain letters and digits.",
//                 minlength: "The ISBN field must be 13 chars long.",
//                 maxlength: "The ISBN field must be 13 chars long."
//             },
//             price: {
//                 required: "The price field is required.",
//                 number: "The year must be a number." ,
//                 min: "The price field cannot be negative."
//             }
//         },
//         errorPlacement: function(error, element) {
//             element.siblings('.error').html(error);
//         }
//     });
//
//
//
//
//
//     $('#btn-submit').on('click', function(){
//         var form = $(this).closest('form').get(0);  $('div').get(0)
//         var formData = $(form).serializeArray();
//         var data = {};
//         formData.map(function(x){
//             data[x.name] = x.value;
//         });
//
//
//         var x = $.ajax(
//             'api/movies',
//             {
//                 data: JSON.stringify(data),
//                 method: 'POST',
//                 success: function (response) {
//                     if (response.status === 200) {
//
//                     }
//                     else if (response.status === 422) {
//
//                     }
//                 },
//                 error: function (jqXHR, textStatus, errorThrown) {
//                     console.log(textStatus);
//                 }
//             }
//         );
//
//     });
//
//
//
//
//
// });
