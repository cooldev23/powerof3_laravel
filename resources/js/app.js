require('./bootstrap');

require('alpinejs');

window.$ = window.jQuery = require('jquery');
require('datatables.net');
require('datatables.net-dt');
require("flatpickr");
require('tinymce');

$('.datatables').DataTable({
  pageLength: 25,
  order: [1, 'asc'],
  columnDefs: [
    {
      targets: 'disable-sorting', orderable: false
    }
  ],
  deferLoading: true,
  // drawCallback: function (settings) {
  //   if (window.livewire) {
  //     window.livewire.rescan();
  //   }
  // }
});

// let date = new Date();
// let lastMonth = date.setMonth(date.getMonth() - 1);

// $('#dateSold').flatpickr({
//   disableMobile: true,
//   altInput: true,
//   altFormat: 'F J @ h:iK',
//   dateFormat: 'Y-m-d H:i:S',
//   minDate: lastMonth
// })

tinymce.init({
  selector: '.tiny-field',
  branding: false,
  browser_spellcheck: true,
  menubar: false,
  statusbar: false,
  plugins: 'advlist lists link paste autoresize',
  autoresize_on_init: true,
  autoresize_bottom_margin: 5,
  autoresize_min_height: 200,
  convert_urls: false,
  toolbar: 'undo redo | styleselect | bold italic underline | bullist numlist | link unlink | alignleft aligncenter',
  link_assume_external_targets: true,
  paste_remove_styles: true,
  valid_elements: 'a[href|target],strong/b,em/i,br,p,ul,ol,li'
});