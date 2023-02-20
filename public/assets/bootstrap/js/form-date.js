function api() {
  let url = 'http://191.101.0.238/api/dateslocation';
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


  $('#datepicker').datepicker({
    format: "dd/mm/yyyy",
    weekStart: 0,
    language: 'pt-BR',
    autoclose: true,
    todayHighlight: true,
    minDate: minDt,
    datesDisabled: date,
  });

}

main()

