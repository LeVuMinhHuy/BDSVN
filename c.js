   var request = new XMLHttpRequest();
        request.open("GET", "../../../public/json/mogiExtract_1000.json", false);
        request.send(null)
        var jsonMogiData_0 = JSON.parse(request.responseText);


  var sizejsonMogiData_0 = jsonMogiData_0.length;

  // document.write(sizejsonMogiData_0);


  var content = [];


  var i;

  for (i = 0 ; i < sizejsonMogiData_0 ; i++){
      var c = jsonMogiData_0[i].c;
      content.push(c);
  }

  for(var i = 0 ; i < content.length; i++){
    document.write(content[i]);
  }
