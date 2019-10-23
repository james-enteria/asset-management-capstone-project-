let viewRequest = document.querySelectorAll('.view-request');

let assetTitle = document.querySelector('#assetTitle');

let assetInput = document.querySelector('#assetInput');

viewRequest.forEach((button)=>{

    button.addEventListener("click", ()=>{

        var id = button.getAttribute('data-id');

        var name = button.getAttribute('data-name');

        //console.log(id, name);

        assetTitle.innerHTML = 'Select a date for ' + name;

        

    })

})