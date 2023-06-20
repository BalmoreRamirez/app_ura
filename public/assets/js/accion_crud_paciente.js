//¿$("#eliminarPaciente")



  $(document).ready(function() {
    $('.eliminarPaciente').click(function() {
      let itemId = $(this).data('item-id');
      
      $.ajax({
        url: '/paciente/' + itemId,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
          alert(result.success);
        },
        error: function(xhr) {
          // Manejar el error en caso de que ocurra algún problema durante la eliminación
          console.log(xhr.responseText);
        }
      });
    });
  });

