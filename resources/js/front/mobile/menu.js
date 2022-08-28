export let renderMenu = () => {
    
    let hamburger = document.getElementById("collapse-button");
    let overlay = document.getElementById("overlay");
    
    if(hamburger) {
        hamburger.addEventListener("click" , () => {
            hamburger.classList.toggle("active");
            overlay.classList.toggle("active");        
        });
    }

    let menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach( menuItem => {

        menuItem.addEventListener("click",() => {

            let main = document.getElementById('main-content');
            let url = menuItem.dataset.url;
            let section = menuItem.dataset.section;
            let currentSection = document.querySelector('.page-section').id;
            localStorage.setItem('lastSection', currentSection);

            let sendPageRequest = async () => {

                try {
                    await axios.get(url).then(response => {
                        window.history.pushState('', '', url);
                        main.innerHTML = response.data.content;

                        document.dispatchEvent(new CustomEvent('loadSection', {
                            detail: {
                                section: section
                            }
                        }));
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };

            sendPageRequest();
        
        });
    });

    window.addEventListener('popstate', event => {

        let mainContent = document.getElementById('main-content');
        let url = window.location.href;

        let sendPageRequest = async () => {
    
        
    
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
                mainContent.innerHTML = json.content;
                document.dispatchEvent(new CustomEvent('loadSection', {
                    detail: {
                        section: json.section
                    }
                }));

                let currentSection = document.querySelector('.page-section').id;
                localStorage.setItem('lastSection', currentSection);

            }).catch(error => {
                console.error(error);
            })

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
                
        };
    
        sendPageRequest();
        
    });
    
};