const form = document.getElementById("loginForm");
const mensaje = document.getElementById("mensaje");

form.addEventListener("submit", login);

function login(e) {
  e.preventDefault();
  let API = new Api();
  const formData = new FormData(form);
  API.validarLogin(formData)
    .then((data) => {
      console.log(data.msg);
      if (data.success) {
        window.location = data.link;
        //console.log(data);
      } else {
        mensaje.textContent = data.msg;
        mensaje.classList.remove("d-none");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  // console.log("finalizando");
}
