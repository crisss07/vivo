<!-- begin::Footer -->

<!-- end::Footer -->
</div>

<!-- end:: Page -->


<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
	<i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->



<!--begin::Global Theme Bundle -->
<script src="<?php echo base_url(); ?>public/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
    $(function() {
        $('#tabladatos').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    $('#tabladatos').DataTable( {
        "order": [[ 0, "desc" ]],
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>
<script>
	function agregarform(data)
	{
		console.log(data);
		d=data.split('||');
		$('#id_e').val(d[0]);
		$('#descripcion_e').val(d[1]);
		$('#ciudad_e').val(d[2]);
		$('#disponible_e').val(d[3]);
		$('#superficie_e').val(d[4]);
		$('#valor_e').val(d[5]);
        $('#direccion_e').val(d[6]);
	}
</script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->


<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>