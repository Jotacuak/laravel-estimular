export let renderForm = () => {

    let storeButton = document.getElementById('store-button');
    let createButton = document.getElementById('create-button');
    let forms = document.querySelectorAll('.admin-form');
    let formContainer = document.getElementById('form');

    document.addEventListener("loadForm",( event =>{
        formContainer.innerHTML = event.detail.form;
    }),{once: true});

    document.addEventListener("renderFormModules",( event =>{
        renderForm();
    }),{once: true});

    if(createButton){
        
        createButton.addEventListener("click", (ev) =>{

            ev.preventDefault();

            let url = createButton.dataset.url;
    
            let sendCreateRequest = async () => {

                // document.dispatchEvent(new CustomEvent('startWait'));

                let response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET', 
                })
                .then(response => {
                    
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    formContainer.innerHTML = json.form;
                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                    // document.dispatchEvent(new CustomEvent('stopWait'));
                })
                .catch(error =>  {

                    // document.dispatchEvent(new CustomEvent('stopWait'));

                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };
    
            sendCreateRequest();
        });
    }

    if (storeButton) {

        storeButton.addEventListener("click", (ev) => {

            ev.preventDefault();

            forms.forEach(form => {
                
                let url = form.action;
                let data = new FormData(form);

                if (ckeditors != 'null'){

                    Object.entries(ckeditors).forEach(([key, value]) =>{
                        data.append(key, value.getData());
                    });
                }

                // En caso de REST API
                // let url = '';
                // let method = '';

                // if(data.get('id')){
                //     method = 'PUT';
                //     url = form.action + '/' + data.get('id');
                // }else{
                //     method = 'POST';
                //     url = form.action;
                // }
    
                let sendPostRequest = async () => {
                    
                    let request = await fetch(url, {
                        // En caso de REST API
                        // headers: {
                        //     'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        // },
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                        },
                        method: 'POST',
                        body: data
                    })
                    .then(response => {
                        
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {
 
                        formContainer.innerHTML = json.form;

                        document.dispatchEvent(new CustomEvent('loadTable', {
                            detail: {
                                table: json.table,
                            }
                        }));

                        document.dispatchEvent(new CustomEvent('renderFormModules'));
                        document.dispatchEvent(new CustomEvent('renderTableModules'));
                        // document.dispatchEvent(new CustomEvent('stopWait'));

                        document.dispatchEvent(new CustomEvent('message', {
                            detail: {
                                message: json.message,
                                type: 'success'
                            }
                        }));                   
                    })
                    .catch(error => {

                        // document.dispatchEvent(new CustomEvent('stopWait'));
                        
                        if(error.status == '422'){

                            error.json().then(jsonError => {

                                let errors = jsonError.errors;      
                                let errorMessage = '';

                                Object.keys(errors).forEach(function(key) {
                                    errorMessage += '<li>' + errors[key] + '</li>';
                                })

                                document.dispatchEvent(new CustomEvent('message', {
                                    detail: {
                                        message: errorMessage,
                                        type: 'success'
                                    }
                                }));
                            })   
                        }

                        if(error.status == '500'){
                            console.log(error);
                        }
                    });
                };        
                sendPostRequest();
            });
        });
    };
};