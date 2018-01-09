// $(document).on('click', '.view_data', function()
  $('.prikaz_detalja').click(function()
  {
    // $('#modal_prikaz_detalja_reda').modal();
    var employee_id = $(this).attr("id");
    $.ajax({
      url:"prikaz_detalja.php",
      type:"post",
      data:{employee_id:employee_id},
      success:function(data)
      {
        $('#zaposleni_detalji').html(data);
        $('#modal_prikaz_detalja_reda').modal('show');
      }
    });
  });