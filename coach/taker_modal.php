<!-- Modal -->
<div class="modal fade" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="taker_update.php" name="taker_update">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title" id="myModalLabel">Update Taker's Details</h4>
                        </div>
                        <div class="modal-body">
                                <!--row-->
                                <input class="form-control" name="id" type="hidden" value="<?php echo $id;?>">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" name="last" placeholder="Last Name" value="<?php echo $last;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!--row-->
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="first" placeholder="First Name" value="<?php echo $first;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!--row-->
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input class="form-control" type="date" name="bday" placeholder="Birthday" value="<?php echo $bday;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!--row-->        
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option><?php echo $status;?></option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--row-->
                            </div>
                            <!--modal body-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="edit">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                </div>
                <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- /.modal -->