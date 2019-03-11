<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Seller 
        </h1>
        <ol class="breadcrumb">
            <li><a href="active"><i class="fa fa-edit"></i> Details</a></li>
            <li><a href="/pages/new/added/sellers"><i class="fa fa-list"></i> New Seller</a></li>
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
                        <h3 class="box-title"></h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                        <?php if(isset($data) && $data != null){
                            $x = 1;
                            // echo "<pre>";
                            // print_r($data);
                            // echo "</pre>";
                            // foreach ($data as $key => $value) { 
                                if($data['usertype'] === 'seller' && $data['requirements']['status'] == 1){ 
                                    $uimage = '/assets/img/avatar.png';
                                    if(isset($data['userdetails']['profileimg'])  && $data['userdetails']['profileimg'] != null ||  $data['userdetails']['profileimg'] != ""){
                                        $uimage = $data['userdetails']['profileimg'];
                                    }
                                     
                        ?>
                         
                            <tr >
                                <td >Store Image</td >
                                <td ><img src="<?php echo $uimage; ?>" width="100" height="100" /> </td >
                            </tr> 
                            <tr >
                                <td >Store Name</td >
                                <td ><?php echo $data['storename']; ?></td >
                            </tr> 
                            <tr >
                                <td >Address 1</td >
                                <td ><?php echo $data['userdetails']['address2']; ?></td >
                            </tr> 
                            <tr >
                                <td >Address 2</td >
                                <td ><?php echo $data['userdetails']['address2']; ?></td >
                            </tr> 
                            <tr >       
                                <td >Email</td >
                                <td ><?php echo $data['userdetails']['email']; ?></td >
                            </tr> 
                            <tr >
                                <td >Tel. Number</td >
                                <td ><?php echo $data['userdetails']['telnumber']; ?></td >
                            </tr> 
                            <tr >
                                <td >Cell Number</td >
                                <td ><?php echo $data['userdetails']['cellnumber']; ?></td >
                            </tr> 
                            <tr >
                                <td >Registered Owner/Rep.</td >
                                <td ><?php echo $data['userdetails']['firstname']; ?></td >
                            </tr> 
                            <tr >
                                <td colspan="2" ><h3>Requirements</h3></td > 
                            </tr> 
                            <tr >
                                <td >Gov. ID Type</td >
                                <td ><?php echo isset($data['requirements']['idtype'])?$data['requirements']['idtype']:'None'; ?></td >
                            </tr> 
                            <tr >
                                <td >Gov. ID Image</td >
                                <td ><img src="<?php echo isset($data['requirements']['govid'])?$data['requirements']['govid']:'None'; ?>"  width="200" height="200" /></td >
                            </tr> 
                            <tr >
                                <td >Store Image</td >
                                <td ><img src="<?php echo isset($data['requirements']['storeimg'])?$data['requirements']['storeimg']:'None';  ?>"  width="200" height="200" /></td >
                            </tr> 
                            <tr >
                                <td >Store Geo Location</td >
                                <td ><?php echo isset( $data['requirements']['idtype'])? $data['requirements']['idtype']:'None'; ?></td >
                            </tr>  
                        <?php  } }  ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>


    </section><!-- /.content -->
</aside><!-- /.right-side -->