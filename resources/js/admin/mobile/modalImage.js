export let renderModalImage = () => {

    let modalImageStoreButton = document.getElementById('modal-image-store-button');
    let modalImageDeleteButton = document.getElementById('modal-image-delete-button');
    
    document.addEventListener("openModal",(event =>{
    
        let modal = document.getElementById('upload-image-modal');
    
        modal.classList.add('modal-active');
        // document.dispatchEvent(new CustomEvent('startOverlay'));
    
    }));
    
    document.addEventListener("updateImageModal",(image =>{
    
        let imageContainer = document.getElementById('modal-image-original');
        let imageForm = document.getElementById('image-form');
    
        imageForm.reset();
    
        if(image.path){
    
            if(image.entity_id){

                image.imageId = image.id; 
                imageContainer.src = '../storage/' + image.path;

            }else{

                imageContainer.src = image.path;

            }
    
        }else{
    
            imageContainer.src = image.dataset.path;
            image = image.dataset;

        }
     
        for (var [key, val] of Object.entries(image)) {
    
            let input = imageForm.elements[key];
            
            if(input){
    
                switch(input.type) {
                    case 'checkbox': input.checked = !!val; break;
                    default:         input.value = val;     break;
                }

            }

        }
    
    }));
        
    // modalImageStoreButton.addEventListener("click", (e) => {
             
    //     let modal = document.getElementById('upload-image-modal');
    //     let imageForm = document.getElementById('image-form');
    //     let url = imageForm.action;
    //     let data = new FormData(imageForm);
    //     let temporalId = document.getElementById('modal-image-temporal-id');
    //     let id = document.getElementById('modal-image-id');
    
    //     let sendImagePostRequest = async () => {

    //         let request = await fetch(url,data, {

    //             headers: {
    //                 'Accept': 'application/json',
    //                 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
    //             },
    //             method: 'POST',
    //             body: data

    //         })
    //         .then(response => {

    //             modal.classList.remove('modal-active');
    //             temporalId.value = "";
    //             id.value = "";
    //             imageForm.reset();
    //             // document.dispatchEvent(new CustomEvent('stopWait'));

    //             document.dispatchEvent(new CustomEvent('message', {

    //                 detail: {
    //                     message: json.message,
    //                     type: 'success'
    //                 }

    //             }));

    //         })

    //         .catch(error =>{
    //             console.log(error);
    //         })  

    //     };
    
    //     sendImagePostRequest();
        
    // });
    
    // modalImageDeleteButton.addEventListener("click", (e) => {
             
    //     let url = modalImageDeleteButton.dataset.route;
    //     let modal = document.getElementById('upload-image-modal');
    //     let imageForm = document.getElementById('image-form');
    //     let temporalId = document.getElementById('modal-image-temporal-id');
    //     let id = document.getElementById('modal-image-id');
    
    //     if(id.value){
    
    //         let sendImageDeleteRequest = async () => {

    //             let response = await fetch(url, {

    //                 headers: {
    //                     'X-Requested-With': 'XMLHttpRequest',
    //                     'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
    //                 },
    //                 method: 'DELETE', 
    //                 params: {
    //                     'image': id.value
    //                 },

    //             })
    //             .then(response => {

    //                 document.dispatchEvent(new CustomEvent('deleteThumnail', {

    //                     detail: {
    //                         response: response.data.imageId
    //                     }

    //                 }))
                    
    //                 document.dispatchEvent(new CustomEvent('message', {

    //                     detail: {
    //                         message: json.message,
    //                         type: 'success'
    //                     }

    //                 }));

    //             })
    //             .catch(error => {

    //                 console.log(error)

    //             });

    //         };
        
    //         sendImageDeleteRequest();
    
    //     }else{
    
    //         document.dispatchEvent(new CustomEvent('deleteThumnail', {

    //             detail: {
    //                 temporalId: temporalId.value
    //             }

    //         }))
            
    //     }
    
    //     temporalId.value = "";
    //     id.value = "";
    //     imageForm.reset();
    //     modal.classList.remove('modal-active');
    //     // document.dispatchEvent(new CustomEvent('stopWait'));
    // });
};