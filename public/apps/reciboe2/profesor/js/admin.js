angular.module('Reciboe2admin', ["ngRoute"])
  .run(["$rootScope", function (rootScope) {
    rootScope.auth = sessionStorage.getItem('auth');
    rootScope.token = sessionStorage.getItem('token');
    rootScope.user = sessionStorage.getItem('user');
    rootScope.nombre = sessionStorage.getItem('nombre');
    rootScope.menuSel = '';
    rootScope.control = 'admin';
  }])
  .filter("voucherStatus", function () {
    return function (texto) {
      var opcion = "";
      switch (texto) {
        case "P": opcion = "Pendiente"; break;
        case "V": opcion = "Validado"; break;
        case "U": opcion = "Utilizado"; break;
      }
      return opcion;
    }
  })
  .filter("reciboStatus", function () {
    return function (texto) {
      var opcion = "";
      switch (texto) {
        case "G": opcion = "Generado"; break;
        case "I": opcion = "Inconcluso"; break;
      }
      return opcion;
    }
  })
  .filter('pages', function () {
    return function (input, total) {
      total = parseInt(total);
      for (var i = 1; i <= total; i++) {
        input.push(i);
      }
      return input;
    };
  })
  .directive('uploaderModel', ["$parse", function ($parse) {
    return {
      restrict: 'A',
      link: function (scope, iElement, iAttrs) {
        iElement.on("change", function (e) {
          $parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
        });
      }
    };
  }])
  .config(["$routeProvider", function (routeProvider) {

    routeProvider
      .when("/", {
        controller: "loginControl",
        templateUrl: "login.html"
      })
      .when("/panel", {
        controller: "panelControl",
        templateUrl: "panel.html"
      })
      .when("/validar", {
        controller: "validarControl",
        templateUrl: "validar.html"
      })
      .when("/usuarios", {
        controller: "usuariosControl",
        templateUrl: "usuarios.html"
      })
      .when("/recibos", {
        controller: "recibosControl",
        templateUrl: "recibos.html"
      })
      .when("/reportes", {
        controller: "reportesControl",
        templateUrl: "reportes.html"
      })
      .when("/coment", {
        controller: "comentControl",
        templateUrl: "coment.html"
      })
      .otherwise('/');

  }])
  /* *************************************************************************************************************************
 CONTROLADOR INICIO DE SESION 
 ***************************************************************************************************************************/
  .controller('loginControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 'lo';
    // scope.user = '';
    // scope.pass = '';
    scope.login = function () {
      http.get("../api/login.php", {
        params: { admin: scope.user, pass: scope.pass }
      })
        .then(function (response) {
          //console.log(response);
          if (response.data.auth == "true") {
            // console.log(response.data.token);
            sessionStorage.setItem("auth", true);
            sessionStorage.setItem("token", response.data.token);
            sessionStorage.setItem("user", scope.user);
            sessionStorage.setItem("nombre", response.data.nombre);
            rootScope.token = sessionStorage.getItem('token');
            rootScope.user = sessionStorage.getItem('user');
            rootScope.nombre = sessionStorage.getItem('nombre');

            location.href = "#!/panel";
          } else {
            sessionStorage.setItem("auth", false);
            toastShow(scope, 'Mensaje.', 'Error credenciales inválidas.');
          }
          rootScope.auth = sessionStorage.getItem('auth');
        }, function (error) {
          toastShow(scope, 'Mensaje.', 'Error de conexion con el servidor');
        });
    }
  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE PANEL ADMINISTRADOR
  ***************************************************************************************************************************/
  .controller('panelControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 'pa';

  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE VALIDACION
  ***************************************************************************************************************************/
  .controller('validarControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 'va';
    scope.control = "";
    scope.vouchers = [];
    //paginacion
    scope.vrows = 10;
    scope.vtotalrows = 0;
    scope.vtotalpages = 0;
    scope.vpages = [];
    scope.vpage = 1;

    scope.voucherMod = [];

    scope.uploadFile = function () {
      var file = scope.file;
      var fd = new FormData();
      fd.append('archivo', file);
      $("#enespera").modal({
        keyboard: false
      });

      http.post('../api/validacion.php', fd, {
        headers: {
          'Authorization': sessionStorage.getItem("token"),
          'Content-Type': undefined
        }
      })
        .then(function (response) {
          $("#enespera").modal('hide');
          console.log(response.data);
          toastShow(scope, "Mensaje", 'Se agregaron ' + response.data.agregados + ' registros de ' + response.data.total);
        }, function (error) {
          $("#enespera").modal('hide');
          errorHttp(scope, error);
        });
    };

    scope.validar = function () {
      http.get('../api/validacion.php', {
        headers: {
          'Authorization': sessionStorage.getItem("token")
        }
      })
        .then(function (response) {
          $("#enespera").modal('hide');
          //console.log(response);
          //M.toast({ html: 'Se agregaron '+response.data.agregados+' registros de '+response.data.total });
          $("#resultado").html(response.data);
        }, function (error) {
          $("#enespera").modal('hide');
          errorHttp(scope, error);
        });
    };

    scope.buscar = function (no) {
      scope.vpage = no;
      http.get("../api/vouchers.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { control: scope.control, page: scope.vpage, rows: scope.vrows } })
        .then(function (response) {
          scope.vouchers = response.data.table;
          scope.vtotalrows = response.data.rows;
          scope.vtotalpages = Math.trunc(scope.vtotalrows / scope.vrows) + 1;
          scope.vpages = [];
          for (var i = 1; i <= scope.vtotalpages; i++) {
            scope.vpages.push({
              no: i
            });
          }
          //console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.modifica = function (voucher) {
      scope.voucherModSel = voucher;
      scope.voucherMod = $.extend({}, voucher);
      $('#modalModifica').modal();

    };

    scope.guardarCambios = function () {

      http.put("../api/vouchers.php", null, {
        headers: { Authorization: sessionStorage.getItem("token") },
        params: {
          'id_voucher': scope.voucherMod.id_voucher,
          'referencia': scope.voucherMod.referencia,
          'fecha': scope.voucherMod.fecha,
          'hora': scope.voucherMod.hora,
          'monto': scope.voucherMod.monto,
          'status': scope.voucherMod.status
        }
      })
        .then(function (response) {
          toastShow(scope, 'Mensaje.', 'Resgitros modificados ' + response.data.rows);
          scope.voucherModSel.id_voucher = scope.voucherMod.id_voucher;
          scope.voucherModSel.referencia = scope.voucherMod.referencia;
          scope.voucherModSel.fecha = scope.voucherMod.fecha;
          scope.voucherModSel.hora = scope.voucherMod.hora;
          scope.voucherModSel.monto = scope.voucherMod.monto;
          scope.voucherModSel.status = scope.voucherMod.status;
          //scope.buscar();
          //scope.vouchers = response.data;
          console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE USUARIOS
  ***************************************************************************************************************************/
  .controller('usuariosControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 'us';
    scope.control = "";
    scope.alumnos = [];
    scope.curp = "";
    scope.usuarios = [];

    scope.buscar = function () {
      http.get("../api/usuarios.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { control: scope.control } })
        .then(function (response) {
          scope.alumnos = response.data;
          // console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.buscarExterno = function () {
      http.get("../api/usuarios.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { curp: scope.curp } })
        .then(function (response) {
          scope.usuarios = response.data;
          // console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.modExt = function (usu) {
      scope.usuModSel = usu;
      scope.usuMod = $.extend({}, usu);
      $('#modalModExt').modal();
    };

    scope.guardarCambiosExt = function () {

      http.put("../api/usuarios.php", null, {
        headers: { Authorization: sessionStorage.getItem("token") },
        params: {
          'id_externo': scope.usuMod.id_externo,
          'curp': scope.usuMod.curp,
          'nombre': scope.usuMod.nombre,
          'a_paterno': scope.usuMod.a_paterno,
          'a_materno': scope.usuMod.a_materno,
          'pass': scope.usuMod.passd
        }
      })
        .then(function (response) {
          toastShow(scope, 'Actualizacion', 'Resgitros modificados: ' + response.data.rows);
          scope.usuModSel.id_externo = scope.usuMod.id_externo;
          scope.usuModSel.curp = scope.usuMod.curp;
          scope.usuModSel.nombre = scope.usuMod.nombre;
          scope.usuModSel.a_paterno = scope.usuMod.a_paterno;
          scope.usuModSel.a_materno = scope.usuMod.a_materno;
          scope.usuModSel.passd = scope.usuMod.passd;

          //scope.buscar();
          //scope.vouchers = response.data;
          //console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };
  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE RECIBOS
  ***************************************************************************************************************************/
  .controller('recibosControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 're';
    scope.folio = "";
    scope.recibos = [];
    scope.vouchers = [];
    scope.conceptos = [];
    scope.total = 0;
    scope.materias = [];
    scope.buscar = function () {
      http.get("../api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { folio: scope.folio } })
        .then(function (response) {
          console.log(response.data);
          scope.recibos = response.data;
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.modifica = function (recibo) {
      scope.reciboModSel = recibo;
      scope.reciboMod = $.extend({}, recibo);
      $('#modalModifica').modal();
      http.get("../api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { recibov: recibo.id_recibo } })
        .then(function (response) {
          scope.vouchers = response.data;
        }, errorHttp);
      http.get("../api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { reciboc: recibo.id_recibo } })
        .then(function (response) {
          scope.conceptos = response.data;
          scope.conceptos.forEach(conE => {
            scope.total += parseFloat(conE.importe);
          });
        }, errorHttp);
      http.get("../api/listar.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { tabla: 'materias' } })
        .then(function (response) {
          scope.materias = response.data;
        }, errorHttp);
    };

    scope.guardarCambios = function () {

      http.put("../api/recibos.php", null, {
        headers: { Authorization: sessionStorage.getItem("token") },
        params: {
          'id_recibo': scope.reciboMod.id_recibo,
          'conceptos': JSON.stringify(scope.conceptos)
        }
      })
        .then(function (response) {
          //toastShow(scope, 'Mensaje.', 'Resgitros modificados ' + response.data.rows);

          console.log(response.data);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.cancelar = function (recibo) {
      http.put("../api/recibos.php", null, {
        headers: { Authorization: sessionStorage.getItem("token") },
        params: {
          'id_recibo': recibo.id_recibo,
          'status': 'C'
        }
      })
        .then(function (response) {
          //toastShow(scope, 'Mensaje.', 'Resgitros modificados ' + response.data.rows);
          recibo.status = 'C';

          //console.log(response);
        }, function (error) {
          errorHttp(scope, error);
        });
    };

    scope.eliminar = function(recibo){
      http.delete("../api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { id_recibo: recibo.id_recibo } })
        .then(function (response) {
          // console.log(scope.vouAct);
          //console.log(response.data);
          if (response.data.rows) {
            toastShow(scope, 'Eliminado.', 'El recibo ' + recibo.id_recibo + ' ha sido eliminado');
           
            index = scope.recibos.indexOf(recibo);
            //console.log(index);
            scope.recibos.splice(index, 1);
            //scope.recarga();
          } else {
            toastShow(scope, 'Error.', 'Error desconocido');
          }
        }, errorHttp);
    };

  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE REPORTES
  ***************************************************************************************************************************/
  .controller('reportesControl', ["$scope", "$http", "$rootScope", "$filter", function (scope, http, rootScope, filter) {
    rootScope.menuSel = 'rp';
    scope.fechaIni = '';
    scope.fechaFin = '';
    scope.reporte = 1;
    scope.consulta = [];

    scope.consultar = function () {
      fechai = filter('date')(scope.fechaIni, 'yyyy-MM-dd');
      fechaf = filter('date')(scope.fechaFin, 'yyyy-MM-dd');
      console.log(fechai);
      //$("#enespera").modal('open');
      http.get("../api/reportes.php", {
        headers: {
          'Authorization': sessionStorage.getItem("token")
        },
        params: { ID: scope.reporte, FI: fechai, FF: fechaf }
      })
        .then(function (response) {

          //console.log(response);

          scope.consulta = response.data;
          // $("#enespera").modal('close');
        }, function (error) {
          errorHttp(error);
        });
    };

    scope.excel = function () {

      // var tmpElemento = document.createElement('a');

      // tmpElemento.download = 'reporte.xls';

      // var uri = 'data:application/vnd.ms-excel;base64,'
      // , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      // , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
      // , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }

      // var table = 'tablaReporte';
      // var name = 'REPORTE';

      // if (!table.nodeType) table = document.getElementById(table)
      //  var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
      //  tmpElemento.href = uri + base64(format(template, ctx))
      // tmpElemento.target = '_Blank';
      // tmpElemento.click();

      var wb = XLSX.utils.table_to_book(document.getElementById('tablaReporte'));
      XLSX.writeFile(wb, "reporte.xlsx");

    };
  }])
  /* *************************************************************************************************************************
  CONTROLADOR DE COMENTARIOS
  ***************************************************************************************************************************/
  .controller('comentControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    rootScope.menuSel = 'co';
    scope.usuario = 'admin';

    scope.mensajes = [];
    scope.rows = 10;
    scope.totalrows = 0;
    scope.totalpages = 0;
    scope.pages = [];
    scope.page = 1;

    scope.mensajes = [{ de: '00030059', comentario: 'esto es un mensaje de prueba', fecha: '06/11/2018' }, { de: 'admin', comentario: 'y esta la contestacion', fecha: '07/11/2018' },
    { de: '00030059', comentario: 'esto es un mensaje de prueba', fecha: '06/11/2018' }, { de: 'admin', comentario: 'y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion y esta la contestacion', fecha: '07/11/2018' }];
    scope.usuarios = [{ control: 'admin', nuevos: 5 }, { control: '00030059', nuevos: 12 }]

    scope.recarga = function () {
      http.get("../api/coment.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { page: scope.page, rows: scope.rows } })
        .then(function (response) {
          scope.mensajes = response.data.table;
          scope.totalrows = response.data.rows;
          scope.totalpages = Math.trunc(scope.totalrows / scope.rows) + 1;
          scope.pages = [];
          for (var i = 1; i <= scope.totalpages; i++) {
            scope.pages.push({
              no: i
            });
          }
          //scope.visto();
        }, errorHttp);
    };

    scope.visto = function () {
      scope.mensajes.forEach(men => {
        if (men.status == 'N' && rootScope.control != men.de) {
          http.put("api/coment.php", null, { headers: { Authorization: sessionStorage.getItem("token") }, params: { 'ID': men.id_coment } });
        }
      });
    };

  }])
  ;

function errorHttp(scope, error) {
  console.log(error);
  console.log(error.status);
  console.log(error.statusText);
  //if(error.statusText!=undefined) toastShow(scope,'Error en la peticion', error.statusText);
  if (error.status == 401) location.href = "#!/";

}

function toastShow(scope, title, msg) {
  scope.toastTit = title;
  scope.toastMsg = msg;
  $('.toast').toast('show');
}