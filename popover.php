<?php
$connect = mysqli_connect("localhost","root","","testing");
$query = "SELECT*FROM tbl_employee ORDER BY id asc";
$result = mysqli_query($connect, $query);
?>

<html>

<head>
    
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
</head>

<body>
<br/><br/>
    <div class="container" style="width:800px;">
    <h2 align="center">php ajax sssfafs</h2>
    <h3 align="center">hey world</h3>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="20%">ID</th>
                    <th width="80%">Name</th>
                </tr>
                    <?php
       while($row = mysqli_fetch_array($result))
       {
           ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><a href="#" class="hover" id="<?php echo $row["id"]; ?>"> <?php echo $row["name"]; ?></a></td>
                </tr>
                <?php
       }
       ?>
            </table>
        </div>
    </div>
</body>
</html>
<script>
            $(document).ready(function(){
                $('.hover').popover({
                    title: fetchData,
                    html: true,
                    placement: 'right'
                })
    function fetchData(){
        var fetch_data = '';
        var element = $(this);
        var id = element.attr("id");
        $.ajax({
                url:"fetch.php",
            method:"POST",
            async:false,
            data:{id:id},
            success:function(data){
                fetch_data = data;
            }
        });
        return fetch_data;
    }
})
    </script>