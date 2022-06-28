export let renderActiveButton = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderActiveButton();
    }),{once: true});

    let onOffSwitch = document.querySelector('.onoffswitch');
    let activeButton = document.getElementById('activebutton');

    if(onOffSwitch ){
        onOffSwitch.addEventListener("click", (ev) =>{

            ev.preventDefault();

            if(activeButton.value == "true"){
                activeButton.value = "false";
                activeButton.checked = false;
            }else{
                activeButton.value = "true";
                activeButton.checked = true;
            }
        });
    }
}