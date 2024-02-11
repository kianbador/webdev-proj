(() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    forms.forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                const fname = form.querySelector('#name').value;
                if (!isLetters(fname)) {
                    console.log("hello");
                    alert("Please enter a valid first name (letters only).");
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }

                const password = form.querySelector('#pw').value;
                if (password.length > 20) {
                    alert("Password should be no longer than 20 characters.");
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }

                const cpassword = form.querySelector('#c_pw').value;
                if (password !== cpassword) {
                    alert("Password and Confirm Password must match.");
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }
            }

            form.classList.add('was-validated');
        });
    });

    function isLetters(input) {
        return /^[A-Za-z ]+$/.test(input);
    }

})();