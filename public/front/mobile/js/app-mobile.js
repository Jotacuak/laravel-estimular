/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@babel/runtime/regenerator/index.js":
/*!**********************************************************!*\
  !*** ./node_modules/@babel/runtime/regenerator/index.js ***!
  \**********************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__(/*! regenerator-runtime */ "./node_modules/regenerator-runtime/runtime.js");


/***/ }),

/***/ "./resources/js/front/desktop/cardFlip.js":
/*!************************************************!*\
  !*** ./resources/js/front/desktop/cardFlip.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderCard": () => (/* binding */ renderCard)
/* harmony export */ });
var renderCard = function renderCard() {
  var swichBtn = document.getElementById("swich-btn");
  var cards = document.querySelectorAll(".card-container");
  document.addEventListener("loadSection", function (event) {
    if (event.detail.section.includes('home')) {
      renderCard();
    }
  });
  cards.forEach(function (card) {
    swichBtn.addEventListener("click", function () {
      card.classList.toggle("flip");
    });
  });
};

/***/ }),

/***/ "./resources/js/front/mobile/accordion.js":
/*!************************************************!*\
  !*** ./resources/js/front/mobile/accordion.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderAccordion": () => (/* binding */ renderAccordion)
/* harmony export */ });
var renderAccordion = function renderAccordion() {
  var accordionBtns = document.querySelectorAll('.faqs-element-question');
  accordionBtns.forEach(function (accordionBtn) {
    accordionBtn.addEventListener("click", function () {
      var answer = accordionBtn.closest('.faqs-element').querySelector('.faqs-element-answer');
      answer.classList.toggle("active");
    });
  });
};

/***/ }),

/***/ "./resources/js/front/mobile/menu.js":
/*!*******************************************!*\
  !*** ./resources/js/front/mobile/menu.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderMenu": () => (/* binding */ renderMenu)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

var renderMenu = function renderMenu() {
  var hamburger = document.getElementById("collapse-button");
  var overlay = document.getElementById("overlay");
  hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("active");
    overlay.classList.toggle("active");
  });
  var menuItems = document.querySelectorAll('.menu-item');
  menuItems.forEach(function (menuItem) {
    menuItem.addEventListener("click", function () {
      var main = document.getElementById('main-content');
      var url = menuItem.dataset.url;
      var section = menuItem.dataset.section;
      var currentSection = document.querySelector('.page-section').id;
      localStorage.setItem('lastSection', currentSection);

      var sendPageRequest = /*#__PURE__*/function () {
        var _ref = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
            while (1) {
              switch (_context.prev = _context.next) {
                case 0:
                  _context.prev = 0;
                  _context.next = 3;
                  return axios.get(url).then(function (response) {
                    window.history.pushState('', '', url);
                    main.innerHTML = response.data.content;
                    document.dispatchEvent(new CustomEvent('loadSection', {
                      detail: {
                        section: section
                      }
                    }));
                  });

                case 3:
                  _context.next = 8;
                  break;

                case 5:
                  _context.prev = 5;
                  _context.t0 = _context["catch"](0);
                  console.error(_context.t0);

                case 8:
                case "end":
                  return _context.stop();
              }
            }
          }, _callee, null, [[0, 5]]);
        }));

        return function sendPageRequest() {
          return _ref.apply(this, arguments);
        };
      }();

      sendPageRequest();
    });
  });
  window.addEventListener('popstate', function (event) {
    var mainContent = document.getElementById('main-content');
    var url = window.location.href;

    var sendPageRequest = /*#__PURE__*/function () {
      var _ref2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                try {
                  axios.get(url).then(function (response) {
                    mainContent.innerHTML = response.data.content;
                    document.dispatchEvent(new CustomEvent('loadSection', {
                      detail: {
                        section: localStorage.getItem('lastSection')
                      }
                    }));
                    var currentSection = document.querySelector('.page-section').id;
                    localStorage.setItem('lastSection', currentSection);
                  });
                } catch (error) {}

              case 1:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }));

      return function sendPageRequest() {
        return _ref2.apply(this, arguments);
      };
    }();

    sendPageRequest();
  });
};

/***/ }),

/***/ "./resources/js/front/mobile/renderForm.js":
/*!*************************************************!*\
  !*** ./resources/js/front/mobile/renderForm.js ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "renderForm": () => (/* binding */ renderForm)
/* harmony export */ });
/* harmony import */ var _validador_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./validador.js */ "./resources/js/front/mobile/validador.js");
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }


var renderForm = function renderForm() {
  var buttonSubmit = document.querySelector('.submit-button');
  var forms = document.querySelectorAll('.front-form');

  if (buttonSubmit) {
    buttonSubmit.addEventListener("click", function () {
      forms.forEach(function (form) {
        var validate = (0,_validador_js__WEBPACK_IMPORTED_MODULE_0__.validador)(form);
        validate.onSuccess(function (ev) {
          ev.preventDefault();
          var formData = new FormData(form);

          var _iterator = _createForOfIteratorHelper(formData.entries()),
              _step;

          try {
            for (_iterator.s(); !(_step = _iterator.n()).done;) {
              var pair = _step.value;
              console.log(pair[0] + ', ' + pair[1]);
            }
          } catch (err) {
            _iterator.e(err);
          } finally {
            _iterator.f();
          }

          ;
        });
        validate.onFail(function () {});
      });
    });
  }

  ;
};

/***/ }),

/***/ "./resources/js/front/mobile/validador.js":
/*!************************************************!*\
  !*** ./resources/js/front/mobile/validador.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "validador": () => (/* binding */ validador)
/* harmony export */ });
/* harmony import */ var just_validate__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! just-validate */ "./node_modules/just-validate/dist/just-validate.es.js");

var validador = function validador(form) {
  var invalidElements = document.querySelectorAll('.is-invalid');
  var validate = new just_validate__WEBPACK_IMPORTED_MODULE_0__["default"](form, {
    errorFieldCssClass: 'is-invalid',
    errorLabelStyle: {
      color: 'red',
      fontsize: '14px'
    },
    focusInvalidField: true,
    lockForm: true,
    errorsContainer: '#errors-container'
  });

  if (invalidElements.length > 0) {
    validate.destroy();
  }

  ;
  validate.addField('#name', [{
    rule: 'required',
    errorMessage: 'Name is required!'
  }, {
    rule: 'minLength',
    value: 3
  }, {
    rule: 'maxLength',
    value: 30
  }]).addField('#surname', [{
    rule: 'required',
    errorMessage: 'Surname is required!'
  }, {
    rule: 'minLength',
    value: 3
  }, {
    rule: 'maxLength',
    value: 30
  }]) // .addField('#address', [
  //     {
  //         rule: 'required',
  //         errorMessage: 'Address is required!'
  //     }
  // ])    
  // .addField('#location', [
  //     {
  //         rule: 'required',
  //         errorMessage: 'Location is required!'
  //     }
  // ]) 
  // .addField('#postal_code', [
  //     {
  //         rule: 'required',
  //         errorMessage: 'Postal code is required!'
  //     }
  // ])
  .addField('#mobile_phone', [{
    rule: 'required',
    errorMessage: 'Mobile phone is required!'
  }]).addField('#email', [{
    rule: 'required',
    errorMessage: 'Email is required!'
  }, {
    rule: 'email',
    errorMessage: 'Email is invalid!'
  }]); // .addRequiredGroup(
  //     '#checkbox_group',
  //     'You should select at least one communication channel',
  //     {
  //         errorsContainer: '#errors-container',
  //     }
  // );                 

  return validate;
};

/***/ }),

/***/ "./node_modules/just-validate/dist/just-validate.es.js":
/*!*************************************************************!*\
  !*** ./node_modules/just-validate/dist/just-validate.es.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ JustValidate)
/* harmony export */ });
var __defProp = Object.defineProperty;
var __getOwnPropSymbols = Object.getOwnPropertySymbols;
var __hasOwnProp = Object.prototype.hasOwnProperty;
var __propIsEnum = Object.prototype.propertyIsEnumerable;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __spreadValues = (a, b) => {
  for (var prop in b || (b = {}))
    if (__hasOwnProp.call(b, prop))
      __defNormalProp(a, prop, b[prop]);
  if (__getOwnPropSymbols)
    for (var prop of __getOwnPropSymbols(b)) {
      if (__propIsEnum.call(b, prop))
        __defNormalProp(a, prop, b[prop]);
    }
  return a;
};
var __publicField = (obj, key, value) => {
  __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
  return value;
};
const EMAIL_REGEXP = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const NUMBER_REGEXP = /^[0-9]+$/;
const PASSWORD_REGEXP = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
const STRONG_PASSWORD_REGEXP = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
const isEmpty = (value) => {
  let newVal = value;
  if (typeof value === "string") {
    newVal = value.trim();
  }
  return !newVal;
};
const isEmail = (value) => {
  return EMAIL_REGEXP.test(value);
};
const isLengthMoreThanMax = (value, len) => {
  return value.length > len;
};
const isLengthLessThanMin = (value, len) => {
  return value.length < len;
};
const isNumber = (value) => {
  return NUMBER_REGEXP.test(value);
};
const isPassword = (value) => {
  return PASSWORD_REGEXP.test(value);
};
const isStrongPassword = (value) => {
  return STRONG_PASSWORD_REGEXP.test(value);
};
const isNumberMoreThanMax = (value, len) => {
  return value > len;
};
const isNumberLessThanMin = (value, len) => {
  return value < len;
};
var Rules;
(function(Rules2) {
  Rules2["Required"] = "required";
  Rules2["Email"] = "email";
  Rules2["MinLength"] = "minLength";
  Rules2["MaxLength"] = "maxLength";
  Rules2["Password"] = "password";
  Rules2["Number"] = "number";
  Rules2["MaxNumber"] = "maxNumber";
  Rules2["MinNumber"] = "minNumber";
  Rules2["StrongPassword"] = "strongPassword";
  Rules2["CustomRegexp"] = "customRegexp";
  Rules2["MinFilesCount"] = "minFilesCount";
  Rules2["MaxFilesCount"] = "maxFilesCount";
  Rules2["Files"] = "files";
})(Rules || (Rules = {}));
var GroupRules;
(function(GroupRules2) {
  GroupRules2["Required"] = "required";
})(GroupRules || (GroupRules = {}));
var CustomStyleTagIds;
(function(CustomStyleTagIds2) {
  CustomStyleTagIds2["Label"] = "label";
  CustomStyleTagIds2["LabelArrow"] = "labelArrow";
})(CustomStyleTagIds || (CustomStyleTagIds = {}));
const getDefaultFieldMessage = (rule, ruleValue) => {
  switch (rule) {
    case Rules.Required:
      return "The field is required";
    case Rules.Email:
      return "Email has invalid format";
    case Rules.MaxLength:
      return "The field must contain a maximum of :value characters".replace(":value", String(ruleValue));
    case Rules.MinLength:
      return "The field must contain a minimum of :value characters".replace(":value", String(ruleValue));
    case Rules.Password:
      return "Password must contain minimum eight characters, at least one letter and one number";
    case Rules.Number:
      return "Value should be a number";
    case Rules.StrongPassword:
      return "Password should contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character";
    case Rules.MaxNumber:
      return "Number should be less or equal than :value".replace(":value", String(ruleValue));
    case Rules.MinNumber:
      return "Number should be more or equal than :value".replace(":value", String(ruleValue));
    case Rules.MinFilesCount:
      return "Files count should be more or equal than :value".replace(":value", String(ruleValue));
    case Rules.MaxFilesCount:
      return "Files count should be less or equal than :value".replace(":value", String(ruleValue));
    case Rules.Files:
      return "Uploaded files have one or several invalid properties (extension/size/type etc)";
    default:
      return "Value is incorrect";
  }
};
const getDefaultGroupMessage = (rule) => {
  switch (rule) {
    case GroupRules.Required:
      return "The field is required";
    default:
      return "Group is incorrect";
  }
};
const isPromise = (val) => !!val && typeof val.then === "function";
const errorLabelCss = `.just-validate-error-label[data-tooltip=true]{position:fixed;padding:4px 8px;background:#423f3f;color:#fff;white-space:nowrap;z-index:10;border-radius:4px;transform:translateY(-5px)}.just-validate-error-label[data-tooltip=true]:before{content:'';width:0;height:0;border-left:solid 5px transparent;border-right:solid 5px transparent;border-bottom:solid 5px #423f3f;position:absolute;z-index:3;display:block;bottom:-5px;transform:rotate(180deg);left:calc(50% - 5px)}.just-validate-error-label[data-tooltip=true][data-direction=left]{transform:translateX(-5px)}.just-validate-error-label[data-tooltip=true][data-direction=left]:before{right:-7px;bottom:auto;left:auto;top:calc(50% - 2px);transform:rotate(90deg)}.just-validate-error-label[data-tooltip=true][data-direction=right]{transform:translateX(5px)}.just-validate-error-label[data-tooltip=true][data-direction=right]:before{right:auto;bottom:auto;left:-7px;top:calc(50% - 2px);transform:rotate(-90deg)}.just-validate-error-label[data-tooltip=true][data-direction=bottom]{transform:translateY(5px)}.just-validate-error-label[data-tooltip=true][data-direction=bottom]:before{right:auto;bottom:auto;left:calc(50% - 5px);top:-5px;transform:rotate(0)}`;
const TOOLTIP_ARROW_HEIGHT = 5;
const defaultGlobalConfig = {
  errorFieldStyle: {
    color: "#b81111",
    border: "1px solid #B81111"
  },
  errorFieldCssClass: "just-validate-error-field",
  successFieldCssClass: "just-validate-success-field",
  errorLabelStyle: {
    color: "#b81111"
  },
  errorLabelCssClass: "just-validate-error-label",
  successLabelCssClass: "just-validate-success-label",
  focusInvalidField: true,
  lockForm: true,
  testingMode: false
};
class JustValidate {
  constructor(form, globalConfig, dictLocale) {
    __publicField(this, "form", null);
    __publicField(this, "fields", {});
    __publicField(this, "groupFields", {});
    __publicField(this, "errors", {});
    __publicField(this, "isValid", false);
    __publicField(this, "isSubmitted", false);
    __publicField(this, "globalConfig", defaultGlobalConfig);
    __publicField(this, "errorLabels", {});
    __publicField(this, "successLabels", {});
    __publicField(this, "eventListeners", []);
    __publicField(this, "dictLocale", []);
    __publicField(this, "currentLocale");
    __publicField(this, "customStyleTags", {});
    __publicField(this, "onSuccessCallback");
    __publicField(this, "onFailCallback");
    __publicField(this, "tooltips", []);
    __publicField(this, "lastScrollPosition");
    __publicField(this, "isScrollTick");
    __publicField(this, "refreshAllTooltips", () => {
      this.tooltips.forEach((item) => {
        item.refresh();
      });
    });
    __publicField(this, "handleDocumentScroll", () => {
      this.lastScrollPosition = window.scrollY;
      if (!this.isScrollTick) {
        window.requestAnimationFrame(() => {
          this.refreshAllTooltips();
          this.isScrollTick = false;
        });
        this.isScrollTick = true;
      }
    });
    __publicField(this, "formSubmitHandler", (ev) => {
      ev.preventDefault();
      this.isSubmitted = true;
      this.validateHandler(ev);
    });
    __publicField(this, "handleFieldChange", (target) => {
      let currentFieldName;
      for (const fieldName in this.fields) {
        const field = this.fields[fieldName];
        if (field.elem === target) {
          currentFieldName = fieldName;
          break;
        }
      }
      if (!currentFieldName) {
        return;
      }
      this.validateField(currentFieldName, true);
    });
    __publicField(this, "handleGroupChange", (target) => {
      let currentGroup;
      let currentGroupName;
      for (const groupName in this.groupFields) {
        const group = this.groupFields[groupName];
        if (group.elems.find((elem) => elem === target)) {
          currentGroup = group;
          currentGroupName = groupName;
          break;
        }
      }
      if (!currentGroup || !currentGroupName) {
        return;
      }
      this.validateGroup(currentGroupName, currentGroup);
    });
    __publicField(this, "handlerChange", (ev) => {
      if (!ev.target) {
        return;
      }
      this.handleFieldChange(ev.target);
      this.handleGroupChange(ev.target);
      this.renderErrors();
    });
    this.initialize(form, globalConfig, dictLocale);
  }
  initialize(form, globalConfig, dictLocale) {
    this.form = null;
    this.errors = {};
    this.isValid = false;
    this.isSubmitted = false;
    this.globalConfig = defaultGlobalConfig;
    this.errorLabels = {};
    this.successLabels = {};
    this.eventListeners = [];
    this.customStyleTags = {};
    this.tooltips = [];
    if (typeof form === "string") {
      const elem = document.querySelector(form);
      if (!elem) {
        throw Error(`Form with ${form} selector not found! Please check the form selector`);
      }
      this.setForm(elem);
    } else if (form instanceof HTMLFormElement) {
      this.setForm(form);
    } else {
      throw Error(`Form selector is not valid. Please specify a string selector or a DOM element.`);
    }
    this.globalConfig = __spreadValues(__spreadValues({}, defaultGlobalConfig), globalConfig);
    if (dictLocale) {
      this.dictLocale = dictLocale;
    }
    if (this.isTooltip()) {
      const styleTag = document.createElement("style");
      styleTag.textContent = errorLabelCss;
      this.customStyleTags[CustomStyleTagIds.Label] = document.head.appendChild(styleTag);
      this.addListener("scroll", document, this.handleDocumentScroll);
    }
  }
  getLocalisedString(str) {
    var _a;
    if (!this.currentLocale || !this.dictLocale.length) {
      return str;
    }
    const localisedStr = (_a = this.dictLocale.find((item) => item.key === str)) == null ? void 0 : _a.dict[this.currentLocale];
    return localisedStr || str;
  }
  getFieldErrorMessage(fieldRule, elem) {
    const msg = typeof fieldRule.errorMessage === "function" ? fieldRule.errorMessage(this.getElemValue(elem), this.fields) : fieldRule.errorMessage;
    return this.getLocalisedString(msg) || getDefaultFieldMessage(fieldRule.rule, fieldRule.value);
  }
  getFieldSuccessMessage(successMessage, elem) {
    const msg = typeof successMessage === "function" ? successMessage(this.getElemValue(elem), this.fields) : successMessage;
    return this.getLocalisedString(msg);
  }
  getGroupErrorMessage(groupRule) {
    return this.getLocalisedString(groupRule.errorMessage) || getDefaultGroupMessage(groupRule.rule);
  }
  getGroupSuccessMessage(groupRule) {
    return this.getLocalisedString(groupRule.successMessage);
  }
  setFieldInvalid(field, fieldRule) {
    this.fields[field].isValid = false;
    this.fields[field].errorMessage = this.getFieldErrorMessage(fieldRule, this.fields[field].elem);
  }
  setFieldValid(field, successMessage) {
    this.fields[field].isValid = true;
    if (successMessage !== void 0) {
      this.fields[field].successMessage = this.getFieldSuccessMessage(successMessage, this.fields[field].elem);
    }
  }
  setGroupInvalid(groupName, groupRule) {
    this.groupFields[groupName].isValid = false;
    this.groupFields[groupName].errorMessage = this.getGroupErrorMessage(groupRule);
  }
  setGroupValid(groupName, groupRule) {
    this.groupFields[groupName].isValid = true;
    this.groupFields[groupName].successMessage = this.getGroupSuccessMessage(groupRule);
  }
  getElemValue(elem) {
    switch (elem.type) {
      case "checkbox":
        return elem.checked;
      case "file":
        return elem.files;
      default:
        return elem.value;
    }
  }
  validateGroupRule(groupName, type, elems, groupRule) {
    switch (groupRule.rule) {
      case GroupRules.Required: {
        if (type === "radio" || type === "checkbox") {
          if (elems.every((elem) => !elem.checked)) {
            this.setGroupInvalid(groupName, groupRule);
          } else {
            this.setGroupValid(groupName, groupRule);
          }
        }
      }
    }
  }
  validateFieldRule(field, elem, fieldRule, afterInputChanged = false) {
    const ruleValue = fieldRule.value;
    const elemValue = this.getElemValue(elem);
    if (fieldRule.plugin) {
      const result = fieldRule.plugin(elemValue, this.fields);
      if (!result) {
        this.setFieldInvalid(field, fieldRule);
      }
      return;
    }
    switch (fieldRule.rule) {
      case Rules.Required: {
        if (isEmpty(elemValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.Email: {
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (!isEmail(elemValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.MaxLength: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        if (isLengthMoreThanMax(elemValue, ruleValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.MinLength: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        if (isLengthLessThanMin(elemValue, ruleValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.Password: {
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        if (!isPassword(elemValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.StrongPassword: {
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        if (!isStrongPassword(elemValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.Number: {
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        if (!isNumber(elemValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.MaxNumber: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        const num = +elemValue;
        if (Number.isNaN(num) || isNumberMoreThanMax(num, ruleValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.MinNumber: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof elemValue !== "string") {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (elemValue === "") {
          break;
        }
        const num = +elemValue;
        if (Number.isNaN(num) || isNumberLessThanMin(num, ruleValue)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.CustomRegexp: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          return;
        }
        let regexp;
        try {
          regexp = new RegExp(ruleValue);
        } catch (e) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] should be a valid regexp. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        const str = String(elemValue);
        if (str !== "" && !regexp.test(str)) {
          this.setFieldInvalid(field, fieldRule);
        }
        break;
      }
      case Rules.MinFilesCount: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (Number.isFinite(elemValue == null ? void 0 : elemValue.length) && elemValue.length < ruleValue) {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        break;
      }
      case Rules.MaxFilesCount: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (typeof ruleValue !== "number") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be a number. The field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        if (Number.isFinite(elemValue == null ? void 0 : elemValue.length) && elemValue.length > ruleValue) {
          this.setFieldInvalid(field, fieldRule);
          break;
        }
        break;
      }
      case Rules.Files: {
        if (ruleValue === void 0) {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field is not defined. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          return;
        }
        if (typeof ruleValue !== "object") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be an object. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          return;
        }
        const filesConfig = ruleValue.files;
        if (typeof filesConfig !== "object") {
          console.error(`Value for ${fieldRule.rule} rule for [${field}] field should be an object with files array. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          return;
        }
        const isFilePropsInvalid = (file, fileConfig) => {
          const minSizeInvalid = Number.isFinite(fileConfig.minSize) && file.size < fileConfig.minSize;
          const maxSizeInvalid = Number.isFinite(fileConfig.maxSize) && file.size > fileConfig.maxSize;
          const nameInvalid = Array.isArray(fileConfig.names) && !fileConfig.names.includes(file.name);
          const extInvalid = Array.isArray(fileConfig.extensions) && !fileConfig.extensions.includes(file.name.split(".")[file.name.split(".").length - 1]);
          const typeInvalid = Array.isArray(fileConfig.types) && !fileConfig.types.includes(file.type);
          return minSizeInvalid || maxSizeInvalid || nameInvalid || extInvalid || typeInvalid;
        };
        if (typeof elemValue === "object" && elemValue !== null) {
          for (let fileIdx = 0, len = elemValue.length; fileIdx < len; ++fileIdx) {
            const file = elemValue.item(fileIdx);
            if (!file) {
              this.setFieldInvalid(field, fieldRule);
              break;
            }
            const filesInvalid = isFilePropsInvalid(file, filesConfig);
            if (filesInvalid) {
              this.setFieldInvalid(field, fieldRule);
              break;
            }
          }
        }
        break;
      }
      default: {
        if (typeof fieldRule.validator !== "function") {
          console.error(`Validator for custom rule for [${field}] field should be a function. This field will be always invalid.`);
          this.setFieldInvalid(field, fieldRule);
          return;
        }
        const result = fieldRule.validator(elemValue, this.fields);
        if (typeof result !== "boolean" && typeof result !== "function") {
          console.error(`Validator return value for [${field}] field should be boolean or function. It will be cast to boolean.`);
        }
        if (typeof result === "function") {
          if (afterInputChanged) {
            this.fields[field].asyncCheckPending = true;
          } else {
            this.fields[field].asyncCheckPending = false;
            const promise = result();
            if (!isPromise(promise)) {
              console.error(`Validator function for custom rule for [${field}] field should return a Promise. This field will be always invalid.`);
              this.setFieldInvalid(field, fieldRule);
              return;
            }
            return promise.then((resp) => {
              if (!resp) {
                this.setFieldInvalid(field, fieldRule);
              }
            }).catch(() => {
              this.setFieldInvalid(field, fieldRule);
            });
          }
        }
        if (!result) {
          this.setFieldInvalid(field, fieldRule);
        }
      }
    }
  }
  validateField(fieldName, afterInputChanged = false) {
    var _a;
    const field = this.fields[fieldName];
    field.isValid = true;
    const promises = [];
    [...field.rules].reverse().forEach((rule) => {
      const res = this.validateFieldRule(fieldName, field.elem, rule, afterInputChanged);
      if (isPromise(res)) {
        promises.push(res);
      }
    });
    if (field.isValid) {
      this.setFieldValid(fieldName, (_a = field.config) == null ? void 0 : _a.successMessage);
    }
    return Promise.allSettled(promises);
  }
  revalidateField(field) {
    if (typeof field !== "string") {
      throw Error(`Field selector is not valid. Please specify a string selector.`);
    }
    if (!this.fields[field]) {
      console.error(`Field not found. Check the field selector.`);
      return Promise.reject();
    }
    return new Promise((resolve) => {
      this.validateField(field, true).finally(() => {
        this.clearFieldError(field);
        this.clearFieldLabel(field);
        this.renderFieldError(field);
        resolve(!!this.fields[field].isValid);
      });
    });
  }
  validateGroup(groupName, group) {
    const promises = [];
    [...group.rules].reverse().forEach((rule) => {
      const res = this.validateGroupRule(groupName, group.type, group.elems, rule);
      if (isPromise(res)) {
        promises.push(res);
      }
    });
    return Promise.allSettled(promises);
  }
  focusInvalidField() {
    for (const fieldName in this.fields) {
      const field = this.fields[fieldName];
      if (!field.isValid) {
        setTimeout(() => field.elem.focus(), 0);
        break;
      }
    }
  }
  afterSubmitValidation(forceRevalidation = false) {
    this.renderErrors(forceRevalidation);
    if (this.globalConfig.focusInvalidField) {
      this.focusInvalidField();
    }
  }
  validate(forceRevalidation = false) {
    return new Promise((resolve) => {
      const promises = [];
      Object.keys(this.fields).forEach((fieldName) => {
        const promise = this.validateField(fieldName);
        if (isPromise(promise)) {
          promises.push(promise);
        }
      });
      Object.keys(this.groupFields).forEach((groupName) => {
        const group = this.groupFields[groupName];
        const promise = this.validateGroup(groupName, group);
        if (isPromise(promise)) {
          promises.push(promise);
        }
      });
      if (promises.length) {
        Promise.allSettled(promises).then(() => {
          this.afterSubmitValidation(forceRevalidation);
          resolve(true);
        });
      } else {
        this.afterSubmitValidation(forceRevalidation);
        resolve(false);
      }
    });
  }
  revalidate() {
    return new Promise((resolve) => {
      this.validateHandler(void 0, true).finally(() => {
        if (this.globalConfig.focusInvalidField) {
          this.focusInvalidField();
        }
        resolve(this.isValid);
      });
    });
  }
  validateHandler(ev, forceRevalidation = false) {
    if (this.globalConfig.lockForm) {
      this.lockForm();
    }
    return this.validate(forceRevalidation).finally(() => {
      var _a, _b;
      if (this.globalConfig.lockForm) {
        this.unlockForm();
      }
      if (this.isValid) {
        (_a = this.onSuccessCallback) == null ? void 0 : _a.call(this, ev);
      } else {
        (_b = this.onFailCallback) == null ? void 0 : _b.call(this, this.fields, this.groupFields);
      }
    });
  }
  setForm(form) {
    this.form = form;
    this.form.setAttribute("novalidate", "novalidate");
    this.removeListener("submit", this.form, this.formSubmitHandler);
    this.addListener("submit", this.form, this.formSubmitHandler);
  }
  addListener(type, elem, handler) {
    elem.addEventListener(type, handler);
    this.eventListeners.push({ type, elem, func: handler });
  }
  removeListener(type, elem, handler) {
    elem.removeEventListener(type, handler);
    this.eventListeners = this.eventListeners.filter((item) => item.type !== type || item.elem !== elem);
  }
  addField(field, rules, config) {
    if (typeof field !== "string") {
      throw Error(`Field selector is not valid. Please specify a string selector.`);
    }
    const elem = this.form.querySelector(field);
    if (!elem) {
      throw Error(`Field with ${field} selector not found! Please check the field selector.`);
    }
    if (!Array.isArray(rules) || !rules.length) {
      throw Error(`Rules argument for the field [${field}] should be an array and should contain at least 1 element.`);
    }
    rules.forEach((item) => {
      if (!("rule" in item || "validator" in item || "plugin" in item)) {
        throw Error(`Rules argument for the field [${field}] must contain at least one rule or validator property.`);
      }
      if (!item.validator && !item.plugin && (!item.rule || !Object.values(Rules).includes(item.rule))) {
        throw Error(`Rule should be one of these types: ${Object.values(Rules).join(", ")}. Provided value: ${item.rule}`);
      }
    });
    this.fields[field] = {
      elem,
      rules,
      isValid: void 0,
      config
    };
    this.setListeners(elem);
    if (this.isSubmitted) {
      this.validate();
    }
    return this;
  }
  removeField(field) {
    if (typeof field !== "string") {
      throw Error(`Field selector is not valid. Please specify a string selector.`);
    }
    if (!this.fields[field]) {
      console.error(`Field not found. Check the field selector.`);
      return this;
    }
    const type = this.getListenerType(this.fields[field].elem.type);
    this.removeListener(type, this.fields[field].elem, this.handlerChange);
    this.clearErrors();
    delete this.fields[field];
    return this;
  }
  removeGroup(group) {
    if (typeof group !== "string") {
      throw Error(`Group selector is not valid. Please specify a string selector.`);
    }
    if (!this.groupFields[group]) {
      console.error(`Group not found. Check the group selector.`);
      return this;
    }
    this.groupFields[group].elems.forEach((elem) => {
      const type = this.getListenerType(elem.type);
      this.removeListener(type, elem, this.handlerChange);
    });
    this.clearErrors();
    delete this.groupFields[group];
    return this;
  }
  addRequiredGroup(groupField, errorMessage, config, successMessage) {
    if (typeof groupField !== "string") {
      throw Error(`Group selector is not valid. Please specify a string selector.`);
    }
    const elem = this.form.querySelector(groupField);
    if (!elem) {
      throw Error(`Group with ${groupField} selector not found! Please check the group selector.`);
    }
    const inputs = elem.querySelectorAll("input");
    const isRadio = Array.from(inputs).every((input) => input.type === "radio");
    const isCheckbox = Array.from(inputs).every((input) => input.type === "checkbox");
    if (!isRadio && !isCheckbox) {
      throw Error(`Group should contain either or checkboxes or radio buttons`);
    }
    this.groupFields[groupField] = {
      rules: [
        {
          rule: GroupRules.Required,
          errorMessage,
          successMessage
        }
      ],
      groupElem: elem,
      elems: Array.from(inputs),
      type: isRadio ? "radio" : "checkbox",
      isDirty: false,
      isValid: void 0,
      config
    };
    inputs.forEach((input) => {
      this.setListeners(input);
    });
    return this;
  }
  getListenerType(type) {
    switch (type) {
      case "checkbox":
      case "select-one":
      case "file":
      case "radio": {
        return "change";
      }
      default: {
        return "input";
      }
    }
  }
  setListeners(elem) {
    const type = this.getListenerType(elem.type);
    this.removeListener(type, elem, this.handlerChange);
    this.addListener(type, elem, this.handlerChange);
  }
  clearFieldLabel(fieldName) {
    var _a, _b;
    (_a = this.errorLabels[fieldName]) == null ? void 0 : _a.remove();
    (_b = this.successLabels[fieldName]) == null ? void 0 : _b.remove();
  }
  clearFieldError(fieldName) {
    var _a, _b, _c, _d;
    const field = this.fields[fieldName];
    const errorStyle = ((_a = field.config) == null ? void 0 : _a.errorFieldStyle) || this.globalConfig.errorFieldStyle;
    Object.keys(errorStyle).forEach((key) => {
      field.elem.style[key] = "";
    });
    const successStyle = ((_b = field.config) == null ? void 0 : _b.successFieldStyle) || this.globalConfig.successFieldStyle || {};
    Object.keys(successStyle).forEach((key) => {
      field.elem.style[key] = "";
    });
    field.elem.classList.remove(((_c = field.config) == null ? void 0 : _c.errorFieldCssClass) || this.globalConfig.errorFieldCssClass, ((_d = field.config) == null ? void 0 : _d.successFieldCssClass) || this.globalConfig.successFieldCssClass);
  }
  clearErrors() {
    var _a, _b;
    Object.keys(this.errorLabels).forEach((key) => this.errorLabels[key].remove());
    Object.keys(this.successLabels).forEach((key) => this.successLabels[key].remove());
    for (const fieldName in this.fields) {
      this.clearFieldError(fieldName);
    }
    for (const groupName in this.groupFields) {
      const group = this.groupFields[groupName];
      const errorStyle = ((_a = group.config) == null ? void 0 : _a.errorFieldStyle) || this.globalConfig.errorFieldStyle;
      Object.keys(errorStyle).forEach((key) => {
        group.elems.forEach((elem) => {
          var _a2;
          elem.style[key] = "";
          elem.classList.remove(((_a2 = group.config) == null ? void 0 : _a2.errorFieldCssClass) || this.globalConfig.errorFieldCssClass);
        });
      });
      const successStyle = ((_b = group.config) == null ? void 0 : _b.successFieldStyle) || this.globalConfig.successFieldStyle || {};
      Object.keys(successStyle).forEach((key) => {
        group.elems.forEach((elem) => {
          var _a2;
          elem.style[key] = "";
          elem.classList.remove(((_a2 = group.config) == null ? void 0 : _a2.successFieldCssClass) || this.globalConfig.successFieldCssClass);
        });
      });
    }
    this.tooltips = [];
  }
  isTooltip() {
    return !!this.globalConfig.tooltip;
  }
  lockForm() {
    const elems = this.form.querySelectorAll("input, textarea, button, select");
    for (let i = 0, len = elems.length; i < len; ++i) {
      elems[i].setAttribute("disabled", "disabled");
      elems[i].style.pointerEvents = "none";
      elems[i].style.webkitFilter = "grayscale(100%)";
      elems[i].style.filter = "grayscale(100%)";
    }
  }
  unlockForm() {
    const elems = this.form.querySelectorAll("input, textarea, button, select");
    for (let i = 0, len = elems.length; i < len; ++i) {
      elems[i].removeAttribute("disabled");
      elems[i].style.pointerEvents = "";
      elems[i].style.webkitFilter = "";
      elems[i].style.filter = "";
    }
  }
  renderTooltip(elem, errorLabel, position) {
    var _a;
    const { top, left, width, height } = elem.getBoundingClientRect();
    const errorLabelRect = errorLabel.getBoundingClientRect();
    const pos = position || ((_a = this.globalConfig.tooltip) == null ? void 0 : _a.position);
    switch (pos) {
      case "left": {
        errorLabel.style.top = `${top + height / 2 - errorLabelRect.height / 2}px`;
        errorLabel.style.left = `${left - errorLabelRect.width - TOOLTIP_ARROW_HEIGHT}px`;
        break;
      }
      case "top": {
        errorLabel.style.top = `${top - errorLabelRect.height - TOOLTIP_ARROW_HEIGHT}px`;
        errorLabel.style.left = `${left + width / 2 - errorLabelRect.width / 2}px`;
        break;
      }
      case "right": {
        errorLabel.style.top = `${top + height / 2 - errorLabelRect.height / 2}px`;
        errorLabel.style.left = `${left + width + TOOLTIP_ARROW_HEIGHT}px`;
        break;
      }
      case "bottom": {
        errorLabel.style.top = `${top + height + TOOLTIP_ARROW_HEIGHT}px`;
        errorLabel.style.left = `${left + width / 2 - errorLabelRect.width / 2}px`;
        break;
      }
    }
    errorLabel.dataset.direction = pos;
    const refresh = () => {
      this.renderTooltip(elem, errorLabel, position);
    };
    return {
      refresh
    };
  }
  createErrorLabelElem(name, errorMessage, config) {
    const errorLabel = document.createElement("div");
    errorLabel.innerHTML = errorMessage;
    const customErrorLabelStyle = this.isTooltip() ? config == null ? void 0 : config.errorLabelStyle : (config == null ? void 0 : config.errorLabelStyle) || this.globalConfig.errorLabelStyle;
    Object.assign(errorLabel.style, customErrorLabelStyle);
    errorLabel.classList.add((config == null ? void 0 : config.errorLabelCssClass) || this.globalConfig.errorLabelCssClass, "just-validate-error-label");
    if (this.isTooltip()) {
      errorLabel.dataset.tooltip = "true";
    }
    if (this.globalConfig.testingMode) {
      errorLabel.dataset.testId = `error-label-${name}`;
    }
    this.errorLabels[name] = errorLabel;
    return errorLabel;
  }
  createSuccessLabelElem(name, successMessage, config) {
    if (successMessage === void 0) {
      return null;
    }
    const successLabel = document.createElement("div");
    successLabel.innerHTML = successMessage;
    const customSuccessLabelStyle = (config == null ? void 0 : config.successLabelStyle) || this.globalConfig.successLabelStyle;
    Object.assign(successLabel.style, customSuccessLabelStyle);
    successLabel.classList.add((config == null ? void 0 : config.successLabelCssClass) || this.globalConfig.successLabelCssClass, "just-validate-success-label");
    if (this.globalConfig.testingMode) {
      successLabel.dataset.testId = `success-label-${name}`;
    }
    this.successLabels[name] = successLabel;
    return successLabel;
  }
  renderErrorsContainer(label, errorsContainer) {
    const container = errorsContainer || this.globalConfig.errorsContainer;
    if (typeof container === "string") {
      const elem = this.form.querySelector(container);
      if (elem) {
        elem.appendChild(label);
        return true;
      } else {
        console.error(`Error container with ${container} selector not found. Errors will be rendered as usual`);
      }
    }
    if (container instanceof Element) {
      container.appendChild(label);
      return true;
    }
    if (container !== void 0) {
      console.error(`Error container not found. It should be a string or existing Element. Errors will be rendered as usual`);
    }
    return false;
  }
  renderGroupLabel(elem, label, errorsContainer, isSuccess) {
    if (!isSuccess) {
      const renderedInErrorsContainer = this.renderErrorsContainer(label, errorsContainer);
      if (renderedInErrorsContainer) {
        return;
      }
    }
    elem.appendChild(label);
  }
  renderFieldLabel(elem, label, errorsContainer, isSuccess) {
    var _a, _b, _c, _d, _e, _f, _g;
    if (!isSuccess) {
      const renderedInErrorsContainer = this.renderErrorsContainer(label, errorsContainer);
      if (renderedInErrorsContainer) {
        return;
      }
    }
    if (elem.type === "checkbox" || elem.type === "radio") {
      const labelElem = document.querySelector(`label[for="${elem.getAttribute("id")}"]`);
      if (((_b = (_a = elem.parentElement) == null ? void 0 : _a.tagName) == null ? void 0 : _b.toLowerCase()) === "label") {
        (_d = (_c = elem.parentElement) == null ? void 0 : _c.parentElement) == null ? void 0 : _d.appendChild(label);
      } else if (labelElem) {
        (_e = labelElem.parentElement) == null ? void 0 : _e.appendChild(label);
      } else {
        (_f = elem.parentElement) == null ? void 0 : _f.appendChild(label);
      }
    } else {
      (_g = elem.parentElement) == null ? void 0 : _g.appendChild(label);
    }
  }
  renderFieldError(fieldName) {
    var _a, _b, _c, _d, _e, _f;
    const field = this.fields[fieldName];
    if (field.isValid) {
      if (!field.asyncCheckPending) {
        const successLabel = this.createSuccessLabelElem(fieldName, field.successMessage, field.config);
        if (successLabel) {
          this.renderFieldLabel(field.elem, successLabel, (_a = field.config) == null ? void 0 : _a.errorsContainer, true);
        }
        field.elem.classList.add(((_b = field.config) == null ? void 0 : _b.successFieldCssClass) || this.globalConfig.successFieldCssClass);
      }
      return;
    }
    this.isValid = false;
    field.elem.classList.add(((_c = field.config) == null ? void 0 : _c.errorFieldCssClass) || this.globalConfig.errorFieldCssClass);
    const errorLabel = this.createErrorLabelElem(fieldName, field.errorMessage, field.config);
    this.renderFieldLabel(field.elem, errorLabel, (_d = field.config) == null ? void 0 : _d.errorsContainer);
    if (this.isTooltip()) {
      this.tooltips.push(this.renderTooltip(field.elem, errorLabel, (_f = (_e = field.config) == null ? void 0 : _e.tooltip) == null ? void 0 : _f.position));
    }
  }
  renderErrors(forceRevalidation = false) {
    var _a, _b, _c, _d;
    if (!this.isSubmitted && !forceRevalidation) {
      return;
    }
    this.clearErrors();
    this.isValid = true;
    for (const groupName in this.groupFields) {
      const group = this.groupFields[groupName];
      if (group.isValid) {
        group.elems.forEach((elem) => {
          var _a2, _b2;
          Object.assign(elem.style, ((_a2 = group.config) == null ? void 0 : _a2.successFieldStyle) || this.globalConfig.successFieldStyle);
          elem.classList.add(((_b2 = group.config) == null ? void 0 : _b2.successFieldCssClass) || this.globalConfig.successFieldCssClass);
        });
        const successLabel = this.createSuccessLabelElem(groupName, group.successMessage, group.config);
        if (successLabel) {
          this.renderGroupLabel(group.groupElem, successLabel, (_a = group.config) == null ? void 0 : _a.errorsContainer, true);
        }
        continue;
      }
      this.isValid = false;
      group.elems.forEach((elem) => {
        var _a2, _b2;
        Object.assign(elem.style, ((_a2 = group.config) == null ? void 0 : _a2.errorFieldStyle) || this.globalConfig.errorFieldStyle);
        elem.classList.add(((_b2 = group.config) == null ? void 0 : _b2.errorFieldCssClass) || this.globalConfig.errorFieldCssClass);
      });
      const errorLabel = this.createErrorLabelElem(groupName, group.errorMessage, group.config);
      this.renderGroupLabel(group.groupElem, errorLabel, (_b = group.config) == null ? void 0 : _b.errorsContainer);
      if (this.isTooltip()) {
        this.tooltips.push(this.renderTooltip(group.groupElem, errorLabel, (_d = (_c = group.config) == null ? void 0 : _c.tooltip) == null ? void 0 : _d.position));
      }
    }
    for (const fieldName in this.fields) {
      this.renderFieldError(fieldName);
    }
  }
  destroy() {
    this.eventListeners.forEach((event) => {
      this.removeListener(event.type, event.elem, event.func);
    });
    Object.keys(this.customStyleTags).forEach((key) => {
      this.customStyleTags[key].remove();
    });
    this.clearErrors();
    if (this.globalConfig.lockForm) {
      this.unlockForm();
    }
  }
  refresh() {
    this.destroy();
    if (!this.form) {
      console.error("Cannot initialize the library! Form is not defined");
    } else {
      this.initialize(this.form, this.globalConfig);
      Object.keys(this.fields).forEach((key) => {
        this.addField(key, [...this.fields[key].rules], this.fields[key].config);
      });
    }
  }
  setCurrentLocale(locale) {
    if (typeof locale !== "string" && locale !== void 0) {
      console.error("Current locale should be a string");
      return;
    }
    this.currentLocale = locale;
    if (this.isSubmitted) {
      this.validate();
    }
  }
  onSuccess(callback) {
    this.onSuccessCallback = callback;
    return this;
  }
  onFail(callback) {
    this.onFailCallback = callback;
    return this;
  }
}



/***/ }),

/***/ "./node_modules/regenerator-runtime/runtime.js":
/*!*****************************************************!*\
  !*** ./node_modules/regenerator-runtime/runtime.js ***!
  \*****************************************************/
/***/ ((module) => {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

var runtime = (function (exports) {
  "use strict";

  var Op = Object.prototype;
  var hasOwn = Op.hasOwnProperty;
  var undefined; // More compressible than void 0.
  var $Symbol = typeof Symbol === "function" ? Symbol : {};
  var iteratorSymbol = $Symbol.iterator || "@@iterator";
  var asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator";
  var toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag";

  function define(obj, key, value) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
    return obj[key];
  }
  try {
    // IE 8 has a broken Object.defineProperty that only works on DOM objects.
    define({}, "");
  } catch (err) {
    define = function(obj, key, value) {
      return obj[key] = value;
    };
  }

  function wrap(innerFn, outerFn, self, tryLocsList) {
    // If outerFn provided and outerFn.prototype is a Generator, then outerFn.prototype instanceof Generator.
    var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator;
    var generator = Object.create(protoGenerator.prototype);
    var context = new Context(tryLocsList || []);

    // The ._invoke method unifies the implementations of the .next,
    // .throw, and .return methods.
    generator._invoke = makeInvokeMethod(innerFn, self, context);

    return generator;
  }
  exports.wrap = wrap;

  // Try/catch helper to minimize deoptimizations. Returns a completion
  // record like context.tryEntries[i].completion. This interface could
  // have been (and was previously) designed to take a closure to be
  // invoked without arguments, but in all the cases we care about we
  // already have an existing method we want to call, so there's no need
  // to create a new function object. We can even get away with assuming
  // the method takes exactly one argument, since that happens to be true
  // in every case, so we don't have to touch the arguments object. The
  // only additional allocation required is the completion record, which
  // has a stable shape and so hopefully should be cheap to allocate.
  function tryCatch(fn, obj, arg) {
    try {
      return { type: "normal", arg: fn.call(obj, arg) };
    } catch (err) {
      return { type: "throw", arg: err };
    }
  }

  var GenStateSuspendedStart = "suspendedStart";
  var GenStateSuspendedYield = "suspendedYield";
  var GenStateExecuting = "executing";
  var GenStateCompleted = "completed";

  // Returning this object from the innerFn has the same effect as
  // breaking out of the dispatch switch statement.
  var ContinueSentinel = {};

  // Dummy constructor functions that we use as the .constructor and
  // .constructor.prototype properties for functions that return Generator
  // objects. For full spec compliance, you may wish to configure your
  // minifier not to mangle the names of these two functions.
  function Generator() {}
  function GeneratorFunction() {}
  function GeneratorFunctionPrototype() {}

  // This is a polyfill for %IteratorPrototype% for environments that
  // don't natively support it.
  var IteratorPrototype = {};
  define(IteratorPrototype, iteratorSymbol, function () {
    return this;
  });

  var getProto = Object.getPrototypeOf;
  var NativeIteratorPrototype = getProto && getProto(getProto(values([])));
  if (NativeIteratorPrototype &&
      NativeIteratorPrototype !== Op &&
      hasOwn.call(NativeIteratorPrototype, iteratorSymbol)) {
    // This environment has a native %IteratorPrototype%; use it instead
    // of the polyfill.
    IteratorPrototype = NativeIteratorPrototype;
  }

  var Gp = GeneratorFunctionPrototype.prototype =
    Generator.prototype = Object.create(IteratorPrototype);
  GeneratorFunction.prototype = GeneratorFunctionPrototype;
  define(Gp, "constructor", GeneratorFunctionPrototype);
  define(GeneratorFunctionPrototype, "constructor", GeneratorFunction);
  GeneratorFunction.displayName = define(
    GeneratorFunctionPrototype,
    toStringTagSymbol,
    "GeneratorFunction"
  );

  // Helper for defining the .next, .throw, and .return methods of the
  // Iterator interface in terms of a single ._invoke method.
  function defineIteratorMethods(prototype) {
    ["next", "throw", "return"].forEach(function(method) {
      define(prototype, method, function(arg) {
        return this._invoke(method, arg);
      });
    });
  }

  exports.isGeneratorFunction = function(genFun) {
    var ctor = typeof genFun === "function" && genFun.constructor;
    return ctor
      ? ctor === GeneratorFunction ||
        // For the native GeneratorFunction constructor, the best we can
        // do is to check its .name property.
        (ctor.displayName || ctor.name) === "GeneratorFunction"
      : false;
  };

  exports.mark = function(genFun) {
    if (Object.setPrototypeOf) {
      Object.setPrototypeOf(genFun, GeneratorFunctionPrototype);
    } else {
      genFun.__proto__ = GeneratorFunctionPrototype;
      define(genFun, toStringTagSymbol, "GeneratorFunction");
    }
    genFun.prototype = Object.create(Gp);
    return genFun;
  };

  // Within the body of any async function, `await x` is transformed to
  // `yield regeneratorRuntime.awrap(x)`, so that the runtime can test
  // `hasOwn.call(value, "__await")` to determine if the yielded value is
  // meant to be awaited.
  exports.awrap = function(arg) {
    return { __await: arg };
  };

  function AsyncIterator(generator, PromiseImpl) {
    function invoke(method, arg, resolve, reject) {
      var record = tryCatch(generator[method], generator, arg);
      if (record.type === "throw") {
        reject(record.arg);
      } else {
        var result = record.arg;
        var value = result.value;
        if (value &&
            typeof value === "object" &&
            hasOwn.call(value, "__await")) {
          return PromiseImpl.resolve(value.__await).then(function(value) {
            invoke("next", value, resolve, reject);
          }, function(err) {
            invoke("throw", err, resolve, reject);
          });
        }

        return PromiseImpl.resolve(value).then(function(unwrapped) {
          // When a yielded Promise is resolved, its final value becomes
          // the .value of the Promise<{value,done}> result for the
          // current iteration.
          result.value = unwrapped;
          resolve(result);
        }, function(error) {
          // If a rejected Promise was yielded, throw the rejection back
          // into the async generator function so it can be handled there.
          return invoke("throw", error, resolve, reject);
        });
      }
    }

    var previousPromise;

    function enqueue(method, arg) {
      function callInvokeWithMethodAndArg() {
        return new PromiseImpl(function(resolve, reject) {
          invoke(method, arg, resolve, reject);
        });
      }

      return previousPromise =
        // If enqueue has been called before, then we want to wait until
        // all previous Promises have been resolved before calling invoke,
        // so that results are always delivered in the correct order. If
        // enqueue has not been called before, then it is important to
        // call invoke immediately, without waiting on a callback to fire,
        // so that the async generator function has the opportunity to do
        // any necessary setup in a predictable way. This predictability
        // is why the Promise constructor synchronously invokes its
        // executor callback, and why async functions synchronously
        // execute code before the first await. Since we implement simple
        // async functions in terms of async generators, it is especially
        // important to get this right, even though it requires care.
        previousPromise ? previousPromise.then(
          callInvokeWithMethodAndArg,
          // Avoid propagating failures to Promises returned by later
          // invocations of the iterator.
          callInvokeWithMethodAndArg
        ) : callInvokeWithMethodAndArg();
    }

    // Define the unified helper method that is used to implement .next,
    // .throw, and .return (see defineIteratorMethods).
    this._invoke = enqueue;
  }

  defineIteratorMethods(AsyncIterator.prototype);
  define(AsyncIterator.prototype, asyncIteratorSymbol, function () {
    return this;
  });
  exports.AsyncIterator = AsyncIterator;

  // Note that simple async functions are implemented on top of
  // AsyncIterator objects; they just return a Promise for the value of
  // the final result produced by the iterator.
  exports.async = function(innerFn, outerFn, self, tryLocsList, PromiseImpl) {
    if (PromiseImpl === void 0) PromiseImpl = Promise;

    var iter = new AsyncIterator(
      wrap(innerFn, outerFn, self, tryLocsList),
      PromiseImpl
    );

    return exports.isGeneratorFunction(outerFn)
      ? iter // If outerFn is a generator, return the full iterator.
      : iter.next().then(function(result) {
          return result.done ? result.value : iter.next();
        });
  };

  function makeInvokeMethod(innerFn, self, context) {
    var state = GenStateSuspendedStart;

    return function invoke(method, arg) {
      if (state === GenStateExecuting) {
        throw new Error("Generator is already running");
      }

      if (state === GenStateCompleted) {
        if (method === "throw") {
          throw arg;
        }

        // Be forgiving, per 25.3.3.3.3 of the spec:
        // https://people.mozilla.org/~jorendorff/es6-draft.html#sec-generatorresume
        return doneResult();
      }

      context.method = method;
      context.arg = arg;

      while (true) {
        var delegate = context.delegate;
        if (delegate) {
          var delegateResult = maybeInvokeDelegate(delegate, context);
          if (delegateResult) {
            if (delegateResult === ContinueSentinel) continue;
            return delegateResult;
          }
        }

        if (context.method === "next") {
          // Setting context._sent for legacy support of Babel's
          // function.sent implementation.
          context.sent = context._sent = context.arg;

        } else if (context.method === "throw") {
          if (state === GenStateSuspendedStart) {
            state = GenStateCompleted;
            throw context.arg;
          }

          context.dispatchException(context.arg);

        } else if (context.method === "return") {
          context.abrupt("return", context.arg);
        }

        state = GenStateExecuting;

        var record = tryCatch(innerFn, self, context);
        if (record.type === "normal") {
          // If an exception is thrown from innerFn, we leave state ===
          // GenStateExecuting and loop back for another invocation.
          state = context.done
            ? GenStateCompleted
            : GenStateSuspendedYield;

          if (record.arg === ContinueSentinel) {
            continue;
          }

          return {
            value: record.arg,
            done: context.done
          };

        } else if (record.type === "throw") {
          state = GenStateCompleted;
          // Dispatch the exception by looping back around to the
          // context.dispatchException(context.arg) call above.
          context.method = "throw";
          context.arg = record.arg;
        }
      }
    };
  }

  // Call delegate.iterator[context.method](context.arg) and handle the
  // result, either by returning a { value, done } result from the
  // delegate iterator, or by modifying context.method and context.arg,
  // setting context.delegate to null, and returning the ContinueSentinel.
  function maybeInvokeDelegate(delegate, context) {
    var method = delegate.iterator[context.method];
    if (method === undefined) {
      // A .throw or .return when the delegate iterator has no .throw
      // method always terminates the yield* loop.
      context.delegate = null;

      if (context.method === "throw") {
        // Note: ["return"] must be used for ES3 parsing compatibility.
        if (delegate.iterator["return"]) {
          // If the delegate iterator has a return method, give it a
          // chance to clean up.
          context.method = "return";
          context.arg = undefined;
          maybeInvokeDelegate(delegate, context);

          if (context.method === "throw") {
            // If maybeInvokeDelegate(context) changed context.method from
            // "return" to "throw", let that override the TypeError below.
            return ContinueSentinel;
          }
        }

        context.method = "throw";
        context.arg = new TypeError(
          "The iterator does not provide a 'throw' method");
      }

      return ContinueSentinel;
    }

    var record = tryCatch(method, delegate.iterator, context.arg);

    if (record.type === "throw") {
      context.method = "throw";
      context.arg = record.arg;
      context.delegate = null;
      return ContinueSentinel;
    }

    var info = record.arg;

    if (! info) {
      context.method = "throw";
      context.arg = new TypeError("iterator result is not an object");
      context.delegate = null;
      return ContinueSentinel;
    }

    if (info.done) {
      // Assign the result of the finished delegate to the temporary
      // variable specified by delegate.resultName (see delegateYield).
      context[delegate.resultName] = info.value;

      // Resume execution at the desired location (see delegateYield).
      context.next = delegate.nextLoc;

      // If context.method was "throw" but the delegate handled the
      // exception, let the outer generator proceed normally. If
      // context.method was "next", forget context.arg since it has been
      // "consumed" by the delegate iterator. If context.method was
      // "return", allow the original .return call to continue in the
      // outer generator.
      if (context.method !== "return") {
        context.method = "next";
        context.arg = undefined;
      }

    } else {
      // Re-yield the result returned by the delegate method.
      return info;
    }

    // The delegate iterator is finished, so forget it and continue with
    // the outer generator.
    context.delegate = null;
    return ContinueSentinel;
  }

  // Define Generator.prototype.{next,throw,return} in terms of the
  // unified ._invoke helper method.
  defineIteratorMethods(Gp);

  define(Gp, toStringTagSymbol, "Generator");

  // A Generator should always return itself as the iterator object when the
  // @@iterator function is called on it. Some browsers' implementations of the
  // iterator prototype chain incorrectly implement this, causing the Generator
  // object to not be returned from this call. This ensures that doesn't happen.
  // See https://github.com/facebook/regenerator/issues/274 for more details.
  define(Gp, iteratorSymbol, function() {
    return this;
  });

  define(Gp, "toString", function() {
    return "[object Generator]";
  });

  function pushTryEntry(locs) {
    var entry = { tryLoc: locs[0] };

    if (1 in locs) {
      entry.catchLoc = locs[1];
    }

    if (2 in locs) {
      entry.finallyLoc = locs[2];
      entry.afterLoc = locs[3];
    }

    this.tryEntries.push(entry);
  }

  function resetTryEntry(entry) {
    var record = entry.completion || {};
    record.type = "normal";
    delete record.arg;
    entry.completion = record;
  }

  function Context(tryLocsList) {
    // The root entry object (effectively a try statement without a catch
    // or a finally block) gives us a place to store values thrown from
    // locations where there is no enclosing try statement.
    this.tryEntries = [{ tryLoc: "root" }];
    tryLocsList.forEach(pushTryEntry, this);
    this.reset(true);
  }

  exports.keys = function(object) {
    var keys = [];
    for (var key in object) {
      keys.push(key);
    }
    keys.reverse();

    // Rather than returning an object with a next method, we keep
    // things simple and return the next function itself.
    return function next() {
      while (keys.length) {
        var key = keys.pop();
        if (key in object) {
          next.value = key;
          next.done = false;
          return next;
        }
      }

      // To avoid creating an additional object, we just hang the .value
      // and .done properties off the next function object itself. This
      // also ensures that the minifier will not anonymize the function.
      next.done = true;
      return next;
    };
  };

  function values(iterable) {
    if (iterable) {
      var iteratorMethod = iterable[iteratorSymbol];
      if (iteratorMethod) {
        return iteratorMethod.call(iterable);
      }

      if (typeof iterable.next === "function") {
        return iterable;
      }

      if (!isNaN(iterable.length)) {
        var i = -1, next = function next() {
          while (++i < iterable.length) {
            if (hasOwn.call(iterable, i)) {
              next.value = iterable[i];
              next.done = false;
              return next;
            }
          }

          next.value = undefined;
          next.done = true;

          return next;
        };

        return next.next = next;
      }
    }

    // Return an iterator with no values.
    return { next: doneResult };
  }
  exports.values = values;

  function doneResult() {
    return { value: undefined, done: true };
  }

  Context.prototype = {
    constructor: Context,

    reset: function(skipTempReset) {
      this.prev = 0;
      this.next = 0;
      // Resetting context._sent for legacy support of Babel's
      // function.sent implementation.
      this.sent = this._sent = undefined;
      this.done = false;
      this.delegate = null;

      this.method = "next";
      this.arg = undefined;

      this.tryEntries.forEach(resetTryEntry);

      if (!skipTempReset) {
        for (var name in this) {
          // Not sure about the optimal order of these conditions:
          if (name.charAt(0) === "t" &&
              hasOwn.call(this, name) &&
              !isNaN(+name.slice(1))) {
            this[name] = undefined;
          }
        }
      }
    },

    stop: function() {
      this.done = true;

      var rootEntry = this.tryEntries[0];
      var rootRecord = rootEntry.completion;
      if (rootRecord.type === "throw") {
        throw rootRecord.arg;
      }

      return this.rval;
    },

    dispatchException: function(exception) {
      if (this.done) {
        throw exception;
      }

      var context = this;
      function handle(loc, caught) {
        record.type = "throw";
        record.arg = exception;
        context.next = loc;

        if (caught) {
          // If the dispatched exception was caught by a catch block,
          // then let that catch block handle the exception normally.
          context.method = "next";
          context.arg = undefined;
        }

        return !! caught;
      }

      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        var record = entry.completion;

        if (entry.tryLoc === "root") {
          // Exception thrown outside of any try block that could handle
          // it, so set the completion value of the entire function to
          // throw the exception.
          return handle("end");
        }

        if (entry.tryLoc <= this.prev) {
          var hasCatch = hasOwn.call(entry, "catchLoc");
          var hasFinally = hasOwn.call(entry, "finallyLoc");

          if (hasCatch && hasFinally) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            } else if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else if (hasCatch) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            }

          } else if (hasFinally) {
            if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else {
            throw new Error("try statement without catch or finally");
          }
        }
      }
    },

    abrupt: function(type, arg) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc <= this.prev &&
            hasOwn.call(entry, "finallyLoc") &&
            this.prev < entry.finallyLoc) {
          var finallyEntry = entry;
          break;
        }
      }

      if (finallyEntry &&
          (type === "break" ||
           type === "continue") &&
          finallyEntry.tryLoc <= arg &&
          arg <= finallyEntry.finallyLoc) {
        // Ignore the finally entry if control is not jumping to a
        // location outside the try/catch block.
        finallyEntry = null;
      }

      var record = finallyEntry ? finallyEntry.completion : {};
      record.type = type;
      record.arg = arg;

      if (finallyEntry) {
        this.method = "next";
        this.next = finallyEntry.finallyLoc;
        return ContinueSentinel;
      }

      return this.complete(record);
    },

    complete: function(record, afterLoc) {
      if (record.type === "throw") {
        throw record.arg;
      }

      if (record.type === "break" ||
          record.type === "continue") {
        this.next = record.arg;
      } else if (record.type === "return") {
        this.rval = this.arg = record.arg;
        this.method = "return";
        this.next = "end";
      } else if (record.type === "normal" && afterLoc) {
        this.next = afterLoc;
      }

      return ContinueSentinel;
    },

    finish: function(finallyLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.finallyLoc === finallyLoc) {
          this.complete(entry.completion, entry.afterLoc);
          resetTryEntry(entry);
          return ContinueSentinel;
        }
      }
    },

    "catch": function(tryLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc === tryLoc) {
          var record = entry.completion;
          if (record.type === "throw") {
            var thrown = record.arg;
            resetTryEntry(entry);
          }
          return thrown;
        }
      }

      // The context.catch method must only be called with a location
      // argument that corresponds to a known catch block.
      throw new Error("illegal catch attempt");
    },

    delegateYield: function(iterable, resultName, nextLoc) {
      this.delegate = {
        iterator: values(iterable),
        resultName: resultName,
        nextLoc: nextLoc
      };

      if (this.method === "next") {
        // Deliberately forget the last sent value so that we don't
        // accidentally pass it on to the delegate.
        this.arg = undefined;
      }

      return ContinueSentinel;
    }
  };

  // Regardless of whether this script is executing as a CommonJS module
  // or not, return the runtime object so that we can declare the variable
  // regeneratorRuntime in the outer scope, which allows this module to be
  // injected easily by `bin/regenerator --include-runtime script.js`.
  return exports;

}(
  // If this script is executing as a CommonJS module, use module.exports
  // as the regeneratorRuntime namespace. Otherwise create a new empty
  // object. Either way, the resulting object will be used to initialize
  // the regeneratorRuntime variable at the top of this file.
   true ? module.exports : 0
));

try {
  regeneratorRuntime = runtime;
} catch (accidentalStrictMode) {
  // This module should not be running in strict mode, so the above
  // assignment should always work unless something is misconfigured. Just
  // in case runtime.js accidentally runs in strict mode, in modern engines
  // we can explicitly access globalThis. In older engines we can escape
  // strict mode using a global Function call. This could conceivably fail
  // if a Content Security Policy forbids using Function, but in that case
  // the proper solution is to fix the accidental strict mode problem. If
  // you've misconfigured your bundler to force strict mode and applied a
  // CSP to forbid Function, and you're not willing to fix either of those
  // problems, please detail your unique predicament in a GitHub issue.
  if (typeof globalThis === "object") {
    globalThis.regeneratorRuntime = runtime;
  } else {
    Function("r", "regeneratorRuntime = r")(runtime);
  }
}


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!******************************************!*\
  !*** ./resources/js/front/app-mobile.js ***!
  \******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mobile_menu_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./mobile/menu.js */ "./resources/js/front/mobile/menu.js");
/* harmony import */ var _mobile_renderForm_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mobile/renderForm.js */ "./resources/js/front/mobile/renderForm.js");
/* harmony import */ var _mobile_accordion_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./mobile/accordion.js */ "./resources/js/front/mobile/accordion.js");
/* harmony import */ var _desktop_cardFlip_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./desktop/cardFlip.js */ "./resources/js/front/desktop/cardFlip.js");
 // import './desktop/header.js'




(0,_mobile_renderForm_js__WEBPACK_IMPORTED_MODULE_1__.renderForm)();
(0,_mobile_menu_js__WEBPACK_IMPORTED_MODULE_0__.renderMenu)();
(0,_mobile_accordion_js__WEBPACK_IMPORTED_MODULE_2__.renderAccordion)();
(0,_desktop_cardFlip_js__WEBPACK_IMPORTED_MODULE_3__.renderCard)();
})();

/******/ })()
;