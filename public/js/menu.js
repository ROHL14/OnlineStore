/*const navCategoria = document.getElementById("navCat");
const navMarca = document.getElementById("navMarca");
const API = new Api();

const marcas = {
  records: [],
};
const categorias = {
  records: [],
};

// Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatosNav);
}

function cargarDatosNav() {
  API.loadCategoriasData()
    .then((data) => {
      rellenarCategorias(data.records);
      return API.loadMarcasData();
    })
    .then((data) => {
      rellenarMarcas(data.records);
    })
    .catch((error) => {
      console.error("Error msg:", error);
    });
}

function rellenarCategorias(records) {
  let html = "";
  records.forEach((item) => {
    const { id_categoria, categoria } = item;
    html += `
    <a class="dropdown-item" href="/OnlineStore/categorias">${categoria}</a>
    <div class="dropdown-divider"></div>
    `;
  });
  navCategoria.innerHTML = html;
}

function rellenarMarcas(records) {
  let html = "";
  records.forEach((item) => {
    const { id_marca, marca } = item;
    html += `
    <a class="dropdown-item" href="/OnlineStore/marcas">${marca}</a>
    <div class="dropdown-divider"></div>
    `;
  });
  navMarca.innerHTML = html;
}
*/
