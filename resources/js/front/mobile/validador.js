import JustValidate from 'just-validate';

export let validador = (form) => {

    let invalidElements = document.querySelectorAll('.is-invalid');
    let validate = new JustValidate(form, {
        errorFieldCssClass: 'is-invalid',
        errorLabelStyle: {
            color: 'red',
            fontsize: '14px',
        },
        focusInvalidField: true,
        lockForm: true,
        errorsContainer: '#errors-container',
    });

    if (invalidElements.length > 0){
        validate.destroy();
    };

    validate
        .addField('#name', [
            {
                rule: 'required',
                errorMessage: 'Name is required!',
            },
            {
                rule: 'minLength',
                value: 3,
            },
            {
                rule: 'maxLength',
                value: 30,
            },
        ])
        .addField('#surname', [
            {
                rule: 'required',
                errorMessage: 'Surname is required!',
            },
            {
                rule: 'minLength',
                value: 3,
            },
            {
                rule: 'maxLength',
                value: 30,
            },
        ]) 
        // .addField('#address', [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Address is required!'
        //     }
        // ])    
        // .addField('#location', [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Location is required!'
        //     }
        // ]) 
        // .addField('#postal_code', [
        //     {
        //         rule: 'required',
        //         errorMessage: 'Postal code is required!'
        //     }
        // ])
        .addField('#mobile_phone', [
            {
                rule: 'required',
                errorMessage: 'Mobile phone is required!'
            }
        ]) 
        .addField('#email', [
            {
                rule: 'required',
                errorMessage: 'Email is required!',
            },
            {
                rule: 'email',
                errorMessage: 'Email is invalid!',
            },
        ]);
        // .addRequiredGroup(
        //     '#checkbox_group',
        //     'You should select at least one communication channel',
        //     {
        //         errorsContainer: '#errors-container',
        //     }
        // );                 
    return validate;
};