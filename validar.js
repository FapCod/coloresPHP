function valida_envia() {
  //valido el nombre
  if (document.fvalida.color.value.length == 0) {
    alert("Tiene que escribir el nombre del color");
    document.fvalida.nombre.focus();
    return 0;
  }
  if (document.fvalida.descripcion.value.length == 0) {
    alert("Tiene que escribir la descripcion del color");
    document.fvalida.nombre.focus();
    return 0;
  }
  //el formulario se envia
  alert("Se creo su color con exito");
  document.fvalida.submit();
}
