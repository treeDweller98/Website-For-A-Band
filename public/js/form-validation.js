// JavaScript for disabling form submissions if there are invalid fields
$(document).ready(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
        if (!form.checkValidity() && matchPassword()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
})()

function matchPassword() {  
    var pw1 = document.getElementById("password");  
    var pw2 = document.getElementById("confirmPassword");
    
    if(pw1 == pw2) {
        return true;
    } return false;
}