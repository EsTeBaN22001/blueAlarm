moment.locale("es");

const datesToFormat = document.querySelectorAll(".dateFormat");

datesToFormat.forEach((date) => {
  // Obtiene el valor de la fecha en el elemento HTML
  const fechaISO8601 = date.textContent;

  // Parsea la fecha como UTC utilizando Moment.js
  const fecha = moment.utc(fechaISO8601);

  // Calcula la diferencia de tiempo en minutos
  const minutosTranscurridos = moment.utc().diff(fecha, "minutes");

  // Formatea la diferencia de tiempo en "Hace X tiempo"
  const tiempoTranscurrido = moment
    .duration(minutosTranscurridos, "minutes")
    .humanize();

  // Actualiza el contenido del elemento HTML con el tiempo transcurrido
  date.textContent = `Hace ${tiempoTranscurrido}`;
});
