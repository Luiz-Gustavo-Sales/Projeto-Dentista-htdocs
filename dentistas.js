$(function () {
  $("#cidadeDentista_a").change(function () {
    atualizaBairros();
  });

  function atualizaBairros(Cod_cidade) {
    console.log("Executou")
    //pegando código da cidadeDENTISTA
    $('#cidadeDentista_a').change(function () {
      Cod_cidade = ($(this).val());
      console.log("Cod_Cidade teste 1: " + Cod_cidade);
    });
    $.ajax({
      type: "GET",
      //ARQUIVO QUE DEVE SER CHADO PARA ENVIAR O PAARAMETRO
      url: `buscaBairro.php`,
      data: { 'tp': $('#cidadeDentista_a').val() },
      // contentType: 'application/json; charset=utf-8',
      // data: { "tp": "Cod_cidade" },
      success: function (data) {
        // console.log("data aqui ", data)
        $('#bairroDentista_a').html('');
        $('#bairroDentista_a').removeAttr("disabled");
        $('#bairroDentista_a').append(new Option('Selecione...', '', false, true));

        $('#bairroDentista_a').append(data);
      }
    });
  }
});





  // function atualizaCidades() {
  //   let codEstado=1;
  //   $.ajax({
  //       type: "GET",
  //       url:  `https://sio-teste.fswise.com.br/Crown/api/dentistas/cidades/${codEstado}`,
  //       dataType: 'json',

  //       success: function(cidades) {

  //       $('#cidadeDentista_a').prop("disabled",false);
  //       $('#cidadeDentista_a').append(new Option('Selecione...', '', false, true));
  //       $('#cidadeDentista_a').append(data);
  //     }
  //   });
  // }
    // function buscaDentistas() {
    //   $.ajax({
    //       type: "POST",
    //       url: "../buscas.php",
    //       data: {
    //         lnk:'den',
    //         n:$('#nomeDentista_a').val(),
    //         e:$('#estadoDentista_a').val(),
    //         c:$('#cidadeDentista_a').val(),
    //         b:$('#bairroDentista_a').val(),
    //         p:$('#especialidadeDentista_a').val()
    //       },
    //       success: function(data) {
    //       $('#resultadoDentista_a').html('');
    //       $('#resultadoDentista_a').show();
    //       $('#resultadoDentista_a').append(data);
    //     }
    //   });
    // }
  // $("[data-widget='collapse']").click(function() {
  //   var box = $(this).parents(".box").first();
  //   var bf = box.find(".box-body, .box-footer");
  //   if (!box.hasClass("collapsed-box")) {
  //     box.addClass("collapsed-box");
  //     bf.slideUp();
  //   } else {
  //     box.removeClass("collapsed-box");
  //     bf.slideDown();
  //   }
  // });
