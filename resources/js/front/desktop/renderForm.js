import {validador} from './validador.js';

export let renderForm = () => {

    let buttonSubmit = document.querySelector('.submit-button');
    let forms = document.querySelectorAll('.front-form')  
    
        
    if (buttonSubmit) {

        buttonSubmit.addEventListener("click", () => {

            forms.forEach(form => {

                let validate = validador(form);

                validate.onSuccess ((ev) => {
                
                    ev.preventDefault();
                    let formData = new FormData(form);

                    // if (editor != 'null'){

                    //     Object.entries(editor).forEach(([key, value]) =>{
                    //         formData.append(key, value.getData());
                    //     });
                    // }

                    for (let pair of formData.entries()){
                        console.log(pair[0] + ', ' + pair[1])
                    };                
                });

                validate.onFail(() => {   
                });                
            });
        });
    };   
};