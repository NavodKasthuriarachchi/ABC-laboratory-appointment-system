

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
    noneSelectedText: 'Niets geselecteerd',
    noneResultsText: 'Geen resultaten gevonden voor {0}',
    countSelectedText: '{0} van {1} geselecteerd',
    maxOptionsText: ['Limiet bereikt ({n} {var} max)', 'Groep limiet bereikt ({n} {var} max)', ['items', 'item']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
