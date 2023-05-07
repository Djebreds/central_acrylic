// DataTables with Column Search by Text Inputs
document.addEventListener('DOMContentLoaded', function () {
  // DataTables
  var table = $('#datatable-admin').DataTable({
    responsive: true,
    scrollX: true,
    processing: true,
    language: {
      url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json',
    },
    columnDefs: [
      {
        searchable: false,
        orderable: false,
        targets: 0,
      },
    ],
    order: [[1, 'asc']],
  });

  table
    .on('order.dt search.dt', function () {
      let i = 1;

      table
        .cells(null, 0, { search: 'applied', order: 'applied' })
        .every(function (cell) {
          this.data(i++);
        });
    })
    .draw();
});
