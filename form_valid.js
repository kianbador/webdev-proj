(() => {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Perform additional custom validation
                if (!validateCourseAndName() || !validatePhoneNumbers()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            }

            form.classList.add('was-validated');
        }, false);
    });

    function validateCourseAndName() {
        const courseInput = document.querySelector('input[name="course"]');
        const nameInput = document.querySelector('input[name="p_name"]');
        // Regular expression for letters only
        const lettersOnlyRegex = /^[A-Za-z]+$/;

        if (!lettersOnlyRegex.test(courseInput.value)) {
            alert("Course should contain only letters.");
            return false;
        }

        if (!lettersOnlyRegex.test(nameInput.value)) {
            alert("Complete Name should contain only letters.");
            return false;
        }

        return true;
    }

    function validatePhoneNumbers() {
        const phoneInput = document.querySelector('input[name="phone_no"]');
        const telInput = document.querySelector('input[name="tel_no"]');
        const p_phoneInput = document.querySelector('input[name="p_phoneno"]');
        // Regular expression for numbers and the letters 'N' and 'A'
        const validPhoneRegex = /^[0-9NA]*$/i;

        if (!validPhoneRegex.test(phoneInput.value)) {
            alert("Phone Number should contain only numbers, or input 'NA' if not applicable.");
            return false;
        }

        if (!validPhoneRegex.test(telInput.value)) {
            alert("Telephone Number should contain only numbers, or input 'NA' if not applicable.");
            return false;
        }

        if (!validPhoneRegex.test(p_phoneInput.value)) {
            alert("Guardian's Phone Number should contain only numbers, or input 'NA' if not applicable.");
            return false;
        }

        return true;
    }
})();