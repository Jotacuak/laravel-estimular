export let renderModalImage = () => {

    let chooseFiles = document.querySelectorAll('.choose-file');
    let deleteFiles = document.querySelectorAll('.image-delete');
    
    chooseFiles.forEach(chooseFile => {

        chooseFile.addEventListener("change", () => {

            const files = chooseFile.files[0];
    
            if(files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
    
                fileReader.addEventListener("load", () => {
                    chooseFile.closest('.image-selector').querySelector('.image-load').classList.add('hidden');
                    chooseFile.closest('.image-selector').querySelector('.image-delete').classList.add('active');
                    chooseFile.closest('.image-selector').querySelector('.image').src = fileReader.result;
                });    
            }
        });
    });

    deleteFiles.forEach(deleteFile => {

        deleteFile.addEventListener("click", (event) => {       
            deleteFile.closest('.image-selector').querySelector('.image-load').classList.remove('hidden');         
            deleteFile.closest('.image-selector').querySelector('.image-delete').classList.remove('active');
            deleteFile.closest('.image-selector').querySelector('.image').src = '';
            event.preventDefault();
        });
    });
}