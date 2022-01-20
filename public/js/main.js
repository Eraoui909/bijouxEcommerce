let contact_absolute = document.querySelector(".absolute");
let show_contact_form = document.querySelector(".show-contact-form");
let close_abs         = document.querySelector(".close-abs");

function toggleContact(e) {
    e.preventDefault();
    contact_absolute.classList.toggle("active-contact");
}

show_contact_form.addEventListener("click", toggleContact);
close_abs.addEventListener("click", toggleContact);

