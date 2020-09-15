angular.module('Reciboe2', ["ngRoute"])
  .run(["$rootScope", function (rootScope) {
    rootScope.auth = sessionStorage.getItem('auth');
    rootScope.token = sessionStorage.getItem('token');
    rootScope.control = sessionStorage.getItem('control');
    rootScope.nombre = sessionStorage.getItem('nombre');
    rootScope.vouGlb = {};
    rootScope.recid = 0;
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
  .config(["$routeProvider", function (routeProvider) {

    routeProvider
      .when("/login", {
        controller: "loginControl",
        templateUrl: "plantillas/login.html"
      })
      .when("/registro", {
        controller: "registroControl",
        templateUrl: "plantillas/registro.html"
      })
      .when("/logout", {
        controller: "logoutControl",
        templateUrl: "plantillas/logout.html"
      })
      .when("/vouchers", {
        controller: "vouchersControl",
        templateUrl: "plantillas/vouchers.html"
      })
      .when("/voucheradd", {
        controller: "voucherAddControl",
        templateUrl: "plantillas/voucher_add.html"
      })
      .when("/voucherver", {
        controller: "voucherVerControl",
        templateUrl: "plantillas/voucher_ver.html"
      })
      .when("/reciboadd", {
        controller: "reciboAddControl",
        templateUrl: "plantillas/recibo_add.html"
      })
      .when("/recibos", {
        controller: "recibosControl",
        templateUrl: "plantillas/recibos.html"
      })
      .when("/recibover", {
        controller: "reciboVerControl",
        templateUrl: "plantillas/recibo_ver.html"
      })
      .when("/coment", {
        controller: "comentControl",
        templateUrl: "plantillas/coment.html"
      })
      .otherwise('/login');

  }])
  .controller('loginControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    // scope.user = '';
    // scope.pass = '';
    //  scope.user = '00030059';
    //  scope.pass = '4XgAKjE8';
    
    scope.login = function () {
      http.get("api/login.php", {
        params: { user: scope.user, pass: scope.pass }
      })
        .then(function (response) {
          //console.log(response);
          if (response.data.auth == "true") {
            console.log(response.data.token);
            sessionStorage.setItem("auth", true);
            sessionStorage.setItem("token", response.data.token);
            sessionStorage.setItem("control", scope.user);
            sessionStorage.setItem("nombre", response.data.nombre);
            rootScope.token = sessionStorage.getItem('token');
            rootScope.control = sessionStorage.getItem('control');
            rootScope.nombre = sessionStorage.getItem('nombre');

            location.href = "#!/vouchers";
          } else {
            sessionStorage.setItem("auth", false);
            M.toast({ html: 'Error credenciales inválidas.' });
          }
          rootScope.auth = sessionStorage.getItem('auth');
        }, function (error) {
          M.toast({ html: 'Error de conexion con el servidor' });
        });
    };
  }])
  .controller('registroControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.newUser = {
      user: '',
      pass: '',
      nombre: '',
      apaterno: '',
      amaterno: ''
    };
    scope.regresar = function () {
      history.back();
    };

    scope.registrar = function () {
      if (scope.newUser.pass != scope.newUser.pass2) {
        M.toast({ html: 'Las contraseñas no coiciden, favor de revisarlas.' });
        return;
      }
      if (scope.newUser.user.length < 1 || scope.newUser.pass.length < 1 || scope.newUser.nombre.length < 1 || scope.newUser.apaterno.length < 1 || scope.newUser.amaterno.length < 1) {
        M.toast({ html: 'Todos los campos son obligatorios' });
        return;
      }
      var fd = new FormData();
      fd.append('curp', scope.newUser.user);
      fd.append('pass', scope.newUser.pass);
      fd.append('nombre', scope.newUser.nombre);
      fd.append('apaterno', scope.newUser.apaterno);
      fd.append('amaterno', scope.newUser.amaterno);

      http.post('api/login.php', fd, {
        headers: {
          'Content-Type': undefined
        }
      })
        .then(function (response) {
          console.log(response.data);
          if (response.data.ID == "existe") {
            M.toast({ html: 'Este numero de curp ya esta registrada por favor elija otra.' });
          } else {
            M.toast({ html: 'Se ha registrado correctamente:' + response.data.ID });
            location.href = "#!/login";
          }
        }, errorHttp);
    };

  }])
  .controller('logoutControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {

    sessionStorage.setItem("auth", false);
    sessionStorage.setItem("token", '');
    sessionStorage.setItem("control", '');
    sessionStorage.setItem("nombre", '');
    rootScope.token = sessionStorage.getItem('token');
    rootScope.control = sessionStorage.getItem('control');
    rootScope.nombre = sessionStorage.getItem('nombre');
    rootScope.auth = sessionStorage.getItem('auth');
    M.toast({ html: 'Cerrando sesion' });
    location.href = "#!/";

  }])
  .controller('vouchersControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.menu1 = true;
    scope.menu2 = false;
    scope.menu3 = false;

    scope.vouchers = [];
    scope.vouAct = {};

    

    scope.agregar = function () {
      location.href = "#!/voucheradd";
    };
    scope.ver = function (voucher) {
      rootScope.vouGlb = voucher;
      location.href = "#!/voucherver";
    };
    scope.recibo = function (voucher) {
      rootScope.vouGlb = voucher;
      location.href = "#!/reciboadd";
    };
    scope.eliminar = function (voucher) {
      scope.vouAct = voucher;
      //console.log(scope.vouAct);
      $("#modal1").modal('open');
    };
    scope.ejecutaElimina = function () {
      http.delete("api/vouchers.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { ID: scope.vouAct.id_voucher } })
        .then(function (response) {
          // console.log(scope.vouAct);
          // console.log(response.data);
          if (response.data.ID) {
            M.toast({ html: 'El registro ' + scope.vouAct.referencia + ' ha sido eliminado' });
            index = scope.vouchers.indexOf(scope.vouAct);
            //console.log(index);
            scope.vouchers.splice(index, 1);
            //scope.recarga();
          } else {
            M.toast({ html: 'Error desconocido' });
          }
        }, errorHttp);
    };
    scope.recarga = function () {
      http.get("api/vouchers.php", { headers: { Authorization: sessionStorage.getItem("token") } })
        .then(function (response) {
          //console.log(response.data);
          scope.vouchers = response.data;

        }, errorHttp);
    };

    scope.recarga();
  }])

  .controller('voucherAddControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.newVoucher = {};
    //var fecha = new Date();
    // scope.newVoucher.fecha = fecha.getFullYear()+"-"+fecha.getMonth()+"-"+fecha.getDate();
    // M.updateTextFields();
    scope.cancelar = function () {
      //location.href=rootScope.prevUrl;
      //rootScope.prevUrl = "#!/vouchersadd";
      history.back();
    };
    scope.guardar = function () {
      var fd = new FormData();
      fd.append('control', rootScope.control);
      fd.append('referencia', scope.newVoucher.folio);
      fd.append('fecha', scope.newVoucher.fecha);
      fd.append('hora', scope.newVoucher.hora);
      fd.append('monto', scope.newVoucher.monto);

      //console.log(req);
      http.post('api/vouchers.php', fd, {
        headers: {
          'Authorization': sessionStorage.getItem("token"),
          'Content-Type': undefined
        }
      })
        .then(function (response) {
          console.log(response.data);
          M.toast({ html: 'El voucher se guardo con el id:' + response.data.ID + ' Espera a que este validado, y entra a generar tu recibo', displayLength: 10000 });
          location.href = "#!/vouchers";
        }, errorHttp);
    };
  }])
  .controller('voucherVerControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.recibos = [];
    scope.regresar = function () {
      history.back();
    };
    scope.recarga = function () {
      http.get("api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { voucher: rootScope.vouGlb.id_voucher } })
        .then(function (response) {
          //console.log(response.data);
          scope.recibos = response.data;

        }, errorHttp);
    };

    scope.recarga();
  }])
  /* *************************************************************************************************************************
  *******************************************CONTROLADOR PARA AGRAGR RECIBOS *************************************************
  ***************************************************************************************************************************/
  .controller('reciboAddControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    var fecha = new Date();

    scope.newRecibo = {};
    scope.newRecibo.vouchers = [];
    scope.newRecibo.conceptos = [];
    scope.conceptosBD = [];
    scope.newRecibo.id_recibo = 0;

    scope.vouchersValidos = [];
    scope.vouchersValidosF = [];

    scope.listamaterias = {};

    var mes = fecha.getMonth().toString();
    mes = mes.length < 2 ? '0' + mes : mes;
    scope.newRecibo.fecha = fecha.getFullYear() + "-" + mes + "-" + fecha.getDate();

    var h = fecha.getHours().toString();
    h = h.length < 2 ? '0' + h : h;
    var m = fecha.getMinutes().toString();
    m = m.length < 2 ? '0' + m : m;
    var s = fecha.getSeconds().toString();
    s = s.length < 2 ? '0' + s : s;

    scope.newRecibo.hora = h + ":" + m + ":" + s;
    //console.log(rootScope.vouGlb);


    if (rootScope.vouGlb.id_voucher != undefined) {
      scope.newRecibo.vouchers.push({
        id_voucher: rootScope.vouGlb.id_voucher,
        referencia: rootScope.vouGlb.referencia,
        fecha: rootScope.vouGlb.fecha,
        monto: rootScope.vouGlb.monto
      });
      scope.newRecibo.montoVouchers = parseFloat(rootScope.vouGlb.monto);
    } else
      scope.newRecibo.montoVouchers = 0;
    scope.newRecibo.montoRecibo = 0;

    scope.agregarVoucher = function () {
      $("#selVoucher").modal('open');
      scope.cargaVouchersValidos();
    };

    scope.agregarConcepto = function () {
      $("#selConcepto").modal('open');
      scope.cargaConceptos();
    };


    scope.cargaVouchersValidos = function () {
      http.get("api/vouchers.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { status: 'V' } })
        .then(function (response) {
          scope.vouchersValidos = [];
          response.data.forEach(voucherE => {

            var vouE = {
              id_voucher: '',
              referencia: '',
              fecha: '',
              monto: '',
              checked: false
            };

            vouE.id_voucher = voucherE.id_voucher;
            vouE.referencia = voucherE.referencia;
            vouE.fecha = voucherE.fecha;
            vouE.monto = voucherE.monto;
            vouE.checked = false;
            scope.newRecibo.vouchers.forEach(voucherF => {
              if (voucherE.id_voucher == voucherF.id_voucher)
                vouE.checked = true;
            });
            if (!vouE.checked)
              scope.vouchersValidos.push(vouE);

          });
          // scope.vouchersValidos = response.data;
          scope.vouchersValidosF = scope.vouchersValidos;
          //console.log(scope.vouchersValidos);
        }, errorHttp);
    };

    scope.cargaConceptos = function () {
      http.get("api/conceptos.php", { headers: { Authorization: sessionStorage.getItem("token") } })
        .then(function (response) {
          scope.conceptosBD = [];

          response.data.forEach(element => {
            var conE = {
              clave: element.clave,
              concepto: element.concepto,
              importe: element.importe,
              status: element.status,
              checked: false
            }
            scope.conceptosBD.push(conE);
          });

          scope.conceptosBDF = scope.conceptosBD;
          //console.log(scope.conceptosBD);
        }, errorHttp);
    };

    scope.filtraVoucherValidos = function () {
      if (scope.filtroVouVal == undefined) {
        scope.vouchersValidos = scope.vouchersValidosF;
      } else {
        scope.vouchersValidos = scope.vouchersValidosF.filter(function (el) {
          return el.fecha.includes(scope.filtroVouVal) ||
            el.referencia.includes(scope.filtroVouVal) ||
            el.monto.includes(scope.filtroVouVal);
        });
      }
      //console.log(scope.filtroVouVal);
      // if($keycode==13)
    };

    scope.filtraConceptos =  function() {
      if (scope.filtroCon == undefined) {
        scope.conceptosBD = scope.conceptosBDF;
      } else {
        scope.conceptosBD = scope.conceptosBDF.filter(function (el) {
          return el.clave.includes(scope.filtroCon) ||
            el.concepto.includes(scope.filtroCon) ||
            el.importe.includes(scope.filtroCon);
        });
      }
    };

    scope.ejecutaAgregaVoucher = function () {
      //scope.newRecibo.vouchers = [];
      //scope.newRecibo.montoVouchers = 0;
      scope.vouchersValidos.forEach(element => {
        if (element.checked) {
          var vouE = {
            id_voucher: element.id_voucher,
            referencia: element.referencia,
            fecha: element.fecha,
            monto: element.monto
          };
          scope.newRecibo.vouchers.push(vouE);
          scope.newRecibo.montoVouchers += parseFloat(element.monto);
        }
      });
    };

    scope.ejecutaAgregaConcepto = function () {


      // if ((scope.newRecibo.montoVouchers - scope.newRecibo.montoRecibo) < parseFloat(scope.conceptosBD[scope.conSel].importe)) {
      //   M.toast({ html: 'El monto de los vouchers es insuficiente.' });
      //   return;
      // }

      scope.conceptosBD.forEach(element => {
        if (element.checked) {
          var conE = {
            clave: element.clave,
            concepto: element.concepto,
            importe: element.importe,
            status: element.status,
            obs: '',
            tag: ''
          };
          scope.newRecibo.conceptos.push(conE);
          scope.newRecibo.montoRecibo += parseFloat(element.importe);
        }
      });

      
    };

    scope.eliminarVoucher = function (voucher) {
      index = scope.newRecibo.vouchers.indexOf(voucher);
      scope.newRecibo.vouchers.splice(index, 1);
      scope.newRecibo.montoVouchers -= parseFloat(voucher.monto);
    };

    scope.eliminarConcepto = function (concepto) {
      index = scope.newRecibo.conceptos.indexOf(concepto);
      scope.newRecibo.conceptos.splice(index, 1);
      scope.newRecibo.montoRecibo -= parseFloat(concepto.importe);
    };



    scope.cancelar = function () {
      history.back();
    };

    scope.guardar = function () {
      scope.sumatorias();
      if (scope.newRecibo.montoVouchers < scope.newRecibo.montoRecibo) {
        M.toast({ html: 'El monto de los vouchers es insuficiente.' });
        return;
      }
      if (scope.newRecibo.montoVouchers > scope.newRecibo.montoRecibo) {
        M.toast({ html: 'Se debe utilizar todo el monto disponible en vouchers.' });
        return;
      }
      if (scope.newRecibo.vouchers.length < 1 || scope.newRecibo.conceptos.length < 1) {
        M.toast({ html: 'Se debe usar al menos un voucher en un concepto.' });
        return;
      }
      var llenos = true;
      scope.newRecibo.conceptos.forEach(con => {
        if(con.status == 'M' && con.obs.length < 1) llenos = false;
      });

      if(!llenos){
        M.toast({ html: 'Se debe anotar el nombre de la Materia.' });
        return;
      }
      $("#modalGuardaRecibo").modal('open');
    };

    scope.ejecutaGuardar = function () {
      var fd = new FormData();
      fd.append('fecha', scope.newRecibo.fecha);
      fd.append('hora', scope.newRecibo.hora);
      fd.append('vouchers', JSON.stringify(scope.newRecibo.vouchers));
      fd.append('conceptos', JSON.stringify(scope.newRecibo.conceptos));
      fd.append('total', scope.newRecibo.montoRecibo);

      //console.log();
      http.post('api/recibos.php', fd, {
        headers: {
          'Authorization': sessionStorage.getItem("token"),
          'Content-Type': undefined
        }
      })
        .then(function (response) {

          $("#readerror").html(response.data);
          
          rootScope.vouGlb = {};
          rootScope.recid = response.data.ID;
          M.toast({ html: 'N&uacute;mero de f&oacute;lio del recibo:' + response.data.ID, displayLength: 10000 });
          location.href="api/recibopdf.php?auth="+rootScope.token+"&recibo="+response.data.ID
          history.back();

        }, errorHttp);
    };

    scope.sumatorias =function(){
      var total = 0;

      scope.newRecibo.vouchers.forEach(voucher =>{
        total += parseFloat(voucher.monto);
      });
      scope.newRecibo.montoVouchers = total;

      total = 0
      scope.newRecibo.conceptos.forEach(concepto =>{
        total += parseFloat(concepto.importe);
      });
      scope.newRecibo.montoRecibo = total;

    };

    scope.autollenarmateria = function(){
      $('input.autocomplete').autocomplete({data: scope.listamaterias});
    };
    
    http.get("api/listar.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: {tabla: 'materias'} })
          .then(function (response) {
            console.log(response.data);
            response.data.forEach(mat => {
              scope.listamaterias[mat.materia]=null;
            });
            //console.log(scope.listamaterias);
          }, errorHttp);

    scope.cargaConceptos();
    
  }])

  /* *************************************************************************************************************************
  ***********************************CONTROLADOR PARA VER LA LISTA DE RECIBOS ************************************************
  ***************************************************************************************************************************/
  .controller('recibosControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.menu1 = false;
    scope.menu2 = true;
    scope.menu3 = false;

    scope.recibos = [];
    scope.recAct = {};

    scope.ver = function (recibo) {
      rootScope.recGlb = recibo;
      location.href = "#!/recibover";
    };

    scope.descargar = function(id_recibo){
      //console.log(id_recibo);
      location.href="api/recibopdf.php?auth="+rootScope.token+"&recibo="+id_recibo;
    };

    scope.recibo = function (voucher) {
      rootScope.vouGlb = {};
      location.href = "#!/reciboadd";
    };

    scope.recarga = function () {
      http.get("api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") } })
        .then(function (response) {
          //console.log(response.data);
          scope.recibos = response.data;

        }, errorHttp);
    };

    scope.recarga();
  }])
  .controller('reciboVerControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.vouchers = [];
    scope.conceptos = [];
    scope.total=0;
    scope.regresar = function () {
      history.back();
    };

    scope.descargar = function(){
      location.href="api/recibopdf.php?auth="+rootScope.token+"&recibo="+rootScope.recGlb.id_recibo;
    };

    scope.recarga = function () {
      http.get("api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { recibov: rootScope.recGlb.id_recibo } })
        .then(function (response) {
          scope.vouchers = response.data;
        }, errorHttp);
      http.get("api/recibos.php", { headers: { Authorization: sessionStorage.getItem("token") }, params: { reciboc: rootScope.recGlb.id_recibo } })
        .then(function (response) {
          scope.conceptos = response.data;
          scope.conceptos.forEach(conE =>{
            scope.total += parseFloat(conE.importe);
          });
        }, errorHttp);

    };

    
    scope.recarga();
  }])
  .controller('comentControl', ["$scope", "$http", "$rootScope", function (scope, http, rootScope) {
    scope.menu1 = false;
    scope.menu2 = false;
    scope.menu3 = true;
    scope.mensajes=[{de:'00030059',mensaje:'esto es un mensaje de prueba',fecha:'06/11/2018'},{de:'admin',mensaje:'y esta la contestacion',fecha:'07/11/2018'}];
    
    scope.recarga = function () {
      http.get("api/coment.php", { headers: { Authorization: sessionStorage.getItem("token") } })
        .then(function (response) {
          scope.mensajes = response.data;
          scope.visto();
        }, errorHttp);
    };

    scope.guardar = function () {
      var fd = new FormData();
      fd.append('comentario', scope.comentario);
      fd.append('para', 'admin');
      //console.log();
      http.post('api/coment.php', fd, {
        headers: {
          'Authorization': sessionStorage.getItem("token"),
          'Content-Type': undefined
        }
      })
        .then(function (response) {
          scope.comentario="";
          scope.recarga();
        }, errorHttp);
    };

    scope.visto = function () {
      scope.mensajes.forEach(men => {
        if(men.status=='N' && rootScope.control!=men.de){
          http.put("api/coment.php", null, { headers: { Authorization: sessionStorage.getItem("token") }, params: {'ID':men.id_coment} });
        }
      });
    };
    
    scope.recarga();
    
  }])
  ;

function errorHttp(error) {

  M.toast({ html: 'Error en la peticion: ' + error.statusText });
  if (error.status == 401) location.href = "#!/login";

}