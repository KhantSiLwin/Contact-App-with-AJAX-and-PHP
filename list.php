
<table class="table mb-0 table-hover table-responsive-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Control</th>
                </tr>
            </thead>
                <tbody>
                <?php

                    require_once "base.php";

                    $sql = "SELECT * FROM contacts ORDER BY id DESC";
                    $query = mysqli_query(con(),$sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr  id="c-<?php echo $row['id'];?>" data-id="<?php echo $row['id'];?>">
                    <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><img src="<?php echo $row['photo']; ?>" alt="" style="width:40px;border-radius:100px;"></td>
                        <td>

                            <div class="d-flex">
                                <button class="btn mr-2 btn-outline-secondary btn-sm contact" data-id="<?php echo $row['id'];?>">
                                <i class="fas fa-skull"></i>
                            </button>
                            <button class="btn mr-2 btn-outline-info btn-sm edit" data-id="<?php echo $row['id'];?>">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm del" data-id="<?php echo $row['id'];?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
