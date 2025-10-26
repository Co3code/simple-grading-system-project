$(document).ready(function () {
    $('#table').DataTable({
        language: {
            search: "Search :  "
        }
    });
    $('#grading').DataTable({
        language: {
            search: "Search :  "
        }
    });
    $('#pendingTable').DataTable({
        language: {
            search: "Search :  "
        }
    });
    $('#grades').DataTable({
        searching: false,   // hides search box
        paging: false,      // disables pagination
        info: false,        // hides "Showing 1 of N entries"
        lengthChange: false // hides entries per page dropdown
    });



});
$(document).ready(function () {
    var table = $('#table3').DataTable({
        language: { search: "Search :  " }
    });

    $('#filterYear').on('change', function () {
        var val = $(this).val();                 // e.g. "1st Year" or ""
        // simple column search (regex=false, smart=true)
        table.column(2).search(val, false, true).draw();
    });
});

