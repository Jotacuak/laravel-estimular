import { reduce } from "lodash";

export let adminForm = () => {

    let saveButton = document.getElementById('save-button');
    let refreshButton = document.getElementById('refresh-button');
    let activeButton = document.getElementById('active-button');
    let editButtons = document.querySelectorAll('#edit-button');
    let deleteButtons = document.querySelectorAll('#delete-button');
    let forms = document.querySelectorAll('.admin-form');
    let formContainer = document.getElementById('form');
    let tableContainer = document.getElementById('table');
    let modalDelete = document.getElementById('modal-delete');
    let deleteConfirm = document.getElementById('delete-confirm');
    let deleteCancel = document.getElementById('delete-cancel');


    if (saveButton) {

        saveButton.addEventListener("click", (ev) => {

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

                        console.log(response);
                        
                        if (!response.ok) throw response;

                        return response.json();
                    })
                    .then(json => {

                        tableContainer.innerHTML = json.table;    
                        formContainer.innerHTML = json.form;

                        console.log(json.table);

                        if(json.message){
                            document.dispatchEvent(new CustomEvent('message', {
                                detail: {
                                    message: json.message,
                                    type: 'success'
                                }
                            }));
                        }
                    })
                    .catch(error => {
                        
                        if(error.status == '422'){

                            error.json().then(jsonError => {

                                console.log(jsonError);
                                let errors = jsonError.errors;  
                                // let errorsContainer = document.getElementById('crud__form-errors');      
                                // errorsContainer.classList.add('active');

                                Object.keys(errors).forEach( (key) => {
                                    console.log(errors[key]);
                                    // let errorMessage = document.createElement('li');
                                    // errorMessage.textContent = errors[key];
                                    // errorsContainer.insertAdjacentElement('beforeend',errorMessage);
                                    // document.querySelector(`[name=${key}]`).classList.add('error');
                                })
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
    
    if(editButtons){

        editButtons.forEach(editButton => {

            editButton.addEventListener("click", (ev) => {

                ev.preventDefault();
    
                let url = editButton.dataset.url;
    
                let sendEditRequest = async () => {

                    try {
                        await axios.get(url).then(response => {
                            form.innerHTML = response.data.form;
                            adminForm();
                        });
                        
                    } catch (error) {
                        console.error(error);
                    }
                };
    
                sendEditRequest();
            });
        });
    }

    if(refreshButton){
        
        refreshButton.addEventListener("click", () =>{
            document.querySelector('.admin-form').reset();
        });
    }

    if(activeButton){
        activeButton.addEventListener("click", () =>{
            if(activeButton.value == "true"){
                activeButton.value = "false";
            }else{
                activeButton.value = "true";
            }
        });
    }

    if(deleteButtons){

        deleteButtons.forEach(deleteButton => {

            deleteButton.addEventListener("click", () => {
    
                let url = deleteButton.dataset.url;
                deleteConfirm.dataset.url = url;
                modalDelete.classList.add('modal-active');
                // startOverlay();
            });
        });
    
        deleteCancel.addEventListener("click", () => {
            modalDelete.classList.remove('modal-active');
            stopWait();
        });
    
        deleteConfirm.addEventListener("click", () => {
    
            let url = deleteConfirm.dataset.url;
        
            let sendDeleteRequest = async () => {
    
                try {
                    await axios.delete(url).then(response => {
                        
                        if(response.data.table){
                            table.innerHTML = response.data.table;
                        }

                        form.innerHTML = response.data.form;
                        modalDelete.classList.remove('modal-active');
                        adminForm();
    
                        stopWait();
                        showMessage('success', response.data.message);
                    });
                    
                } catch (error) {
                    stopWait();
                    console.error(error);
                }
            };
    
            sendDeleteRequest();
        });    
    }   
    // renderPagination();
};