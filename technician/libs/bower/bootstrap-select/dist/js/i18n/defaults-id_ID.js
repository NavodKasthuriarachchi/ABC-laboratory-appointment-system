

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
    noneSelectedText: 'Tidak ada yang dipilih',
    noneResultsText: 'Tidak ada yang cocok {0}',
    countSelectedText: '{0} terpilih',
    maxOptionsText: ['Mencapai batas (maksimum {n})', 'Mencapai batas grup (maksimum {n})'],
    selectAllText: 'Pilih Semua',
    deselectAllText: 'Hapus Semua',
    multipleSeparator: ', '
  };
})(jQuery);


}));
