

(function (root, factory) {
  if (typeof define === 'function' && define.amd) {

    define(["jquery"], function (a0) {
      return (factory(a0));
    });
  } else if (typeof exports === 'object') {

    module.exports = factory(require("jquery"));
  } else {
    factory(jQuery);
  }
}(this, function (jQuery) {

(function ($) {
  $.fn.selectpicker.defaults = {
    noneSelectedText: 'Hautapenik ez',
    noneResultsText: 'Emaitzarik ez {0}',
    countSelectedText: '{1}(e)tik {0} hautatuta',
    maxOptionsText: ['Mugara iritsita ({n} {var} gehienez)', 'Taldearen mugara iritsita ({n} {var} gehienez)', ['elementu', 'elementu']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
