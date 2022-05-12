export let renderMenu = () => {
    
    let hamburger = document.getElementById("collapse-button");
    let overlay = document.getElementById("overlay");
    let menuItems = document.querySelectorAll('.menu-item');
    // let main = document.getElementById('main-content');
    // let section = menuItem.dataset.section;
    let currentSection = document.querySelector('.admin-table').id;
    localStorage.setItem('lastSection', currentSection);

    hamburger.addEventListener("click" , () => {
        hamburger.classList.toggle("active");
        overlay.classList.toggle("active");        
    });

    menuItems.forEach( menuItem => {
    
        menuItem.addEventListener("click", () => {
    
            let url = menuItem.dataset.url;
    
            let sendEditRequest = async () => {
    
                let response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                    },
                    method: 'GET',
                })
                .then(response => {
                
                    if (!response.ok) throw response;
    
                    return response.json();
                })
                .then(json => {
    
                    sectionTitle.textContent = menuItem.textContent;
                    hamburger.classList.remove("active");
                    overlay.classList.remove("active");
    
                    window.history.pushState('', '', url);
    
                    document.dispatchEvent(new CustomEvent('loadForm', {
                        detail: {
                            form: json.form,
                        }
                    }));
    
                    document.dispatchEvent(new CustomEvent('loadTable', {
                        detail: {
                            table: json.table,
                        }
                    }));
    
                    document.dispatchEvent(new CustomEvent('renderTableModules'));
                    document.dispatchEvent(new CustomEvent('renderFormModules'));
                })
                .catch ( error =>  {
    
                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };
    
            sendEditRequest();
        });
    });

    window.addEventListener('popstate', event => {

        let mainContent = document.getElementById('main-content');
        let url = window.location.href;

        let sendPageRequest = async () => {
    
            try {
    
                axios.get(url).then(response => {

                    mainContent.innerHTML = response.data.content;

                    document.dispatchEvent(new CustomEvent('loadSection', {
                        detail: {
                            section: localStorage.getItem('lastSection')
                        }
                    }));

                    let currentSection = document.querySelector('.page-section').id;
                    localStorage.setItem('lastSection', currentSection);
                });
                
            } catch (error) {
    
            }
        };
    
        sendPageRequest();
        
    });
};