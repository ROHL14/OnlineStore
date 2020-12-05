const productsSection = document.getElementById("productsSection");
const pagination = document.querySelector(".pagination");
const API = new Api();
const recordShow = 4;
const objDatos = {
  records: [],
  recordsFilter: [],
  currentPage: 1,
  filter: "",
};

// Eventos
eventListeners();

function eventListeners() {
  document.addEventListener("DOMContentLoaded", cargarDatos);
}

function cargarDatos() {
  API.loadProductos()
    .then((data) => {
      if (data.success) {
        objDatos.records = data.records;
        objDatos.currentPage = 1;
        createCards();
        return API.loadCategorias();
      } else {
        mensaje.textContent = data.msj;
      }
    })
    .then((data) => {
      rellenarCategorias(data.records);
      return API.loadMarcas();
    })
    .then((data) => {
      rellenarMarcas(data.records);
    })
    .catch((error) => {
      console.error("Error msg:", error);
    });
}

function createCards() {
  if (objDatos.filter === "") {
    objDatos.recordsFilter = objDatos.records.map((item) => item);
  } else {
    objDatos.recordsFilter = objDatos.records.filter((item) => {
      const { nombre_producto, categoria, marca } = item;
      if (
        nombre_producto.toUpperCase().search(objDatos.filter.toUpperCase()) !=
          -1 ||
        categoria.toUpperCase().search(objDatos.filter.toUpperCase()) != -1 ||
        marca.toUpperCase().search(objDatos.filter.toUpperCase()) != -1
      ) {
        return item;
      }
    });
  }

  const recordIni = objDatos.currentPage * recordShow - recordShow;
  const recordFin = recordIni + recordShow - 1;

  let html = "";

  objDatos.recordsFilter.forEach((item, index) => {
    if (index >= recordIni && index <= recordFin) {
      const {
        id_producto,
        nombre_producto,
        precio_producto,
        descripcion,
        imagen,
        categoria,
        marca,
      } = item;

      html += `
        <div class="card">
          <img src="${imagen}" alt="" />
          <a class="product-link" href="/OnlineStore/productos/${id_producto}">
            <h1>${nombre_producto}</h1>
          </a>
          <p class="price">$${precio_producto}</p>
          <p>${descripcion}</p>
          <p>${marca}</p>
          <p>${categoria}</p>
          <p><button>Agregar al carro</button></p>
        </div>
        `;
    }
  });
  productsSection.innerHTML = html;
  crearPagination();
}

function crearPagination() {
  while (pagination.firstElementChild) {
    pagination.removeChild(pagination.firstElementChild);
  }

  // Anterior
  const elAnterior = document.createElement("li");
  elAnterior.classList.add("page-item");
  elAnterior.innerHTML = `<a class='page-link' href='#'>Anterior</a>`;
  elAnterior.onclick = () => {
    objDatos.currentPage =
      objDatos.currentPage == 1 ? 1 : --objDatos.currentPage;
    createCards();
  };
  pagination.append(elAnterior);

  // Numerales
  const totalPage = Math.ceil(objDatos.recordsFilter.length / recordShow);
  for (let i = 1; i <= totalPage; i++) {
    const el = document.createElement("li");
    el.classList.add("page-item");
    el.innerHTML = `<a class='page-link' href='#'>${i}</a>`;
    el.onclick = () => {
      objDatos.currentPage = i;
      createCards();
    };
    pagination.append(el);
  }

  // Siguiente
  const elSiguiente = document.createElement("li");
  elSiguiente.classList.add("page-item");
  elSiguiente.innerHTML = `<a class='page-link' href='#'>Siguiente</a>`;
  elSiguiente.onclick = () => {
    objDatos.currentPage =
      objDatos.currentPage == totalPage ? totalPage : ++objDatos.currentPage;
    createCards();
  };
  pagination.append(elSiguiente);
}
