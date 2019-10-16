const txtCategory = document.querySelector("#txt-category");
const txtCategories = document.querySelector("#txt-categories");
const btnAddCategory = document.querySelector("#btn-add-category");
const addCatNotif = document.querySelector("#addCatNotif");
const CSRFToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//console.log(CSRFToken);
btnAddCategory.addEventListener('click', () => {
    
    let formData = new FormData;
    formData.append('category', txtCategory.value);

    //console.log(formData.get('category'));
    const route = 'http://localhost:8000/categories';
    const payload = {
        method: 'post',
        body: formData,
        headers: { 
            'X-CSRF-TOKEN' : CSRFToken 
        }
    };

    fetch(route, payload)
    .then((res) => {
        //console.log(res.status);
        if(res.status === 201){
            addCatNotif.setAttribute('class', 'alert alert-success');
            return res.json();
        }else{
            addCatNotif.setAttribute('class', 'alert alert-danger');
            return res.json();
        }
    })
    .then((data) => {
        if(data.data){
            txtCategories.innerHTML += data.data;    
        }        
        addCatNotif.innerHTML = data.message;
        console.log(data.dupe);
    })
})