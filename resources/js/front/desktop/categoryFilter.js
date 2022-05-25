export let renderCategoryFilter = () => {

    let categoryButtons = document.querySelectorAll('.category-button');
    let blogContainer = document.querySelector('.blog-container');
    
    categoryButtons.forEach(categoryButton => {
        
        categoryButton.addEventListener("click",() =>{

            let url = categoryButton.dataset.url;

            let sendCreateRequest = async () => {

                let response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    method: 'GET', 
                })
                .then(response => {
                    
                    if (!response.ok) throw response;

                    return response.json();
                })
                .then(json => {

                    blogContainer.innerHTML = json.content;
                })
                .catch(error =>  {

                    if(error.status == '500'){
                        console.log(error);
                    };
                });
            };
    
            sendCreateRequest();

        })
    
    });

}