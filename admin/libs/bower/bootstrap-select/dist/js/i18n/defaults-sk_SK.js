

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
    noneSelectedText: 'Vyberte zo zoznamu',
    noneResultsText: 'Pre výraz {0} neboli nájdené žiadne výsledky',
    countSelectedText: 'Vybrané {0} z {1}',
    maxOptionsText: ['Limit prekročený ({n} {var} max)', 'Limit skupiny prekročený ({n} {var} max)', ['položiek', 'položka']],
    selectAllText: 'Vybrať všetky',
    deselectAllText: 'Zrušiť výber',
    multipleSeparator: ', '
  };
})(jQuery);


}));
