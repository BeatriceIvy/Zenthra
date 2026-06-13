// TOP CATEGORIES
const moreCategories = document.getElementById("more-categories");
const btn = document.getElementById("toogle-categories");
const lessCategories = document.getElementById("less-categories");

moreCategories.style.display = "none";

btn.addEventListener("click", function () {
    if (moreCategories.style.display === "none") {
        moreCategories.style.display = "block";
        btn.innerHTML = 'LESS VIEW <i class="fas fa-chevron-down ml-icon"></i>';
    } else {
        moreCategories.style.display = "none";
        lessCategories.style.marginBottom = "25px";
        btn.innerHTML =
            'VIEW ALL CATEGORIES <i class="fas fa-chevron-right ml-icon"></i>';
    }
});

// AUTH DROPDOWN
    const profileBtn = document.querySelector('.profile-btn');
    const dropdownContent = document.querySelector('.dropdown-content');

    profileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownContent.classList.toggle('show');
    });

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function() {
        dropdownContent.classList.remove('show');
    });