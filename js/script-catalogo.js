(function () {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET', 'json-lista-produtos.json', true);
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4) {
      if (xmlhttp.status == 200) {
        dataLayer = JSON.parse(xmlhttp.responseText);
      }
    }
  };
  xmlhttp.send(null);
})();