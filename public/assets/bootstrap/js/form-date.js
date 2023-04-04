function api() {
  let url = 'https://casadefestas.digital/api/dateslocation';
  // let url = 'http://localhost/api/dateslocation';
  let request = new XMLHttpRequest();
  request.open("GET", url, false);
  request.send();
  let data = request['responseText'];
  return data;
};

function main() {
  let data = api();
  let dates = JSON.parse(data);
  let date = [];
  let minDt = new Date().toLocaleDateString();


  dates.forEach(element => {
    date.push(element['dates']);
  });

  $(document).ready(function () {
    $('#datepicker').datepicker();
  });


  $.fn.datepicker.dates['pt-BR'] = {
    days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
    daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa"],
    months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
    today: "Hoje",
    monthsTitle: "Meses",
    clear: "Limpar",
  };



  $('#datepicker').datepicker({
    format: "dd/mm/yyyy",
    weekStart: 0,
    language: "pt-BR",
    autoclose: true,
    todayHighlight: true,
    minDate: minDt,
    datesDisabled: date,
  });

}

main()

