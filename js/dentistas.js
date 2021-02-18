  $(function() {
    $("#estadoDentista_a").change(function () {
      atualizaCidades();
    });
    $("#cidadeDentista_a").change(function () {
      atualizaBairros();
    });
    $("#buscarDentista_a").click(function () {
      buscaDentistas();
    });
    function atualizaCidades() {
      $.ajax({
          type: "POST",
          url: "../buscas.php",
          data: {lnk:'cid', tp:$('#estadoDentista_a').val()},
          success: function(data) {
          $('#cidadeDentista_a').html('');
          $('#cidadeDentista_a').removeAttr("disabled");
          $('#cidadeDentista_a').append(new Option('Selecione...', '', false, true));
          $('#cidadeDentista_a').append(data);
        }
      });
    }
    function atualizaBairros() {
      $.ajax({
          type: "POST",
          url: "../buscas.php",
          data: {lnk:'bar', tp:$('#cidadeDentista_a').val()},
          success: function(data) {
          $('#bairroDentista_a').html('');
          $('#bairroDentista_a').removeAttr("disabled");
          $('#bairroDentista_a').append(new Option('Selecione...', '', false, true));
          $('#bairroDentista_a').append(data);
        }
      });
    }
    function buscaDentistas() {
      $.ajax({
          type: "POST",
          url: "../buscas.php",
          data: {
            lnk:'den',
            n:$('#nomeDentista_a').val(),
            e:$('#estadoDentista_a').val(),
            c:$('#cidadeDentista_a').val(),
            b:$('#bairroDentista_a').val(),
            p:$('#especialidadeDentista_a').val()
          },
          success: function(data) {
          $('#resultadoDentista_a').html('');
          $('#resultadoDentista_a').show();
          $('#resultadoDentista_a').append(data);
        }
      });
    }
  $("[data-widget='collapse']").click(function() {
    var box = $(this).parents(".box").first();
    var bf = box.find(".box-body, .box-footer");
    if (!box.hasClass("collapsed-box")) {
      box.addClass("collapsed-box");
      bf.slideUp();
    } else {
      box.removeClass("collapsed-box");
      bf.slideDown();
    }
  });
  });