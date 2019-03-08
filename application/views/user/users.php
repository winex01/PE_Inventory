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

      <table id="table-users" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th><?= lang('first_name_input') ?></th>
          <th><?= lang('last_name_input') ?></th>
          <th><?= lang('username_input') ?></th>
          <th><?= lang('created_at') ?></th>
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

<?php $this->load->view('modals/user/add') ?>
<?php $this->load->view('modals/user/delete') ?>
<?php $this->load->view('modals/user/edit') ?>
