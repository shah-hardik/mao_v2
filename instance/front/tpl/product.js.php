
 <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript">
    var delUrl = '';
    function Deleteproduct(url){
        delUrl = url;
        $("#myModal").modal("show");
    }
    
     $(document).ready(function(){
	 $('#prebtn').attr("disabled",true);
        $('#search').autocomplete({
                  source: "product/list",
                    minLength: 2     
       });   
     
      });
      
      
      function auto()
      {
        $.ajax({
            url:_U+'product',
            data:{searchrecord:1,searchval:$("#search").val()},
            success:function(r){
                hideWait();
                 $("#productlist").html(r);        
            }
        });
      }
    
     function getNextrecord(){
         $("#prebtn").attr('disabled',false);
        var page_no = $("#next_page_no").html();
        $("#next_page_no").html(parseInt(page_no) + parseInt(10));
        page_no = $("#next_page_no").html();
	
      if(page_no > $("#countdata").html())
          {
             $("#nextbtn").attr('disabled',true);
          }
        showWait();
        $.ajax({
            url:_U+'product',
            data:{Nextrecord:1,Limit:page_no},
            success:function(r){
                hideWait();
                $("#productlist").html(r);
                //$("#next_page_no").html(parseInt(page_no) + parseInt(10));
            }
        });
    }
    function getPrerecord(){
     $("#nextbtn").attr('disabled',false);
        var page_no = $("#next_page_no").html();
        $("#next_page_no").html(parseInt(page_no) - parseInt(10));
        page_no = $("#next_page_no").html();
        if(page_no == 0){
           $("#prebtn").attr('disabled',true);
        }
        showWait();
        $.ajax({
            url:_U+'product',
            data:{Nextrecord:1,Limit:page_no},
            success:function(r){
                hideWait();
                $("#productlist").html(r);
                //$("#next_page_no").html(parseInt(page_no) - parseInt(10));
            }
        });
    }
   
    </script>