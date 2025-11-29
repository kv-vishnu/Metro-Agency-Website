<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">




        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Report</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success dark" role="alert">
                    <?php echo $this->session->flashdata('success');$this->session->unset_userdata('success'); ?>
                </div><?php } ?>

                <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger dark" role="alert">
                    <?php echo $this->session->flashdata('error');$this->session->unset_userdata('error'); ?>
                </div><?php } ?>



                <div class="">
                    <div class="table-responsive-sm">






                        <table id="example" class="table table-striped" style="width:100%">
                            <thead style="background: #e5e5e5;">
                                <tr>
                                    <th>No</th>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mob No</th>
                                    <th>Total Score</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                       if(!empty($report)){
                       $count = 1;
                       foreach($report as $val){ ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $val['name'];?></td>
                                    <td><?php echo $val['email'];?></td>
                                    <td><?php echo $val['mobno'];?></td>
                                    <td><?php echo $val['total_score'];?></td>
                                    <td><?php echo $val['date_time'];?></td>


                                    <td class="pb-0 pt-0 d-flex">
                                        <form class="m-0" action="<?php echo base_url();?>admin/student/edit"
                                            method="post">
                                            <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                            <!-- <button class="btn tblEditBtn pl-0 pr-0" type="submit"
                                                data-bs-toggle="tooltip" data-id="<?php echo $val['id']; ?>"
                                                data-bs-original-title="Edit Category"><i
                                                    class="fa fa-edit"></i></button> -->
                                        </form>

                                        <a href="<?php echo base_url(); ?>admin/export/export_to_excel/<?php echo $val['id']; ?>"
                                            target="_blank" class="btn btn-primary mt-2 mb-2" type="button">Download
                                            excel</a>



                                    </td>
                                </tr>
                                <?php $count++; }} ?>



                            </tbody>

                        </table>











                    </div>
                </div>
            </div>



            <!-- Modal for detailed view -->
            <div class="modal fade" id="emp_informations" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="" style="width: 100%; height: 500px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->



            <!--modal for delete confirmation-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo confirm; ?></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="category_id" value="" />
                            <?php echo are_you_sure; ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                            <button class="btn btn-secondary" id="yes_del_category" type="button"
                                data-bs-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal for delete confirmation-->





        </div>