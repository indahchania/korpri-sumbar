// hover class to selected list item

let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => {
    item.addEventListener("mouseover", activeLink);
    
    item.addEventListener("mouseout", function() {
        this.classList.remove("hovered");
    });
});

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Mark the active page based on URL
const listItems = document.querySelectorAll(".navigation ul li a");
const currentURL = window.location.pathname;

listItems.forEach(item => {
    if (item.getAttribute("href") === currentURL) {
        item.parentElement.classList.add("active-page"); // Add active class
    }
});

//menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}