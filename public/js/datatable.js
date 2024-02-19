$("#data").DataTable({
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
    },
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "Todos"],
    ],
    pageLength: 50,
    order:[[0, 'desc']],
    responsive: true,
});
