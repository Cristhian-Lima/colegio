const url = document.querySelector(".main").dataset.url;

const nivel = document.getElementById("nivel");

// convierte a mayuscula la primera letra
const toCapitalice = (cadena) =>
  cadena.charAt(0).toUpperCase() + cadena.slice(1);

const addOptions = (elements, func) => {
  fetch(`${url}api/${elements}`)
    .then((res) => (res.ok ? Promise.resolve(res) : Promise.reject(res)))
    .then((res) => res.json())
    .then((res) => {
      res.forEach((e) => func(e));
    });
};

const getNiveles = () => {
  addOptions("niveles", (e) => {
    let option = document.createElement("OPTION");
    let nombre = toCapitalice(e.nombre);

    option.value = e.cod;
    option.textContent = nombre;
    nivel.appendChild(option);
  });
};

const getCurso = () => {
  const curso = document.getElementById("curso");
  addOptions("nrocursos", (e) => {
    let option = document.createElement("OPTION");
    if (e.nro != 0) {
      option.value = e.nro;
      option.textContent = e.nombre;
      curso.appendChild(option);
    }
  });
};

const getParalelo = () => {
  const paralelo = document.getElementById("paralelo");
  addOptions("paralelos", (el) => {
    let option = document.createElement("option");
    option.value = el.paralelo;
    option.textContent = el.paralelo;

    paralelo.appendChild(option);
  });
};

nivel.addEventListener("click", function (e) {
  if (e.target && e.target.tagName === "OPTION") {
    if (this.value === "n-in") {
      curso.setAttribute("disabled", "true");
    } else {
      curso.removeAttribute("disabled");
    }
  }
});

const form = document.getElementById("form");

const init = () => {
  getNiveles();
  getCurso();
  getParalelo();
};

init();
