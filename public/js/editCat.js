//const txtCategory = document.querySelector("#txt-category");
const txtCategories = document.querySelector("#txt-categories");
const name = document.querySelector("#name");
const btnAddCategory = document.querySelector("#btn-add-category");
const description = document.querySelector("#description");
const image = document.querySelector("#image");
const addCatNotif = document.querySelector("#addCatNotif");
const CSRFToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//console.log(CSRFToken);
btnAddCategory.addEventListener('click', () => {
    
    let formData = new FormData;
    formData.append('name', name.value);
    formData.append('description', description.value);
    formData.append('image', image.files[0]);


    //always change fetch route below
    //
    const route = 'http://127.0.0.1:8000/categories';
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
        
    })  
})

function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}