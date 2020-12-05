<<<<<<< HEAD
//Variables y Selectores
const tableContent=document.querySelector("#contentTable table tbody");
const pagination=document.querySelector(".pagination");
const searchText=document.querySelector("#txtSearch");
const btnNew=document.querySelector("#btnAgregar");
const panelDatos=document.querySelector("#panelDatos");
const panelFormulario=document.querySelector("#panelFormulario");
const divFoto=document.querySelector("#divFoto");
const divFotoM=document.querySelector("#divFotoM");
const divFotoG=document.querySelector("#divFotoG");
const idCate=document.querySelector("#id_cate");
const idAutor=document.querySelector("#id_autor");
const inputFoto=document.querySelector("#foto");
const inputFotoM=document.querySelector("#fotom");
const inputFotoG=document.querySelector("#fotog");
const miForm=document.querySelector("#miform");
const btnCancelar=document.querySelector("#btnCancelar");
const recordShow=4;
const API= new Api();
const objDatos={
	records:[],
	recordsFilter:[],
	currentPage:1,
	filter:""
};
//Eventos
eventListeners();

function eventListeners() {
	document.addEventListener("DOMContentLoaded",cargarDatos);
	searchText.addEventListener("input",aplicarFiltro);
	btnNew.addEventListener("click",agregarProductos);
	divFoto.addEventListener("click",agregarFoto);
	inputFoto.addEventListener("change",actualizarFoto);
	miform.addEventListener("submit",guardarProducto);
	btnCancelar.addEventListener("click",cancelarProducto);
}

//Funciones

function cancelarProducto() {
	panelDatos.classList.remove("d-none");
	panelFormulario.classList.add("d-none");
	cargarDatos();
}

function guardarProducto(e) {
	e.preventDefault();
	const formdata=new FormData(miForm);
	API.saveProducto(formdata)
		.then(data=>{
			if (data.success) {
				cancelarProducto();
				Swal.fire({
				  icon: 'info',
				  text: data.msg
				});
			} else {
				Swal.fire({
				  icon: 'error',
				  title: 'Error',
				  text: data.msg
				});
			}
		})
		.catch(error=>{
			console.error("Error",error);
		})
}

function actualizarFoto(el) {
	if (el.target.files && el.target.files[0]) {
		const reader = new FileReader();
		reader.onload=e=>{
			divFoto.innerHTML=`<img src="${e.target.result}" class="h-100 w-100" style="object-fit:contain;">`;
		}
		reader.readAsDataURL(el.target.files[0]);
	}
}

function agregarFoto() {
	inputFoto.click();
}

function agregarProductos() {
	panelDatos.classList.add("d-none");
	panelFormulario.classList.remove("d-none");
	limpiarForm();
}

function cargarDatos() {
	API.loadProductos().
	then(data=>{
				if (data.success) {
					objDatos.records=data.records;
					objDatos.currentPage=1;
					crearTabla();
					return API.loadCategorias();
				} else {
					mensaje.textContent=data.msg;
				}
			}
	).
	then(data=>{
		rellenarCategorias(data.records);
		return API.loadMarcas();
	}).
	then(data=>{
		rellenarMarcas(data.records);
	}).
	catch(error=>{
			console.error("Error:",error);
		}
	);
}

function rellenarMarcas(records) {
	idMarca.innerHTML="";
	records.forEach(item=>{
		const {id_marca, marca}=item;
		const optionMarca=document.createElement("option");
		optionMarca.value=id_marca;
		optionMarca.textContent=marca;
		idMarca.append(optionMarca);
	});
}

function rellenarCategorias(records) {
	idCategoria.innerHTML="";
	records.forEach(item=>{
		const {id_categoria, categoria}=item;
		const optionCategoria=document.createElement("option");
		optionCategoria.value=id_categoria;
		optionCategoria.textContent=categoria;
		idCategoria.append(optionCategoria);
	});
}   

function aplicarFiltro(e) {
	e.preventDefault();
	objDatos.filter=this.value;
	crearTabla();
}

function crearTabla() {
	if (objDatos.filter=="") {
		objDatos.recordsFilter=objDatos.records.map(item=>item);
	} else {
		objDatos.recordsFilter=objDatos.records.filter(item=>{
			const {nombre_producto, descripcion, categoria, marca,precio_producto}=item;
            if ((nombre_producto.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) || (descripcion.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) || (categoria.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) || (marca.toUpperCase().search(objDatos.filter.toUpperCase())!=-1) || (precio_producto.toUpperCase().search(objDatos.filter.toUpperCase())!=-1)) {
				return item;
			}
		});
	}
	const recordIni=(objDatos.currentPage*recordShow)-recordShow;
	const recordFin=recordIni+recordShow-1;
	let html="";
	objDatos.recordsFilter.forEach((item,index)=>{
		if ((index>=recordIni) && (index<=recordFin)) {
			const {nombre_producto, descripcion, categoria, marca, id_producto,precio_producto}=item;
			html+=`<tr>
			      <th scope="col">${index+1}</th>
			      <th scope="col">${nombre_producto}</th>
			      <th scope="col">${descripcion}</th>
			      <th scope="col">${categoria}</th>
			      <th scope="col">${marca}</th>
                  <th scope="col"><button class='btn btn-primary btn-xs' onclick='editarLibro("${id_producto}")'><i class='far fa-edit'></i></button>&nbsp;&nbsp;<button class='btn btn-danger btn-xs' onclick='eliminarLibro("${id_producto}")'><i class='fas fa-trash-alt'></i></button></th>
                  <th scope="col">${precio_producto}</th>
			    </tr>`;
		}
	});
	tableContent.innerHTML=html;
	crearPaginacion();
}


function crearPaginacion() {
	while (pagination.firstElementChild) {
		pagination.removeChild(pagination.firstElementChild);
	}
	const elAnterior=document.createElement("li");
	elAnterior.classList.add("page-item");
	elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
	elAnterior.onclick=()=>{
		objDatos.currentPage=(objDatos.currentPage== 1 ? 1 : --objDatos.currentPage);
		crearTabla();
	};
	pagination.append(elAnterior);
	const totalPage=Math.ceil(objDatos.recordsFilter.length/recordShow);
	for (let i=1; i<=totalPage;i++) {
		const el=document.createElement("li");
		el.classList.add("page-item");
		el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
		el.onclick=()=>{
			objDatos.currentPage=i;
			crearTabla();
		}
		pagination.append(el);
	}
	const elSiguiente=document.createElement("li");
	elSiguiente.classList.add("page-item");
	elSiguiente.innerHTML='<a class="page-link" href="#">Siguiente</a>';
	elSiguiente.onclick=()=>{
		objDatos.currentPage=(objDatos.currentPage== totalPage ? totalPage : ++objDatos.currentPage);
		crearTabla();
	};
	pagination.append(elSiguiente);
}

function editarProducto(id) {
	limpiarForm(1);
	panelDatos.classList.add("d-none");
	panelFormulario.classList.remove("d-none");
	API.getOneProducto(id).
	then(data=>{
				if (data.success) {
					mostrarDatosForm(data.records[0]);
				} else {
					Swal.fire({
					  icon: 'error',
					  title: 'Error',
					  text: data.msg
					});
				}
			}
	).catch(error=>{
			console.error("Error:",error);
		}
	);
}

function mostrarDatosForm(record) {
	const {id_producto,nombre_producto,precio_producto,descripcion,foto,id_categoria,id_marca}=record;
	document.querySelector("#id_producto").value=id_producto;
	document.querySelector("#nombre_producto").value=nombre_producto;
	document.querySelector("#precio_producto").value=precio_producto;
	document.querySelector("#descripcion").value=descripcion;
	document.querySelector("#id_categoria").value=id_categoria;
	document.querySelector("#id_marca").value=id_marca;

	if (foto!="") {
		divFoto.innerHTML=`<img src="${foto}" class="h-100 w-100" style="object-fit:contain;">`;
	}
	
}

function eliminarProducto(id) {
	Swal.fire({
	  title: 'Esta seguro de eliminar el registro?',
	  showDenyButton: true,
	  confirmButtonText: `Si`,
	  denyButtonText: `No`,
	}).then((result) => {
	  if (result.isConfirmed) {
	    API.deleteProducto(id).
			then(data=>{
						if (data.success) {
							cancelarProducto();
						} else {
							Swal.fire({
							  icon: 'error',
							  title: 'Error',
							  text: data.msg
							});
						}
					}
			).catch(error=>{
					console.error("Error:",error);
				}
			);
	  }
	});
}

function limpiarForm(op) {
	miForm.reset();
	document.querySelector("#id_producto").value="0";
	divFoto.innerHTML="";
}
=======
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
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
