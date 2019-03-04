<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Seller 
        </h1>
        <ol class="breadcrumb">
            <li><a href="active"><i class="fa fa-list"></i> Messages</a></li>
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
                        <h3 class="box-title">Messages</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table class="table table-bordered" style="max-height:400px;">
                        <thead>
                        <tr>
                            <th>Message</th> 
                        </tr>
                        </thead>
                        <tbody id="message">
                            <?php
                            if(isset($data) && $data != null){
                              $count = 1; 
                              foreach ($data as $key => $value) { 
                                if($value['send']  == ''){ 
                            ?>
                            <tr>
                                <td><p class="pull-left"><?php echo $value['reply']; ?></p></td> 
                            </tr>
                            <?php }else{ ?>
                            <tr>
                                <td><p class="pull-right"><?php echo $value['send']; ?></p></td> 
                            </tr>
                            <?php
                                 }
                              $count++;
                              }
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan="2">
                                    <textarea class="form-control" id="msg"></textarea>
                                    <button class="btn btn-primary pull-right" onclick="sendmessages('<?php echo $keyid; ?>')" >Send</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>


    </section><!-- /.content -->
</aside><!-- /.right-side -->


<script type="text/javascript" >

var ukeys = '<?php echo $keyid; ?>' ;

</script>