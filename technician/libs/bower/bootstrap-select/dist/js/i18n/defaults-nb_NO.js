

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
    noneSelectedText: 'Ingen valgt',
    noneResultsText: 'Søket gir ingen treff {0}',
    countSelectedText: function (numSelected, numTotal) {
      return (numSelected == 1) ? "{0} alternativ valgt" : "{0} alternativer valgt";
    },
    maxOptionsText: function (numAll, numGroup) {
      return [
        (numAll == 1) ? 'Grense nådd (maks {n} valg)' : 'Grense nådd (maks {n} valg)',
        (numGroup == 1) ? 'Grense for grupper nådd (maks {n} grupper)' : 'Grense for grupper nådd (maks {n} grupper)'
      ];
    },
    selectAllText: 'Merk alle',
    deselectAllText: 'Fjern alle',
    multipleSeparator: ', '
  };
})(jQuery);


}));


}));
