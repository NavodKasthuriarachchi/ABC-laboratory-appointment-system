

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
    noneSelectedText: 'Nic není vybráno',
    noneResultsText: 'Žádné výsledky {0}',
    countSelectedText: 'Označeno {0} z {1}',
    maxOptionsText: ['Limit překročen ({n} {var} max)', 'Limit skupiny překročen ({n} {var} max)', ['položek', 'položka']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
