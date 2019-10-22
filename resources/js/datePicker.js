let getThis = document.querySelectorAll('.getThis');

let assetTitle = document.querySelector('#assetTitle');

let assetInput = document.querySelector('#assetInput');

getThis.forEach((button)=>{

    button.addEventListener("click", ()=>{

        var id = button.getAttribute('data-id');

        var name = button.getAttribute('data-name');

        //console.log(id, name);

        assetTitle.innerHTML = 'Select a date for ' + name;

        assetInput.value = id;

    })

})