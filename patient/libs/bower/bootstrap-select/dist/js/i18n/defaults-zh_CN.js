

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
    noneSelectedText: '没有选中任何项',
    noneResultsText: '没有找到匹配项',
    countSelectedText: '选中{1}中的{0}项',
    maxOptionsText: ['超出限制 (最多选择{n}项)', '组选择超出限制(最多选择{n}组)'],
    multipleSeparator: ', '
  };
})(jQuery);


}));
