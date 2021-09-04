<div class="card-columns px-3">
        <?php

            require_once "base.php";

            $sql = "SELECT * FROM contacts ORDER BY id DESC";
            $query = mysqli_query(con(),$sql);
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <div class="card" id="c-<?php echo $row['id'];?>" data-id="<?php echo $row['id'];?>">
                        <div class="card-body">
                                <div class="text-center">
                                   <div class="contact" data-id="<?php echo $row['id'];?>">
                                   <div class="">
                                    <img src="<?php echo $row['photo']; ?>" alt="" style="width:40px;border-radius:100px;">
                                    </div>
                                    <h4><?php echo $row['name']; ?></h4>
                                    <p><?php echo $row['phone']; ?></p>
                                   </div>
                                    <button class="btn btn-outline-info btn-sm edit" data-id="<?php echo $row['id'];?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm del" data-id="<?php echo $row['id'];?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                    </div>
        <?php } ?>
</div>