

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
    noneSelectedText: 'Nessuna selezione',
    noneResultsText: 'Nessun risultato per {0}',
    countSelectedText: 'Selezionati {0} di {1}',
    maxOptionsText: ['Limite raggiunto ({n} {var} max)', 'Limite del gruppo raggiunto ({n} {var} max)', ['elementi', 'elemento']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
