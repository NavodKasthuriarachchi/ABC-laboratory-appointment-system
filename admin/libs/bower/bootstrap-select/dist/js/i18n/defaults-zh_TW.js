

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
    noneSelectedText: '沒有選取任何項目',
    noneResultsText: '沒有找到符合的結果',
    countSelectedText: '已經選取{0}個項目',
    maxOptionsText: ['超過限制 (最多選擇{n}項)', '超過限制(最多選擇{n}組)'],
    selectAllText: '選取全部',
    deselectAllText: '全部取消',
    multipleSeparator: ', '
  };
})(jQuery);


}));
