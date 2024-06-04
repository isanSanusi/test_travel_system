document.addEventListener("DOMContentLoaded", (event) => {
  const links = document.querySelectorAll(".sidebar ul li a");
  links.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const page = this.getAttribute("href").split("=")[1];
      fetch(page + ".php")
        .then((response) => response.text())
        .then((data) => {
          document.querySelector(".main-content").innerHTML = data;
        });
    });
  });
});
