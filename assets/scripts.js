// Minimal JS for nav toggle and small interactions
document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.getElementById("nav-toggle");
  const nav = document.getElementById("main-nav");

  navToggle.addEventListener("click", function () {
    const expanded = this.getAttribute("aria-expanded") === "true" || false;
    this.setAttribute("aria-expanded", !expanded);
    nav.classList.toggle("open");
  });
});


document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("contactForm");

  form.addEventListener("submit", function(e) {
    let valid = true;
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const message = form.message.value.trim();

    if (name.length < 2) {
      alert("Name must be at least 2 characters.");
      valid = false;
    }
    if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
      alert("Please enter a valid email.");
      valid = false;
    }
    if (message.length < 10) {
      alert("Message must be at least 10 characters.");
      valid = false;
    }

    if (!valid) e.preventDefault();
  });
});


// document.addEventListener("DOMContentLoaded", () => {
//   const toggle = document.getElementById("nav-toggle");
//   const nav = document.getElementById("main-nav");

//   toggle.addEventListener("click", () => {
//     const expanded = toggle.getAttribute("aria-expanded") === "true";
//     toggle.setAttribute("aria-expanded", !expanded);
//     nav.classList.toggle("open");
//   });
// });
