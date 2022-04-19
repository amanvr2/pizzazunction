// var total=$(this).find('input[name="toppings[]"]:checked').length;

// alert(total.length);

// $(document).ready(function() {
//     // show the alert
//     setTimeout(function() {
//         $("#alert").alert('close');
//     }, 4000);
// });


$("#alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});