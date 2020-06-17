<html>  
    <head>  
        <title> Help Page </title>  
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head> 



    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  

<script>  
$(document).ready(function()
{  
    function fetch_data()  
    {  
        $.ajax({  
            url:"data.php",  
            method:"POST",  
            success:function(data)
            {  
				$('#live_data').html(data);  
            }  
        });  
    } 

    fetch_data();  

    
//////SEARCH/////
   $(document).ready(function()
   {
      $("#search").on("keyup", function() 
       {
         var value = $(this).val().toLowerCase();
         $("#data tr").filter(function() 
          {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
    });


    ////////////NEW//////////
    $(document).on('click', '#btn_add', function()
    {  
        var Q_ID  = $('#Q_ID').text();  
        var Q_type  = $('#Q_type').text();  
        var user_ID = $('#user_ID').text();
        var Q = $('#Q').text(); 
        var A = $('#A').text();  


        if(Q_ID == '' && Q_type == '' && user_ID == '' && Q == '' && A == '')  
        {  
            $('#result').html("<div class='alert alert-warning'>"+"Cannot Insert Empty Records"+"</div>");
            return false;  
        }

        if(Q_ID == '' || Q_type == '' || user_ID == '' || Q == '' || A == '')  
        {  
            $('#result').html("<div class='alert alert-warning'>"+"Please Fill All Fields"+"</div>");
            return false;  
        }
        


        $.ajax({  
            url:"newrec.php",  
            method:"POST",  
            data:{Q_ID:Q_ID, Q_type:Q_type, user_ID:user_ID, Q:Q, A:A},  
            dataType:"text",  
            success:function(data)  
            {  
                $('#result').html("<div class='alert alert-info'>"+data+"</div>");
                fetch_data();  
            }  
        })  
    });  
    


    ////////update/////////
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"updaterec.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data)
            { 
				$('#result').html("<div class='alert alert-info'>"+data+"</div>");
            }  
        });  
    }  

    $(document).on('blur', '.Q_ID', function()
    {  
        var id = $(this).data("id1");  
        var Q_ID = $(this).text();  
        edit_data(id, Q_ID, "Q_ID");  
    }); 

    $(document).on('blur', '.Q_type', function()
    {  
        var id = $(this).data("id1");  
        var Q_type = $(this).text();  
        edit_data(id, Q_type, "Q_type");  
    });  

    $(document).on('blur', '.user_ID', function()
    {  
        var id = $(this).data("id2");  
        var user_ID = $(this).text();  
        edit_data(id, user_ID, ".user_ID");  
    }); 

    $(document).on('blur', '.Q', function()
    {  
        var id = $(this).data("id3");  
        var Q = $(this).text();  
        edit_data(id, Q, "Q");  
    });  

    
    $(document).on('blur', '.A', function()
    {  
        var id = $(this).data("id4");  
        var A = $(this).text();  
        edit_data(id, A, "A");  
    });  


    ///////DELETE////////
    $(document).on('click', '.btn_delete', function()
    {  
        var id=$(this).data("id3");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"deleterec.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data)
                {  
                    $('#result').html("<div class='alert alert-info'>"+data+"</div>");
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>

\