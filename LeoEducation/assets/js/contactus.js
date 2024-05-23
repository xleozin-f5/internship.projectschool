$(document).ready(function() {
    $('#contactForm').submit(function(event) {
        event.preventDefault(); // Evita o comportamento padrão de envio do formulário
        var formData = $(this).serialize(); // Obtém os dados do formulário
        $.ajax({
            type: 'POST', // Método de envio
            url: 'submit_report.php', // URL do arquivo PHP para processar o formulário
            data: formData, // Dados do formulário
            success: function(response) { // Função executada em caso de sucesso
                if (response === "success") {
                    $('#successMessage').fadeIn(); // Exibe mensagem de sucesso
                    $('#errorMessage').hide(); // Esconde mensagem de erro
                } else {
                    $('#errorMessage').fadeIn(); // Exibe mensagem de erro
                    $('#successMessage').hide(); // Esconde mensagem de sucesso
                }
            },
            error: function() { // Função executada em caso de erro
                $('#errorMessage').fadeIn(); // Exibe mensagem de erro
                $('#successMessage').hide(); // Esconde mensagem de sucesso
            }
        });
    });
});
