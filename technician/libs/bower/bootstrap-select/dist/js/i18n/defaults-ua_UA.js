

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
    noneSelectedText: 'Нічого не вибрано',
    noneResultsText: 'Збігів не знайдено {0}',
    countSelectedText: 'Вибрано {0} із {1}',
    maxOptionsText: ['Досягнута межа ({n} {var} максимум)', 'Досягнута межа в групі ({n} {var} максимум)', ['items', 'item']],
    multipleSeparator: ', '
  };
})(jQuery);


}));
