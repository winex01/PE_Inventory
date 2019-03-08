<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= $title ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <a class="btn btn-success" data-toggle="modal" href='#modal-user'>
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        New
      </a>

      <div style="margin-bottom: 20px;"></div>

      <table id="table-equipments" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th><?= lang('equipment_name') ?></th>
          <th><?= lang('quantity') ?></th>
          <th><?= lang('brand') ?></th>
          <th><?= lang('date_arrived') ?></th>
          <th><?= lang('date_added') ?></th>
          <th><?= lang('added_by') ?></th>
          <th><?= lang('condition') ?></th>
          <th><center><?= lang('action') ?></center></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<?php //$this->load->view('modals/user/add') ?>
<?php //$this->load->view('modals/user/delete') ?>
<?php //$this->load->view('modals/user/edit') ?>
