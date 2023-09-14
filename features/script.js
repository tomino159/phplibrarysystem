document.addEventListener("DOMContentLoaded", function () {
  const formular = document.getElementById("book-form");
  const zoznam = document.getElementById("book-list");

  formular.addEventListener("submit", function (e) {
    e.preventDefault();
    const nazov = document.getElementById("book-title").value;
    const autor = document.getElementById("book-author").value;

    // Validácia a pridanie novej knihy do zoznamu
    if (nazov && autor) {
      pridajKnihu(nazov, autor);
      formular.reset();
    } else {
      alert("Prosím, vyplňte názov a autora knihy.");
    }
  });

  function pridajKnihu(nazov, autor) {
    const li = document.createElement("li");
    li.textContent = `${nazov} by ${autor}`;
    zoznam.appendChild(li);
  }
});
