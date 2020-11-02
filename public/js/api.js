const BASE_API = "/OnlineStore/";

class Api {
  async validarLogin(form) {
    const query = await fetch(`${BASE_API}login/validar/`, {
      method: "POST",
      body: form,
    });
    const data = await query.json();
    return data;
  }
}
