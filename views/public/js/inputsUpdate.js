const container = document.querySelector(".form");
const btn = document.querySelector(".btn");
btn.addEventListener("click", () => {
  const inputs = container.querySelectorAll(".hidden");
  inputs.forEach((el) => {
    el.classList.toggle("hidden");
  });
});
