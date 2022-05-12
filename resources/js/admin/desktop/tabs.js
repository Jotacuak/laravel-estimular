export let renderTabs = () => {

    document.addEventListener("renderFormModules",( event =>{
        renderTabs();
    }));

    let tabs = document.querySelectorAll(".tabslinks");
    let contents = document.querySelectorAll(".tabcontent");
    
    tabs.forEach(tab => {
    
        tab.addEventListener("click", (ev) => {

            ev.preventDefault();
    
            tabs.forEach(tab => {
                tab.classList.remove("active");
            });
    
            contents.forEach(content => {
                content.classList.remove("active");
    
                if (tab.dataset.tab == content.dataset.content) {
                    tab.classList.add("active");
                    content.classList.add("active");
                };
            });
        });
    });
};