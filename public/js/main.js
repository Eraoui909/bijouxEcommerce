let contact_absolute = document.querySelector(".absolute");
let show_contact_form = document.querySelector(".show-contact-form");
let close_abs         = document.querySelector(".close-abs");

function toggleContact(e) {
    e.preventDefault();
    contact_absolute.classList.toggle("active-contact");
}

show_contact_form.addEventListener("click", toggleContact);
close_abs.addEventListener("click", toggleContact);


// ######################################## newsletter begin ############################################


$(".news-subscribe").on("click",function (e) {
    e.preventDefault();

    let data = $("form.newsletter-form").serialize();

    $.ajax("/newsletter",{
        type: "post",
        data: data,
        success: function (data) {
            if(data === "ok"){
                Swal.fire(
                    'Inscrit!',
                    'Votre catégorie a été supprimée.',
                    'success'
                )
            }else if(data === "required"){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "le champs email est obligatoire pour s'inscrire!",
                })
            }else if(data === "exists"){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "cet utilisateur est deja inscrit!",
                })
            }
        },
    });

})

// ########################################  newsletter end #############################################

// ######################################## favorite begin ############################################


$(".add-to-favorite").on("click",function (e) {
    e.preventDefault();

    let id = $(this).attr("data-id");

    $.ajax("/addToFavorite/" + id,{
        type: "get",
        data: data,
        success: function (data) {
            if(data === "ok"){
                Swal.fire(
                    'Ajouté!',
                    'Ce produit a été ajouté aux favoris.',
                    'success'
                )
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Merci de ressayer plus tard!",
                })
            }
        },
    });

})

// ########################################  favorite end #############################################

