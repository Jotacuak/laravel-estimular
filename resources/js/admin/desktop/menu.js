export let renderMenu = () => {
    
    let formContainer = document.getElementById('form');
    let tableContainer = document.getElementById("table");
    let menuButtons = document.querySelectorAll('.menu-item');
    let hamburger = document.getElementById("collapse-button");
    let overlay = document.getElementById("overlay");

    hamburger.addEventListener("click" , () => {
        hamburger.classList.toggle("active");
        overlay.classList.toggle("active");        
    });

    menuButtons.forEach(menuButton => {

        menuButton.addEventListener('click', () => {
                
            let pageTitle =  document.querySelector('.topbar-element-title h3');
            let section = menuButton.dataset.section;
            pageTitle.innerHTML = section;

            let url = menuButton.dataset.url;
            let currentSection = document.querySelector('.page-section').id;
            sessionStorage.setItem('lastSection', currentSection);

            let sendIndexRequest = async () => {
    
                let response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET'
                })
                .then(response => {

                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    console.log(json);
                    window.history.pushState('', '', url);
                    formContainer.innerHTML = json.form;
                    tableContainer.innerHTML = json.table;

                    hamburger.classList.toggle("active");
                    overlay.classList.toggle("active");  

                    document.dispatchEvent(new CustomEvent(section));
                    document.dispatchEvent(new CustomEvent("renderFormModules"));
                    document.dispatchEvent(new CustomEvent("renderTableModules"));
                })
                .catch ( error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    }

                });
            }
            sendIndexRequest();
        });
    });
    
    window.addEventListener('popstate', event => {

        let url = window.location.href;

        let sendIndexRequest = async () => {

            let response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                method: 'GET'
            })
            .then(response => {

                if (!response.ok) throw response;

                return response.json();
            })
            .then(json => {

                mainContent.innerHTML = json.content;

                document.dispatchEvent(new CustomEvent('loadSection', {
                    detail: {
                        section: sessionStorage.getItem('lastSection')
                    }
                }));

                let currentSection = document.querySelector('.page-section').id;
                sessionStorage.setItem('lastSection', currentSection);
            })
            .catch ( error =>  {

                if(error.status == '500'){
                    console.log(error);
                }

            });
        }

        sendIndexRequest();
        
    });
}
