"use strict";

var datosRequest = /** @class */ (function () {
    function datosRequest(modulo_, metodo_, data_, debug_) {
        if (debug_ === void 0) { debug_ = false; }
        this.modulo = modulo_;
        this.metodo = metodo_;
        this.data = data_;
        this.debug = debug_;
    }
    return datosRequest;
}());
var Api = /** @class */ (function () {
    function Api(modulo, metodo) {
        // this.url_ = "APIV1";
        this.url_ = "wbs/wbs.php";
        this.type_ = "POST";
        this.modulo_ = modulo;
        this.metodo_ = metodo;
    }
    Api.prototype.request = function (data, callback,errorcallback, methodSend, debug) {
        var data_ = new datosRequest(this.modulo, this.metodo, data, debug);
        $.ajax({
            type: methodSend,
            url: this.url,
            data: data_,
            dataType: 'json',
            success: callback,
            error: errorcallback
        });
    };
    Api.prototype.help = function () {
        console.log("\n        -- Inicializar Datos --\n        Ej: var datos = {nombre:'prueba'};\n        -- Incializamos la Api -- Paramentros(modulo:string,metodo:string)\n        Ej: var api = new Api(\"adicionales\",\"obtenerCoberturas\");\n        -- Ejecutamos un REQUEST -- Parametros(datos:Object,funcion callback,metodo de envio \"GET\" o \"POST\")\n        Ej: api.request(datos,function(resp:any){console.log(resp)},\"GET\")\n      ");
    };
    Object.defineProperty(Api.prototype, "url", {
        get: function () {
            return this.url_;
        },
        set: function (url__) {
            this.url_ = url__;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Api.prototype, "type", {
        get: function () {
            return this.type_;
        },
        set: function (type__) {
            this.type_ = type__;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Api.prototype, "modulo", {
        get: function () {
            return this.modulo_;
        },
        set: function (modulo__) {
            this.modulo_ = modulo__;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(Api.prototype, "metodo", {
        get: function () {
            return this.metodo_;
        },
        set: function (metodo__) {
            this.metodo_ = metodo__;
        },
        enumerable: true,
        configurable: true
    });
    return Api;
}());

function testAPI() {
    var datos = { nombre: 'prueba' };
    var api = new Api("adicionales", "obtenerCoberturas");
    api.request(datos, function (resp) { console.log(resp); }, function (resp) { console.log(resp); },"GET");
}
