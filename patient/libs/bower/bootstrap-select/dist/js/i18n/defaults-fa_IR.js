

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
        noneSelectedText: 'چیزی انتخاب نشده است',
        noneResultsText: 'هیج مشابهی برای {0} پیدا نشد',
        countSelectedText: "{0} از {1} مورد انتخاب شده",
        maxOptionsText: ['بیشتر ممکن نیست {حداکثر {n} عدد}', 'بیشتر ممکن نیست {حداکثر {n} عدد}'],
        selectAllText: 'انتخاب همه',
        deselectAllText: 'انتخاب هیچ کدام',
        multipleSeparator: ', '
    };
})(jQuery);


}));
