
    <section class="content-header">
      <h1>
        ChartJS
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">ChartJS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                 <div id="main" class="col-md-12" style="min-height: 450px;"></div>
              </div>
              <div class="chart">
                 <div id="main1" class="col-md-12"  style="min-height: 450px;"></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

 


 

<input type="hidden" name="baseurl" id="baseurl" class="form-control" value="<?php echo base_url(); ?>">
<input type="hidden" name="nombreIglesia" id="nombreIglesia" class="form-control" value="<?php echo $nombre_iglesia; ?>">
<input type="hidden" name="idc" id="idc" class="form-control" value="<?php echo $id_congregacion; ?>">


