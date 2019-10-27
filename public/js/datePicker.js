let getThis = document.querySelectorAll('.getThis');

let categoryTitle = document.querySelector('#categoryTitle');

let catId = document.querySelector('#catId');

getThis.forEach((button)=>{

    button.addEventListener("click", ()=>{

        var id = button.getAttribute('data-id');

        var name = button.getAttribute('data-name');

        //console.log(id, name);

        categoryTitle.innerHTML = 'Select a date for ' + name;

        catId.value = id;

    })

})