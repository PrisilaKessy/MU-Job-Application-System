<div class = "modal fade" id = "delete_post<?php echo $delete_id ?>">
    <div class = "modal-dialog modal-md">
        <div class = "modal-content">
            <div class = "modal-header justify-content-center">
                <h5 class = "text-warning">Be carefully, once you delete, you will never return back</h5>
            </div>
                <div class  = "modal-body">
                  <!--   <h6 class ="text-align text-center">DELETE CONTACT</h6>
                    <hr> -->
                    <form action="delete_post.php" method = "POST" enctype = "multipart/form-data">
                        <input readonly hidden type="number" name="post_id" value="<?php echo $id ?>">
                        <div class = "form-group">
                        <h6 class="text-light">Are you sure, you want to delete this post?</h6>
                        </div>
                        <div class = "modal-footer">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class = "btn btn-danger" name = "delete_id">Yes, Delete
                                    </button>
                                </div>
                    <!--     <div>
                            <input class = "btn btn-info" data-dismiss = "modal" value = "Close"> 
                        </div> -->
                            </div>
                        </div>
                    </form>
                 </div>
        </div>
    </div> 