const container = document.querySelector(".form");
const btn = document.querySelector(".btn");

const showForm = () => {
  btn.addEventListener("click", () => {
    const inputs = container.querySelectorAll(".hidden");
    inputs.forEach((el) => {
      el.classList.toggle("hidden");
    });
  });
};

const showPass = () => {
  const icoShow = container.querySelector(".ico");
  const inputPass = container.querySelector(".inputPass");

  icoShow.addEventListener("click", () => {
    let icono = icoShow.childNodes[0];
    if (icono.classList[1] === "fa-eye") {
      icono.classList.replace("fa-eye", "fa-eye-slash");
      inputPass.attributes.type.value = "text";
    } else if (icono.classList[1] === "fa-eye-slash") {
      icono.classList.replace("fa-eye-slash", "fa-eye");
      inputPass.attributes.type.value = "password";
    }
  });
};
showForm();
showPass();
