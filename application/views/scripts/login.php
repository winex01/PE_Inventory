<script type="text/javascript">
  $('#btn-login').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */

    var un = $('#un').val();
    var pwd = $('#pwd').val();
    var validate = '';

    if (un == null || un == '') {
      $('#un').parent().addClass('has-error');
    }else {
      $('#un').parent().removeClass('has-error');
      validate += '1';
    }

    if (pwd == null || pwd == '') {
      $('#pwd').parent().addClass('has-error');
    }else {
      $('#pwd').parent().removeClass('has-error');
      validate += '2';
    }


    if (validate == '12') {
      $('#loader').show();
      $('#btn-login').hide();

      $('#un').attr('disabled', true);
      $('#pwd').attr('disabled', true);

      $.ajax({
        url: '<?php echo base_url('login/user') ?>',
        type: 'POST',
        dataType: 'json',
        data: {
          '<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
          un: un,
          pwd: pwd
        },
      })
      .done(function(response) {
        // console.log(response);
        if (response.authenticated) {
          $('#myModal').hide();
          window.location.href = response.redirect_to;
        }else {
          $('#msg').show();
          $('#msg').html("<?php flash_msg('danger', 'Invalid User!') ?>");
          $('#btn-login').show();
          $('#msg').delay(2000).fadeOut('slow'); // hide msg
        }

        $('#un').attr('disabled', false);
        $('#pwd').attr('disabled', false);

        $('#loader').hide();
      });
    }
  });
</script>