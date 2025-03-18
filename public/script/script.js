document.querySelector(".toggleP").addEventListener("click", function () {
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("shrink");
});

document.querySelectorAll(".dropdown > a").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        this.parentElement.classList.toggle("active");
    });
});

document.querySelectorAll(".sidebar a").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelectorAll(".sidebar a").forEach((link) => {
            link.classList.remove("active");
        });
        this.classList.add("active");
    });
});
