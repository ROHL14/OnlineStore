const container = document.getElementById("productosBody");
const productsSection = document.getElementById("productsSection");
const pagination = document.querySelector(".pagination");
const sideCategoria = document.getElementById("sideCategoria");
const sideMarca = document.getElementById("sideMarca");
const panelProducto = document.getElementById("panelProducto");
const checkout = document.getElementById("checkout");
const btnCancelar = document.getElementById("btnCancelar");
const API = new Api();
const recordShow = 3;
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
  btnCancelar.addEventListener("click", cancelarProducto);
  checkout.addEventListener("submit", realizarCompra);
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
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="single-product">
            <div class="product-thumb">
              <img class="img-scard" src="${imagen}" alt="">
            </div>
            <div class="product-title">
              <h3>${nombre_producto}</h3>
              <h3>$${precio_producto}</h3>
            </div>
            <div class="product-scard-btns">
              
              <a href="#" class="a-scard scard-btn-round mr-2" onclick="verProducto(${id_producto})"><i class="fa fa-shopping-cart"></i></a>
            </div>
          </div>
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

function rellenarCategorias(records) {
  let html = "";
  records.forEach((item) => {
    const { id_categoria, categoria } = item;
    html += `
    <div class="form-check">
      <input class="form-check-input" type="radio" name="filtro" id="${categoria}" value="${categoria}" onchange="aplicarFiltro(event)">
      <label class="form-check-label" for="${categoria}">
        ${categoria}
      </label>
    </div>
    `;
  });
  sideCategoria.innerHTML = html;
}

function rellenarMarcas(records) {
  let html = "";
  records.forEach((item) => {
    const { id_marca, marca } = item;
    html += `
    <div class="form-check">
      <input class="form-check-input" type="radio" name="filtro" id="${marca}" value="${marca}" onchange="aplicarFiltro(event)">
      <label class="form-check-label" for="${marca}">
        ${marca}
      </label>
    </div>
    `;
  });
  sideMarca.innerHTML = html;
}

function aplicarFiltro(e) {
  objDatos.filter = e.target.value;
  createCards();
}

function verProducto(id) {
  container.classList.add("d-none");
  panelProducto.classList.remove("d-none");
  API.getOneProductoJoin(id)
    .then((data) => {
      if (data.success) {
        crearCarta(data.records[0]);
      }
    })
    .catch((error) => console.error("Error", error));
}

function crearCarta(record) {
  const {
    id_producto,
    nombre_producto,
    precio_producto,
    descripcion,
    imagen,
    categoria,
    marca,
    cantidad,
  } = record;
  document.querySelector("#marca").innerHTML = marca;
  document.querySelector("#nombre").innerHTML = nombre_producto;
  document.querySelector("#categoria").innerHTML = categoria;
  document.querySelector("#precio").innerHTML = `$${precio_producto}`;
  document.querySelector("#descripcion").innerHTML = descripcion;
  divFoto.innerHTML = `<img src='${imagen}' class='h-100 w-100' style='object-fit:contain;'>`;
  if (cantidad > 0) {
    document.querySelector("#cantidad").innerHTML = " En existencias";
  } else {
    document.querySelector("#cantidad").innerHTML = " Producto agotado";
  }
  document.querySelector(
    "#buttonSection"
  ).innerHTML = `<button type="button" onclick="abrirFormulario(${id_producto})">Comprar</button>`;
}

function cancelarProducto() {
  container.classList.remove("d-none");
  panelProducto.classList.add("d-none");
  cargarDatos();
}

function abrirFormulario(id) {
  panelProducto.classList.add("d-none");
  checkout.classList.remove("d-none");
  API.getOneProductoJoin(id)
    .then((data) => {
      if (data.success) {
        console.log(data);
      }
    })
    .catch((error) => console.error("Error", error));
}

function cerrarFormulario() {
  panelProducto.classList.remove("d-none");
  checkout.classList.add("d-none");
  cancelarProducto();
}

function realizarCompra(e) {
  e.preventDefault();
  /*const formData = new FormData(checkout);
  API.saveDetalleCompra(formData)
    .then((data) => {
      if (data.success) {
        cerrarFormulario();
        cargarDatos();
      }
    })
    .catch((error) => {
      console.error("Error", error);
    });*/
  cerrarFormulario();
}
