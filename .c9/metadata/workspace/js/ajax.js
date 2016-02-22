{"filter":false,"title":"ajax.js","tooltip":"/js/ajax.js","undoManager":{"mark":13,"position":13,"stack":[[{"start":{"row":0,"column":0},"end":{"row":78,"column":2},"action":"insert","lines":["/*global alert, XMLHttpRequest*/","\"use strict\";","function Ajax() {","    this.peticion = new XMLHttpRequest();","    this.url = \"\";","    this.parametros = \"\";","    this.metodo = \"GET\";","    this.xml = false;","    this.respuesta = alert;","    this.error = alert;","    this.peticion.responseType = \"json\";","    //\"arraybuffer\", \"blob\", \"document\", \"json\", \"text\", \"\" (default) //\"json\" -> this.peticion.response","}","Ajax.prototype.doPeticion = function () {","    var that = this;","    var procesa = function (funcion, dato) {","        funcion(dato);","    };","    this.peticion.open(this.metodo, this.url, true);","    this.peticion.onreadystatechange = function () {//onload","        if (that.peticion.readyState === 4) {//0-unsent, 1-opened, 2-headers_received, 3-loading, 4-done","            if (that.peticion.status === 200) {//200-ok","                var respuesta;","                if (that.xml) {","                    respuesta = that.peticion.responseXML;","                } else {","                    respuesta = that.peticion.response;","                    //respuesta = JSON.parse(that.peticion.responseText);","                }","                procesa(that.respuesta, respuesta);","            } else {","                procesa(that.error, \"error\");","            }","        }","    };","    if (this.metodo === \"POST\") {","        this.peticion.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");","        this.peticion.send(this.parametros);","    } else {","        this.peticion.send();","    }","};","","/*Ajax.prototype.setType = function (param){","    this.peticion.responseType = param;","}*/","","Ajax.prototype.setGet = function () {","    this.metodo = \"GET\";","};","Ajax.prototype.setJSON = function () {","    this.xml = false;","    this.peticion.responseType = \"json\";","};","Ajax.prototype.setParametros = function (params) {","    this.parametros = params;//name=encodeURIComponent(value)&","};","Ajax.prototype.setPost = function () {","    this.metodo = \"POST\";","};","Ajax.prototype.setRespuesta = function (funcion) {","    this.respuesta = funcion;","};","Ajax.prototype.setRespuestaError = function (funcion) {","    this.error = funcion;","};","Ajax.prototype.setUrl = function (url) {","    this.url = url;","};","Ajax.prototype.setXML = function () {","    this.xml = true;","    this.peticion.responseType = \"\";","};","Ajax.prototype.getCabeceras = function () {","    return this.peticion.getAllResponseHeaders();","};","Ajax.prototype.getContentType = function () {","    return this.peticion.getResponseHeader(\"content-type\");","};"],"id":1}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":22},"action":"remove","lines":["GET"],"id":2}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":20},"action":"insert","lines":["P"],"id":3}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"insert","lines":["O"],"id":4}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":21},"action":"remove","lines":["PO"],"id":5},{"start":{"row":6,"column":19},"end":{"row":6,"column":23},"action":"insert","lines":["POST"]}],[{"start":{"row":6,"column":22},"end":{"row":6,"column":23},"action":"remove","lines":["T"],"id":6}],[{"start":{"row":6,"column":21},"end":{"row":6,"column":22},"action":"remove","lines":["S"],"id":7}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"remove","lines":["O"],"id":8}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":20},"action":"remove","lines":["P"],"id":9}],[{"start":{"row":6,"column":19},"end":{"row":6,"column":20},"action":"insert","lines":["G"],"id":10}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"insert","lines":["R"],"id":11}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"remove","lines":["R"],"id":12}],[{"start":{"row":6,"column":20},"end":{"row":6,"column":21},"action":"insert","lines":["E"],"id":13}],[{"start":{"row":6,"column":21},"end":{"row":6,"column":22},"action":"insert","lines":["T"],"id":14}]]},"ace":{"folds":[],"scrolltop":164,"scrollleft":0,"selection":{"start":{"row":27,"column":20},"end":{"row":27,"column":20},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":7,"state":"start","mode":"ace/mode/javascript"}},"timestamp":1455454875000,"hash":"14bcd1c02bf4f9f4638abedbff79d60b414e8170"}