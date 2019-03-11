<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buyer
        </h1>
        <ol class="breadcrumb">
            <li><a href="active"><i class="fa fa-list"></i> Buyer List</a></li>
            <li class="/"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Buyer List</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:50px;text-align:center">#</th>
                                    <th>Image</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && $data != null){
                                $x = 1;
                                foreach ($data as $key => $value) { 
                                    if( isset($value['usertype'] ) && $value['usertype'] === 'buyer'){  
                            ?>
                                <tr>
                                    <td style="width:50px;text-align:center"><?php echo $x ?></td>
                                    <?php
                                        $uimage = '/assets/img/avatar.png';
                                        if(isset($value['userdetails']['profileimg'])  && $value['userdetails']['profileimg'] != null ||  $value['userdetails']['profileimg'] != ""){
                                            $uimage = $value['userdetails']['profileimg'];
                                        }
                                    
                                    ?>
                                    <td><img src="<?php echo $uimage; ?>" width="40" height="40" /> </td>
                                    <td><?php echo $value['userdetails']['firstname'] . ' ' . $value['userdetails']['middlename'] . ' ' . $value['userdetails']['lastname'] ; ?></td>
                                    <td><?php echo $value['userdetails']['address']; ?></td>
                                    <td><?php echo $value['userdetails']['email']; ?></td>
                                    <td>Cell : <?php echo $value['userdetails']['cellnumber']; ?></td>
                                </tr>
                            <?php $x++; } } } ?>
                            </tbody> 
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>


    </section><!-- /.content -->
</aside><!-- /.right-side -->