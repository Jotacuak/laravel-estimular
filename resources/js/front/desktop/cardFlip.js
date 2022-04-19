export let flipCard = () => {

    let swichBtn = document.getElementById("swich-btn");
    let cards = document.querySelectorAll(".card-container");

    cards.forEach(card => {      

        swichBtn.addEventListener("click", () =>{

            card.classList.toggle("flip");

        });        
    });
};