require('./bootstrap');

require('alpinejs');

window.$ = window.jQuery = require('jquery');
require('datatables.net');
require('datatables.net-dt');

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