<script type="text/javascript">
    $(document).ready( function () {
    
        $.ajaxSetup(
        {
    
            headers :
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    
        });
    
        $.fn.DataTable.ext.pager.numbers_length = 8;
        
        $('#tablePayroll').DataTable
    
        ({
            scrollY           : '500px',
            scrollX           : true,
            scrollCollapse    : true,
            paging            : true,
            searching         : true,
            searchable        : true,
            ordering          : true,
            order             : [[9, 'desc']],
            columnDefs        : [
                                    { orderable: false, targets: 0  },
                                    { orderable: false, targets: 1  },
                                    { orderable: false, targets: 2  },
                                    { orderable: false, targets: 3  },
                                    { orderable: false, targets: 4  },
                                    { orderable: false, targets: 5  },
                                    { orderable: false, targets: 6  },
                                    { orderable: false, targets: 7  },
                                    { orderable: false, targets: 8  },
                                ],
            bInfo             : true,
            responsive        : true,
            lengthChange      : true,
            pageLength        : 15,
            lengthMenu        : [
                                    [15, 25, 35, 45, 55],
                                    ['15', '25', '35', '45', '55']
                                ],
            language          :
            {  
                paginate        :   {
                                        previous    : '<i class="fas fa-angle-double-left"></i>',
                                        next        : '<i class="fas fa-angle-double-right"></i>'
                                    },
                lengthMenu      :   'Tampilkan ' +
                                        '<select class="form-control form-control-sm">'+
                                            '<option value="15" class="font-small">15 Baris</option>'+
                                            '<option value="25" class="font-small">25 Baris</option>'+
                                            '<option value="35" class="font-small">35 Baris</option>'+
                                            '<option value="45" class="font-small">45 Baris</option>'+
                                            '<option value="55" class="font-small">55 Baris</option>'+
                                        '</select>' +
                                    ' Per Halaman',
                        
                zeroRecords     : 'Tidak ada data yang ditampilkan.',
                info            : 'Halaman _PAGE_ Dari _PAGES_ Halaman Total _TOTAL_ Data',
                infoEmpty       : 'Tidak ada data',
                infoFiltered    : '(Total _MAX_ Data)',
                search          : 'Pencarian: _INPUT_',
            },
            processing      : true,
            serverSide      : true,
            ajax            :
                                {
                                    url : '{{ route("payroll.index") }}',
                                },
            columns         :
            [
                {data:'action',name:'action'},
                {
                    data: null,sortable: false,
                    render: function (data, type, row, meta)
                    {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data:'employee.nip',name:'employee.nip'},
                {data:'employee.full_name',name:'employee.full_name'},
                {data:'employee.job_title.job_title_name',name:'employee.job_title.job_title_name'},
                {data:'employee.department.department_name',name:'employee.department.department_name'},
                {data:'basic_salary',name:'basic_salary'},
                {data:'allowance',name:'allowance'},
                {data:'total_salary',name:'total_salary'},
                {data:'created_at',name:'created_at'},
            ]
        });
    
        $('div.dataTables_filter input').focus();
    
    });
    </script>