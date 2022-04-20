export let renderMenu = () => {
    
    let hamburger = document.getElementById("collapse-button");
    let overlay = document.getElementById("overlay");
    
    hamburger.addEventListener("click" , () => {
        hamburger.classList.toggle("active");
        overlay.classList.toggle("active");        
    });
};