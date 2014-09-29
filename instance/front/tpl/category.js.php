<script type="text/javascript">
    var delUrl = '';
    function Deletecategory(url){
        delUrl = url;
        $("#myModal").modal("show");
    }
    function Deleteproduct(url){
        delUrl = url;
        $("#myModal").modal("show");
    }
    
    function ImportCategory()
    {
        if ($(".chk:checked").length > 0) {
            var Ids = [];
            $(".chk:checked").each(function(index, element) {
                Ids.push($(element).val());
                //$("#row_" + $(element).val()).hide();
            });
           // showWait('Archiving the orders. ');
            $.ajax({
                type: 'post',
                url: _U + 'categories_import',
                data: {doImport: 1, categoreIds: Ids},
                success: function(r) {
                     $("#categorylist").html(r);
                    
                        hideWait();
                    
                }
            });
        }else{
		alert('Please select Category');
		}
    }
    
    </script>