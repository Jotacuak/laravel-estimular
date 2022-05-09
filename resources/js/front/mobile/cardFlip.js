export let renderCard = () => {

    let swichBtn = document.getElementById("swich-btn");
    let cards = document.querySelectorAll(".card-container");

    document.addEventListener("loadSection",( event =>{
        
        if(event.detail.section.includes('home')){
            renderCard();
        }
    }));

    cards.forEach(card => {      

        swichBtn.addEventListener("click", () =>{

            card.classList.toggle("flip");

        });        
    });
};