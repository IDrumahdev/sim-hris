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
        
        $('#tableEmployee').DataTable
    
        ({
            scrollY           : '500px',
            scrollX           : true,
            scrollCollapse    : true,
            paging            : true,
            searching         : true,
            searchable        : true,
            ordering          : true,
            order             : [[12, 'desc']],
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
                                    { orderable: false, targets: 9  },
                                    { orderable: false, targets: 10  },
                                    { orderable: false, targets: 11  },
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
                                    url : '{{ route("customer.index") }}',
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
                {data:'nip',name:'nip'},
                {data:'full_name',name:'full_name'},
                {data:'birth_day',name:'birth_day'},
                {data:'gender',name:'gender'},
                {data:'address',name:'address'},
                {data:'mobilephone',name:'mobilephone'},
                {data:'email',name:'email'},
                {data:'date_of_entry',name:'date_of_entry'},
                {data:'job_title',name:'job_title'},
                {data:'department',name:'department'},
                {data:'created_at',name:'created_at'},
            ]
        });
    
        $('div.dataTables_filter input').focus();
    
    });
    </script>
    