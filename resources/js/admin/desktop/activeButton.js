export let renderActiveButton = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderActiveButton();
    }),{once: true});

    let activeButton = document.getElementById('active-button');

    if(activeButton){
        activeButton.addEventListener("click", (ev) =>{

            ev.preventDefault();

            if(activeButton.value == "true"){
                activeButton.value = "false";
            }else{
                activeButton.value = "true";
            }
        });
    }
}