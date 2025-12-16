"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_paciente_RecetaOnline_vue"],{

/***/ "./resources/js/components/paciente/RecetaOnline.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/paciente/RecetaOnline.vue ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./RecetaOnline.vue?vue&type=template&id=61c6c190& */ "./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__.render,
  _RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/paciente/RecetaOnline.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RecetaOnline_vue_vue_type_template_id_61c6c190___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./RecetaOnline.vue?vue&type=template&id=61c6c190& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/paciente/RecetaOnline.vue?vue&type=template&id=61c6c190& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "pcoded-content" }, [
    _c("div", { staticClass: "page-header" }, [
      _c("div", { staticClass: "page-block" }, [
        _c("div", { staticClass: "row align-items-center" }, [
          _c("div", { staticClass: "col-md-12" }, [
            _vm._m(0),
            _vm._v(" "),
            _c("ul", { staticClass: "breadcrumb" }, [
              _c(
                "li",
                { staticClass: "breadcrumb-item" },
                [
                  _c(
                    "router-link",
                    {
                      attrs: {
                        to: "/Paciente",
                        "data-toggle": "tooltip",
                        "data-placement": "top",
                        title: "Volver a mi escritorio",
                      },
                    },
                    [_c("i", { staticClass: "feather icon-home" })]
                  ),
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "li",
                { staticClass: "breadcrumb-item" },
                [
                  _c(
                    "router-link",
                    { attrs: { to: "/Paciente/Receta_Online" } },
                    [_vm._v("Receta Online")]
                  ),
                ],
                1
              ),
            ]),
          ]),
        ]),
      ]),
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row m-b-30" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "card-deck" }, [
          _c(
            "div",
            { staticClass: "card subir py-5" },
            [
              _c(
                "router-link",
                { attrs: { to: "/Paciente/Receta_Online/Mis_Recetas" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-body text-center",
                      staticStyle: { cursor: "pointer" },
                    },
                    [
                      _c("img", {
                        staticClass: "wid-100 text-center mb-3",
                        attrs: {
                          src: "/images/iconos/recetas.svg",
                          alt: "Mis Recetas",
                        },
                      }),
                      _vm._v(" "),
                      _c("h4", { staticClass: "titulos_tarjetas" }, [
                        _vm._v(
                          "\n                                Mis Recetas\n                            "
                        ),
                      ]),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card subir py-5" },
            [
              _c(
                "router-link",
                { attrs: { to: "/Paciente/Receta_Online/Mis_Examenes" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-body text-center",
                      staticStyle: { cursor: "pointer" },
                    },
                    [
                      _c("img", {
                        staticClass: "wid-100 text-center mb-3",
                        attrs: {
                          src: "/images/iconos/examen.svg",
                          alt: "Mis Examenes",
                        },
                      }),
                      _vm._v(" "),
                      _c("h4", { staticClass: "titulos_tarjetas" }, [
                        _vm._v(
                          "\n                                Mis Exámenes\n                            "
                        ),
                      ]),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
        ]),
      ]),
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row m-b-10" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "card-deck" }, [
          _c(
            "div",
            { staticClass: "card subir py-5" },
            [
              _c(
                "router-link",
                { attrs: { to: "/Paciente/Receta_Online/Mis_Certificados" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-body text-center",
                      staticStyle: { cursor: "pointer" },
                    },
                    [
                      _c("img", {
                        staticClass: "wid-100 text-center mb-3",
                        attrs: {
                          src: "/images/iconos/certificado.svg",
                          alt: "Mis Certificados",
                        },
                      }),
                      _vm._v(" "),
                      _c("h4", { staticClass: "titulos_tarjetas" }, [
                        _vm._v(
                          "\n                                Mis Certificados\n                            "
                        ),
                      ]),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "card subir py-5" },
            [
              _c(
                "router-link",
                { attrs: { to: "/Paciente/Receta_Online/Mis_Licencias" } },
                [
                  _c(
                    "div",
                    {
                      staticClass: "card-body text-center",
                      staticStyle: { cursor: "pointer" },
                    },
                    [
                      _c("img", {
                        staticClass: "wid-100 text-center mb-3",
                        attrs: {
                          src: "/images/iconos/licencia.svg",
                          alt: "Mis Licencias",
                        },
                      }),
                      _vm._v(" "),
                      _c("h4", { staticClass: "titulos_tarjetas" }, [
                        _vm._v(
                          "\n                                Mis Licencias\n                            "
                        ),
                      ]),
                    ]
                  ),
                ]
              ),
            ],
            1
          ),
        ]),
      ]),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "page-header-title" }, [
      _c("h5", { staticClass: "m-b-10 font-weight-bold" }, [
        _vm._v("Receta Online"),
      ]),
    ])
  },
]
render._withStripped = true



/***/ })

}]);