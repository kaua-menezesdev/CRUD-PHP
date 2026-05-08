$(document).ready(function () {

    // DataTable com Bootstrap
    $('#tabela').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        }
    });

    // Mostrar formulário
    $('#btnNovo').click(function () {
        $('#formCard').slideToggle();
        $('#formUsuario')[0].reset();
        $('#id').val('');
    });

    // EDITAR
    $(document).on('click', '.editar', function () {

        $('#formCard').slideDown();

        $('#id').val($(this).data('id'));
        $('#nome').val($(this).data('nome'));
        $('#email').val($(this).data('email'));

    });

    // EXCLUIR com SweetAlert
    $(document).on('click', '.excluir', function () {

        let id = $(this).data('id');

        Swal.fire({
            title: "Tem certeza?",
            text: "Esse registro será removido!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: 'excluir.php',
                    type: 'POST',
                    data: { id: id },
                    success: function () {
                        Swal.fire("Excluído!", "Registro removido com sucesso.", "success")
                            .then(() => location.reload());
                    }
                });

            }

        });

    });

    // VALIDAÇÃO SIMPLES
    $('#formUsuario').on('submit', function (e) {

        let nome = $('#nome').val().trim();
        let email = $('#email').val().trim();

        if (nome === '' || email === '') {
            e.preventDefault();

            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Preencha todos os campos!'
            });
        }

    });

});