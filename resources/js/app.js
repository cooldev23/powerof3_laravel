require('./bootstrap');

require('alpinejs');

window.$ = window.jQuery = require('jquery');
require('datatables.net');
require('datatables.net-dt');
require("flatpickr");

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

