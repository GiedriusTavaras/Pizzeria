require('./bootstrap');



// if (document.querySelector('#add-variation')) {
//     document.querySelector('#add-variation').addEventListener('click', () => {
//         axios.post(createPizzaVariation, {})
//             .then(function(response) {


//                 const e = document.createElement('section');
//                 e.innerHTML = response.data.html;
//                 document.querySelector('#variations').appendChild(e);



//             })
//             .catch(function(error) {
//                 console.log(error);
//             });
//     })
// }

// if (document.querySelector('#variations')) {
//     document.querySelectorAll('.remove').forEach( r => {
//         r.addEventListener("click", e => {
            
//             document.querySelector('#'+e.target.getAttribute('for')).value = 1;
//             r.closest('section').style.display = 'none';
//         })
//     })
// }


if (document.querySelector('.product')) {

    document.querySelectorAll('.product button').forEach(b => {

        b.addEventListener("click", () => {

            axios.post(addToCartApi, {
                    id: b.value,
                    count: b.closest(".product").querySelector('[type=number]').value
                })
                .then(function(response) {
                    document.querySelector('.cart').innerHTML = response.data.html;
                    console.log(response);
                })

        })
    })

}

if (document.querySelector('.modalas')) {

    const modal = document.querySelector(".modal-bin");

    document.querySelectorAll('.modalas h3').forEach(p => {

        p.addEventListener("click", () => {
            modal.style.zIndex = 100;
         });
    })
}

if (document.querySelector('.modal-container')) {

    const modal = document.querySelector(".modal-bin");

    document.querySelectorAll('.modal-container .modal-close').forEach(p => {

        p.addEventListener("click", () => {
            modal.style.zIndex = -100;
         });
    })
}










     