const txtCategory = document.querySelector("#txt-category");
const txtCategories = document.querySelector("#txt-categories");
const btnAddCategory = document.querySelector("#btn-add-category");
const CSRFToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
console.log("hello");
btnAddCategory.addEventListener('click', () => {
    let formData = new FormData
    formData.append('category', txtCategory.value)

    const route = 'http://localhost:8000/categories'
    const payload = {
        method: 'post',
        body: formData,
        headers: { 
            'X-CSRF-TOKEN' : CSRFToken 
        }
    }

    fetch(route, payload)
    .then((res) => {
        return res.text()
    })
    .then((data) => {
        txtCategories.innerHTML += data
    })
})