
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
    noneSelectedText: 'Bitte wählen...',
    noneResultsText: 'Keine Ergebnisse für {0}',
    countSelectedText: '{0} von {1} ausgewählt',
    maxOptionsText: ['Limit erreicht ({n} {var} max.)', 'Gruppen-Limit erreicht ({n} {var} max.)', ['Eintrag', 'Einträge']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
