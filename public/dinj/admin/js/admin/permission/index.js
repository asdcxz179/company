sendApi("/Admin/Permission","GET","",(data) => {}).then((data) => { makeTree(data.data);});

function makeTree(data) {
    $('#permission').jstree({
        core: {
            check_callback: true,
            themes: {
                'responsive': false
            },
            data: data
        },
        types: {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        plugins: ['types', 'checkbox']
    }).bind("ready.jstree", function () {
        $(this).jstree("open_all");
        sendApi( "{{ route('Admin.Permission.show',['Permission' => request()->Permission],false) }}","GET","", (data) => {
            setForm("form[name=permission]", data.data,function(data) {
                console.log(data);
                data.data.map(item => {$('#permission').jstree(true).select_node(item);})
            });
        });
   });
}
