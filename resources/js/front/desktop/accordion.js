export let accordionRender = () => {

    let accordionBtns = document.querySelectorAll('.faqs-element-question');

    accordionBtns.forEach(accordionBtn => {

        accordionBtn.addEventListener("click", () => {
            let answer = accordionBtn.closest('.faqs-element').querySelector('.faqs-element-answer');
            answer.classList.toggle("active");
        })
    });
};