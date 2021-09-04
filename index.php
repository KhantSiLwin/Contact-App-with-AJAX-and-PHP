<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../sample_blog/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../web_dev-master/8_ajax/static_website/css/all.css">
    <style>
        td,th{
            vertical-align: middle !important;
        }
    </style>
</head>
<body class="bg-dark">
<!-- <a href="../sample_blog/assets/vendor/bootstrap/css/bootstrap.min.css">dafasf</a> -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-5 shadow">
                    <div class="card-content">
                        <div class="d-sm-flex justify-content-between align-item-center p-3">
                            <h4>Contact App</h4>
                            <div class="">
                            <button class="btn btn-outline-primary flex-xs-grow-1 flex-xs-grow-0" type="button" data-toggle="modal" data-target="#exampleModal">Add Contact</button>
                            <button class="btn btn-outline-info" type="button" onclick="showList()"><i class="fas fa-list"></i></button>
                            <button class="btn btn-outline-dark" type="button" onclick="showGrid()"><i class="fas fa-th-large"></i></button>
                            </div>
                        </div>
                        <div class="output">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailLabel">Detail Contact<span id="result"></span></h5>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="outline-none">&times;</span>
          </button>
        </div>
            <div class="modal-body">
        
               <div class=" d-flex justify-content-center">
                <div class=" mr-3"><img src="" alt="" class="detail-img" style="width:40px;border-radius:100px;"></div>
                <div class="">
                        <h4 class="detail-name"></h4>
                        <p class="detail-number"></p>
                   </div>
               </div>
            </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Edit Contact<span id="result"></span></h5>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="outline-none">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form action="update.php" method="post" id="editContact">
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label for="edit-name">Contact Name</label>
                            <input type="text" name="edit-name" class="edit-name form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="phone-number">Phone Number</label>
                            <input type="number" name="edit-number" class="edit-number form-control" required>
                        </div>
                        <input type="hidden" name="id" id="editId">
                    </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Contact<span id="result"></span></h5>
          <button type="button" class="close outline-none" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="outline-none">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form action="save.php" method="post" id="addContact">
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label for="contact-name">Contact Name</label>
                            <input type="text" name="contact-name" min="8" class="form-control" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="phone-number">Phone Number</label>
                            <input type="number" name="phone-number" class="form-control" required>
                        </div>
                    </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
      </div>
    </div>
  </div>
    
    <script src="../sample_blog/assets/vendor/jquery-3.3.1.min.js"></script>
    <script src="../sample_blog/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>

        function showGrid(){
            $.get('grid.php',function(data){
                $(".output").html(data);
            })
        }

        function showList(){
            $.get('list.php',function(data){
                $(".output").html(data);
            })
        }

        $("#addContact").on("submit",function(e) {
            e.preventDefault();
            let inputs = $(this).serialize();
            // $.ajax({
            //     type: "POST",
            //     url : $(this).attr('action'),
            //     data: inputs,
            //     success: function (data) {
            //         console.log(data);
            //     }
            // })
            $.post($(this).attr('action'),inputs,function(data){
                // console.log(data);
                if (data== "success") {
                    $("#result").html("<span class='badge badge-pill badge-success'>Contact Added</span>");
                    $("input").val('');
                    showList();
                }else{
                    $("#result").html("<span class='badge badge-pill badge-danger'> Failed</span>");
                }
            })
        });

        $(".output").delegate(".del","click",function(){
            if(confirm("Do you wanna Delete?")){
                let currentId = $(this).attr("data-id");
                $.get("delete.php?id="+currentId,function(data){
                if (data== "success") {
                    showList();
                }
                else{
                    console.log(data);
                }
            });
            
        }
    });


    $(".output").delegate(".edit","click",function(){
            let currentId = $(this).attr("data-id");
            $.get("detail.php?id="+currentId,function(data){
               let contactDetail = JSON.parse(data);
               $(".edit-name").val(contactDetail.name);    
               $(".edit-number").val(contactDetail.phone);    
               $("#editId").val(contactDetail.id);    
               $("#edit").modal("show");
                console.log(contactDetail);
        })
    })



    $("#editContact").on("submit",function(e) {
            e.preventDefault();
            let inputs = $(this).serialize();
            $.post($(this).attr('action'),inputs,function(data){
                if (data== "success") {
                    $("#edit").modal("hide");
                    showList();
                }else{
                    console.log(data);
                }
            })
        });


        $(".output").delegate(".contact","click",function(){
            
                let currentId = $(this).attr("data-id")
            $.get("detail.php?id="+currentId,function(data){
               let contactDetail = JSON.parse(data);
               $(".detail-name").html(contactDetail.name);    
               $(".detail-number").html(contactDetail.phone);    
               $(".detail-img").attr("src",contactDetail.photo);    
               $("#detail").modal("show");
        });
    });

        showList();
    </script>
</body>
</html>